<h1>RESULTADOS2:</h1>
<br>
<br>




<h1>pruebas</h1>

<?php 
$valor=ModeloFormularios::mdlUltimoDecomiso();
var_dump($valor);

$imprimir=$valor[0][0];
var_dump($imprimir);


/*
	
	$array_IdDesposte=[5,6,7,8,9];
	$array_IdCarne=[1,2,3,4,5];
	$array_Qdecomisar=[10.2,0,0,3,11.7];
	$array_Qpostergar=[1,21.2,43,3,2];

	$longitud=count($array_IdDesposte);

		for ($i=0; $i <$longitud ; $i++) { 
			
			#Si tiene Carne a Decomisar
			if ($array_Qdecomisar[$i]>0) {		
			#CrearArray
				$datos3[0]=5;
				$datos3[1]=$array_IdDesposte[$i];
				$datos3[2]=$array_IdCarne[$i];
				$datos3[3]=$array_Qdecomisar[$i];
				$datos3[4]=13;#Cuenta Decomiso
				$datos3[5]=$_SESSION['userId'];
				#Cargarlo en la BD
				$respuesta=ModeloFormularios::mdlAgregarMovimientoDecomiso($datos3);
			} 
			#Si tiene Carne para postergar Decomiso
			if ($array_Qpostergar[$i]>0) {
				#CrearArray
				$datos3[0]=5;
				$datos3[1]=$array_IdDesposte[$i];
				$datos3[2]=$array_IdCarne[$i];
				$datos3[3]=$array_Qpostergar[$i];
				$datos3[4]=16;#Postergar Decomiso
				$datos3[5]=$_SESSION['userId'];	
				#Cargarlo en la BD
				$respuesta=ModeloFormularios::mdlAgregarMovimientoDecomiso($datos3);
			}
		}

*/
?>