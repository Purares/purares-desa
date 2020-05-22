<!DOCTYPE html>
<html>
<head>
	<title>Detalle producto</title>
</head>
<body>

<?php

$detalleProducto=ControladorFormularios::ctrDetalleProducto();

$productos=$detalleProducto['detalleProducto'];

$detalleinsumos=$detalleProducto['insumosProducto'];

foreach ($productos as $producto) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Producto: <a class="nombreproducto"><?php echo $producto['nombre'] ?></a>
  				</h2>
  					</div>	
  					<br>
              </div>
              <hr>
              <br>
                  <div class="row">
                            <div class="input-group col-6">
                              <div class="input-group-prepend">
                         <span class="input-group-text">Código:</span>
                                </div>
                                <input type="text" class="form-control text-center" value="<?php echo $producto['codigo']?>" readonly>
                              </div>
                            <div class="input-group col-6">
                                <div class="input-group-prepend">
                         <span class="input-group-text">Nombre:</span>
                                </div>
                                <input type="text" class="form-control text-center" value="<?php echo $producto['nombre'] ?>" readonly>
        				            </div>
                    </div>
                    <br>
                    <br>
                    <h5>Insumos del producto</h5>
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

foreach ($detalleinsumos as $insumo) {

echo '<tr><td scope="col" class="text-center">'.$insumo['id_insumo'].'</td><td scope="col">' . $insumo['insumo'] . '</td><td scope="col" class="text-center">' . $insumo['cantidad'].'</td></tr>';

};
?>
  								
  							</tbody>
					</table>
        </div>
        </div>
        <br>
            <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" readonly> <?php echo $producto['descripcion']?></textarea>
  
</body>
</html>