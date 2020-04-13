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
#Array del stock de carnes
$respuesta=ControladorFormularios::ctrImprimirStockCarnes();

$Longitud=array_search(array_key_last($respuesta), $respuesta);

$Carne=$respuesta[1];
	$stockTotalCarne=$respuesta[$Carne]['stockActualTotal'];

	$index=0;#Meter un for
		$id_index_Desposte=$respuesta[$Carne]['desposte'][$index];
		$StockActual_index=$respuesta[$Carne]['stockactual'][$index];
		$CantidadDespostes=count($respuesta[$Carne]['desposte']);

var_dump($Longitud);
var_dump($Carne);
var_dump($stockTotalCarne);
var_dump($CantidadDespostes);
var_dump($id_index_Desposte);
var_dump($StockActual_index);
var_dump($respuesta);




?>