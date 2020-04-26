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
            <h2>Decomiso n° <?php echo $registro[0]['id_decomiso']?></h2>
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


</body>
</html>


