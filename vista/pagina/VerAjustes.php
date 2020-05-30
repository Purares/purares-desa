
<!DOCTYPE html>
<html>
<head>
	<title>Ver Productos</title>
</head>
<body>

  <?php

  $ajustesstock=ControladorFormularios::ctrListaAjusteStock();

  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

	<h2>Listado de Ajustes de Stock</h2>  

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscar" onkeyup="buscarajustes()" placeholder="Buscar ajuste">
</div>
</div>

</div>
<hr>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Descripción</th>
           							<th scope="col">Usuario</th>    
                        <th scope="col">Fecha</th>
                          <th scope="col"></th>
        						</tr>
      						</thead>
  							<tbody id="tablaajustesstock">
<?php

foreach($ajustesstock as $ajuste){

	
	echo '<tr><td scope="col">' . $ajuste["id_ajuste"] . '</td><td scope="col">' . $ajuste["tipo"] . '</td><td scope="col">' . $ajuste["descripcion"] . '</td><td scope="col">' . $ajuste["usuario"] . '</td><td scope="col">' . $ajuste["fecha"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleAjusteStock&idDetalleAjusteStock=' . $ajuste["id_ajuste"] .'&tipoDetalleAjusteStock='.$ajuste["tipo"].'">Ver detalles</a></td></tr>';


};

?>
  							</tbody>
					</table>
 
        </div>

<script>



                  function buscarajustes() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscar");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tablaajustesstock");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                          visible = false;
                          /* Obtenemos todas las celdas de la fila, no sólo la primera */
                          td = tr[i].getElementsByTagName("td");
                          for (j = 0; j < td.length; j++) {
                            if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                              visible = true;
                            }
                          }
                          if (visible === true) {
                            tr[i].style.display = "";
                          } else {
                            tr[i].style.display = "none";
                          }
                        }
                      };


</script>

</body>
</html>