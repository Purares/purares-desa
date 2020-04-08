<!DOCTYPE html>
<html>

<head>
  <title>Movimiento Insumo</title>
</head>
<body>

<?php

$cuentas=ControladorFormularios::ctrListaCuentas();

$movimientoInsumo=ControladorFormularios::ctrActualizarInsumo();


?>

<div class="container">
	<br>
            <h2>Movimiento de insumo <a class="nombre"><?php echo $_GET["nombreinsumo"];?></a></h2>

            <br>
<hr>
 <form method="post" class="needs-validation">

              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text">Movimiento:</span>
                </div>
                    <select class="custom-select" id="movimiento" name="idCuentaActI" required>
                    <option value="">Seleccione el tipo de movimiento</option>
                    </select>
                     <div class="invalid-feedback">
                                    Seleccione el tipo de movimiento
                                    </div>
              </div>
              <br>
              <div class="input-group"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Cantidad:</span>
                  </div>
                    <input type="number" min=0 step=0.0001 class="form-control text-right" id="cantidad" name="cantidadActI" placeholder="Ingrese la cantidad" required>
                  <div class="input-group-append">
                  <span class="input-group-text unidad"><?php echo $_GET["unidad"]?></span>
              </div>
                <div class="invalid-feedback">
                                    Ingrese la cantidad
                                    </div>
                </div>
                <br>
              <div class="input-group"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Descripción:</span>
                  </div>
                    <input type="text" class="form-control text-right" name="comentarioActI" id="descripcion" placeholder="Describa" required>
                     <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
                </div>

                <br>

                  <button type="button" class="btn btn-success" data-toggle="modal" id="botonAgregarMovInsumo" data-target="#ConfirmarMovInsumo">Cargar Movimiento</button> 
              

          </div> 


   <!-- ConfirmarMovimientoInsumo -->
  <div class="modal fade" id="ConfirmarMovInsumo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Movimiento Insumo</h5>
        </div>
        <div class="modal-body">
          <p>Usted va a cargar el movimiento <a class="movimiento"></a> de <a class="cantidad"></a> <a class="unidad"> </a> para el insumo <a class="nombremodal"></a>.

          <p>La descripción será la siguiente: <p><a class="descripcion"></a>.</p></p>

          <p>¿Confirma que desea CARGAR ESTE MOVIMIENTO DE INSUMO?</p>
        </div>
        <div class="modal-footer">
           <button type="submit"  class="btn btn-success">Sí, cargar movimiento de insumo</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">No, descartar movimiento</button>
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
      var button= document.getElementById('botonAgregarMovInsumo');
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


$('#ConfirmarMovInsumo').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalmovinsumo()
function completarmodalmovinsumo(){             
                                  var movimiento=$('#movimiento option:selected').text()
                                      cantidad=$('#cantidad').val()
                                      unidad=$('.unidad').text()
                                      descripcion=$('#descripcion').val()
                                      nombre=$('.nombre').text()              
                                      

modal.find('.movimiento').text('' + movimiento);
modal.find('.unidad').text('' + unidad);
modal.find('.cantidad').text('' + cantidad);
modal.find('.descripcion').text('' + descripcion);
modal.find('.nombremodal').text('' + nombre);

  }})

$(document).ready(function () {

$.ajax({
                type:'POST',
                url:'datos.php',
                data:{funcion:"'ActualizarInsumo'"},
                success:function(html){

    //              alert(html)
                $('#movimiento').empty()
                $('#movimiento').append('<option value="">Seleccione el tipo de movimiento</option>'+html)

                }})})


</script>

</body>

</html>