<!DOCTYPE html>
<html>

<head>
	<title>Nuevo corte de carne</title>
</head>
<body>

	<div class="container">
<br>
            <h2>Agregar nuevo corte de carne</h2>
            <hr> 
          <h5>Complete los datos del nuevo corte de carne que desea agregar</h5>
          <hr>
       	<form method="post" id="formagregarcarne" class="needs-validation">

            <div class="row">
          				<div class="input-group  col-6">	
          					<div class="input-group-prepend">
         						<span class="input-group-text">Nombre:</span>
         					</div>
        						<input type="text" class="form-control text-center" name="nombreAgregarCarne" id="nombrecorte" placeholder="Ingrese el nombre del corte" required>
                                    <div class="invalid-feedback">
                                    Ingrese el nombre del corte
                                    </div>
        				</div>
<div class="input-group col-md-6  ">
               <div class="input-group-prepend">
                     <span class="input-group-text">Unidad:</span>
                </div>
                   <select class="custom-select" name="idUdmAgregarCarne" id="unidad" required>
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
              	<div class="row">

	<div class="input-group col-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">1er Vencimiento:</span>
                  </div>
                    <input type="number" min=0 step=1 class="form-control text-right" name="vencimiento1AgregarCarne" id="vencimiento1" placeholder="Ingrese la cantidad de días" required>
                       <div class="invalid-feedback">
                                    Ingrese un numero mayor a cero
                                    </div>
                </div>

                <div class="input-group col-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">2do Vencimiento:</span>
                  </div>
                    <input type="number" min=0 step=1 class="form-control text-right" name="vencimiento2AgregarCarne" id="vencimiento2" placeholder="Ingrese la cantidad de días" required>
                       <div class="invalid-feedback">
                                    Ingrese un numero mayor a cero
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

          <p>Se medirá en <a class="unidad"></a>.</p>

           <p>El primer vencimiento para este corte será luego de <a class="vencimiento1"></a> días y el segundo será luego de <a class="vencimiento2"></a> días.</p>

          <p>¿Confirma que desea CARGAR ESTE CORTE?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="botonconfirmaragregarcarne"  class="btn btn-success">SÍ, CARGAR CORTE</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO, DESCARTAR CORTE</button>
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

$('#ConfirmarCorte').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalcorte()
function completarmodalcorte(){             
                                  var nombrecorte=$('#nombrecorte').val()
                                      unidad=$('#unidad option:selected').text()
                                      vencimiento1=$('#vencimiento1').val()  
                                      vencimiento2=$('#vencimiento2').val()            
                                      

modal.find('.nombre').text('' + nombrecorte);
modal.find('.unidad').text('' + unidad);
modal.find('.vencimiento1').text('' + vencimiento1);
modal.find('.vencimiento2').text('' + vencimiento2);

  }})

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmaragregarcarne").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formagregarcarne").serialize(),function(respuestacodnuevacarne){

//alert(respuestacodnuevacarne)
                if(respuestacodnuevacarne == '"OK"'){
                  $('#ConfirmarCorte').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Corte agregado</h4><p>Usted ha agregado el nuevo corte correctamente.</p><hr></div>')
          } else {
                    $('#ConfirmarCorte').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el corte. <a id="erroragregarcorte"></a></p><hr></div>')
                   modal.find('#erroragregarcorte').empty()
                  modal.find('#erroragregarcorte').html(respuestacodnuevacarne)
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
})


</script>

</body>
</html>
