
<!DOCTYPE html>
<html>
<head>
  <title>Ver Recetas</title>
</head>
<body>

  <?php

  $recetas=ControladorFormularios::ctrListaRecetas();


  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

  <h2>Listado de recetas</h2>  

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscar" onkeyup="buscarrecetas()" placeholder="Buscar receta">
</div>
</div>

<div class="form-check p-2">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Mostrar recetas inactivas
  </label>
</div>
</div>
<hr>
  <br>
             
                        <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                        <th scope="col">Detalle</th>
                    </tr>
                  </thead>
                <tbody id="tablarecetas">
<?php

foreach($recetas as $receta){

if ($receta["activo"]==1) {
  
  echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col"><span class="badge badge-pill badge-success">Activa</span></td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';

}

};

?>
                </tbody>
          </table>
 
        </div>

<script>


$( "input" ).on( "click", function() {
  
if ($('#defaultCheck1').prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:'chequeado='+ 1,
                success:function(html){
                $('#tablarecetas').children().detach();
                    $('#tablarecetas').html(html); 
                }})}
            
else{

  $.ajax({
               type:'POST',
              url:'datos.php',
               data:'chequeado='+ 0,
               success:function(html){
                  $('#tablarecetas').children().detach();
                   $('#tablarecetas').html(html); 
            }
        });


}


});

                  function buscarrecetas() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscar");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tablarecetas");
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