
<!DOCTYPE html>
<html>
<head>
	<title>Ver Productos</title>
</head>
<body>

  <?php

  $productos=ControladorFormularios::ctrStockProductos();

  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

	<h2>Listado de productos</h2>  

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscar" onkeyup="buscarproductos()" placeholder="Buscar producto">
</div>
</div>

</div>
<hr>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Stock</th>
           							<th scope="col">Detalle</th>
        						</tr>
      						</thead>
  							<tbody id="tablaproductos">
<?php

foreach($productos as $producto){

	
	echo '<tr><td scope="col">' . $producto["codigo"] . '</td><td scope="col">' . $producto["nombre"] . '</td><td scope="col">' . $producto["stock"] . ' unidades</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleProducto&idProductoDetalle=' . $producto["id_producto"] .'">Ver detalles</a></td></tr>';


};

?>
  							</tbody>
					</table>
 
        </div>

<script>



                  function buscarproductos() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscar");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tablaproductos");
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