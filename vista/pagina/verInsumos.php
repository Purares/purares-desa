
<!DOCTYPE html>
<html>
<head>
	<title>Ver Insumos</title>
</head>
<body>

  <?php

  $stockinsumos=ControladorFormularios::ctrStockInsumos();


  ?>
  <br>
<div class="container">			

	<h4>Stock de insumos actual</h4>

	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID</th>
                                    <th scope="col">Insumo</th>
           							<th scope="col">Depósito</th>
                                    <th scope="col" class="text-right">Stock Actual</th>
                                    <th scope="col">Unidad</th>
           							<th scope="col">Movimiento</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach($stockinsumos as $stockinsumo){

  echo '<tr><td scope="col">' . $stockinsumo["id_insumo"] . '</td><td scope="col">' . $stockinsumo["Insumo"] . '</td><td scope="col">' . $stockinsumo["Deposito"] . '</td><td scope="col" class="text-right">' . $stockinsumo["Stock"] . '</td><td scope="col">' . $stockinsumo["udm"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=movimientoInsumo&idInsumoActI='. $stockinsumo["id_insumo"] .'&nombreinsumo=' . $stockinsumo["Insumo"] . '&unidad=' .  $stockinsumo["udm"] . '">Nuevo movimiento</a></td></tr>';

};

?>
  							</tbody>
					</table>
 
        </div>


</body>
</html>