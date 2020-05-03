
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Receta</title>
</head>
<body>

<?php

$depositos=ControladorFormularios::ctrListaDepositos();

?>

<div class="container">
           <br>
            <h2>Agregar nuevo producto</h2>
            <hr> 
                          <br>
      <form method="post" class="needs-validation" id="formcrearproducto">
                     
                     <div class="row ">
  <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Código del nuevo producto:</span>
                  </div>
                    <input type="text" class="form-control" id="CodigoProducto" name="codigoAgregarProducto" placeholder="Ingrese el codigo del nuevo producto" required>
                             <div class="invalid-feedback">
                                    Ingrese un codigo para el nuevo producto
                                    </div>
              </div>
        

     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Nombre del nuevo producto:</span>
                  </div>
                    <input type="text" class="form-control" id="NombreProducto" name="nombreAgregarProducto" placeholder="Ingrese el nombre del nuevo producto" required>
                             <div class="invalid-feedback">
                                    Ingrese un nombre para el nuevo producto
                                    </div>
              </div>
        
                  </div>
                  <br>
              <h5>Complete los insumos necesarios para el nuevo producto:</h5>
              <br>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <td scope="col" class="text-center text-white bg-dark">Deposito</td>
                      <td scope="col" class="text-center text-white bg-dark">ID</td>
                      <td scope="col" class="text-center text-white bg-dark">Insumo</td>
                      <td scope="col" class="text-center text-white bg-dark">Cantidad</td>
                      <td scope="col" class="text-center text-white bg-dark"></td>
                    </tr> 
                  </thead>
                <tbody id="TablaProducto">
                            <tr id="seleccioninsumos">
                        <td scope="col">
                          <select class="custom-select depo" name="depositoInsumoProducto" required>
                        <option value="">Seleccione el depósito</option>

<?php

foreach($depositos as $deposito){

  echo '<option value="' . $deposito["id_deposito"] . '">' . $deposito["nombre"] . '</option>';

};

?>
                          </select>
                        </td>
                        <td scope="col">
                          <a class="idinsumoselec"></a>
                        </td>
                        <td scope="col">
                          <select class="custom-select nomingre" name="insumosAgregarProducto[]" required>
                                        <option value="0">Seleccione el insumo</option>
                          </select>
                        </td>
                        <td scope="col">
                          <div class="input-group"> 
                          <input type="number" min=0 step=0.001 name="cantidadAgregarProducto[]" class="form-control text-right cantingre" placeholder="Cantidad" required>
                              <div class="input-group-append">
                  <span class="input-group-text"><a class="unitingre">Unidad</a></span>
              </div>
                  </div>
                        </td>
                                    <td scope="col">
                                    <button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>
                                     </td>
                    </tr> 
                </tbody>
            </table>
            <button type="button" id="BotonAgregarInsumoProducto" class="btn btn-success btn-sm">Agregar Insumo</button>
          </div>
          <br>
              <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="descripcionAgregarProducto" id="descripcionproducto">...</textarea>
  
                <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarProducto" data-toggle="modal" data-target="#ConfirmarNuevoProducto">Agregar producto</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevoProducto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nuevo producto</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar el producto <a class="nombre"></a>.</p>

          <p>Utilizará el siguiente código <a class="codigo"></a> 

          <p>Tendrá la siguiente descripción:</p> 

          <p><a class="descripcion"></a>.</p>

          <p>El producto utiliza los siguientes insumos:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">Ingredientes</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmar">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>¿Confirma que desea CARGAR ESTE PRODUCTO?</p>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-success" id="botonconfirmarproducto">Sí, cargar producto</button>
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
          <a type="button" class="btn btn-info" id="botonaceptarnuevoproducto" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>



<script type="text/javascript">

$('#ConfirmarNuevoProducto').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalproducto()
function completarmodalproducto(){             
                                  var nombreproducto=$('#NombreProducto').val()
                                      codigo=$('#CodigoProducto').val()
                                      descripcion=$('#descripcionproducto').val()

                                      var nombreingredientes = [];
                                      cantidadingredientes=[];
                                      unidadingredientes=[];

                                      $('.tringre').remove();

                                      $('.nomingre option:selected').each(function(){
                                        nombreingredientes.push($(this).text());
                                      })
                                       $('.cantingre').each(function(){
                                        cantidadingredientes.push($(this).val());
                                      })
                                         $('.unitingre').each(function(){
                                        unidadingredientes.push($(this).text());
                                      })



                                       
modal.find('.nombre').text('' + nombreproducto);
modal.find('.codigo').text('' + codigo);
modal.find('.descripcion').text('' + descripcion);

for (var i=0; i<=nombreingredientes.length-1;i++){
  
  modal.find('#tablaconfirmar').append($('<tr class="tringre"><td scope="col">' + nombreingredientes[i] +'</td><td scope="col" class="text-right">'+ cantidadingredientes[i] + '</td><td scope="col">' + unidadingredientes[i]+ '</tr>'))

  }}})

$('#BotonAgregarInsumoProducto').on('click', function (event) {

agregaringrediente();
function agregaringrediente() {

  $("#TablaProducto")
  .append
  (
      $('<tr>')
        .append
          (
           $('<td>').attr('scope','col')
          .append
          (
            $("<select class='custom-select' required><option value=''>Seleccione el depósito</option>")

<?php

foreach($depositos as $deposito){

  echo '.append(`<option value="' . $deposito["id_deposito"] . '">' . $deposito["nombre"] . '</option>`)';

};

?>

              
            .attr('name','depositoInsumoReceta')
            .addClass('custom-select depo')

            ),
           
           $('<td>').attr('scope','col')
          .append
          (
            $('<a class="idinsumoselec"></a>')
            ),

            $('<td>').attr('scope','col')
          .append
          (
            
              $("<select class='custom-select nomingre' name='insumosAgregarProducto[]' required><option value='0'>Seleccione el insumo</option></select>")

            ),

           $('<td>').attr('scope','col')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=0.001 name='cantidadAgregarProducto[]' class='form-control text-right cantingre' required><div class='input-group-append'><span class='input-group-text'><a class='unitingre'>Unidad</a></span></div></div>")

            ),

             $('<td>').attr('scope','col')
          .append
          (
            $('<button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>')
            ),

)
     )   
    }
   }
   );


      $(function () {
                 $(document).on('click', '.borrar', function (event) {
                       event.preventDefault();
                        $(this).closest('tr').remove();
    });
});


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarProducto');
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


$(document).ready(function(){
    $('#TablaProducto').on('change', '.depo',function(){
        var depoID = $(this).val();
        var depo=$(this);
        if(depoID){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idDepositoFiltroInsumo='+depoID,
                success:function(html){
                    $(depo).closest('tr').find('.nomingre').html(html); 
                }
            }); 
        }else{
            $(depo).closest('tr').find('.nomingre').html('<option value="">Selecione el deposito antes</option>');
        }
    });
    
});
$(document).ready(function(){
    $('#TablaProducto').on('change', '.nomingre',function(){
        var insuID = $(this).val();
        var insu=$(this);
        if(insuID){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idInsumoAgregarReceta='+insuID,
                success:function(html){
                    $(insu).closest('tr').find('.unitingre').text(''+ html);
                    $(insu).closest('tr').find('.idinsumoselec').text(''+ insuID); 
                }
            }); 
        }else{
            $(insu).closest('tr').find('.unitingre').html(""); 
        }
    });
  
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})   
});

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmarproducto").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formcrearproducto").serialize(),function(respuestacod){
        alert(respuestacod)

        var res=JSON.parse(respuestacod)


                if(respuestacod.validacion_ == "OK"){
                //	$('#ConfirmarNuevoProducto').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                 	modal.find('.modal-body').empty()
                 	modal.find('.modal-body').html(
                 		'<div class="alert alert-success" role="alert"><h4 class="alert-heading">Producto agregado</h4><p>Usted ha agregado el nuevo producto correctamente. El id del producto es <a id="id_nuevoproducto"></a></p><hr></div>')
                  modal.find("#id_nuevoproducto").text(respuestacod.idReceta_)
                 var link="index.php?pagina=detalleProducto&idProducto="+respuestacod.idProducto_+"&estado=1"
                  modal.find('#botonaceptarnuevoproducto').unbind('click');
                  modal.find('#botonaceptarnuevoproducto').attr("href", link)


                } else {
                //    $('#ConfirmarNuevoProducto').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                 	modal.find('.modal-body').empty()
                 	modal.find('.modal-body').html(
                 		'<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el nuevo producto.  <a id="erroragregarproducto"></a></p><hr></div>')
                  modal.find('#erroragregarproducto').empty()
                  modal.find('#erroragregarproducto').html(respuestacod.validacion_)


                }
            })
  
    });    
});


</script>

</body>
</html>


