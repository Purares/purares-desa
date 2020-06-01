
<!DOCTYPE html>
<html>
<head>
</head>

<?php


$ultimosid=ControladorFormularios::ctrUltimosId();

  $ultimoidmovinsumo=$ultimosid['idUltimoMovInsumo_'];

  $ultimoidmovcarne=$ultimosid['idUltimoMovCarne_'];

  $ultimoidproducto=$ultimosid['idUltimoMovProducto_']


?>
<body>

<div class="container">
           <br>
            <h2>Ajuste Stock</h2>
            <hr> 
            <br>
          <form method="post" class="needs-validation" id="formajustestock">

  <input type="hidden" name="utlimoIdCarneAjusteStock" value="<?php echo $ultimoidmovcarne[0][0]?>">
    <input type="hidden"name="utlimoIdInsumosAjusteStock" value="<?php echo $ultimoidmovinsumo[0][0] ?>">
        <input type="hidden"name="utlimoIdProductoAjusteStock" value="<?php echo $ultimoidproducto[0][0] ?>">

            <div class="row">
               <div class="input-group col-6">
                     <div class="input-group-prepend"> 
                  <span class="input-group-text">Tipo:</span>
                    </div>
            
                  <select class="custom-select" name="tipoAjusteStock" id="SelectCarneInsumo" required>
                           <option value="">Seleccione</option>    
            <option value="Carnes">Carnes</option> 
             <option value="Insumos">Insumos</option>  
              <option value="Productos">Productos</option>     
                     </select>           
                <div class="invalid-feedback">
                                    Seleccione el tipo de stock a ajustar
                                    </div>
              
                 </div>
                   <div class="input-group col-6">
                     <div class="input-group-prepend"> 
                  <span class="input-group-text" id="textoselect">Depósito:</span>
                    </div>
            
                  <select class="custom-select"  id="SelectDeposito" >   
                     </select>           
                <div class="invalid-feedback">
                                    Seleccione el tipo de stock a ajustar
                                    </div>
              
                 </div>
            </div>
               <br>
                  <div class="row">
               <div class="input-group col-6">
                  <select class="custom-select" name="motivoAjusteStock" required>
                           <option value="Ajuste Stock" selected>Ajuste Stock</option>   
                     </select>             
                 </div>
 					</div>
               <br>
               <table id="TablaAjuste" class="table-sm table-hover"></table>
               <br>
                            <br>
              <textarea type="text" class="form-control" name="DescripcionAjusteStock" id="DescripcionAjusteStock" placeholder="Describa" required>Describa</textarea>
                             <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
                            
                      
                            <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarAjuste" data-toggle="modal" data-target="#ConfirmarNuevoAjuste">Ajustar stock</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevoAjuste" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nuevo Ajuste</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar el siguiente ajuste.</p>
            <br>
          <p>¿Confirma que desea CARGAR ESTE AJUSTE?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="botonconfirmarajuste" class="btn btn-success">Sí, cargar ajuste</button>
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
      var button= document.getElementById('BotonAgregarAjuste');
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
    

$('#ConfirmarNuevoAjuste').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalagregarajuste()
function completarmodalagregarajuste(){             
                                



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
                 $('#textoselect').html('Carne:')
                 $('#SelectDeposito').attr('name', 'ArrayIdCarnesAjusteStock');
                 $('#SelectDeposito').find('option').remove()
                $('#SelectDeposito').removeClass('selecdeposito')
                 $('#SelectDeposito').removeClass('selectProducto')
                   $('#SelectDeposito').addClass('selecCarne')
                
                    $('#SelectDeposito').append(html); 
                }
            }); 
        }
        if(queajusto=="Insumos"){
           $.ajax({
                type:'POST',
                url:'datos.php',
                data:'ajusteinsumos',
                success:function(html){
                  $('#textoselect').html('Depósito:')
                  $('#SelectDeposito').attr('name', 'Deposito');
                   $('#SelectDeposito').find('option').remove()
                  $('#SelectDeposito').removeClass('selecCarne')
                     $('#SelectDeposito').removeClass('selectProducto')
                   $('#SelectDeposito').addClass('selecdeposito')
        //  $('#SelectDeposito').prop('disabled',false)
           $('#SelectDeposito').append(html); 
             $('#TablaAjuste').find('tr').remove()
                    $('#TablaAjuste').append('<tr><td>Seleccione el depósito</td></tr>') 
        }})
    }
       if(queajusto=="Productos"){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'ajusteproductos',
                success:function(html){
                 $('#textoselect').html('Producto:')
                 $('#SelectDeposito').attr('name', 'ArrayIdProductoAjusteStock');
                 $('#SelectDeposito').find('option').remove()
                    $('#SelectDeposito').removeClass('selecdeposito')
                     $('#SelectDeposito').removeClass('selecCarne')
                   $('#SelectDeposito').addClass('selectProducto')
                
                    $('#SelectDeposito').append(html); 
                }
            }); 
        }




  });

    $('#SelectDeposito').on('change',function(){
        var depoID = $('.selecdeposito option:selected').text();
        var carneID = $('.selecCarne option:selected').val();
        var productoID = $('.selectProducto option:selected').val();
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
        }
        if(carneID){
             // alert("llamo carne")
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idCarneAjusteStock='+carneID,
                success:function(html){
                 // alert(html)

                   $('#TablaAjuste').find('tr').remove()
                    $('#TablaAjuste').append(html)  
                }
            }); 
        }
        if(productoID){
             // alert("llamo carne")
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idProductoAjusteStock='+productoID,
                success:function(html){
                 // alert(html)

                   $('#TablaAjuste').find('tr').remove()
                    $('#TablaAjuste').append(html)  
                }
            }); 
        }
    });

 $('#TablaAjuste').on('change, keyup', '.stockrealinsumo',function(){

var ajuste=parseFloat($(this).val())-parseFloat($(this).closest('tr').find('.stockactualinsumo').val())
var ajusteredondeado=ajuste.toFixed(3)
$(this).closest('tr').find('.ajustestockinsumo').val(ajusteredondeado)


 })

  $('#TablaAjuste').on('change, keyup', '.stockcarnereal',function(){

var ajuste=parseFloat($(this).val())-parseFloat($(this).closest('tr').find('.stockcarneactual').val())
var ajusteredondeado=ajuste.toFixed(3)
$(this).closest('tr').find('.ajustestockcarne').val(ajusteredondeado)


 })

    $('#TablaAjuste').on('change, keyup', '.stockproductoreal',function(){

var ajuste=parseFloat($(this).val())-parseFloat($(this).closest('tr').find('.stockproductoactual').val())
var ajusteredondeado=ajuste.toFixed(3)
$(this).closest('tr').find('.ajustestockproducto').val(ajusteredondeado)


 })

     $('#TablaAjuste').on('change, keyup', '.stockproductorealenkilos',function(){

var ajuste=parseFloat($(this).val())-parseFloat($(this).closest('tr').find('.stockproductokilosactual').val())
var ajusteredondeado=ajuste.toFixed(3)
$(this).closest('tr').find('.ajustestockproductokilos').val(ajusteredondeado)


 })   
  // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmarajuste").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formajustestock").serialize(),function(respuestacodajuste){

var respuesta=JSON.parse(respuestacodajuste)

//alert(respuesta.respuesta_)
               if(respuesta.respuesta_ == 'OK'){
                  $('#ConfirmarNuevoAjuste').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Ajuste agregado</h4><p>Usted ha agregado el nuevo ajuste correctamente.</p><hr></div>')
          } else {
                    $('#ConfirmarNuevoAjuste').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el ajuste. <a id="erroragregarajuste"></a></p><hr></div>')
                   modal.find('#erroragregarajuste').empty()
                  modal.find('#erroragregarajuste').html(respuestacodajuste)
                }
            })
  

});
  })


</script>

</body>
</html>


