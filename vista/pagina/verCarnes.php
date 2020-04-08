
<!DOCTYPE html>
<html>
<head>
	<title>Ver Cortes</title>
</head>
<body>

  <?php

  $stockcarnes=ControladorFormularios::ctrStockCarnes();


  ?>
  <br>
<div class="container">			

	<h2>Stock de carnes</h2>
<hr>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col" class="text-center text-white bg-dark">ID</th>
                        <th scope="col" class="text-white bg-dark">Corte</th>
                        <th scope="col" class="text-right text-white bg-dark">Stock Actual</th>
           							<th scope="col" class="text-center text-white bg-dark">Ver más</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach($stockcarnes as $stockcorte){

  echo '<tr><td scope="col" class="text-center">' . $stockcorte["id_carne"] . '</td><td scope="col">' . $stockcorte["nombre"] . '</td><td scope="col" class="text-right">' . $stockcorte["Stock"] . ' ' . $stockcorte["udm"] . '</td><td scope="col" class="text-center"><a class="btn btn-info btn-sm" href="index.php?pagina=verMasCarnes&idCarneVerComposicion=' .  $stockcorte["id_carne"] . '&nombrecarne=' . $stockcorte["nombre"] . '">Ver más</a></td></tr>';

};

?>
  							</tbody>
					</table>
 
        </div>


</body>
</html>