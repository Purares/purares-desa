<h1>RESULTADOS2:</h1>
<br>
<br>




<h1>pruebas</h1>

<?php 

/*
		$tablaCompleta=ModeloFormularios::mdlComposicionStockCarnes2();

		$tabla=array();
			#/*
			foreach ($tablaCompleta as $registro) { #navega los registros
					
				$carne= $registro['carne'];
				$encontrado=array_search($carne, $tabla, true);
			
				if (array_search($carne, $tabla) === false) { 
					$tabla[]=$carne;
					$tabla[$carne]['stockActualTotal']=$registro['stockactual'];
					#$tabla[$carne]['desposte']=[];
					#$tabla[$carne]['stockactual']=[];
					$tabla[$carne]['desposte']=[$registro['id_desposte']];
					$tabla[$carne]['stockactual']=[$registro['stockactual']];
				}else{
					$tabla[$carne]['stockActualTotal']=$tabla[$carne]['stockActualTotal']+$registro['stockactual'];
					array_push($tabla[$carne]['desposte'],$registro['id_desposte']);
					array_push($tabla[$carne]['stockactual'],$registro['stockactual']);
				}
			}


var_dump($tabla);

*/
$respuesta=ControladorFormularios::ctrImprimirStockCarnes();

$x=array_key_last($respuesta);
$y=array_search(array_key_last($respuesta), $respuesta);

var_dump($y);
var_dump($x);
var_dump($respuesta);

#var_dump($tablaCompleta);

?>