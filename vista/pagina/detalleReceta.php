<!DOCTYPE html>
<html>
<head>
	<title>Detalle receta</title>
</head>
<body>

<?php

$detalleReceta=ControladorFormularios::ctrDetalleReceta();

$detalleinsumos=ControladorFormularios::ctrInsumosReceta();

foreach ($detalleReceta as $receta) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Receta: <a class="nombrereceta"><?php echo $receta['nombre'] ?></a> <span class="medalla"><?php if ($_GET['estado']==1) {echo '     <span class="badge badge-success medal">Activa</span>';}else{echo '<span class="badge badge-danger medal">Desactivada</span>';}?>
					</span>
  				</h2>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==1) {echo '<a type="button" class="btn btn-warning btn-lg" id="botonDuplicar" href="index.php?pagina=agregarReceta&idReceta='.$_GET['idReceta'].'">Duplicar</a>
              <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="desactivar" id="botonCambiarEstado">Desactivar Receta</button>';}else{echo '<a type="button" class="btn btn-warning btn-lg" id="botonDuplicar" href="index.php?pagina=agregarReceta&idReceta='.$_GET['idReceta'].'">Duplicar</a>
              <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="activar" id="botonCambiarEstado">Activar Receta</button>';}?>
  						</div>
  					</div>	
  					<br>
              </div>
              <hr>
              <br>
                  <div class="row">
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">N° Receta:</span>
                                </div>
                                <input type="text" class="form-control text-center recetaid" id="spanrecetaid" value="<?php echo $_GET['idReceta'] ?>" readonly>
                              </div>
                            <div class="input-group col-6">
                                <div class="input-group-prepend">
                         <span class="input-group-text">Fecha de Alta:</span>
                                </div>
                                <input type="text" class="form-control text-center fechadealta" id="spanrecetafechaalta" value="<?php echo $receta['fecha_alta'] ?>" readonly>
        				            </div>
                    </div>
                    <br>
                    <br>
                    <h5>Insumos de la receta</h5>
                    <hr>
                    <div class="container">
                      <div class="col-6">
                        <table class="table table-hover table-sm">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col" class="text-center text-white bg-dark">ID</th>
                        <th scope="col" class="text-white bg-dark">Insumo</th>
                        <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach ($detalleinsumos as $insumo) {

echo '<tr><td scope="col" class="text-center">' . $insumo[1] . '</td><td scope="col">' . $insumo[2] . '</td><td scope="col" class="text-center">' . $insumo[3].' ' . $insumo[4] . '</td></tr>';

};
?>
  								
  							</tbody>
					</table>
        </div>
        </div>
        <br>
   <div class="row">
                <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Peso total de insumos:</span>
                  </div>
                    <input type="text" class="form-control text-right" name="pesoTotInsumosCrearReceta" value="<?php echo $receta['peso_total_insumos_kg'] ?> kilos" readonly>
                  <div class="input-group-append">
              <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="El total de insumos en kilos que utilizará un paston de 100 kilos.">
  ?
</button>
              </div>
                </div>
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
                                <input type="text" class="form-control text-center recetaporcentajecarne" id="spanrecetaporcenpaston" value="<?php echo $receta['porcent_carne'] ?> %" readonly>
                                </div>
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Merma esperada:</span>
                       </div>
                                <input type="text" class="form-control text-center recetamermaesperada" id="spanrecetamermaesp" value="<?php echo $receta['merma_esperada'] ?> %" readonly>
                              <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Porcentaje de merma esperada con respecto al producto fresco, luego de finalizar el proceso de secado">
                                ?
                                </button>
                              </div>
                            </div>
                            </div>
                            <br>
                          <div class="row">
                        <div class="input-group col-6">
                      <div class="input-group-prepend">
                         <span class="input-group-text">Dias de producción:</span>
                       </div>
                                <input type="text" class="form-control text-center recetadiasproduccion" id="spanrecetadiasprodu" value="<?php echo $receta['dias_produccion'] ?> días" readonly>
                           <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Cantidad de días desde que comienza el proceso productivo (amasado) hasta que el producto es envasado.">
                                ?
                                </button>
                              </div>
                                </div>
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Vencimiento:</span>
                       </div>
                                <input type="text" class="form-control text-center recetadiasvencimiento" id="spanrecetadiasven" value="<?php echo $receta['dias_vencimiento'] ?> días" readonly>
                              <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Cantidad de días desde que el producto es envasado,  hasta que se vence.">
                                ?
                                </button>
                              </div>
                            </div>
        				</div>
                      <br>
                      <br>
              <h5>Producto fresco</h5>
              <hr>
                           <div class="row">
        <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Largo por unidad:</span>
                       </div>
                                <input type="text" class="form-control text-center recetalargoporunidad" id="spanrecetalargouni" value="<?php echo $receta['largo_unidad_lote'] ?> metros/unidad" readonly>
                              <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Largo de la unidad fresca, antes de que ingrese al secadero.">
                                ?
                                </button>
                              </div>
                            </div>
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Peso por unidad:</span>
                       </div>
                                <input type="text" class="form-control text-center recetalargoporunidadesperado" id="spanrecetalargouni" value="<?php echo $receta['peso_unidad_lote'] ?> kilos/unidad" readonly>
                              <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Peso de la unidad fresca, antes de que ingrese al secadero.">
                                ?
                                </button>
                              </div>
                            </div>
                              </div>
                              <br>
                              <div class="row">
                <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Cantidad de unidades:</span>
                  </div>
                    <input type="number" min=0 step=0.01 class="form-control text-right" id="cantunisfrescas" name="cantidad_unidades_lote" value="<?php echo $receta['cantidad_unidades_lote'] ?>" readonly>
                  <div class="input-group-append">
                  <span class="input-group-text">unidades</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="right" title="Cantidad de unidades frescas obtenidas con un pastón de 100 kilos.">
  ?
</button>
              </div>
                </div>

                              </div>
                      <br>
              <h5>Producto terminado</h5>
              <hr>
                                 <div class="row">
                   <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Largo por unidad esperado:</span>
                       </div>
                                <input type="text" class="form-control text-center spanrecetalargouniesperado" id="spanrecetalargouniesperado" value="<?php echo $receta['largo_unidad_esperado'] ?> metros/unidad" readonly>
                              <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Largo del producto final que será envasado.">
                                ?
                                </button>
                              </div>
                            </div>
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Peso por unidad esperado:</span>
                       </div>
                                <input type="text" class="form-control text-center recetapesoporunidadesperado" id="spanrecetapesouniesperado" value="<?php echo $receta['peso_unidad_esperado'] ?> kilos/unidad" readonly>
                              <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Peso del producto final que será envasado.">
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
                                <input type="text" class="form-control text-center unidadesfinales" id="unidadesfinales" value="<?php echo $receta['unidades_final_xunidad'] ?> unidades" readonly>
                                   <div class="input-group-append">
                                <button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Cantidad de unidades finales que se obtienen por cada unidad fresca que entra al secadero. Es decir, en cuantas unidades se corta el producto fresco.">
                                ?
                                </button>
                              </div>
                              </div>
                        </div>
     		<br>
               		<a type="button" class="btn btn-warning" id="Imprimirreceta" href="pruebaotropdf.php" target="_blanck">Imprimir receta</a> 
      			</div>



  <div class="modal fade" id="ConfirmarEstadoReceta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar estado</h5>
        </div>
        <div class="modal-body">
		
		  <p>Usted está a punto de <a class="accion"></a> esta receta.</p>

          <p>¿Confirma que desea <a class="accion"></a> esta receta?</p>

        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-success btn-lg" id="confirmar">Sí</button>
          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>

   <div class="modal fade" id="Confirmada" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
    	</div>
        <div class="modal-body">
        		<div class="alert alert-success" role="alert">
          <h5 class="modal-title">Receta <a class="confirmacion"></a></h5>
        </div>
        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-secondary btn-lg" id="aceptar">Aceptar</button>
        </div>
      </div>
    </div>
  </div>


<?php

}

?>

<script>
  
var accion;

var url;

var url1;

$("#botonCambiarEstado").on( "click", function() {

$('#ConfirmarEstadoReceta').modal('show')});

$('#ConfirmarEstadoReceta').on('show.bs.modal', function (event) {
var button = $('#botonCambiarEstado'); // Button that triggered the modal
accion = button.data('accion')
var modal = $(this)
modal.find('.accion').text('' + accion);

$("#confirmar").on( "click", function() {

	//alert (accion)

if (accion=='activar') {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaDetalle: $('.idreceta').text(), estado: 0},
                success:function(html){
                //alert('activo'+html);
                $('#ConfirmarEstadoReceta').modal('hide')
                var modalconfir = $('#Confirmada').modal('show')
                modalconfir.find('.confirmacion').text('activada')
                url=$(location).attr('href')
                url1=url.replace("estado=0", "estado=1")
               
                //$('#botonCambiarEstado').remove();
          		//$('.boton').html('<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="desactivar" id="botonCambiarEstado">Desactivar Receta</button>')
          		//$('.medal').remove()
          		//$('.medalla').html('<span class="badge badge-success medal">Activa</span>')

                }})};


if (accion=='desactivar') {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaDetalle: $('.idreceta').text(), estado: 1},
                success:function(html){
                $(this).prop("disabled", true);
                $('#ActivarReceta').prop("disabled", false);
                //alert('desactivo ' + html);
                $('#ConfirmarEstadoReceta').modal('hide')
                var modalconfir = $('#Confirmada').modal('show')
                modalconfir.find('.confirmacion').text('desactivada')
                url=$(location).attr('href')
                url1=url.replace("estado=1", "estado=0")
               
          		//$('#botonCambiarEstado').remove();
          		//$('.boton').html('<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="activar" id="botonCambiarEstado">Activar Receta</button>')
          		//$('.medal').remove()
          		//$('.medalla').html('<span class="badge badge-danger medal">Desactivada</span>')
                }})}})});



$("#aceptar").on( "click", function() {

 $(location).attr('href',url1)

})
  
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>

</body>
</html>