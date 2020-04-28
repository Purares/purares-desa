<!DOCTYPE html>
<html>

<head>
	<title>Nuevo insumo</title>
</head>
<body>

	<?php

$decomiso=ControladorFormularios::ctrDetalleDecomisos();

$registro=$decomiso['registros_'];

$carnes=$decomiso['carnes_'];

	?>


<div class="container">
	<br>
	<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Decomiso n° <a id="nrodecomiso"><?php echo $registro[0]['id_decomiso']?></a>		<?php if ($registro[0]['anulado']==1) {echo '<span class="badge badge-danger">Anulado</span>';}?></h2>

  					</div>
  					<div>
  		<div class="boton">
  						<?php if ($registro[0]['anulado']==0) {echo '<button type="button" class="btn btn-danger btn-lg" id="botonAnularDecomiso">Anular decomiso</button>';}?>
  						</div>
  					</div>	
  					<br>
              </div>
      <hr>
  <br>  
                     <div class="row ">
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Destino:</span>
                  </div>
                    <input type="text" class="form-control" value="<?php echo $registro[0]['destino']?>" readonly>
                            
              </div>
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Fecha de decomiso:</span>
                  </div>
                    <input type="text" class="form-control" value="<?php echo $registro[0]['fecha_decomiso']?>" readonly>
              </div>
           </div>
           <br>
    <?php if ($registro[0]['anulado']==1) {echo '

           <div class="row ">
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Anuló:</span>
                  </div>
                    <input type="text" class="form-control" value="'.$registro[0]['usuario_baja'].'" readonly>
                            
              </div>
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Fecha de anulacion:</span>
                  </div>
                    <input type="text" class="form-control" value="'.$registro[0]['fecha_registro_baja'].'" readonly>
              </div>
           </div>
           <br>
               Motivo de anulacion:
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="" value="'.$registro[0]['motivo_anulacion'].'" readonly></textarea>
<br>'
;}?>
          <table class="table table-hover" id="tabladecomisos">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-white bg-dark">Carne</th>
                        <th scope="col" class="text-center text-white bg-dark">N° Desposte</th>
                        <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
                        <th scope="col" class="text-center text-white bg-dark">Cuenta</th>
                    </tr>
                  </thead>
                <tbody>
<?php

foreach($carnes as $carne){

  echo '<tr><td scope="col">' . $carne["corte"] .'</td><td scope="col" class="text-center">' . $carne["id_desposte"] .'</td><td scope="col" class="text-center">' . $carne["cantidad"] .' '. $carne["udm"].'</td><td scope="col" class="text-center">' . $carne["cuenta"] .'</td></tr>';

};

?>
                </tbody>
          </table>
                 <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="" value="<?php echo $registro[0]['descripcion']?>" readonly></textarea>
  <br>


        </div>


      <div class="modal fade" id="AnularDecomiso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anulacion</h5>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer anular">
        </div>
      </div>
    </div>
  </div>

<script>
	
$("#botonAnularDecomiso").on( "click", function() {

                         $('#AnularDecomiso').modal('show')
                          var modal = $('#AnularDecomiso')
                          modal.find('.modal-body').html('<form method="post"><div class="form-group"><label>Describa el motivo de anulación del decomiso:</label><div class="input-group"><input type="text" class="form-control text-right" name="MotivoAnularDecomiso" id="descripcionanulaciondecomiso" placeholder="Describa" required><div class="invalid-feedback">Debe escribir un motivo de anulación del decomiso.</div></div><br><button type="button" id="botonanulardecomisoventana" class="btn btn-danger" onclick=enviamotivoanulardecomiso()>Anular decomiso</button></form>')
    
})


function enviamotivoanulardecomiso(){

     $.ajax({
                type:'POST',
                url:'datos.php',
                data:{IdDecomisoAnularDecomiso:$('#nrodecomiso').text(), MotivoAnularDecomiso:$('#descripcionanulaciondecomiso').val()},
                success:function(respuesta){

                //alert(respuesta)

                  if(respuesta=="OK"){

                  $('#AnularDecomiso').modal('show')
                  var modal = $('#AnularDecomiso')
                  modal.find('.modal-body').html("El decomiso se anuló correctamente")
                  modal.find('.anular').html('<button type="button" class="btn btn-danger" id="cerraranular">Cerrar</button>')

                  $("#cerraranular").on( "click", function() {

var url2=$(location).attr('href')

 $(location).attr('href',url2)
})

                        
}else{

 $('#AnularDecomiso').modal('show')
                  var modal = $('#AnularDecomiso')
                  modal.find('.modal-body').html("Ha ocurrido un error al intentar anular el decomiso")
                  modal.find('.anular').html('<button type="button" class="btn btn-danger" id="cerraranular">Cerrar</button>')

}
                }})

}


</script>

</body>
</html>


