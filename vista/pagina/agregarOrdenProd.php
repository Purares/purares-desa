<head>
  <title>Nueva Orden</title>
</head>
<body>


<?php

$recetas=ControladorFormularios::ctrListaRecetas();

$carnes=ControladorFormularios::ctrStockCarnes();

$lote=ControladorFormularios::ctrNroLoteProd()


?>


  <div class="container">  
    <br>
    <h2>Agregar orden</h2>
    <hr>
              <br>
            	<h5>1 - Seleccion de receta y peso del pastón</h5>
              <hr>
          			<br>
<form method="post" class="needs-validation" id="formorden">
                      <div class="row">
          				<div class="input-group col-6">
  							<div class="input-group-prepend">
           						<span class="input-group-text">Receta:</span>
           					</div>
          					<select class="custom-select" id="idReceta" name="idRecetaAltaOP" required>
                    <option value="">Seleccione una receta</option>
<?php

foreach($recetas as $receta){

	echo '<option value="' . $receta["id_receta"] . '">' . $receta["nombre"] . '</option>';

};

?>

            					</select>
                                     <div class="invalid-feedback">
                                    Seleccione una receta
                                      </div>
            				</div>
            			<br>
            				<div class="input-group col-6">	
            					<div class="input-group-prepend">
           						<span class="input-group-text">Peso del pastón:</span>
           					</div>
          						<input type="number" min=0 step=0.01 class="form-control text-right" id="PesoPaston" name="pesoPastonAltaOP" placeholder="Ingrese el peso" required>
                              <div class="input-group-append">
      							<span class="input-group-text">kilos</span><button type="button" class="btn font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese el peso total del pastón sin contar los insumos.">
   <i class="far fa-question-circle"></i>
          </button>
   							</div>
                                 <div class="invalid-feedback">
                                      Ingrese un numero mayor a cero
                                      </div>
          				</div>
                </div>
                  <br>
                  <div class="row">
                    <div class="input-group col-6"> 
                      <div class="input-group-prepend">
                      <span class="input-group-text">Unidades frescas:</span>
                    </div>
                      <input type="text" class="form-control text-right" id="cantidadunidadesfrescas" name="qUniFrescasAltaOP" placeholder="Este campo se calcula solo" readonly required>
               <div class="input-group-append">
                    <span class="input-group-text">unidades</span><button type="button" class="btn font-weight-bold" data-toggle="tooltip" data-placement="right" title="">
   <i class="far fa-question-circle"></i>
          </button>
                </div>
                  </div>

                             <div class="input-group col-3"> 
                      <div class="input-group-prepend">
                      <span class="input-group-text">N° de lote:</span>
                    </div>
                      <input type="number" step=1 class="form-control text-right" id="nrolote" name="nroLoteAltaOP" value="<?php echo $lote['nroLote_'];?>" readonly required>
               <div class="input-group-append">
                   <button type="button" class="btn font-weight-bold" data-toggle="tooltip" data-placement="right" title="">
   <i class="far fa-question-circle"></i>
          </button>
                </div>
                  </div>
 <?php if($lote['creado_']=="NO"){echo '          
               
                <div class="form-check">
  <input class="form-check-input" type="checkbox" id="defaultCheckNroLote">
  <label class="form-check-label" for="defaultCheckNroLote">
    Usar siguiente numero de lote
  </label>
</div>
';};?> 

                  </div>
                          <br>
                       
                   <div id="titulodivproductos"></div>       
                          <br>
                  <div id="divproductos" class="row"></div>
                  <br>
                           <div id="alertaproductos">
				<div class="alert alert-info alertproductos" role="alert">
				</div>
			</div>
			<br>
                           <h6 class="infoinsumos"></h6>
                           <br>
                         <table class="table table-hover table-bordered table-sm">
                <thead class="thead-light headinsumosop">
                </thead>
                <tbody class="bodyinsumosop">
                </tbody>
                  </table>
                  <br>
                  <h6 class="infoinsumosxproducto"></h6>
                           <br>
                         <table class="table table-hover table-bordered table-sm">
                <thead class="thead-light headinsumosproductoop">
                </thead>
                <tbody class="bodyinsumosproductoop">
                </tbody>
                  </table>
                  <input type="hidden" name="establecerorden" value="1">
                  <input  class="form-control" type="text" id="contadorcarne" value="1" required style="display:none;">
                  <input  class="form-control" type="text" id="contadorproductos" value="1" required style="display:none;">
                           <br>
				<br>
              <h5>2 - Ingrese la cantidad de carnes que utilazará la orden:</h5>
              <hr>
			<div id="alertacarnes">
				<div class="alert alert-info alertcarnes" role="alert">
				</div>
			</div>
              <div class="container col-11 row justify-content-start">
                  <table class="table table-sm table-hover ">
                <thead>
                    <tr>
                      <th scope="col" class="text-center text-white bg-dark">ID</th>
                      <th scope="col" class="text-white bg-dark">Carne</th>
                      <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
                       <th scope="col" class="text-center text-white bg-dark">Stock Actual</th>
                    </tr> 
                  </thead>
                <tbody id="TablaCarnesDesposte">
              
<?php

foreach($carnes as $carne){

	if ($carne[0]==11) {

	  echo '<tr><td scope="col" width="13%" class="text-center">' . $carne[0] . '<input type="hidden" name="idCarnesAgregarOP[]" value="' . $carne[0] . '"></td><td scope="col" width="30%" class="nomcarne">' . $carne[1] . '<input type="hidden" value="' . $carne[1] . '"></td><td scope="col" width="25%"><div class="input-group"><input type="number" min=0 step=0.001 class="form-control text-right cantcarneop" id="kilostocino" placeholder="" disabled><input type="hidden" name="catidadCarnesAgregarOP[]" id=kilostocinooculto value=""><div class="input-group-append"><span class="input-group-text"><a class="unitcarne">'. $carne[3] . '</a></span></div></div></td><td scope="col" width="22%" class="text-right">' . $carne[2] .' '. $carne[3] .'</td></tr>';

	
	}else{

  echo '<tr><td scope="col" width="13%" class="text-center">' . $carne[0] . '<input type="hidden" name="idCarnesAgregarOP[]" value="' . $carne[0] . '"></td><td scope="col" width="30%" class="nomcarne">' . $carne[1] . '<input type="hidden" value="' . $carne[1] . '"></td><td scope="col" width="25%"><div class="input-group"><input type="number" min=0 step=0.001 max="'.$carne[2].'" name="catidadCarnesAgregarOP[]" class="form-control text-right cantcarneop" placeholder="Ingrese la cantidad"><div class="input-group-append"><span class="input-group-text"><a class="unitcarne">'. $carne[3] . '</a></span></div></div></td><td scope="col" width="22%" class="text-right">' . $carne[2] .' '. $carne[3] .'</td></tr>';

}}

?>
		
                </tbody>
            </table>
          </div>
       
                          <br>
   <button type="button" class="btn btn-success" id="BotonEstablecerOrden" data-toggle="modal" data-target="#ConfirmarOrden">Establecer orden</button>

                  </div>

  <!-- ConfirmarOrden -->
  <div class="modal fade" id="ConfirmarOrden" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar orden</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar una orden de produccion de la receta <a class="nombre_receta"></a> con un pastón total de <a class="pesopaston"></a> kilos.</p>

           <p>El número de lote de la orden será <a class="nrolote"></a></p>

          <p>Utilizará los siguientes insumos:</p>

          <div class="container">
          <table class="table table-hover table-sm">
            <thead>
            <tr><th scope="col">Insumo</th><th scope="col">Cantidad op</th><th scope="col">Stock actual</th><th scope="col">Stock fúturo</th></tr>
            </thead>
            <tbody id="tablaconfirmarinsuop">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>Utilizará los siguientes carnes:</p>
           <div class="container">
          <table class="table table-hover table-sm">
            <thead>
            <tr><th scope="col">Carne</th><th scope="col" class="text-right">Cantidad</th></tr>
            </thead>
            <tbody id="tablaconfirmarcarneop">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>¿Confirma que desea cargar esta orden de producción?</p>
        </div>
        <div class="modal-footer">
           <button type="button" id="botonconfirmarorden"  class="btn btn-success">Sí, establecer orden</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, descartar orden</button>
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
          <a type="button" class="btn btn-info" id="botonaceptarnuevaorden" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

<script>

	var kilosrequeridos;
	var total=0;

  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonEstablecerOrden');

      button.addEventListener('click', function(event) {
         var contadorcarne=$('#contadorcarne').val();
         var contadorproducto=$('#contadorproductos').val();
        if ((form.checkValidity() === false) || (contadorcarne!="0") || (contadorproducto!="0")) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

  
$('#PesoPaston').keyup(function(){

 //alert($('#idReceta').val())

$.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaAltaOP: $('#idReceta').val(),pesoPastonAltaOP:$('#PesoPaston').val(),establecerorden:0},
                dataType: "json",
                success:function(respuestacod){


                    if (respuestacod.validacion_=="SI") {

                        //alert('alcanza')
                         $('.infoinsumos').html("Se requeriran estas cantidades de insumos:")

                        $('.headinsumosop').html('<tr><th scope="col"  class="text-center">ID Insumo</th><th scope="col">Insumo</th><th scope="col"  class="text-center">Stock Actual</th><th scope="col"  class="text-center">Cantidad para orden</th><th scope="col"  class="text-center">Cantidad después de orden</th></tr>')

                               $('.bodyinsumosop').find('tr').remove()
                    for (var i = 0; i < respuestacod.tablaInsumos_.length; i++) {


                        
                        $('.bodyinsumosop').append('<tr><td scope="col" class="text-center">'+respuestacod.tablaInsumos_[i][1]+'</td><td scope="col" class="nominsu">'+respuestacod.tablaInsumos_[i][2]+'</td><td scope="col" class="stockinsu text-center">'+respuestacod.tablaInsumos_[i][5]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col" class="cantinsuop text-center">'+respuestacod.tablaInsumos_[i][6]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col"  class="stockinsufuturo text-center">'+respuestacod.tablaInsumos_[i][7]+' '+respuestacod.tablaInsumos_[i][4]+'</td></tr>')

$.ajax({
                type:'POST',
                url:'datos.php',
                data:{idReceta: $('#idReceta').val(),productos:1},
                dataType: "json",
                success:function(respuestaproduxreceta){

$('#titulodivproductos').find('h6').remove()
$('#divproductos').find('.input-group').remove()

if(respuestaproduxreceta.length==0){

$('#titulodivproductos').append('<h6>Esta receta no tiene productos asignados</h6>')

}else{

$('#titulodivproductos').append('<h6>Distribuya las '+$('#cantidadunidadesfrescas').val()+' unidades entre los productos</h6>')

$('#divproductos').append('<form id="formdistribucionproducto"></form>')

 for (var h = 0; h < respuestaproduxreceta.length; h++) { 


$('#formdistribucionproducto').append('<div class="input-group col-12"><div class="input-group-prepend"><input type="hidden" name="array_ProductoAltaOP[]" value="'+respuestaproduxreceta[h][1]+'"><span class="input-group-text">'+respuestaproduxreceta[h][2]+'</span></div><input type="number" min=0 step=1 max="'+$('#cantidadunidadesfrescas').val()+'" class="form-control text-right cantidadproducto" name="array_QProductoAltaOP[]" placeholder="Unidades" required><div class="input-group-append"><span class="input-group-text">Unidades</span><button type="button" class="btn font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ingrese el total de unidades del producto."><i class="far fa-question-circle"></i></button></div><div class="invalid-feedback">Ingrese la cantidad de unidades del producto</div></div>')
}

}

$('.cantidadproducto').bind("keyup change", function(e) {

 $.post("datos.php",$("#formdistribucionproducto").serialize(),function(respuestainsumoproductos1){

var respuestainsumoproductos=JSON.parse(respuestainsumoproductos1)

console.log(respuestainsumoproductos)

                 if (respuestainsumoproductos['validacion_']=="SI") {

                        //alert('alcanza')
                         $('.infoinsumosxproducto').html("Se requeriran estas cantidades de insumos para los productos:")

                        $('.headinsumosproductoop').html('<tr><th scope="col"  class="text-center">ID Insumo</th><th scope="col">Insumo</th><th scope="col"  class="text-center">Stock Actual</th><th scope="col"  class="text-center">Cantidad para orden</th><th scope="col"  class="text-center">Cantidad después de orden</th></tr>')

                               $('.bodyinsumosproductoop').find('tr').remove()
                    for (var i = 0; i < respuestainsumoproductos.tablaInsumos_.length; i++) {


                        
                        $('.bodyinsumosproductoop').append('<tr><td scope="col" class="text-center">'+respuestainsumoproductos.tablaInsumos_[i]['id_insumo']+'</td><td scope="col" class="nominsu">'+respuestainsumoproductos.tablaInsumos_[i]['insumo']+'</td><td scope="col" class="stockinsu text-center">'+respuestainsumoproductos.tablaInsumos_[i][5]+' '+respuestainsumoproductos.tablaInsumos_[i][4]+'</td><td scope="col" class="cantinsuop text-center">'+respuestainsumoproductos.tablaInsumos_[i][6]+' '+respuestainsumoproductos.tablaInsumos_[i][4]+'</td><td scope="col"  class="stockinsufuturo text-center">'+respuestainsumoproductos.tablaInsumos_[i][7]+' '+respuestainsumoproductos.tablaInsumos_[i][4]+'</td></tr>')


}}else{

                      if (respuestainsumoproductos['validacion_']=="NO") {

                             //alert('no alcanza')
                      $('.infoinsumosxproducto').html('<p class="text-danger">No hay insumos suficientes para estos productos</p>')

                            $('.headinsumosproductoop').html('<tr><th scope="col"  class="text-center">ID Insumo</th><th scope="col">Insumo</th><th scope="col"  class="text-center">Stock Actual</th><th scope="col"  class="text-center">Cantidad para orden</th><th scope="col"  class="text-center">Cantidad después de orden</th></tr>')

                               $('.bodyinsumosproductoop').find('tr').remove()
                    for (var i = 0; i < respuestainsumoproductos.tablaInsumos_.length; i++) {


                        
                        $('.bodyinsumosproductoop').append('<tr><td scope="col" class="text-center">'+respuestainsumoproductos.tablaInsumos_[i]['id_insumo']+'</td><td scope="col" class="nominsu">'+respuestainsumoproductos.tablaInsumos_[i]['insumo']+'</td><td scope="col" class="stockinsu text-center">'+respuestainsumoproductos.tablaInsumos_[i][5]+' '+respuestainsumoproductos.tablaInsumos_[i][4]+'</td><td scope="col" class="cantinsuop text-center">'+respuestainsumoproductos.tablaInsumos_[i][6]+' '+respuestainsumoproductos.tablaInsumos_[i][4]+'</td><td scope="col"  class="stockinsufuturo text-center">'+respuestainsumoproductos.tablaInsumos_[i][7]+' '+respuestainsumoproductos.tablaInsumos_[i][4]+'</td></tr>')


}

}}})




$('.cantidadproducto').bind("keyup change", function(e) {

//alert("anda el codigo")
	var valoresproductos=$('.cantidadproducto').filter(":input")
	var total1=0
    var total=parseFloat(total1)
    var valoresproducto
for (var i=0; i<=valoresproductos.length-1;i++){
	//alert("esto es lo que entra antes de convertirse"+valorescarnes[i].value)
	if (valoresproductos[i].value!="") {
		valoresproducto=(parseFloat(valoresproductos[i].value))
		//alert("este es el tipo con el que lee"+typeof(valoresvarne))
		//alert("este es lo que lee"+valoresvarne)
	
  	total= total+valoresproducto
  //	alert("asi queda el total despues de suamr cada campo"+total)
  	}else{
      valoresproducto=0
	total= total+valoresproducto
  //	alert("asi queda el total despues de suamr como 0"+total)
  	}

  	}
//console.log(valorescarnes[1]);
 var productosactual=$('#cantidadunidadesfrescas').val()-total
 //alert(kilosactual)
 if(productosactual==0){

 	$('.alertproductos').empty()
 $('.alertproductos').removeClass('alert alert-info').removeClass('alert alert-danger').addClass("alert alert-success")
    $('#alertaproductos').show()
$('.alertproductos').html("Se completaron los productos")
$('#contadorproductos').val("0")

 }else{
  if(productosactual<0){
$('.alertproductos').empty()
$('.alertproductos').removeClass('alert alert-info').removeClass('alert alert-success').addClass("alert alert-danger")
  $('#alertaproductos').show()
$('.alertproductos').html("Se ingresaron <a id='productosrequeridos'></a> unidades de productos demás")
var productosactualpositivo=-productosactual
$('#productosrequeridos').html(productosactualpositivo)
$('#contadorproductos').val("1")

  }else{
$('.alertproductos').empty()
$('.alertproductos').removeClass('alert alert-info').removeClass('alert alert-success').addClass("alert alert-danger")
  $('#alertaproductos').show()
$('.alertproductos').html("Se requieren distribuir <a id='productosrequeridos'></a> unidades de productos")
var productosrequeridos=$('#cantidadunidadesfrescas').val()-total
$('#productosrequeridos').html(productosrequeridos)
$('#contadorproductos').val("1")




}}}) 


})


}})



              $.ajax({
                type:'GET',
                url:'datos.php',
                data:{idReceta: $('#idReceta').val()},
                success:function(respuestacod){

             
//console.log(respuestacod);

					var pesopastontotal1=$('#PesoPaston').val()

					var pesoinsumos1=parseFloat(respuestacod[0]['peso_total_insumos_kg'])

                    var kilosinsumos1=(($('#PesoPaston').val())/(100+pesoinsumos1))*pesoinsumos1

                    //alert(kilosinsumos)

                    var kilostocino=((pesopastontotal1-kilosinsumos1)*(1-(respuestacod[0]['porcent_carne']/100))).toFixed(3)
                     kilosrequeridos=((pesopastontotal1-kilosinsumos1)*(respuestacod[0]['porcent_carne']/100)).toFixed(3)
                    $('#kilostocino').val(kilostocino)
                    $('#kilostocinooculto').val(kilostocino)
                    $('#alertacarnes').show()
                    $('.alertcarnes').empty()
                    $('.alertcarnes').html("Se requieren <a id='kilosrequeridos'></a> kilos de carne para completar el paston")
                    $('#kilosrequeridos').text(kilosrequeridos)

                    var cantidadunidadesfrescas=($('#PesoPaston').val()*(respuestacod[0]['cantidad_unidades_lote'])/100).toFixed(0);
                    $('#cantidadunidadesfrescas').val(cantidadunidadesfrescas);


}, dataType: "json"

                    })}}else{

                      if (respuestacod.validacion_=="NO") {

                             //alert('no alcanza')
                      $('.infoinsumos').html('<p class="text-danger">No hay insumos suficientes</p>')

                       $('#cantidadunidadesfrescas').val('No hay insumos');

                    $('.headinsumosop').html('<tr><th scope="col"  class="text-center">ID Insumo</th><th scope="col">Insumo</th><th scope="col"  class="text-center">Stock Actual</th><th scope="col"  class="text-center">Cantidad para orden</th><th scope="col"  class="text-center">Cantidad después de orden</th></tr>')

                               $('.bodyinsumosop').find('tr').remove()
                    for (var i = 0; i < respuestacod.tablaInsumos_.length; i++) {


                        
                        $('.bodyinsumosop').append('<tr><td scope="col" class="text-center">'+respuestacod.tablaInsumos_[i][1]+'</td><td scope="col" class="nominsu">'+respuestacod.tablaInsumos_[i][2]+'</td><td scope="col" class="stockinsu text-center">'+respuestacod.tablaInsumos_[i][5]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col" class="cantinsuop text-center">'+respuestacod.tablaInsumos_[i][6]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col"  class="stockinsufuturo text-center">'+respuestacod.tablaInsumos_[i][7]+' '+respuestacod.tablaInsumos_[i][4]+'</td></tr>')


                    }}
}}
})

}) 

 $('#idReceta').on('change',function(){

  $('#PesoPaston').val('')
  $('.infoinsumos').html("Ingrese el peso del paston para calcular los insumos")
  $('.bodyinsumosop').find('tr').remove()
  $('.headinsumosop').find('tr').remove()

 })

$('#ConfirmarOrden').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalorden()
function completarmodalorden(){             
                                  var nombrereceta=$('#idReceta option:selected').text()
                                      pesopaston=$('#PesoPaston').val()
                                      nrolote=$('#nrolote').val()
                                    
                                      var nombreinsumos = [];
                                      cantidadinsumosop=[];
                                      stockactualinsumos=[];
                                      stockfututoinsumos=[];

                                      $('.trinsu').remove();

                                      $('.nominsu').each(function(){
                                        nombreinsumos.push($(this).text());
                                      })
                                       $('.cantinsuop').each(function(){
                                        cantidadinsumosop.push($(this).text());
                                      })
                                         $('.stockinsu').each(function(){
                                        stockactualinsumos.push($(this).text());
                                      })
                                          $('.stockinsufuturo').each(function(){
                                        stockfututoinsumos.push($(this).text());
                                      })
                                    
                                      var nombrecarnes = [];
                                      cantidadcarnesop=[];

                                      $('.trcarne').remove();

                                      $('.nomcarne').each(function(){
                                        nombrecarnes.push($(this).text());
                                      })
                                       $('.cantcarneop').each(function(){
                                        cantidadcarnesop.push($(this).val());
                                      })
                                    
                            
modal.find('.nombre_receta').text('' + nombrereceta);
modal.find('.pesopaston').text('' + pesopaston);
modal.find('.nrolote').text('' + nrolote);


for (var i=0; i<=nombreinsumos.length-1;i++){
  
  modal.find('#tablaconfirmarinsuop').append($('<tr class="trinsu"><td scope="col">' + nombreinsumos[i] +'</td><td scope="col" class="text-right">'+ cantidadinsumosop[i] + '</td><td scope="col">' + stockactualinsumos[i]+ '</td><td scope="col">'+ stockfututoinsumos[i]+'</td></tr>'))

  }

for (var i=0; i<=nombrecarnes.length-1;i++){
  
  modal.find('#tablaconfirmarcarneop').append($('<tr class="trcarne"><td scope="col">' + nombrecarnes[i] +'</td><td scope="col" class="text-right">'+ cantidadcarnesop[i] + ' kilos</td></tr>'))

  }



}})

$(document).ready(function(){

   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})   

	$('#alertacarnes').hide()
	$('#alertaproductos').hide()


  $("#botonconfirmarorden").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$('#formorden,#formdistribucionproducto').serialize(),function(respuestacod1){
 //      alert(respuestacod1

                 alert(respuestacod1)
                  console.log(respuestacod1);

                if(respuestacod1.validacion_ == "OK"){
                  $('#ConfirmarOrden').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Orden agregada</h4><p>Usted ha agregado la nueva orden de produccion correctamente. El id de la orden es <a id="id_nuevaorden"></a></p><hr></div>')
                  modal.find("#id_nuevaorden").text(respuestacod1.idOrdenProd_)
                 var link="index.php?pagina=detalleOp&idOrdenProdDetalle="+respuestacod1.idOrdenProd_+"&estado=0"
                  modal.find('#botonaceptarnuevaorden').unbind('click');
                  modal.find('#botonaceptarnuevaorden').attr("href", link)

                } else {
                    $('#ConfirmarOrden').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar la orden de produccion. <a id="erroragregarorden"></a></p><hr></div>')
                   modal.find('#erroragregarorden').empty()
                  modal.find('#erroragregarorden').html(respuestacod1)

                }
   },"json");
  
    })});  



$('.cantcarneop').bind("keyup change", function(e) {


	var valorescarnes=$('.cantcarneop').filter(":input")
	var total1=0
    var total=parseFloat(total1)
    var valoresvarne
for (var i=0; i<=valorescarnes.length-2;i++){
	//alert("esto es lo que entra antes de convertirse"+valorescarnes[i].value)
	if (valorescarnes[i].value!="") {
		valoresvarne=(parseFloat(valorescarnes[i].value))
		//alert("este es el tipo con el que lee"+typeof(valoresvarne))
		//alert("este es lo que lee"+valoresvarne)
	
  	total= total+valoresvarne
  //	alert("asi queda el total despues de suamr cada campo"+total)
  	}else{
      valoresvarne=0
	total= total+valoresvarne
  //	alert("asi queda el total despues de suamr como 0"+total)
  	}

  	}
//console.log(valorescarnes[1]);
 var kilosactual=kilosrequeridos-total
 //alert(kilosactual)
 if((Math.round(kilosactual*1000)/1000)==0){

 	$('.alertcarnes').empty()
 $('.alertcarnes').removeClass('alert alert-info').removeClass('alert alert-danger').addClass("alert alert-success")
    $('#alertacarnes').show()
$('.alertcarnes').html("La orden no necesita mas carnes")
$('#contadorcarne').val("0")

 }else{
  if(kilosactual<0){
$('.alertcarnes').empty()
$('.alertcarnes').removeClass('alert alert-info').removeClass('alert alert-success').addClass("alert alert-danger")
  $('#alertacarnes').show()
$('.alertcarnes').html("Se ingresaron <a id='kilosrequeridos'></a> kilos de carne por sobre el total del paston específicado")
var kilosactualpositivo=-kilosactual
$('#kilosrequeridos').html(kilosactualpositivo.toFixed(3))
$('#contadorcarne').val("1")

  }else{
$('.alertcarnes').empty()
$('.alertcarnes').removeClass('alert alert-info').removeClass('alert alert-success').addClass("alert alert-danger")
  $('#alertacarnes').show()
$('.alertcarnes').html("Se requieren <a id='kilosrequeridos'></a> kilos de carne para completar el paston")
$('#kilosrequeridos').html(kilosactual.toFixed(3))
$('#contadorcarne').val("1")




}}}) 




$("#defaultCheckNroLote").on( "click", function() {
  
if ($('#defaultCheckNroLote').prop('checked')==true) {

var numerodeloteviejo=parseInt($('#nrolote').val())

var siguientelote=numerodeloteviejo+1

$('#nrolote').val(siguientelote);

}else{


$('#nrolote').val(parseInt($('#nrolote').val())-1)


}})


</script>


</body>
</html>