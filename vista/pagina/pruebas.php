<h1>RESULTADOS2:</h1>
<br>
<br>




<h1>pruebas</h1>

<?php 


			$destino="destino Prueba";
			$fechaDecomiso='2020-04-25';
			$descripcion="descripcion prueba 1";
			$arrayIdDesposte=[1,2,3];
			$arrayIdCarne=[4,2,10];
			$arrayCantidad=[19,21,9];
			$arayIdCuenta=[13,15,13];
					
					#Crear registro de Decomiso
					$datos1 = array('destino_' 			=> $destino,
									'fecha_decomiso_' 	=> $fechaDecomiso,
									'descripcion_' 		=> $descripcion,
									'id_usuario_' 		=> 1);


					$idDecomiso=ModeloFormularios::mdlCrearDecomiso($datos1);					

					#Crear Movimientos de Decomisos
					$longitud=count($arrayIdDesposte);

					$datos2 = array('idCecomiso_' 	=> array_fill(0,$longitud,$idDecomiso),
									'idDesposte_' 	=> $arrayIdDesposte,
									'idCarne_' 		=> $arrayIdCarne,
									'cantidad_'		=> $arrayCantidad,
									'idCuenta_'		=> $arayIdCuenta,
									'idUsuario_'	=> array_fill(0,$longitud,$_SESSION['userId']));

					for ($i=0; $i <$longitud ; $i++) { 
						$datos3= array_column($datos2,$i);
						$respuesta=ModeloFormularios::mdlAgregarMovimientoDecomiso($datos3);
					#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta;}
					} #exit for OK


				






?>