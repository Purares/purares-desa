<!DOCTYPE html>
<html>
<head>
	<title>Detalle compra</title>
</head>
<body>

<?php

$detalleCompra=ControladorFormularios::ctrDetalleCompra();

$detalleCompraInsumos=ControladorFormularios::ctrDetalleCompraInsumos();

foreach ($detalleCompra as $compra) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Detalle de compra<a class="idcompra"  style="display:none" ><?php echo $_GET['idCompra'] ?></a><a class="nro_remito" style="display:none"><?php echo $compra['nro_remito'] ?></a> <span class="medalla"><?php if ($_GET['estado']==1) {echo '     <span class="badge badge-danger medal">Anulada</span>';};?>
					</span>
  				</h2>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==0) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoCompra" data-accion="anular" id="botonCambiarEstado">Anular compra</button>';}?>
  						</div>
  					</div>	
  					<br>
              </div>
              <hr>
              <br>
                  <div class="row">
                       <div class="input-group col-6">
                          <div class="input-group-prepend">
                         <span class="input-group-text">Proveedor:</span>
                            </div>
                                <input class="form-control text-center input-group-text compraproveedor" id="spancompraproveedor" value="<?php echo $compra['proveedor'] ?>" readonly>
                            </div>                           
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Número de remito:</span>
                            </div>
                                <input class="form-control text-center input-group-text numeroremito" id="spannumeroremito" value="<?php echo $compra['nro_remito'] ?>" readonly>
                            </div>
        				    </div>
                    <br>
                    <div class="row">
                            <div class="input-group col-4">
                              <div class="input-group-prepend">
                          <span class="input-group-text">Fecha de compra:</span>
                            </div>
                                <input class="form-control text-center input-group-text fechacompra" id="spanfechacompra" value="<?php echo $compra['fecha_compra'] ?>" readonly>
                                </div>
                            <div class="input-group col-4">
                              <div class="input-group-prepend">
                         <apan class="input-group-text">Fecha de alta:</span>
                              </div>
                                <input class="form-control text-center input-group-text fechaalta" id="spanfechadealta" value="<?php echo $compra['fecha_alta'] ?>" readonly>
                                </div>
                     <div class="input-group col-4">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Usuario que dió de alta:</span>
                              </div>
                                <input class="form-control text-center input-group-text comprausuarioalta" id="spancomprausuarioalta" value="<?php echo $compra['usuario_alta'] ?>" readonly>
                                </div>
                    </div>
                    <br>
                    <br>
                    <h5>Insumos de la compra</h5>
                    <hr>
                    <div class="col-6">
                        <table class="table table-hover table-sm">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col"  class="text-center text-white bg-dark">ID</th>
                        <th scope="col"  class="text-white bg-dark">Insumo</th>
                        <th scope="col"  class="text-center text-white bg-dark">Cantidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach ($detalleCompraInsumos as $insumo) {

echo '<tr><td scope="col" class="text-center">' . $insumo[0] . '</td><td scope="col">' . $insumo[1] . '</td><td scope="col" class="text-center">' . $insumo[2] .' ' . $insumo[3].'</td></tr>';

};
?>
  								
  							</tbody>
					</table>
        </div>




<?php if ($compra['fecha_baja']!=NULL){

      echo '<br>
      <hr>
      <div class="row">
                     <div class="input-group col-6">
                      <div class="input-group-prepend">
                         <span class="input-group-text">Fecha de anulacion:</span>
                         </div>
                                <input class="form-control text-center input-group-text fechafincompra" id="spanfechafincompra" value="'. $compra['fecha_baja'].'" readonly>
                                </div>
                            <div class="input-group col-6">
                        <div class="input-group-prepend"> 
                         <span class="input-group-text">Usuario que anuló:</span>
                         </div>
                                <input class="form-control text-center input-group-text usuariobajacompra" id="spanusuariobajacompra" value="'.$compra['Usuario_baja'].'" readonly>
                                </div>
                </div>
                <br>
                <div class="row">
                     <div class="input-group col-12">
                         <div class="input-group-prepend">
                         <span class="input-group-text">Motivo anulación:</span>
                          </div>
                                <input class="form-control input-group-text motivoanulacionccompra" id="spanmotivoanulacionccompra" value="'. $compra['motivo_anulacion'] .'" readonly>
                                </div>
                </div>';
} ?>

                    <br>
                  
        <br>
                  <button type="button" class="btn btn-warning" id="Imprimirreceta">Imprimir compra</button> 
            </div>

  <div class="modal fade" id="ConfirmarEstadoCompra" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar estado</h5>
        </div>
        <div class="modal-body">
		
		  <p>Usted está a punto de <a class="accion"></a> esta compra.</p>

          <p>¿Confirma que desea <a class="accion"></a> esta compra?</p>

        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-success btn-lg" id="confirmar">Sí</button>
          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="AnularCompra" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anulación Compra</h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer anular">
        </div>
      </div>
    </div>

<script>
  
function enviamotivo(){


//alert($('#descripcionanulacion').val())
//alert($('.iddesbaste').text())
//alert($('#descripcionanulacioncompra').val())
        //       $('#AnularDesbaste').modal('hide')

     // $('#AnularDesbaste').modal('hide')
     $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idCompraDetalle: $('.idcompra').text(), motivoAnulacionCompra:$('#descripcionanulacioncompra').val()},
                success:function(respuesta){

                  //alert(respuesta)

                  if(respuesta=="OK"){

                  $('#AnularCompra').modal('show')
                  var modal = $('#AnularCompra')
                  modal.find('.modal-body').html(respuesta)
                  modal.find('.anular').html('<button type="button" class="btn btn-danger" id="cerraranular">Cerrar</button>')

                  $("#cerraranular").on( "click", function() {

var url2=$(location).attr('href')
var url3=url2.replace("estado=0", "estado=1")

 $(location).attr('href',url3)
$('#Mensaje').modal('hide')
})

                        
}
                }})
 //     alert("ajax no falló")

    //$('#descripcionanulacion').val();
    //$('.iddesbaste').text():

}
  
</script>

  </div>

   <div class="modal fade" id="Confirmada" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
    	</div>
        <div class="modal-body">
        		<div class="alert alert-success" role="alert">
          <h5 class="modal-title">Compra <a class="confirmacion"></a></h5>
        </div>
        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-secondary btn-lg" id="aceptar">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

     <div class="modal fade" id="Mensaje" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
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

$('#ConfirmarEstadoCompra').modal('show')});

$('#ConfirmarEstadoCompra').on('show.bs.modal', function (event) {
var button = $('#botonCambiarEstado'); // Button that triggered the modal
accion = button.data('accion')
var modal = $(this)
modal.find('.accion').text('' + accion);


  
$("#confirmar").on( "click", function() {

    $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idCompraDetalle: $('.idcompra').text(),motivoAnulacionCompra:""},
                success:function(anulacion){

              //  alert(anulacion)
                      
                      if (anulacion=="OK") {                

                          $('#ConfirmarEstadoCompra').modal('hide')
                         $('#AnularCompra').modal('show')
                          var modal = $('#AnularCompra')
                          modal.find('.modal-body').html('<form method="post"><div class="form-group"><label>Describa el motivo de anulación de la compra:</label><div class="input-group"><input type="text" class="form-control text-right" name="motivoAnulacionCompra" id="descripcionanulacioncompra" placeholder="Describa" required><div class="invalid-feedback">Debe escribir un motivo de anulación del desposte.</div></div><br><button type="button" id="botonanularventana" class="btn btn-danger" onclick=enviamotivo()>Anular compra</button></form>')

                  }else{

                       $('#ConfirmarEstadoCompra').modal('hide')
                      $('#AnularDesbaste').modal('show')
                          var modal = $('#AnularCompra')
                          modal.find('.modal-body').html(anulacion)
                          modal.find('.modal-footer').html('<button type="button" class="btn btn-danger">Cerrar</button>')
                  }


      
}})})



})

</script>

</body>
</html>