
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Compra</title>
</head>
<body>

<?php


$depositos=ControladorFormularios::ctrListaDepositos();

$proveedores=ControladorFormularios::ctrListaProveedores();

//$compra_insumo=ControladorFormularios::ctrCompraInsumo();

?>

<div class="container">
           <br>
            <h2>Nueva Compra</h2>
            <hr> 
            <br>  
          <h5>Datos de la compra</h5>
          <hr>
          <br>
          <form method="post" class="needs-validation" id="formagregarcompra">
            <div class="row">
                             <div class="input-group col-4">
                                 <div class="input-group-prepend">
                    <span class="input-group-text">Proveedor:</span>
                  </div>
                 <div class="input-group-append">
                        <select class="custom-select" name="idProvedorCompraInsumo" id="proveedorcompra" required>
                        <option value="">Seleccione el proveedor</option>
    
    <?php

    if ($proveedores) {

foreach($proveedores as $proveedor){

  echo '<option value="' . $proveedor["id_proveedor"] . '">' . $proveedor["nombre"] . '</option>';
}}
else{

echo $proveedores;

};?>
                               </select>
                             </div>
                                   <div class="invalid-feedback">
                                   Elija el nombre del proveedor de la compra
                                    </div>
 
                                </div>
                <div class="input-group col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">N° de Remito:</span>
                  </div>
                  <div class="input-group-append">
                    <input type="text" class="form-control text-center" id="NumeroRemitoCompra" name="nroRemitoCompraInsumo" placeholder="Ingrese el número de remito" required>
                  </div>
                                   <div class="invalid-feedback">
                                   Ingrese el número de remito
                                    </div>
                                </div>
                                    <div class="input-group col-4">
                                <div class="input-group-prepend"> 
                                      <span class="input-group-text">Fecha de compra:</span>
                                </div>
                          <div class="input-group-append">
                <input type="date" id="fechaCompraInsumo" name="fechaCompraInsumo" required>            
                <div class="invalid-feedback">
                                    Ingresa la fecha de debaste
                                    </div>
                </div>
                 </div>
                </div>
                <br>
<br>
              <h5>Detalle de la compra</h5>
              <hr>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col" class="text-center text-white bg-dark">Depósito</th>
                      <th scope="col" class="text-center text-white bg-dark">ID</th>
                      <th scope="col" class="text-center text-white bg-dark">Insumo</th>
                      <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
                      <th scope="col" class="text-center text-white bg-dark"></th>
                    </tr> 
                  </thead>
                <tbody id="TablaCompraInsumos">
                            <tr id="seleccioninsumoscompra">
                        <td scope="col" width="25%">
                          <select class="custom-select depo" name="depositoInsumoCompra">
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
                          <select class="custom-select nomingre" name="idInsumoCompraInsumo[]">
                                        <option value="0">Seleccione el insumo</option>
                          </select>
                        </td>
                        <td scope="col" width="25%">
                          <div class="input-group"> 
                          <input type="number" min=0 step=0.001 name="cantidadCompraInsumo[]" class="form-control text-right cantingre" placeholder="Cantidad">
                              <div class="input-group-append">
                  <span class="input-group-text"><a class="unitingre">Unidad</a></span>
              </div>
                  </div>
                        </td>
                                    <td scope="col" class="text-center">
                                    <button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>
                                    
                                      </td>
                    </tr> 
                </tbody>
            </table>

            <button type="button" id="BotonAgregarInsumoReceta" class="btn btn-info btn-sm">Agregar Insumo</button>
             </div>
         <br>
              <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="descripcionCompraInsumo" id="descripcionCompraInsumo" placeholder="..."></textarea>
               <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
         
                     <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarCompra" data-toggle="modal" data-target="#ConfirmarNuevaCompra">Agregar compra</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevaCompra" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nueva compra</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar la compra del remito numero <a class="numero_remito"></a>, del proveedor <a class="proveedor_compra"></a>, con fecha <a class="fechacompra"></a></p>


          <p>La compra es por las siguientes cantidades de insumos:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">Insumos</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmarcomprainsumos">
              
            </tbody>
          </table>
          </div>
          <br>
          <p>Tendrá la siguiente descripción:</p> 

          <p><a class="descripcion"></a>.</p>
            <br>
          <p>¿Confirma que desea CARGAR ESTA COMPRA?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="botonconfirmaragregarcompra" class="btn btn-success">Sí, cargar compra</button>
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

$('#ConfirmarNuevaCompra').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalcomprainsumos()
function completarmodalcomprainsumos(){             
                                  var numeroremitocompra=$('#NumeroRemitoCompra').val()
                                      proveedor=$('#proveedorcompra option:selected').text()
                                      fechacompra=$('#fechaCompraInsumo').val()
                                      descripcion=$('#descripcionCompraInsumo').val()
                                     
                                      var nombreisumoscompra = [];
                                      cantidadinsumoscompra=[];
                                      unidadinsumoscompras=[];

                                      $('.tringre').remove();

                                      $('.nomingre option:selected').each(function(){
                                        nombreisumoscompra.push($(this).text());
                                      })
                                       $('.cantingre').each(function(){
                                        cantidadinsumoscompra.push($(this).val());
                                      })
                                         $('.unitingre').each(function(){
                                        unidadinsumoscompras.push($(this).text());
                                      })



                                       
modal.find('.numero_remito').text('' + numeroremitocompra);
modal.find('.proveedor_compra').text('' + proveedor);
modal.find('.fechacompra').text('' + fechacompra);
modal.find('.descripcion').text('' + descripcion);



for (var i=0; i<=nombreisumoscompra.length-1;i++){
  
  modal.find('#tablaconfirmarcomprainsumos').append($('<tr class="tringre"><td scope="col">' + nombreisumoscompra[i] +'</td><td scope="col" class="text-right">'+ cantidadinsumoscompra[i] + '</td><td scope="col">' + unidadinsumoscompras[i]+ '</tr>'))

  }}})

$('#BotonAgregarInsumoReceta').on('click', function (event) {

agregarinsumoscompra();
function agregarinsumoscompra() {

  $("#TablaCompraInsumos")
  .append
  (
      $('<tr>')
        .append
          (
           $('<td>').attr('scope','col').attr('width','25%')
          .append
          (
            $("<select class='custom-select'><option value=''>Seleccione el depósito</option>")

<?php

foreach($depositos as $deposito){

  echo '.append(`<option value="' . $deposito["id_deposito"] . '">' . $deposito["nombre"] . '</option>`)';

};

?>

              
            .attr('name','depositoInsumoCompra')
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
            
              $("<select class='custom-select nomingre' name='idInsumoCompraInsumo[]'><option value='0'>Seleccione el insumo</option></select>")

            ),

           $('<td>').attr('scope','col').attr('width','25%')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=0.0001 name='cantidadCompraInsumo[]' class='form-control text-right cantingre' placeholder='Cantidad'><div class='input-group-append'><span class='input-group-text'><a class='unitingre'>Unidad</a></span></div></div>")

            ),

            $('<td>').attr('scope','col').attr('class','text-center')
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
      var button= document.getElementById('BotonAgregarCompra');
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
    $('#TablaCompraInsumos').on('change', '.depo',function(){
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
    $('#TablaCompraInsumos').on('change', '.nomingre',function(){
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
    
});


$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmaragregarcompra").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formagregarcompra").serialize(),function(respuestacodcompra){
                if(respuestacodcompra.validacion_ == "OK"){
                  $('#ConfirmarNuevaCompra').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Compra agregada</h4><p>Usted ha agregado la nueva compra correctamente. El número de la compra es <a id="id_nuevacompra"></a></p><hr></div>')
                  modal.find("#id_nuevacompra").text(respuestacodcompra.idCompra_)
                  var link="index.php?pagina=detalleCompra&idCompra="+respuestacodcompra.idCompra_+"&estado=0"
                  modal.find('#botonaceptarnuevacompra').unbind('click');
                  modal.find('#botonaceptarnuevacompra').attr("href", link)

                } else {
                    $('#ConfirmarNuevaCompra').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar la nueva compra. <a id="erroragregarcompra"></a></p><hr></div>')
                   modal.find('#erroragregarcompra').empty()
                  modal.find('#erroragregarcompra').html(respuestacodcompra.validacion_)
                }
            },"json");
  
    });    
});


</script>

</body>
</html>


