<!DOCTYPE html>
<html>

<head>
	<title>Nuevo insumo</title>
</head>
<body>
	<div class="container">
     <br>
            <h2>Agregar nuevo Insumo</h2>
            <hr> 
          <h5>Complete los datos del nuevo insumo que desea agregar</h5>
          <hr>
       	<form method="post" id="formagregarinsumo" class="needs-validation">

            <div class="row">
          				<div class="input-group col-md-6">	
          					<div class="input-group-prepend">
         						<span class="input-group-text">Nombre:</span>
         					</div>
        						<input type="text" class="form-control text-center" name="nombreAgregarInsumo" id="nombreinsumo" placeholder="Ingrese el nombre del insumo" required>
                                    <div class="invalid-feedback">
                                    Ingrese el nombre del insumo
                                    </div>
        				</div>

        				<div class="input-group col-md-6">	
          					<div class="input-group-prepend">
         						<span class="input-group-text">Depósito:</span>
         					</div>
        					<select class="custom-select"  id="deposito" name="idDepositoAgregarInsumo" required>
        							<?php 
 	$listaDepositos=ControladorFormularios::ctrListaDepositos();
		for ($i=0; $i <count($listaDepositos); $i++) {

 			echo "<option value=".$listaDepositos[$i][0].">".$listaDepositos[$i][1]."</option>";
		}
 	?> 
    							
          					 </select>
                              <div class="invalid-feedback">
                                    Seleccione el depósito del insumo
                                    </div>
        		</div>
        				
            </div>
<br>
<div class="row">
            <div class="input-group col-md-6  ">
               <div class="input-group-prepend">
                     <span class="input-group-text">Unidad:</span>
                </div>
                   <select class="custom-select" name="idUdmAgregarInsumo" id="unidad" required>
                   <?php 
  $listaUDM=ControladorFormularios::ctrListaUDM();
    for ($i=0; $i <count($listaUDM); $i++) {

      echo "<option value=".$listaUDM[$i][0].">".$listaUDM[$i][1]."</option>";
    }
  ?>        
                     </select>
                              <div class="invalid-feedback">
                                    Seleccione la unidad para el insumo
                                    </div>
                    </div>
</div>
           		<br>               
               		<button type="button" class="btn btn-success" id="BotonAgregarInsumo"  data-toggle="modal" data-target="#ConfirmarInsumo">Agregar insumo</button>
       	 	  </div> 

        
   <!-- ConfirmarInsumo -->
  <div class="modal fade" id="ConfirmarInsumo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Insumo</h5>
        </div>
        <div class="modal-body">
		
		  <p>Usted está a punto de cargar el insumo <a class="nombre"></a> que pertenecerá al depósito <a class="deposito"></a> y tendrá la unidad <a class="unidad"></a>.</p>
          <p>¿Confirma que desea CARGAR ESTE INSUMO?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="botonconfirmaragregarinsumo" class="btn btn-success">SÍ, CARGAR INSUMO</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO, DESCARTAR INSUMO</button>
        </div>
      </div>
    </div>
  </div>

       	 	</form>

     <!-- Mensaje confirmacion -->
  <div class="modal fade" id="MensajeConfirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-info" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">

$('#ConfirmarInsumo').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalinsumo()
function completarmodalinsumo(){             
                                  var nombreinsumo=$('#nombreinsumo').val()
                                      deposito=$('#deposito option:selected').text()   
                                        unidad=$('#unidad option:selected').text()          
                                      

modal.find('.nombre').text('' + nombreinsumo);
modal.find('.deposito').text('' + deposito);
modal.find('.unidad').text('' + unidad);
  }})

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmaragregarinsumo").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formagregarinsumo").serialize(),function(respuestacodnuevoinsumo){


                if(respuestacodnuevoinsumo == '"OK"'){
                  $('#ConfirmarInsumo').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Insumo agregado</h4><p>Usted ha agregado el nuevo insumo correctamente.</p><hr></div>')
          } else {
                    $('#ConfirmarInsumo').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el insumo. <a id="erroragregarinsumo"></a></p><hr></div>')
                   modal.find('#erroragregarinsumo').empty()
                  modal.find('#erroragregarinsumo').html(respuestacodnuevoinsumo)
                }
            })
  
    });

	
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarInsumo');
      button.addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})()});



</script>


</body>
</html>


