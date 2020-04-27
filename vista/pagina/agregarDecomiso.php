<!DOCTYPE html>
<html>

<head>
	<title>Nuevo insumo</title>
</head>
<body>

	<?php

	$ultimosid=ControladorFormularios::ctrIdUltimosIdDecomiso();
  $listacarnes=ControladorFormularios::ctrListaCarnesDecomisar();

  $ultimoiddecomiso=$ultimosid['UltimoIdDecomiso_'];

  $ultimoidorden=$ultimosid['UltimoIdOrdenProd_'];



	?>


<div class="p-5">
            <h2>Agregar decomiso</h2>
            <hr>
                          <br>
      <form method="post" class="needs-validation" id="formdecomisos">

   <input type="hidden" name="ultimoIdDecomisCrearDecomiso" value="<?php echo $ultimoiddecomiso[0][0]?>">
    <input type="hidden"name="ultimoIdOrdenProdCrearDecomiso" value="<?php echo $ultimoidorden[0][0] ?>">

                     <div class="row ">
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Destino:</span>
                  </div>
                    <input type="text" class="form-control" id="destinodecomiso" name="destinoCrearDecomiso" placeholder="Ingrese el destino" required>
                             <div class="invalid-feedback">
                                    Ingrese un destino
                                    </div>
              </div>
     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Fecha de decomiso:</span>
                  </div>
                    <input type="date" class="form-control" id="fechadecomiso" name="fechaDecomisoCrearDecomiso" required>
                             <div class="invalid-feedback">
                                    Ingrese una fecha
                                    </div>
              </div>
           </div>
           <br>

          <table class="table table-hover" id="tabladecomisos">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-white bg-dark">Carne</th>
                        <th scope="col" class="text-center text-white bg-dark">N° Desposte</th>
                        <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
                        <th scope="col" class="text-center text-white bg-dark">Fecha Vencimiento</th>
                        <th scope="col" class="text-center text-white bg-dark">Decomisar</th>
                        <th scope="col" class="text-center text-white bg-dark">Postergar</th>
                        <th scope="col" class="text-center text-white bg-dark">Pendiente</th>
                    </tr>
                  </thead>
                <tbody>
<?php

foreach($listacarnes as $carne){

  echo '<tr>
  <td scope="col" class="nomcarne">' . $carne["carne"] . 
  '<input type="hidden" name="arrayIdCarneCrearDecomiso[]" value="'. $carne["id_carne"].'">
  </td>
  <td scope="col" class="text-center id_desposte">' . $carne["id_desposte"] . 
  '<input type="hidden" name="arrayIdDesposteCrearDecomiso[]" value="'.$carne["id_desposte"].'">
  </td>
  <td scope="col" class="text-right cantidad">' . $carne["cantidad"] . ' ' . $carne["udm"] . '</td>
  <td scope="col" class="text-center">'. $carne["fecha_vencimiento"].'</td>
  <td scope="col">
  <div class="input-group">
    <input type="number" min=0 step=0.001 max="'.$carne['cantidad'].'" name="arrayCantDecomisarCrearDecomiso[]" class="form-control text-right adecomisar" placeholder="Cantidad">
      <div class="input-group-append">
        <span class="input-group-text"> 
          <a>'. $carne['udm'] . '</a>
            </span><div class="form-check form-check-inline p-2">
            <input class="form-check-input checkdecomisar" type="checkbox" id="">
      </div>
    </div>
    </td>
    <td scope="col">
      <div class="input-group">';

      if($carne['ver']!="2"){

        echo '<input type="number" min=0 step=0.001 max="'.$carne['cantidad'].'" name="arrayCantPostergarCrearDecomiso[]" class="form-control text-right apostergar" placeholder="Cantidad">
          <div class="input-group-append">
            <span class="input-group-text">
            <a>'. $carne['udm'] . '</a>
            </span>
              <div class="form-check form-check-inline p-2">
                <input class="form-check-input checkpostergar" type="checkbox" id="">
              </div>
          </div>';


      }else{

        echo '<input type="number" min=0 step=0.001 max="'.$carne['cantidad'].'" name="arrayCantPostergarCrearDecomiso[]" class="form-control text-right apostergar" placeholder="No se puede postergar" disabled>
          <div class="input-group-append">
            <span class="input-group-text">
            <a>'. $carne['udm'] . '</a>
            </span>
              <div class="form-check form-check-inline p-2">
                <input class="form-check-input checkpostergar" type="checkbox" id="" disabled>
              </div>
          </div>';

      };

       
      echo '</div>
    </td>
    <td scope="col">
      <div class="input-group">
        <input type="number" min=0 step=0.001 max="'.$carne['cantidad'].'" value="'.$carne['cantidad'].'" name="" class="form-control text-right pendiente" readonly>
          <div class="input-group-append">
            <span class="input-group-text">
            <a>'. $carne['udm'] . '</a>
            </span>
          </div>
          <input type="number" style="display:none;" id="pendientehidden" min=0 step=0.001 max='.$carne['cantidad'].'" value="'.$carne['cantidad'].'" required>
          <div class="invalid-feedback">Se excedió el total</div>
      </div>
    </td>
    </tr>';

};

?>
                </tbody>
          </table>
                 <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="descripcionCrearDecomiso" id="descripciondecomiso" placeholder="..."></textarea>
  <br>

   <button type="button" class="btn btn-success" id="AgregarDecomiso" data-toggle="modal" data-target="#ConfirmarDecomiso">Agregar decomiso</button>


        </div>

 <div class="modal fade" id="ConfirmarDecomiso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar decomiso</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de decomisar las siguientes carnes:</p>

          <div class="container">
          <table class="table table-hover table-sm">
            <thead>
            <tr><th scope="col">Carne</th><th scope="col">n° Desposte</th><th scope="col">Decomiso</th><th scope="col">Posponer</th><th scope="col">Pendiente</th></tr>
            </thead>
            <tbody id="tablaconfirmardecomiso">
              
            </tbody>
          </table>
          </div>
            <br>
            <br>
          <p>¿Confirma que desea cargar este decomiso?</p>
        </div>
        <div class="modal-footer">
           <button type="button" id="botonconfirmardecomiso"  class="btn btn-success">Sí, cargar decomiso</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, descartar</button>
        </div>
      </div>
    </div>

      <!-- Mensaje confirmacion -->
  <div class="modal fade" id="MensajeConfirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-info" id="botonaceptarnuevodecomiso" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    
$('#ConfirmarDecomiso').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodaldecomiso()
function completarmodaldecomiso(){             
                                      var carnes = [];
                                      id_desposte=[];
                                      adecomisar=[];
                                      apostergar=[];
                                      pendiente=[];

                                      $('.trdeco').remove();

                                      $('.nomcarne').each(function(){
                                        carnes.push($(this).text());
                                      })
                                       $('.id_desposte').each(function(){
                                        id_desposte.push($(this).text());
                                      })
                                        $('.adecomisar').each(function(){
                                        adecomisar.push($(this).val());
                                      })
                                         $('.apostergar').each(function(){
                                        apostergar.push($(this).val());
                                      })
                                        $('.pendiente').each(function(){
                                        pendiente.push($(this).val());
                                      })

for (var i=0; i<=carnes.length-1;i++){
  
  modal.find('#tablaconfirmardecomiso').append($('<tr class="trdeco"><td scope="col">' + carnes[i] +'</td><td scope="col" class="text-center">'+ id_desposte[i] + '</td><td scope="col">' + adecomisar[i]+ '</td><td scope="col">' + apostergar[i]+ '</td><td scope="col">' + pendiente[i]+ '</td></tr>'))

  }}})



  </script>


  </div>

</form>

</div>

<script>
  
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('AgregarDecomiso');

      button.addEventListener('click', function(event) {
         var contadorcarne=$('#contadorcarne').val();
        if (form.checkValidity() === false)  {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    $('#tabladecomisos').on('change', '.checkpostergar',function(){

        var checkpostergar = $(this).prop('checked')

        if(checkpostergar==true){

        $(this).closest('tr').find('.apostergar').val($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6))

         $(this).closest('tr').find('.pendientehidden').val(0)

        $(this).closest('tr').find('.adecomisar').val(0);

        $(this).closest('tr').find('.pendiente').val(0);

        $(this).closest('tr').find('.apostergar').prop('readonly',true);

        $(this).closest('tr').find('.adecomisar').prop('readonly',true);

        $(this).closest('tr').find('.checkdecomisar').prop('disabled',true);

      }
      if(checkpostergar==false){

        $(this).closest('tr').find('.apostergar').val('')

        $(this).closest('tr').find('.adecomisar').val('');

        $(this).closest('tr').find('.pendiente').val($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6));

        $(this).closest('tr').find('.pendientehidden').val($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6))

        $(this).closest('tr').find('.apostergar').prop('readonly',false);

        $(this).closest('tr').find('.adecomisar').prop('readonly',false);

        $(this).closest('tr').find('.checkdecomisar').prop('disabled',false);

      }
    })

    $('#tabladecomisos').on('change', '.checkdecomisar',function(){

        var checkdecomisar= $(this).prop('checked')

        if(checkpdecomisar=true){

        $(this).closest('tr').find('.adecomisar').val($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6))

        $(this).closest('tr').find('.pendientehidden').val(0)

        $(this).closest('tr').find('.apostergar').val(0);

        $(this).closest('tr').find('.pendiente').val(0);

        $(this).closest('tr').find('.adecomisar').prop('readonly',true);

        $(this).closest('tr').find('.apostergar').prop('readonly',true);

        $(this).closest('tr').find('.checkpostergar').prop('disabled',true);

      }
      if(checkdecomisar==false){

        $(this).closest('tr').find('.adecomisar').val('')

        $(this).closest('tr').find('.apostergar').val('');

        $(this).closest('tr').find('.pendiente').val($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6));

        $(this).closest('tr').find('.pendientehidden').val($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6))

        $(this).closest('tr').find('.adecomisar').prop('readonly',false);

        $(this).closest('tr').find('.apostergar').prop('readonly',false);

        $(this).closest('tr').find('.checkpostergar').prop('disabled',false);

      }
    })

$('#tabladecomisos').on('change keyup', '.adecomisar',function(){

 var total=parseFloat($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6));


var pendiente=(total-$(this).closest('tr').find('.apostergar').val()-$(this).val()).toFixed(3)

$(this).closest('tr').find('.pendiente').val(pendiente)

$(this).closest('tr').find('#pendientehidden').val(pendiente)



})

$('#tabladecomisos').on('change keyup', '.apostergar',function(){

 var total=parseFloat($(this).closest('tr').find('.cantidad').text().substring(0, $(this).closest('tr').find('.cantidad').text().length - 6));


var pendiente=(total-$(this).closest('tr').find('.adecomisar').val()-$(this).val()).toFixed(3)

$(this).closest('tr').find('.pendiente').val(pendiente)

$(this).closest('tr').find('#pendientehidden').val(pendiente)

})


$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmardecomiso").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                            
       $.post("datos.php",$("#formdecomisos").serialize(),function(respuestacoddecomiso){

         var respuestacod=JSON.parse(respuestacoddecomiso) 

     //   alert(respuestacod.estado_) 

                if(respuestacod.estado_ == 'OK'){
                    var modal=$('#MensajeConfirmacion').modal('show')
                //$('#ConfirmarDecomiso').modal('hide')
                  modal.find('.modal-body').empty()
                 modal.find('.modal-body').html(
                  '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Decomiso agregado</h4><p>Usted ha agregado el nuevo decomiso correctamente. El id del decomiso es <a id="id_decomiso"></a></p><hr></div>')
                modal.find("#id_decomiso").text(respuestacod.idDecomiso_)
                  //  alert(respuestacod.idDecomiso_)
                 var link="index.php?pagina=detalleDecomiso&idDecomiso="+respuestacod.idDecomiso_+"&estado=0"
                 modal.find('#botonaceptarnuevodecomiso').unbind('click');
                 modal.find('#botonaceptarnuevodecomiso').attr("href", link)


                } else {
                 //   $('#ConfirmarDecomiso').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el decomiso.  <a id="errordecomiso"></a></p><hr></div>')
                  modal.find('#errordecomiso').empty()
                  modal.find('#errordecomiso').html(respuestacod.estado_)
                  modal.find('.modal-footer').append('<a type="button" class="btn btn-success" id="botoniraverlo">Ir a verlo</a>')
                         var link="index.php?pagina=detalleDecomiso&idDecomiso="+respuestacod.idDecomiso_+"&estado=0"
                 modal.find('#botoniraverlo').unbind('click');
                 modal.find('#botoniraverlo').attr("href", link)



                }
            });
  
    });    
});


</script>


</body>
</html>


