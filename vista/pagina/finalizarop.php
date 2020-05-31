<!DOCTYPE html>
<html>

<head>
	<title>Finalizar op</title>
</head>
<body>

  <?php 
  $_GET['idOrdenProdDetalle']=$_GET['idOrdenProdAlta_FinOP'];
$detalleOrden=ControladorFormularios::ctrDetalleOP();
$productos=$detalleOrden['productos_'];

   ?>

	<div class="container">
<br>

  					<h2>Finalizar OP N° <?php echo $_GET['idOrdenProdAlta_FinOP'];?> <?php echo $_GET['nombre'];?> Lote N° <?php echo $_GET['lote'];?></h2>

            <hr>
    <br> 
      <form method="post" class="needs-validation" id="formfinop">   
       <input type="hidden" name="idOrdenProdAlta_FinOP" id="idopfin" value="<?php echo $_GET['idOrdenProdAlta_FinOP']; ?>">      		
        		   <h5>1 - Empastado, amasado y embutido:</h5>
               <hr>
           <div class="row">
                  <div class="input-group col-md-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">Unidades obtenidas:</span>
                  </div>
                    <input type="number" min=0 step=0.0001 class="form-control text-center" name="unidadesFrescas_FinOP" id="unidadesfrescas" placeholder="Ingrese la cantidad" required>
                     <div class="input-group-append">
                  <span class="input-group-text">Unidades</span><button type="button" class="btn font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de unidades frescas obtenidas tras el embutido">
  <i class="far fa-question-circle"></i>
</button>
              </div>
                                    <div class="invalid-feedback">
                                    Ingrese la cantidad de unidades obtenidas tras el embutido
                                    </div>
                  </div>
                   <div class="input-group col-md-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">Peso fresco:</span>
                  </div>
                    <input type="number" min=0 step=0.0001 class="form-control text-center" name="pesoFresco_FinOP" id="productofrescoembutido" placeholder="Ingrese la cantidad" required>
                     <div class="input-group-append">
                  <span class="input-group-text">Kilos</span><button type="button" class="btn font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de kilos de producto fresco obtenidos tras el embutido">
  <i class="far fa-question-circle"></i>
</button>
              </div>
                                    <div class="invalid-feedback">
                                    Ingrese la cantidad de unidades obtenidas tras el embutido
                                    </div>
                  </div>
              </div>

        <br>
              <h5>2 - Medición del secado y goteo:</h5>
              <hr>
              <br>
 
 <table class="table table-hover">
  <thead>
   <tr><th scope="col" class="text-white text-center bg-dark">ORDEN</th><th scope="col" class="text-white text-center bg-dark">PESO</th><th scope="col" class="text-white text-center bg-dark">MERMA</th><th scope="col" class="text-white text-center bg-dark">RESPONSABLE</th><th scope="col" class="text-white text-center bg-dark">FECHA</th></tr>
 </thead>
 <tbody>

<?php

for ($i=1; $i <5 ; $i++) { 

echo '<td scope=col>'.$i.'<input type="hidden" name="MedicionesSort_FinOP[]" value="'.$i.'"></td><td scope=col><div class="input-group"><div class="input-group-prepend"><input type="number" min=0 step=0.0001 class="form-control input text-center pesos" name="MedicionesPeso_FinOP[]" placeholder="Ingrese el peso" required></div><div class="input-group-append"><span class="input-group-text">Kilos</span></div></div></td><td scope="col"><input type="hidden" name="MedicionesMerma_FinOP[]" class="mermahidden" value=""><a class="mermaentrepesos"></a></td><td scope=col><input type="text" class="form-control text-right responsables" name="MedicionesResponsable_FinOP[]" placeholder="Ingrese el responsable" required></td> <td scope=col> <input type="date" class="fechas form-control" name="MedicionesFechaMedicion_FinOP[]" required></td> </tr>';

 };
 
echo '<td scope=col>5<input type="hidden" name="MedicionesSort_FinOP[]" value="'.$i.'"></td><td scope=col><div class="input-group"><div class="input-group-prepend"><input type="number" min=0 step=0.0001 class="form-control input text-center pesos" name="MedicionesPeso_FinOP[]" placeholder="Ingrese el peso"></div><div class="input-group-append"><span class="input-group-text">Kilos</span></div></div></td><td scope="col"><input type="hidden" name="MedicionesMerma_FinOP[]" class="mermahidden" value=""><a class="mermaentrepesos"></a></td><td scope=col><input type="text" class="form-control text-right responsables" name="MedicionesResponsable_FinOP[]" placeholder="Ingrese el responsable"></td> <td scope=col> <input type="date" class="form-control fechas" name="MedicionesFechaMedicion_FinOP[]"></td> </tr>';

?>  
    
 </tbody>
 </table>
  
           		<br>               
        			<h5>3 - Envasado</h5>
              <hr>
        			<br>
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <td scope="col" class="text-center text-white bg-dark">Producto</td>
                      <td scope="col" class="text-center text-white bg-dark">Unidades esperadas</td>
                       <td scope="col" class="text-center text-white bg-dark">Unidades obtenidas</td>
                         <td scope="col" class="text-center text-white bg-dark">Peso esperado</td>
                      <td scope="col" class="text-center text-white bg-dark">Peso Obtenido</td>
                    </tr> 
                  </thead>
                <tbody id="TablaProductos">

<?php

foreach($productos as $producto){                    

              echo '             <tr>
                        <td scope="col" width="10%">
                          <a>' . $producto["producto"] . '</a><input type="hidden" name="idProductosFinalizarOP[]" value="'. $producto["id_producto"].'">
                        </td>
                        <td scope="col" width="15%">
                           <a>'.$producto["q_esperada"].' unidades</a>
<button type="button" class="btn" data-toggle="tooltip" data-placement="right" title="Cantidad esperada definida al momento de crear la orden">
  <i class="far fa-question-circle"></i>
          </button>
                        </td>
                         <td scope="col" width="30%">
                           <div class="input-group">
 <input type="number" min="0" step="1" name="CantidadProdFinalizarOP[]" class="form-control text-right" placeholder="Ingrese las unidades obtenidas">
                              <div class="input-group-append">
                  <span class="input-group-text"><a>Unidades</a></span><button type="button" class="btn" data-toggle="tooltip" data-placement="right" title="Ingrese la cantidad de unidades de este producto que se obtuvieron realmente">
  <i class="far fa-question-circle"></i>
          </button>
              </div>
                  </div>
                        </td>
                         <td scope="col" width="15%">
                           <a>'.$producto["peso_esperado"].' kilos</a>
<button type="button" class="btn" data-toggle="tooltip" data-placement="right" title="Peso esperado definido al momento de crear la orden">
  <i class="far fa-question-circle"></i>
          </button>
                        </td>
                        <td scope="col" width="30%">
                           <div class="input-group">
 <input type="number" min="0" step="0.001" name="PesoProdFinalizarOP[]" class="form-control text-right" placeholder="Ingrese el peso obtenido">
                              <div class="input-group-append">
                  <span class="input-group-text"><a>kilos</a></span><button type="button" class="btn" data-toggle="tooltip" data-placement="right" title="Ingrese el peso que se obtuvo realmente">
  <i class="far fa-question-circle"></i>
          </button>
              </div>
                  </div>
                        </td>
                    </tr>'; 
       };?>

                </tbody>
            </table>
              <h5>Descripción</h5>
              <hr>
                <textarea class="form-control" style="min-width: 100%" name="descripcion_FinOP" id="descripcionfinop" placeholder="..."></textarea>

<br>
               		<button type="button" class="btn btn-danger" id="botonmodalfinalizarop"  data-toggle="modal" data-target="#ConfirmarFinalizarOp">Finalizar orden</button>
       	 	  </div> 



  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarFinalizarOp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Finalización orden</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de finalizar la orden de producción N° <a class="idopfin"></a>.</p>

          <p>Se obtuvieron <a class="productofresco"></a> kilos de producto fresco y <a class="unidadesfrescas"></a> unidades luego del embutido.

          <p>Los datos de medición de secado y goteo son los siguientes:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">#</th><th scope="col">Peso</th><th scope="col">Merma</th><th scope="col">Responsable</th><th scope="col">Fecha</th></tr>
            </thead>
            <tbody id="tablaconfirmarop">
              
            </tbody>
          </table>
          </div>
          <br>
            
          <p>Luego del envasado se obtuvieron <a class="productoobtenido"></a> kilos y <a class="unidadesobtenidas"></a> unidades.</p>

          <p>La descripción de la finalización es:</p>

          <p class="descripcion"></p>  

            <br>
          <p>¿Confirma que desea cargar estos datos y FINALIZAR la ordeen?</p>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-success" id="botonconfirmarfinop">Sí, finalizar orden</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
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
      var button= document.getElementById('botonmodalfinalizarop');
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
  



  </script>

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
          <a type="button" class="btn btn-info" id="botonaceptarfinalizarorden" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>



<script>

var idop

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmarfinop").click( function() {    // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formfinop").serializeArray(),function(respuestacod){
        alert(respuestacod)
                  if(respuestacod == "OK"){
                  $('#ConfirmarFinalizarOp').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Orden Finalizada</h4><p>Usted ha finalizado la orden de produccion correctamente.</p><p>La merma obtenida esperada de esta orden era de <a class="mermaesperada"></a>% y se obtubo una merma de <a class="mermaobtenida"></a>%  </p><hr></div>')
                  modal.find('.mermaesperada').html(<?php echo $_GET['mermaesperada'];?>)
                  
                  var pesopaston=parseFloat(<?php echo $_GET['pesopaston'];?>);
                  var mermaobtenida=(1-($('#productoobtenido').val()/pesopaston)).toFixed(1)
                  modal.find('.mermaobtenida').html(mermaobtenida)

                  var link="index.php?pagina=detalleOp&idOrdenProdDetalle="+idop+"&estado=1"
                  modal.find('#botonaceptarfinalizarorden').unbind('click');
                  modal.find('#botonaceptarfinalizarorden').attr("href", link)

                } else {
                    $('#ConfirmarFinalizarOp').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar finalizar la orden</p><hr><p class="mensajeerror"></p></div>')
                   modal.find('.mensajeerror').text(respuestacod)
                }
            },"json");
  
    });    
  
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})   
});



$('#ConfirmarFinalizarOp').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalfinalizarop()
function completarmodalfinalizarop(){             
                                   idop=$('#idopfin').val()
                                    var    producto=$('#productoobtenido').val()
                                      unidadesobtenidas=$('#unidadesobtenidas').val()
                                      productofrescoobtenido=$('#productofrescoembutido').val()
                                      unidadesfrescas=$('#unidadesfrescas').val()
                                      descripcion=$('#descripcionfinop').val()
                                    
                                      var pesos = [];
                                      responsables=[];
                                      fechas=[];
                                      mermas=[]

                                      $('.mediciones').remove();

                                      $('.pesos').each(function(){
                                        pesos.push($(this).val());
                                      })
                                       $('.responsables').each(function(){
                                        responsables.push($(this).val());
                                      })
                                         $('.fechas').each(function(){
                                        fechas.push($(this).val());
                                      })
                                          $('.mermaentrepesos').each(function(){
                                        mermas.push($(this).text());
                                      })



 
modal.find('.idopfin').text('' + idop);                                      
modal.find('.productoobtenido').text('' + producto);
modal.find('.productofresco').text('' + productofrescoobtenido);
modal.find('.unidadesobtenidas').text('' + unidadesobtenidas);
modal.find('.unidadesfrescas').text('' + unidadesfrescas);
modal.find('.descripcion').text('' + descripcion);


for (var i=0; i<=pesos.length-1;i++){
  
  modal.find('#tablaconfirmarop').append($('<tr class="mediciones"><td scope="col">' + [i+1] +'</td><td scope="col">' + pesos[i] +'</td><td scope="col">' + mermas[i] +'</td><td scope="col" class="text-right">'+ responsables[i] + '</td><td scope="col">' + fechas[i]+ '</tr>'))

  }}})



$('.pesos').bind("keyup change", function(e) {

  //alert("esto anda")


  //alert($(this).val())
  //alert($(this).closest('tr').prev().find('.pesos').val())
var valorprevio=((1-(parseFloat($(this).val())/parseFloat($(this).closest('tr').prev().find('.pesos').val())))*100).toFixed(1);
var valoraenviarprevio=(1-(parseFloat($(this).val())/parseFloat($(this).closest('tr').prev().find('.pesos').val()))).toFixed(3);
//alert("este es el valor a enviar" + valoraenviar)
var valordespues=((1-(parseFloat($(this).closest('tr').next().find('.pesos').val())/parseFloat($(this).val())))*100).toFixed(1);
var valorenviardespues=(1-(parseFloat($(this).closest('tr').next().find('.pesos').val())/parseFloat($(this).val()))).toFixed(1);
  //alert(valor)
  if(valorprevio!="NaN"||valordespues!="NaN"){

    if(valorprevio=="NaN"){
        valorprevio=""
        valoraenviarprevio=""
    }else{
      valorprevio=valorprevio+" %"
    }
    if(valordespues=="NaN"){
      valordespues=""
      valorenviardespues=""
    }else{
      valordespues=valordespues+" %"
    }
  $(this).closest('tr').find('.mermaentrepesos').html(""+valorprevio)
  $(this).closest('tr').find('.mermahidden').val(valoraenviarprevio)
  //alert("esto es lo que esta en el hidden"+ ($(this).closest('tr').find('.mermahidden').val()))
  $(this).closest('tr').next().find('.mermaentrepesos').html(""+valordespues)
  $(this).closest('tr').next().find('.mermahidden').val(valorenviardespues)
}
})


</script>
        
  
</body>
</html>


