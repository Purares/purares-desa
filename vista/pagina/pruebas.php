<h1>RESULTADOS2:</h1>
<br>
<br>




<h1>pruebas</h1>

<?php 



$datosUltimoLote=ModeloFormularios::mdlNroLoteProd();
$fechaDatos=$datosUltimoLote[0]['fecha_alta'];
$fechaAltaDatos=date_create_from_format('Y-m-d H:i:s',$fechaDatos);
$fechaAltaDatosC=date_format($fechaAltaDatos,"Y/m/d H:i:s");
$fechaAltaDatosD=strtotime($fechaAltaDatosC);
$diferencia=time()-$fechaAltaDatosD-18000;#18000= 3 hs de diferencia


#Esta dentro de las 48 del lote raiz(el que se crea con un desposte)
if ($diferencia< 48*60*60 &&
	$datosUltimoLote[0]['raiz']==1) { #A las 48 hs debe crear un nuevo 
	#Usar el Ultimo NroLote
		$nroLote=$fechaDatos=$datosUltimoLote[0]['nro_lote'];
		$creado="OK";
}
#Luego de las 48 hs del lote raiz
else if($diferencia > 48*60*60 &&
		$datosUltimoLote[0]['raiz']==1){
	#Crear un nuevo Lote
		$nroLote=ModeloFormularios::mdlCrearNroLoteProd();
		$creado="OK";
}

#Dentro de las 12 hs del No RAIZ
else if($diferencia < 12*60*60 &&
		$datosUltimoLote[0]['raiz']==0){
	#Opción Crear un Lote/Usar el lote ya existente
		$nroLote=$fechaDatos=$datosUltimoLote[0]['nro_lote'];
		$creado="OK";
}

#Luego de las 12 hs de un lote que no sea raiz
else if($diferencia > 12*60*60 &&
		$datosUltimoLote[0]['raiz']==0){
	#Opción Crear un Lote/Usar el lote ya existente
		$nroLote=$fechaDatos=$datosUltimoLote[0]['nro_lote'];
		$creado="NO";
}

$respuesta = array(	'creado_' => $creado,
					'nroLote_' => $nroLote);



?>