<!DOCTYPE html>
<html>
<head>
	<title>Detalle producto</title>
</head>
<body>

<?php

$detalleAjuste=ControladorFormularios::ctrDetalleAjusteStock();

$detalles=$detalleAjuste['detallesAjuste_'];

$movimientos=$detalleAjuste['movimienotsAjuste_'];

foreach ($detalles as $detalle) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Ajuste de stock N°: <a class="numeroajuste"><?php echo $detalle['id_ajuste'] ?></a>
  				</h2>
  					</div>	
  					<br>
              </div>
              <hr>
              <br>
                  <div class="row">
                            <div class="input-group col-4">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Tipo:</span>
                                </div>
                                <input type="text" class="form-control text-center" value="<?php echo $detalle['tipo']?>" readonly>
                              </div>
                            <div class="input-group col-4">
                                <div class="input-group-prepend">
                         <span class="input-group-text">Fecha:</span>
                                </div>
                                <input type="text" class="form-control text-center" value="<?php echo $detalle['fecha'] ?>" readonly>
        				            </div>
                            <div class="input-group col-4">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Usuario:</span>
                                </div>
                                <input type="text" class="form-control text-center" value="<?php echo $detalle['usuario']?>" readonly>
                              </div>
                    </div>
                    <br>
                    <h5>Movimientos</h5>
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

};

foreach ($movimientos as $movimiento) {

echo '<tr><td scope="col" class="text-center">'.$movimiento['id_insumo'].'</td><td scope="col">' . $movimiento['insumo'] . '</td><td scope="col" class="text-center">' . $movimiento['cantidad'].' '.$movimiento['udm'].'</td></tr>';

};
?>
  								
  							</tbody>
					</table>
        </div>
        </div>
        <br>
            <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" readonly> <?php echo $detalle['descripcion']?></textarea>
  
</body>
</html>