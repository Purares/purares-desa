
<!DOCTYPE html>
<html>
<head>
	<title>Ver Despostes</title>
</head>
<body>

  <?php

  $despostes=ControladorFormularios::ctrListaDesposte();


  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

	<h2>Listado de despostes:</h2>

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscarId" onkeyup="buscardesposteporId()" placeholder="Buscar por N°">
</div>
</div>

<div class="p-2">
<div class="container">
   <input type="text" id="buscarpalabra" onkeyup="buscardesposte()" placeholder="Buscar por palabra">
</div>
</div>

<div class="form-check p-2">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheckDesposte">
  <label class="form-check-label" for="defaultCheckDesposte">
    Mostrar despostes anulados
  </label>
</div>
</div>
<hr>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col"  class="text-center text-white bg-dark">N° Desposte</th>
           							<th scope="col"  class="text-white bg-dark">Estado</th>
                        <th scope="col"  class="text-white bg-dark">Proveedor</th>
                        <th scope="col"  class="text-white bg-dark">Número de remito</th>
                        <th scope="col"  class="text-white bg-dark">Unidades</th>
           							<th scope="col"  class="text-white bg-dark">Peso Total</th>
           							<th scope="col"  class="text-white bg-dark">Fecha Desposte</th>
           							<th scope="col"  class="text-white bg-dark">Inspeccionar</th>
        						</tr>
      						</thead>
  							<tbody id="tabladespostes">
<?php

foreach($despostes as $desposte){

if ($desposte["anulado"]==0) {
	
	echo '<tr><td scope="col" class="text-center">' . $desposte["id_desposte"] . '</td><td scope="col" class="text-center"><span class="badge badge-pill badge-success">Activo</span></td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["unidades"] . ' medias reses</td><td scope="col">' . $desposte["peso_total"] . ' kg.</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar</a></td></tr>';

}

};

?>
  							</tbody>
					</table>
 
        </div>

<script>


$( "input" ).on( "click", function() {
	
if ($('#defaultCheckDesposte').prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:'chequeadoDesposte='+ 0,
                success:function(html){
                $('#tabladespostes').children().detach();
                    $('#tabladespostes').html(html); 
                }})}
            
else{

	$.ajax({
               type:'POST',
              url:'datos.php',
               data:'chequeadoDesposte='+ 1,
               success:function(html){
                	$('#tabladespostes').children().detach();
                   $('#tabladespostes').html(html); 
            }
        });


}


});

                  function buscardesposte() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscarpalabra");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tabladespostes");
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

                              function buscardesposteporId() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscarId");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tabladespostes");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                          visible = false;
                          /* Obtenemos todas las celdas de la fila, no sólo la primera */
                          td = tr[i].getElementsByTagName("td");
                         
                            if (td[0] && td[0].innerHTML.toUpperCase().indexOf(filter) > -1) {
                              visible = true;
                            
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