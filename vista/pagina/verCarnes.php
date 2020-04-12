
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

  echo '<tr><td scope="col" class="text-center">' . $stockcorte["id_carne"] . '</td><td scope="col">' . $stockcorte["nombre"] . '</td><td scope="col" class="text-right">' . $stockcorte["Stock"] . ' ' . $stockcorte["udm"] . '</td><td scope="col" class="text-center">
<button class="btn btn-info btn-sm botoncomposiciondesposte" data-toggle="modal" data-target="#ComposicionCarne" data-idcarne="'.$stockcorte["id_carne"] .'" data-nombrecarne="'.$stockcorte["nombre"].'">Ver más</button>';

};

?>
  							</tbody>
					</table>
 
        </div>

   <div class="modal fade" id="ComposicionCarne" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Composicion por desposte de <a class="nombre"></a></h3>
      </div>
        <div class="modal-body">

            <div class="container-fluid">     
                        <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                      <th scope="col" class="text-center text-white bg-dark">N° Desposte</th>
                      <th scope="col" class="text-center text-white bg-dark">Stock</th> 
                      <th scope="col" class="text-center text-white bg-dark">Fecha de desposte</th>
                    </tr>
                  </thead>
                <tbody id="tablacomposicioncarne">
                </tbody>
                </table>

        </div>
        <div class="modal-footer">

         <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>

<script>
  
$('#ComposicionCarne').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);// Button that triggered the modal
var idcarne = button.data('idcarne')
var nombrecarne= button.data('nombrecarne')
var modal = $(this)
modal.find('.nombre').text('' + nombrecarne);

$.ajax({
                type:'GET',
                url:'datos.php',
                data:{idCarneVerComposicion:idcarne},
                success:function(composicion){

                  modal.find('#tablacomposicioncarne').empty()

                  var tablacomposicion=JSON.parse(composicion)

                  for (var i = 0; i < tablacomposicion.length; i++){

                    modal.find('#tablacomposicioncarne').append('<tr><td scope="col" class="text-center">'+tablacomposicion[i]['id_desposte']+'</td><td scope="col" class="text-center">'+tablacomposicion[i]['stock']+' kilos</td><td scope="col" class="text-center">'+tablacomposicion[i]['fecha_desposte']+'</td></tr>')


                  }

                  //alert(tablacomposicion[0]['id_carne'])

                  //alert(tablacomposicion[0]['id_desposte'])


                 // alert(tablacomposicion[0]['stock'])

                  //alert(tablacomposicion[0]['fecha_desposte'])


              
                }



})






})


</script>

</body>
</html>