<!DOCTYPE html>
<html>

<head>
	<title>Nuevo corte de carne</title>
</head>
<body>

	<?php

	$nuevocorte=ControladorFormularios::ctrAgregarCarne();

	?>


	<div class="container">

  					<h4>Agregar nuevo corte de carne</h4>
              		
        		
        			<h6>Complete los datos del nuevo corte de carne que desea agregar</h6>
        			<br>
       	<form method="post" class="needs-validation">

            <div class="row">
          				<div class="input-group  col-md-12">	
          					<div class="input-group-prepend">
         						<span class="input-group-text">Nombre:</span>
         					</div>
        						<input type="text" class="form-control text-center" name="nombreCarne" id="nombrecorte" placeholder="Ingrese el nombre del corte" required>
                                    <div class="invalid-feedback">
                                    Ingrese el nombre del corte
                                    </div>
        				</div>
                </div>
        			<br>
              	<div class="row">

	<div class="input-group col-md-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">Alerta cantidad minima:</span>
                  </div>
                    <input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQminCarne" id="alerta" placeholder="Ingrese la alerta de cantidad mínima" required>
                       <div class="invalid-feedback">
                                    Ingrese un numero mayor a cero
                                    </div>
                </div>
        			
<div class="input-group col-md-6  ">
               <div class="input-group-prepend">
                     <span class="input-group-text">Unidad:</span>
                </div>
                   <select class="custom-select" name="idUdmCarne" id="unidad" required>
                   <?php 
  $listaUDM=ControladorFormularios::ctrListaUDM();
    for ($i=0; $i <count($listaUDM); $i++) {

      echo "<option value=".$listaUDM[$i][0].">".$listaUDM[$i][1]."</option>";
    }
  ?>        
                     </select>
                              <div class="invalid-feedback">
                                    Seleccione la unidad para el corte
                                    </div>
                    </div>

              
           		</div>
           		<br>               
               		<button type="button" class="btn btn-success" id="BotonAgregarCorte"  data-toggle="modal" data-target="#ConfirmarCorte">Agregar corte</button>
       	 	  </div> 


        
   <!-- ConfirmarCorte -->
  <div class="modal fade" id="ConfirmarCorte" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Corte</h5>
        </div>
        <div class="modal-body">
		
		      <p>Usted está a punto de cargar el corte <a class="nombre"></a>.</p>

          <p>Se medirá en <a class="unidad"></a> y la alerta de cantidad mínima sera de <a class="alerta"></a> <a class="unidad"></a>.</p>

          <p>¿Confirma que desea CARGAR ESTE CORTE?</p>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-success">SÍ, CARGAR CORTE</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO, DESCARTAR CORTE</button>
        </div>
      </div>
    </div>
  </div>

       	 	</form>

<script>
	
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarCorte');
      button.addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

$('#ConfirmarCorte').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalcorte()
function completarmodalcorte(){             
                                  var nombrecorte=$('#nombrecorte').val()
                                      unidad=$('#unidad option:selected').text()
                                      alerta=$('#alerta').val()            
                                      

modal.find('.nombre').text('' + nombrecorte);
modal.find('.unidad').text('' + unidad);
modal.find('.alerta').text('' + alerta);

  }})

</script>


</body>
</html>
