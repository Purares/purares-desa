
<!DOCTYPE html>
<html>
<head>
	<title>Ver Cortes</title>
</head>
<body>

  <?php

  $decomisos=ControladorFormularios::ctrListaDecomisos();


  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

  <h2>Listado de decomisos:</h2>

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscarId" onkeyup="buscardecomisoporId()" placeholder="Buscar por N°">
</div>
</div>

<div class="p-2">
<div class="container">
   <input type="text" id="buscarpalabra" onkeyup="buscardecomiso()" placeholder="Buscar por palabra">
</div>
</div>

<div class="form-check p-2">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheckDecomisos">
  <label class="form-check-label" for="defaultCheckDecomisos">
    Mostrar decomisos anulados
  </label>
</div>
</div>
<hr>
  <br>
             
                        <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"  class="text-center text-white bg-dark">Estado</th>
                        <th scope="col"  class="text-center text-white bg-dark">N° Decomiso</th>
                        <th scope="col"  class="text-white bg-dark">Destino</th>
                        <th scope="col"  class="text-white bg-dark">Fecha</th>
                        <th scope="col"  class="text-white bg-dark">Usuario</th>
                        <th scope="col"  class="text-white bg-dark"></th>
                    </tr>
                  </thead>
                <tbody id="tabladecomisos">
<?php

foreach($decomisos as $decomiso){

if ($decomiso["anulado"]==0) {
  
  echo '<tr><td scope="col" class="text-center"><span class="badge badge-pill badge-success">Activo</span></td><td scope="col" class="text-center">' . $decomiso["id_decomiso"] . '</td><td scope="col">' . $decomiso["destino"] . '</td><td scope="col">' . $decomiso["fecha_decomiso"] . '</td><td scope="col">' . $decomiso["nombre"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDecomiso&idDecomiso=' . $decomiso["id_decomiso"] . '&estado=' .  $decomiso["anulado"] . '">Inspeccionar</a></td></tr>';

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

                  function buscardecomiso() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscarpalabra");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tabladecomisos");
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

                              function buscardecomisoporId() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscarId");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tabladecomisos");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                          visible = false;
                          /* Obtenemos todas las celdas de la fila, no sólo la primera */
                          td = tr[i].getElementsByTagName("td");
                         
                            if (td[1] && td[1].innerHTML.toUpperCase().indexOf(filter) > -1) {
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