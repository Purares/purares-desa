<h1>RESULTADOS2:</h1>
<br>
<br>




<h1>pruebas</h1>

<?php 


$tablaCompleta=ModeloFormularios::mdlComposicionStockCarnes2();

$tabla=array();
	#/*
	foreach ($tablaCompleta as $registro) { #navega los registros
			
		$carne= $registro['carne'];
		$encontrado=array_search($carne, $tabla);
	
		if (array_search($carne, $tabla)==0) {
			$tabla[]=$carne;
			$tabla[$carne]['stockActualTotal']=$registro['stockactual'];
			$tabla[$carne]['desposte']=[$registro['id_desposte']];
			$tabla[$carne]['stockactual']=[$registro['stockactual']];
		}else{
			$tabla[$carne]['stockActualTotal']=$tabla[$carne]['stockActualTotal']+$registro['stockactual'];
			array_push($tabla[$carne]['desposte'],$registro['id_desposte']);
			array_push($tabla[$carne]['stockactual'],$registro['stockactual']);
		}
	}
	#*/
#var_dump($registro);
var_dump($tabla);
#var_dump($tablaCompleta);
?>