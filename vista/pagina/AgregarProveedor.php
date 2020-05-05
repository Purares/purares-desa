
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Compra</title>
</head>
<body>

<div class="container">
           <br>
            <h2>Nuevo Proveedor</h2>
            <hr> 
            <br>  
          <h5>Datos del proveedor</h5>
          <hr>
          <br>
          <form method="post" class="needs-validation" id="formagregarproveedor">
            <div class="row">
         <div class="input-group col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Razón Social:</span>
                  </div>
  
                    <input type="text" class="form-control text-center" id="nombreproveedor" name="nombreAgregarProveedor" placeholder="Ingrese la razon social del proveedor" required>
                
                                   <div class="invalid-feedback">
                                   Ingrese la razon social del proveedor
                                    </div>
                                </div>
                                    <div class="input-group col-6">
                                <div class="input-group-prepend"> 
                                      <span class="input-group-text">Tipo:</span>
                                </div>
            
                  <select class="custom-select"  id="tipoproveedor" name="tipoAgregarProveedor" required>
            <option value="Carnes">Carnes</option> 
             <option value="Insumos">Insumos</option>      
                     </select>           
                <div class="invalid-feedback">
                                    Seleccione el tipo de proveedor
                                    </div>
              
                 </div>
                </div>
                     <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarProveedor" data-toggle="modal" data-target="#ConfirmarNuevoProveedor">Agregar proveedor</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevoProveedor" tabindex="-1" role="dialog" aria-hidden="true">
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

$('#ConfirmarNuevoProveedor').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalagregarproveedor()
function completarmodalagregarproveedor(){             
                                  var nombre=$('#nombreproveedor').val()
                                      tipoproveedor=$('#tipoproveedor option:selected').text()
                                      

                                       
modal.find('.nombre').text('' + nombre);
modal.find('.proveedor_tipo').text('' + tipoproveedor);



}})





$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
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
    
});


</script>

</body>
</html>


