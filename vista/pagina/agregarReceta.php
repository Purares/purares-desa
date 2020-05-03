
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Receta</title>
</head>
<body>

<?php

$depositos=ControladorFormularios::ctrListaDepositos();

$recetas=ControladorFormularios::ctrListaRecetas();

$productos=ControladorFormularios::ctrStockProductos();

if (isset($_GET['idReceta'])){ 


$detalleReceta=ControladorFormularios::ctrDetalleReceta();

$receta=$detalleReceta[0];

$detalleinsumos=ControladorFormularios::ctrInsumosReceta();

}
?>

<div class="container">
           <br>
            <h2>Agregar nueva receta</h2>
            <hr> 
                          <br>
      <form method="post" class="needs-validation" id="formcrearreceta">
                     
                     <div class="row ">
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Nombre de la nueva receta:</span>
                  </div>
                    <input type="text" class="form-control" id="NombreReceta" name="nombreCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['nombre'].' COPIA';}?>" placeholder="Ingrese el nombre de la nueva receta" required>
                             <div class="invalid-feedback">
                                    Ingrese un nombre para la nueva receta
                                    </div>
              </div>
        
                  </div>
                  <br>
              <h5>Complete los insumos necesarios para fabricar 100 kilos de pastón:</h5>
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
                <tbody id="TablaReceta">

<?php

if (isset($_GET['idReceta'])){ 

foreach ($detalleinsumos as $insumo) {

echo '<tr><td scope="col"></td><td scope="col"><a class="idinsumoselec">'.$insumo['id_insumo'].'</a></td><td scope="col"><select class="custom-select nomingre" name="idinsumoCrearReceta[]" required><option value='.$insumo['id_insumo'].'>'.$insumo['insumo'].'</option></select></td><td scope="col"><div class="input-group"><input type="number" min=0 step=0.001 name="cantidadinsumoCrearReceta[]"" class="form-control text-right cantingre" value="'.$insumo['cantidad'].'" required><div class="input-group-append"><span class="input-group-text"><a class="unitingre">'.$insumo['udm'].'</a></span></div></div></td><td scope="col"><button type="button" class="btn btn-danger btn-sm borrar">Borrar</button></td></tr>';

}};
?>


                            <tr id="seleccioninsumos">
                        <td scope="col">
                          <select class="custom-select depo" name="depositoInsumoReceta" required>
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
                          <select class="custom-select nomingre" name="idinsumoCrearReceta[]" required>
                                        <option value="0">Seleccione el insumo</option>
                          </select>
                        </td>
                        <td scope="col">
                          <div class="input-group"> 
                          <input type="number" min=0 step=0.001 name="cantidadinsumoCrearReceta[]" class="form-control text-right cantingre" placeholder="Cantidad" required>
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
            <button type="button" id="BotonAgregarInsumoReceta" class="btn btn-success btn-sm">Agregar Insumo</button>
          </div>
          <br>
             <div class="row">
                <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Peso total de insumos:</span>
                  </div>
                    <input type="number" min=0 step=0.001 class="form-control text-right" id="pesototalinsumos" name="pesoTotInsumosCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['peso_total_insumos_kg'];}?>" placeholder="kilos" required>
                  <div class="input-group-append">
                  <span class="input-group-text">kilos</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese el total de insumos en kilos que utilizará un paston de 100 kilos.">
  ?
</button>
              </div>
                             <div class="invalid-feedback">
                                   Ingrese el total de insumos en kilos que utilizará un paston de 100 kilos.
                                    </div>
                </div>
              </div>
              <br>
              <h5>Complete los productos que se obtendran con esta receta:</h5>
              <br>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <td scope="col" class="text-center text-white bg-dark">Codigo</td>
                      <td scope="col" class="text-center text-white bg-dark">Producto</td>
                       <td scope="col" class="text-center text-white bg-dark">Unidades Necesarias</td>
                        <td scope="col" class="text-center text-white bg-dark"></td>
                    </tr> 
                  </thead>
                <tbody id="TablaProductos">
                            <tr>
                        <td scope="col">
                          <a class="idproductoselec"></a>
                        </td>
                        <td scope="col">
                          <select class="custom-select nomprodu" name="idProductoCrearReceta[]" required>
                                        <option value="0">Seleccione el producto</option>

<?php

foreach($productos as $producto){

  echo '<option value="' . $producto["id_producto"] . '">' . $producto["nombre"] . '</option>';

};

?>


                          </select>
                        </td>
                         <td scope="col">
                          <div class="input-group"> 
                          <input type="number" min=0 step=1 name="unidadesNecesariasCrearReceta[]" class="form-control text-right cantprodu" placeholder="Cantidad unidades necesarias" required>
                              <div class="input-group-append">
                  <span class="input-group-text"><a class="unitprodu">Unidades</a></span>
              </div>
                  </div>
                        </td>
                           <td scope="col">
                                    <button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>
                                     </td>
                    </tr> 
                </tbody>
            </table>
            <button type="button" id="BotonAgregarProducto" class="btn btn-success btn-sm">Agregar Producto</button>
          </div>
          <br>
              <br>
              <h5>Información de producción</h5>
              <hr>
          <br>
          <div class="row">
            <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Porcentaje de carne:</span>
                  </div>
                    <input type="number" min=0 step=0.1 max=100 class="form-control text-right" id="KilosCarne" name="porcentcarneCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['porcent_carne'];}?>" placeholder="Ingrese el porcentaje de carne" required>
                  <div class="input-group-append">
                  <span class="input-group-text">%</span>
              </div>
                             <div class="invalid-feedback">
                                    Ingrese la el porcentaje de carne que tendrá el paston
                                    </div>
              </div>
            <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Merma esperada:</span>
                  </div>
                    <input type="number" min=0 step=0.1 max=99.9 class="form-control text-right" id="MermaEsperada" name="mermaCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['merma_esperada'];}?>"  placeholder="Porcentaje esperado" required>
                  <div class="input-group-append">
                  <span class="input-group-text">%</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese el porcentaje de merma esperada con respecto al producto fresco, luego de finalizar el proceso de secado">
  ?
</button>
              </div>
                               <div class="invalid-feedback">
                                    Ingresa el porcentaje de merma esperado
                                    </div>
            </div>
          </div>
              <br>
              <div class="row">
                <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Días de producción:</span>
                  </div>
                    <input type="number" min=0 class="form-control text-right" id="DiasProduccion" name="diasprodCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['dias_produccion'];}?>" placeholder="días" required>
                  <div class="input-group-append">
                  <span class="input-group-text">días</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese la cantidad de días desde que comienza el proceso productivo (amasado) hasta que el producto es envasado.">
  ?
</button>
              </div>
                             <div class="invalid-feedback">
                                    Ingresa la cantidad de dias que se requieren para producir
                                    </div>
                </div>
              <br>
                <div class="input-group col-6"> 
                            <div class="input-group-prepend">
                    <span class="input-group-text">Vencimiento:</span>
                  </div>
                    <input type="number" min=0 class="form-control text-right" id="DiasVencimiento" name="diasvencCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['dias_vencimiento'];}?>" placeholder="días" required>
                  <div class="input-group-append">
                  <span class="input-group-text">días</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese la cantidad de días, desde que el producto es envasado,  hasta que se vence.">
  ?
</button>
              </div>
                           <div class="invalid-feedback">
                                    Ingrese la cantidad de dias que el producto es consumible.
                                    </div>     
               </div>
              </div>
              <br>
              <hr>
              <br>
              <h5>Producto fresco</h5>
              <hr>
                    <div class="row">
               <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Largo por unidad:</span>
                  </div>
                    <input type="number" min=0 step=0.001 class="form-control text-right" id="cmxunidad" name="largouniLoteCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['largo_unidad_lote'];}?>" placeholder="Ingrese la medida" required>
                  <div class="input-group-append">
                  <span class="input-group-text">metros/unidad</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese el largo de la unidad fresca, antes de que ingrese al secadero.">
  ?
</button>
              </div>
                             <div class="invalid-feedback">
                                   Ingrese el largo por unidad en metros
                                    </div>
                </div>  
                <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Peso por unidad:</span>
                  </div>
                    <input type="number" min=0 step=0.001 class="form-control text-right" id="gramosxunidad" name="pesouniLoteCrearReceta"  value="<?php if (isset($_GET['idReceta'])){ echo $receta['peso_unidad_lote'];}?>" placeholder="Ingrese la medida" required>
                  <div class="input-group-append">
                  <span class="input-group-text">kilos/unidad</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese el peso de la unidad fresca, antes de que ingrese al secadero.">
  ?
</button>
              </div>
                             <div class="invalid-feedback">
                                   Ingrese el peso por unidad en kilos 
                                    </div>
              </div>
                    </div>
                    <br>
            <div class="row">
              <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Cantidad de unidades:</span>
                  </div>
                    <input type="number" min=0 step=1 class="form-control text-right" id="cantunisfrescas" name="unidadesXpastonCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['cantidad_unidades_lote'];}?>" placeholder="Ingrese la cantidad" required>
                  <div class="input-group-append">
                  <span class="input-group-text">unidades</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese la cantidad de unidades frescas obtenidas con un pastón de 100 kilos.">
  ?
</button>
              </div>
                             <div class="invalid-feedback">
                                   Ingrese el peso por unidad en kilos 
                                    </div>
                </div> 
                </div>    
                      <br>
                      <br>
              <h5>Producto terminado</h5>
              <hr>
                    <div class="row">
                  
                       <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Largo por unidad esperado:</span>
                  </div>
                    <input type="number" min=0 step=0.001 class="form-control text-right" id="cmxunidadesperado" name="largoUniEsperadoCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['largo_unidad_esperado'];}?>" placeholder="Ingrese la medida" required>
                  <div class="input-group-append">
                  <span class="input-group-text">metros/unidad</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese el largo del producto final que será envasado.">
  ?
</button>
              </div>
                             <div class="invalid-feedback">
                                   Ingrese el largo por unidad esperado en metros
                                    </div>
                </div> 

                               <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Peso por unidad esperado:</span>
                  </div>
                    <input type="number" min=0 step=0.01 class="form-control text-right" id="gramosxunidadesperado" placeholder="" value="<?php if (isset($_GET['idReceta'])){ echo $receta['peso_unidad_esperado'];}?>" disabled>
                    <input type="hidden" name="pesoUniEsperadoCrearReceta" id="gramosxunidadesperado1" value="">
                  <div class="input-group-append">
                  <span class="input-group-text">kilos/unidad</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="El valor de este campo se calcula automáticamente.">
  ?
</button>
              </div>
                </div>
              </div>
              <br>
              <div class="row">

            <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Unidades finales por unidad producida:</span>
                  </div>
                    <input type="number" min=0 step=1 class="form-control text-right" id="unidadesfinalesxunidad" name="uFinalXuCrearReceta" value="<?php if (isset($_GET['idReceta'])){ echo $receta['unidades_final_xunidad'];}?>"  placeholder="Cantidad" required>
                  <div class="input-group-append">
                  <span class="input-group-text">Unidades</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese la cantidad de unidades finales que se obtienen por cada unidad fresca que entra al secadero. Es decir, en cuantas unidades se corta el producto fresco.">
  ?
          </button>
              </div>
                             <div class="invalid-feedback">
                                  Ingrese la cantidad de unidades finales por unidad producida 
                                    </div>
                </div> 
                  </div>
              <hr>
                <br>
              <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="descripcionCrearReceta" id="descripcionreceta"><?php if (isset($_GET['idReceta'])){ echo $receta['descripcion'];}?></textarea>
  
                <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarReceta" data-toggle="modal" data-target="#ConfirmarNuevaReceta">Agregar receta</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevaReceta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nueva receta</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar la receta <a class="nombre"></a>.</p>

          <p>Utilizará <a class="kilos"></a> % de carne sobre el peso del pastón, con <a class="merma"></a>% de merma esperada.</p>

          <p>Requerirá <a class="diasprodu"></a> días de producción y <a class="diasvenc"></a> días para su vencimiento.</p>

          <p>Tiene un largo por unidad fresca de <a class="largo"></a> metros y un largo por unidad esperado de <a class="largoesperado"></a> metros.

          <p>Tiene un peso por unidad fresca de <a class="peso"></a> kilos y un peso por unidad esperado de  <a class="pesoesperado"></a> kilos .</p>

          <p>Se esperan producir <a class="unidesdesfrescas"></a> unidades frescas cada 100 kilos.</p>

          <p>Tendrá  <a class="pesototalinsumos"></a> kilos de insumos:</p> 

          <p>Tendrá la siguiente descripción:</p> 

          <p><a class="descripcion"></a>.</p>

          <p>La receta tendrá los siguientes insumos:</p>

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
			 <p>Con esta receta se obtendran los suiguientes productos:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">Producto</th><th scope="col">Unidades Necesarias</th></tr>
            </thead>
            <tbody id="tablaconfirmarproductos">
              
            </tbody>
          </table>
          </div>

          <p>¿Confirma que desea CARGAR ESTA RECETA?</p>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-success" id="botonconfirmarreceta">Sí, cargar receta</button>
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
          <a type="button" class="btn btn-info" id="botonaceptarnuevareceta" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>



<script type="text/javascript">

$('#ConfirmarNuevaReceta').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalrecetas()
function completarmodalrecetas(){             
                                  var nombrereceta=$('#NombreReceta').val()
                                      unidadesfinalesxunidad=$('#unidadesfinalesxunidad').val()
                                      kiloscarne=$('#KilosCarne').val()
                                      descripcion=$('#descripcionreceta').val()
                                      mermaesperada=$('#MermaEsperada').val()
                                      diasproduccion=$('#DiasProduccion').val()
                                      diasvencimiento=$('#DiasVencimiento').val()
                                      gramosxunidad=$('#gramosxunidad').val()
                                      cmxunidad=$('#cmxunidad').val()
                                      unidadesfrescas=$('#unidadesfrescas').val()
                                      gramosxunidadesperado=$('#gramosxunidadesperado').val()
                                      cmxunidadesperado=$('#cmxunidadesperado').val()
                                      pesototalinsumos=$('#pesototalinsumos').val()


                                      var nombreingredientes = [];
                                      cantidadingredientes=[];
                                      unidadingredientes=[];
                                      nombreproductos=[];
                                      cantuniproductos=[];

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

                                       $('.trprodu').remove();

                                      $('.nomprodu option:selected').each(function(){
                                        nombreproductos.push($(this).text());
                                      })
                                       $('.cantprodu').each(function(){
                                        cantuniproductos.push($(this).val());
                                      })
                                     
                                     


                                       
modal.find('.nombre').text('' + nombrereceta);
modal.find('.kilos').text('' + kiloscarne);
modal.find('.merma').text('' + mermaesperada);
modal.find('.diasprodu').text('' + diasproduccion);
modal.find('.diasvenc').text('' + diasvencimiento);
modal.find('.largo').text('' + gramosxunidad);
modal.find('.peso').text('' + cmxunidad);
modal.find('.unidadesfrescas').text('' + unidadesfrescas);
modal.find('.largoesperado').text('' + gramosxunidadesperado);
modal.find('.pesoesperado').text('' + cmxunidadesperado);
modal.find('.descripcion').text('' + descripcion);
modal.find('.unidades finales').text('' + unidadesfinalesxunidad);
modal.find('.pesototalinsumos').text('' + pesototalinsumos);

for (var i=0; i<=nombreingredientes.length-1;i++){
  
  modal.find('#tablaconfirmar').append($('<tr class="tringre"><td scope="col">' + nombreingredientes[i] +'</td><td scope="col" class="text-right">'+ cantidadingredientes[i] + '</td><td scope="col">' + unidadingredientes[i]+ '</tr>'))

  }
for (var i=0; i<=nombreproductos.length-1;i++){
  
  modal.find('#tablaconfirmarproductos').append($('<tr class="trprodu"><td scope="col">' + nombreproductos[i] +'</td><td scope="col">' + cantuniproductos[i] +' unidades</td></tr>'))

  }

}})

$('#BotonAgregarInsumoReceta').on('click', function (event) {

agregaringrediente();
function agregaringrediente() {

  $("#TablaReceta")
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
            
              $("<select class='custom-select nomingre' name='idinsumoCrearReceta[]' required><option value='0'>Seleccione el insumo</option></select>")

            ),

           $('<td>').attr('scope','col')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=0.001 name='cantidadinsumoCrearReceta[]' class='form-control text-right cantingre' required><div class='input-group-append'><span class='input-group-text'><a class='unitingre'>Unidad</a></span></div></div>")

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

      $('#BotonAgregarProducto').on('click', function (event) {

agregarproducto();
function agregarproducto() {

  $("#TablaProductos")
  .append
  (       
          $('<tr>').append(
           $('<td>').attr('scope','col')
          .append
          (
            $('<a class="idproductoselec"></a>')
            ),

            $('<td>').attr('scope','col')
          .append
          (
            
              $("<select class='custom-select nomprodu' name='' required><option value='0'>Seleccione el producto</option></select>")

              	<?php

foreach($productos as $producto){

  echo '.append(`<option value="' . $producto["id_producto"] . '">' . $producto["nombre"] . '</option>`)';

};

?>

            ),
          $('<td>').attr('scope','col')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=1 name='unidadesNecesariasCrearReceta[]' class='form-control text-right cantprodu' placeholder='Cantidad de unidades necesarias' required><div class='input-group-append'><span class='input-group-text'><a class='unitprodu'>Unidades</a></span></div></div>")

            ),

             $('<td>').attr('scope','col')
          .append
          (
            $('<button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>')
            ),

))
     
    }
   }
   );



// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarReceta');
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
    $('#TablaReceta').on('change', '.depo',function(){
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
    $('#TablaReceta').on('change', '.nomingre',function(){
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

    $('#TablaProductos').on('change', '.nomprodu',function(){
        var produID = $(this).val();
        var produ=$(this);
          $(produ).closest('tr').find('.idproductoselec').text(''+ produID);  
        })
  
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})   
});

$('#gramosxunidad').keyup(function(){

if ($('#MermaEsperada').val()!=""&&$('#unidadesfinalesxunidad').val()!="") {

$('#gramosxunidadesperado').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()).toFixed(3))
$('#gramosxunidadesperado1').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()).toFixed(3))

}else{

$('#gramosxunidadesperado').val("Se calculará cuando termine de ingresar los datos")

}})

$('#MermaEsperada').keyup(function(){

if ($('#gramosxunidad').val()!=""&&$('#unidadesfinalesxunidad').val()!="") {

$('#gramosxunidadesperado').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()).toFixed(3))
$('#gramosxunidadesperado1').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()).toFixed(3))

}else{

$('#gramosxunidadesperado').val("Se calculará cuando termine de ingresar los datos")

}})

$('#unidadesfinalesxunidad').keyup(function(){

if ($('#gramosxunidad').val()!=""&&$('#MermaEsperada').val()!="") {

$('#gramosxunidadesperado').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()).toFixed(3))
$('#gramosxunidadesperado1').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()).toFixed(3))

}else{

$('#gramosxunidadesperado').val("Se calculará cuando termine de ingresar los datos")

}})


$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmarreceta").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formcrearreceta").serialize(),function(respuestacod){
                if(respuestacod.validacion_ == "OK"){
                	$('#ConfirmarNuevaReceta').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                 	modal.find('.modal-body').empty()
                 	modal.find('.modal-body').html(
                 		'<div class="alert alert-success" role="alert"><h4 class="alert-heading">Receta agregada</h4><p>Usted ha agregado la nueva receta correctamente. El id de la orden es <a id="id_nuevareceta"></a></p><hr></div>')
                  modal.find("#id_nuevareceta").text(respuestacod.idReceta_)
                 var link="index.php?pagina=detalleReceta&idReceta="+respuestacod.idReceta_+"&estado=1"
                  modal.find('#botonaceptarnuevareceta').unbind('click');
                  modal.find('#botonaceptarnuevareceta').attr("href", link)


                } else {
                    $('#ConfirmarNuevaReceta').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                 	modal.find('.modal-body').empty()
                 	modal.find('.modal-body').html(
                 		'<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar la receta.  <a id="erroragregarreceta"></a></p><hr></div>')
                  modal.find('#erroragregarreceta').empty()
                  modal.find('#erroragregarreceta').html(respuestacod.validacion_)


                }
            },"json");
  
    });    
});


</script>

</body>
</html>


