<h1>RESULTADOS2:</h1>
<br>
<br>
<h1>pruebas</h1>

<?php 

$array_Producto=[17,16];
$array_QProducto=[10,4];


$longitud=count($array_Producto);

for ($i=0; $i < $longitud ; $i++) { 
	#Buscar los insumos correspondiente a la tabla
	$idProducto=$array_Producto[$i];
	$qProducto=$array_QProducto[$i];


	$datos = array(	'idProducto_'	=> $idProducto,
					'qProducto_' 	=> $qProducto);

	$insXProd=ModeloFormularios::mdlListaInsumosOPProductos($datos);	
	$validacion1=ModeloFormularios::mdlValidacionInsumosOPProductos($datos);

	$validacion2=count($validacion1);

	if ($validacion2>0) {
		$validacion3="NO";
	}

	#Si es el primer registro no hace el Merge
	if ($i==0) {
		$tablaInsumosOPProd=$insXProd;
	}else{
		$tablaInsumosOPProd=array_merge($tablaInsumosOPProd,$insXProd);
	}
}
 

if (isset($validacion3)==false) {$validacion3="SI";}

var_dump($validacion3);


?>