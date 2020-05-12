
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<div class="container">
           <br>
            <h2>Ajuste Stock</h2>
            <hr> 
            <br>
          <form method="post" class="needs-validation" id="formajustestock">
            <div class="row">
               <div class="input-group col-6">
                     <div class="input-group-prepend"> 
                  <span class="input-group-text">Tipo:</span>
                    </div>
            
                  <select class="custom-select"  id="SelectCarneInsumo" required>
            <option value="Carnes">Carnes</option> 
             <option value="Insumos">Insumos</option>      
                     </select>           
                <div class="invalid-feedback">
                                    Seleccione el tipo de stock a ajustar
                                    </div>
              
                 </div>
                   <div class="input-group col-6">
                     <div class="input-group-prepend"> 
                  <span class="input-group-text">Depósito:</span>
                    </div>
            
                  <select class="custom-select"  id="SelectDeposito" >   
                     </select>           
                <div class="invalid-feedback">
                                    Seleccione el tipo de stock a ajustar
                                    </div>
              
                 </div>
               </div>
               <br>
               <table id="TablaAjuste" class="table-sm table-hover"></table>
               <br>
                            <br>
              <textarea type="text" class="form-control" name="descripcionAltaDesposte" id="descripcionDesposte" placeholder="Describa" required>Describa</textarea>
                             <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
                            
                      
                            <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarProveedor" data-toggle="modal" data-target="#ConfirmarNuevoProveedor">Ajustar stock</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevoProveedorxad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nuevo Proveedor</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar el proveedor <a class="nombre"></a>, del tipo <a class="proveedor_tipo"></a>.</p>
            <br>
          <p>¿Confirma que desea CARGAR ESTE NUEVO PROVEEDOR?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="botonconfirmaragregarproveedor" class="btn btn-success">Sí, cargar proveedor</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
  </div>

       </form>

     <!-- Mensaje confirmacion -->
  <div class="modal fade" id="MensajeConfirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-info" id="botonaceptarnuevacompra" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">

  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarProveedor');
      button.addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
    

$('#ConfirmarNuevoProveedor54').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalagregarproveedor()
function completarmodalagregarproveedor(){             
                                  var nombre=$('#nombreproveedor').val()
                                      tipoproveedor=$('#tipoproveedor option:selected').text()
                                      

                                       
modal.find('.nombre').text('' + nombre);
modal.find('.proveedor_tipo').text('' + tipoproveedor);



}})





$(document).ready( function() { 

    $('#SelectCarneInsumo').on('change',function(){
        var queajusto = $(this).val();
        if(queajusto=="Carnes"){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'ajustecarnes',
                success:function(html){
                  $('#SelectDeposito').prop('disabled',true)
                  $('#SelectDeposito').find('option').remove()
                  $('#TablaAjuste').find('tr').remove()
                    $('#TablaAjuste').append(html); 
                }
            }); 
        }else{
           $.ajax({
                type:'POST',
                url:'datos.php',
                data:'ajusteinsumos',
                success:function(html){
          $('#SelectDeposito').prop('disabled',false)
           $('#SelectDeposito').append(html); 
             $('#TablaAjuste').find('tr').remove()
                    $('#TablaAjuste').append('<tr><td>Seleccione el depósito</td></tr>') 
        }})
    }});

    $('#SelectDeposito').on('change',function(){
        var depoID = $('#SelectDeposito option:selected').text();
        //alert(depoID)
        if(depoID){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idDepositoAjusteStock='+depoID,
                success:function(html){

                   $('#TablaAjuste').find('tr').remove()
                    $('#TablaAjuste').append(html)  
                }
            }); 
        }else{
            
        }
    });


  // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmaragregarproveedor").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formagregarproveedor").serialize(),function(respuestacodprove){


                if(respuestacodprove == '"OK"'){
                  $('#ConfirmarNuevoProveedor').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Proveedor agregado</h4><p>Usted ha agregado el nuevo proveedor correctamente.</p><hr></div>')
          } else {
                    $('#ConfirmarNuevoProveedor').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el proveedor. <a id="erroragregarproveedor"></a></p><hr></div>')
                   modal.find('#erroragregarproveedor').empty()
                  modal.find('#erroragregarproveedor').html(respuestacodprove)
                }
            })
  

});
  })


</script>

</body>
</html>


