<?php
#ACTUALIZADO 25/3-1.43hs
include_once 'modelo/user.php';
include_once 'controlador/user_session.php';



class ControladorFormularios{

#------------------------- Lista desplegable DEPOSITOS -------------------------#
	static public function ctrListaDepositos(){
		$respuesta= ModeloFormularios::mdlListaDeposito();
		return $respuesta;
	}	

#------------------------- Lista desplegable UDM -------------------------#
	static public function ctrListaUDM(){
		$respuesta= ModeloFormularios::mdlListaUDM();
		return $respuesta;
	}	

#------------------------- Lista desplegable UDM -------------------------#

	static public function ctrListaProductos(){
		$respuesta= ModeloFormularios::mdlListaProductos();
		return $respuesta;
	}


#------------------------- Lista desplegable CUENTA -------------------------#

	static public function ctrListaCuentas(){
		#La función que se está realizando en el front(ej:Actualizar insumo)
		if (isset($_POST["funcion"])){
			$funcion=$_POST["funcion"];
			$respuesta= ModeloFormularios::mdlListaCuentas($funcion);
			return $respuesta;
		}
	}	


#------------------------- Lista desplegable PROVEEDORES -------------------------#

 static public function ctrListaProveedores(){

		if (isset($_POST["tipoProveedor_NuevaCompra"])or(isset($_GET["tipoProveedor_NuevaCompra"]))){
			
			if($_GET["tipoProveedor_NuevaCompra"]){
			$tipoProveedor=$_GET["tipoProveedor_NuevaCompra"];
			}
			else{
			$tipoProveedor=$_POST["tipoProveedor_NuevaCompra"];
			}
		$respuesta= ModeloFormularios::mdlListaProveedor($tipoProveedor); #Tipo: Carnes, Insumos. 
		return $respuesta;
		}
	}


#------------------------- Agregar Proveedor -------------------------#

	static public function ctrAgregarProveedor(){
				
		if (isset($_POST["nombreAgregarProveedor"])&&
			isset($_POST["tipoAgregarProveedor"])){

				$datos= array(	'nombre_' 	=> $_POST["nombreAgregarProveedor"],
								'tipo_' 	=> $_POST["tipoAgregarProveedor"]);

			$respuesta=ModeloFormularios::mdlAgregarProveedor($datos);
			return $respuesta;
		}
	}

#------------------------- Lista desplegable INSUMOS -------------------------#

	static public function ctrListaInsumos(){
		$respuesta= ModeloFormularios::mdlListaInsumos();
		return $respuesta;
	}	


#------------------------- Stock de Insumos -------------------------#

	static public function ctrStockInsumos(){

		$respuesta= ModeloFormularios::mdlStockInsumo();
		return $respuesta;
		
	}

#------------------------- Agregar Insumo -------------------------#

	static public function ctrAgregarInsumo(){
		
				
		if (isset($_POST["nombreInsumo"])||
			isset($_POST["idDeposito"])||
			isset($_POST["idUm"]))
		{
				$datos= array(	'nombreInsumo_' => $_POST["nombreInsumo"],
								'idDeposito_' => $_POST["idDeposito"],
								'idUm_' => $_POST["idUm"],
								'alertaQmin_' => $_POST["alertaQmin"]);

			$respuesta=ModeloFormularios::mdlAgregarInsumo($datos);
			return $respuesta;
		}
	}

#------------------------- Actualizar stock de Insumo -------------------------#

	static public function ctrActualizarInsumo(){

		if (isset($_GET["idInsumoActI"])&&
			isset($_POST["cantidadActI"])&&
			isset($_POST["idCuentaActI"])) {
	
	#session_start();
	$longitud=1;

			$datos= array(	'idInsumo_'		=>[$_GET["idInsumoActI"]],
							'cantidad_'		=>[$_POST["cantidadActI"]],
							'idCuenta_'		=>[$_POST["idCuentaActI"]], #Número fijo para la cuenta compra
							'idOrdenProd_'	=>array_fill(0,$longitud,null),
							'idCompra_'		=>array_fill(0,$longitud,null),
							'idUsuario_'	=>array_fill(0,$longitud,$_SESSION['userId']),
							'comentario_'	=>[$_POST["comentarioActI"]],
							'funcion_'		=>array_fill(0,$longitud,'ActualizarInsumo'));

		$datos2=array_column($datos,0);
		$respuesta=ModeloFormularios::mdlMovimientoInsumo($datos2);

		return $respuesta;
		}
	}

#------------------------- InsumosXdeposito -------------------------#

	static public function ctrInsumosDeposito(){

		if (isset($_POST["idDepositoFiltroInsumo"])){

			$id_deposito=$_POST["idDepositoFiltroInsumo"];
			$respuesta= ModeloFormularios::mdlInsumosDeposito($id_deposito);
	
			return $respuesta;	
		}

	
	}

#------------------------- IUDM de Insumo -------------------------#

	static public function ctrUdmInsumos(){

		if (isset($_POST["idInsumoAgregarReceta"])){

			$id_insumo=$_POST["idInsumoAgregarReceta"];
			$respuesta= ModeloFormularios::mdlUdmInsumo($id_insumo);
	
			return $respuesta;	
		}
	}


#------------------------- Lista de Recetas -------------------------#

	static public function ctrListaRecetas(){

		$respuesta= ModeloFormularios::mdlListaRecetas();
		
		return $respuesta;
		
	}



#------------------------- Detalle de Receta -------------------------#

	static public function ctrDetalleReceta(){

		if (isset($_GET["idReceta"])){

			$id_receta= $_GET["idReceta"];
			$respuesta= ModeloFormularios::mdlDetalleReceta($id_receta);
		
			return $respuesta;	
		}
	}


#------------------------- Insumos de Receta -------------------------#

	static public function ctrInsumosReceta(){

		if (isset($_GET["idReceta"])){

			$id_receta=$_GET["idReceta"];
			$respuesta= ModeloFormularios::mdlInsumosReceta($id_receta);
	
			return $respuesta;	
		}	
	}

#------------------------- Productos de Receta -------------------------#

	static public function ctrProductosReceta(){

		if (isset($_GET["idReceta"])){

			$id_receta=$_GET["idReceta"];
			$respuesta= ModeloFormularios::mdlproductosReceta($id_receta);
	
			return $respuesta;	
		}	
	}


#------------------------- Desactivar Receta -------------------------#

	static public function ctrDesactivarReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; 
			$respuesta= ModeloFormularios::mdlDesactivarReceta($id_receta);
			return $respuesta;	
		}
	}

#------------------------- Activar Receta -------------------------#

	static public function ctrActivarReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; 
			$respuesta= ModeloFormularios::mdlActivarReceta($id_receta);
			return $respuesta;	
		}	
	}

	#------------------------- Crear Receta -------------------------#

	static public function ctrCrearReceta(){

		if (isset($_POST["nombreCrearReceta"])||
			isset($_POST["diasprodCrearReceta"])||
			isset($_POST["diasvencCrearReceta"])||
			isset($_POST["porcentcarneCrearReceta"])||
			isset($_POST["pesoTotInsumosCrearReceta"])||
			isset($_POST["largouniLoteCrearReceta"])||
			isset($_POST["pesouniLoteCrearReceta"])||
			isset($_POST["unidadesXpastonCrearReceta"])||
			isset($_POST["mermaCrearReceta"])||
			isset($_POST["largoUniEsperadoCrearReceta"])||
			isset($_POST["pesoUniEsperadoCrearReceta"])||
			isset($_POST["uFinalXuCrearReceta"])|| #unidades_final_xunidadDe Lote		
			isset($_POST["descripcionCrearReceta"])||
			isset($_POST["idProductoCrearReceta"])||###NEW
			isset($_POST["unidadesNecesariasCrearReceta"])){ ###NEW

			#COMPLETAR EN LA BD:
					$datos= array(	'nombre_' 				=>$_POST["nombreCrearReceta"],
									'diasProd_' 			=>$_POST["diasprodCrearReceta"],
									'diasVenc_' 			=>$_POST["diasvencCrearReceta"],
									'porcentCarne_'			=>round(($_POST["porcentcarneCrearReceta"]/100),3),
									'pesoTotInsumos_'		=>$_POST["pesoTotInsumosCrearReceta"],
									'largoUniLote_' 		=>$_POST["largouniLoteCrearReceta"],
									'pesoUniLote_' 			=>$_POST["pesouniLoteCrearReceta"],
									'unidadesXpaston_'		=>$_POST["unidadesXpastonCrearReceta"],
									'merma_' 				=>round(($_POST["mermaCrearReceta"]/100),3),
									'largoUniEsperado_' 	=>$_POST["largoUniEsperadoCrearReceta"],
									'pesoUniEsperado_' 		=>round($_POST["pesoUniEsperadoCrearReceta"],3),
									'unidadesFinalXunidad_'	=>$_POST["uFinalXuCrearReceta"],
									'descripcion_' 			=>$_POST["descripcionCrearReceta"]);

				#Agrega la Receta y obtiene el ID de la mism
					$idReceta_nueva=ModeloFormularios::mdlCrearReceta($datos);

				#Crea el Array de insumos por receta
					$longitud=count( $_POST["idinsumoCrearReceta"]);	
					$datos2= array(	'idInsumo_'=> $_POST["idinsumoCrearReceta"],
									'cantidadInsumo_'=> $_POST["cantidadinsumoCrearReceta"],
									'idReceta_'=>array_fill(0,$longitud,$idReceta_nueva));

				#Recorre el Array de insumos agregandolos en la BD
					for ($i=0; $i <$longitud ; $i++) { 
					
						$datos3= array_column($datos2,$i);
						$respuesta=ModeloFormularios::mdlAltaInsumosReceta($datos3);
						
					#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta;}
					} #exit for OK

				#Crea el Array de PRODUCTO por receta
					$longitud2=count( $_POST["idProductoCrearReceta"]);	
					$datos4= array(	'idProducto_'		=> $_POST["idProductoCrearReceta"],
									'idReceta_'			=>array_fill(0,$longitud2,$idReceta_nueva),
									'unidadesNecesarias_'=> $_POST["unidadesNecesariasCrearReceta"]);

				#Recorre el Array de PRODUCTO agregandolos en la BD
					for ($i=0; $i <$longitud2 ; $i++) { 
					
						$datos5= array_column($datos4,$i);
						$respuesta=ModeloFormularios::mdlAltaProductosReceta($datos5);
						
					#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta;}
					} #exit for OK

			$respuesta2 = array('validacion_' => $respuesta,
								'idReceta_' => $idReceta_nueva);
			return $respuesta2;
		}
	}



	#------------------------- Agregar Producto a Receta -------------------------#

	static public function ctrAgregarProductosReceta(){
	
		if (isset($_POST["idProductoCrearReceta"])&&
			isset($_POST["idReceta"])&&
			isset($_POST["unidadesNecesariasCrearReceta"])){

				#Crea el Array de PRODUCTO por receta
					$longitud2=count( $_POST["idProductoCrearReceta"]);	
					$datos4= array(	'idProducto_'		=> $_POST["idProductoCrearReceta"],
									'idReceta_'			=>array_fill(0,$longitud2,$_POST["idReceta"]),
									'unidadesNecesarias_'=> $_POST["unidadesNecesariasCrearReceta"]);

					$respuesta=ModeloFormularios::mdlEliminarProductosReceta($_POST["idReceta"]);

				#Recorre el Array de PRODUCTO agregandolos en la BD
					for ($i=0; $i <$longitud2 ; $i++) { 
					
						$datos5= array_column($datos4,$i);
						$respuesta=ModeloFormularios::mdlAltaProductosReceta($datos5);
						
					#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta;}
					} #exit for OK

			return $respuesta;
		}
	}	

	#------------------------- Lista de carnes -------------------------#

	static public function ctrListaCarnes(){
	
		$respuesta= ModeloFormularios::mdlListaCarnes();
		return $respuesta;
	}	
	
	#------------------------- Stock de Carnes -------------------------#

	static public function ctrStockCarnes(){

		$respuesta= ModeloFormularios::mdlStockCarnes();
		return $respuesta;
		
	}

#------------------------- Stock de Carnes -------------------------#

	static public function ctrComposicionStockCarnes(){

		if (isset($_GET["idCarneVerComposicion"])){

			$id_carne=$_GET["idCarneVerComposicion"];
			$respuesta= ModeloFormularios::mdlComposicionStockCarnes($id_carne);
			
			return $respuesta;
		}		
	}


#------------------------- IMPRIMIR STOCK DE CARNES -------------------------#

	static public function ctrImprimirStockCarnes(){

		$tablaCompleta=ModeloFormularios::mdlComposicionStockCarnes2();

		$tabla=array();
			#/*
			foreach ($tablaCompleta as $registro) { #navega los registros
					
				$carne= $registro['carne'];
				#$encontrado=array_search($carne, $tabla,true);
			
				if (array_search($carne, $tabla)=== false) {
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


		return $tabla; 					
	}



#------------------------- Agregar Carne -------------------------#

	static public function ctrAgregarCarne(){
		
				
		if (isset($_POST["nombreAgregarCarne"])||
			isset($_POST["idUdmCarne"]))
		{
				$datos= array(	'nombre_' 		=> $_POST["nombreAgregarCarne"],
								'udm_' 			=> $_POST["udmAgregarCarne"],
								'vencimiento1_' => $_POST["vencimiento1"],
								'vencimiento2_' => $_POST["vencimiento2"]);


			$respuesta=ModeloFormularios::mdlAgregarCarne($datos);
			return $respuesta;
		}

	}
	
	#------------------------- Lista de DESPOSTE -------------------------#

	static public function ctrListaDesposte(){
	
		#if (isset($_POST["CantidadFilasDespostes"])){

			$cantidadFilas=100; #[TO DO] PAGINACION

			$respuesta= ModeloFormularios::mdlListaDesposte($cantidadFilas);
			return $respuesta;

		#}	
	}	

	#------------------------- Lista de DESPOSTE -------------------------#

	static public function ctrDetalleDesposte(){
	
		if (isset($_GET["idDesposteVerDetalles"])){

			$id_desposte=$_GET["idDesposteVerDetalles"];

			$respuesta= ModeloFormularios::mdlDetalleDesposte($id_desposte);

			return $respuesta;
		}	
	}
	

	#------------------------- Carnes de DESPOSTE -------------------------#

	static public function ctrCarnesDesposte(){
	
		if (isset($_GET["idDesposteVerDetalles"])){

			$id_desposte=$_GET["idDesposteVerDetalles"];

			$respuesta= ModeloFormularios::mdlCarnesDesposte($id_desposte);
	
			return $respuesta;
		}	
	}


	#------------------------- Registrar un nuevo DESPOSTE -------------------------#

	static public function ctrCrearDesposte(){

		if (isset($_POST["nroRemitoAltaDesposte"])||
			isset($_POST["proveedorAltaDesposte"])||
			isset($_POST["unidadesAltaDesposte"])||
			isset($_POST["pesoTotalAltaDesposte"])||
			isset($_POST["mermaInicialAltaDesposte"])|| #NEW
			isset($_POST["fechaDesposteAltaDesposte"])) {

			#validar que la Q de Carnes este OK
			
				#COMPLETAR LA BD
				$datos= array(	'nroRemito_' 		=> $_POST["nroRemitoAltaDesposte"],
								'proveedor_' 		=> $_POST["proveedorAltaDesposte"],
								'unidades_' 		=> $_POST["unidadesAltaDesposte"],
								'pesoTotal_' 		=> $_POST["pesoTotalAltaDesposte"],
								'mermaInicial_' 	=> ($_POST["mermaInicialAltaDesposte"]/100),
								'fechaDesposte_' 	=> strval(date("y-m-d",strtotime($_POST["fechaDesposteAltaDesposte"]))),
								'usuarioAlta_'	 	=> $_SESSION['userId'],
								'descripcion_' 		=> $_POST["descripcionAltaDesposte"]);

				#Introduce el registro en la BD y recupera el ID
				$idDesposte_nuevo=ModeloFormularios::mdlCrearDesposte($datos); 

				#Crea el Array para realizar los movimiento de Carnes
				$longitud=count($_POST["idCarneAltaDesposte"]);
				
				$datos2= array(	'idCarne_'		=> $_POST["idCarneAltaDesposte"],
								'idCuenta_'		=> array_fill(0,$longitud,1), #VariableFIJA!
								'idDesposte_'	=> array_fill(0,$longitud,$idDesposte_nuevo),
								'cantidad_'		=> $_POST["cantidadAltaDesposte"],
								'idOrenProd_'	=> array_fill(0,$longitud,null),
								'idDecomiso_'	=> array_fill(0,$longitud,null),
								'idUsuario_'	=> array_fill(0,$longitud,$_SESSION['userId']),
								'descripcion_'	=> array_fill(0,$longitud,null),
								'funcion_'		=> array_fill(0,$longitud,'Desposte'));

				#Recorre el Array de insumos agregandolos en la BD
				for ($i=0; $i <$longitud ; $i++) { 
					
				
					if ($datos2['cantidad_'][$i]>0) {
						$datos3= array_column($datos2,$i);
						$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
						
						#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta2;}
					}
				} #exit for

		$respuesta2 = array('validacion_' => $respuesta,
							'idDesposte_' => $idDesposte_nuevo);
		return $respuesta2;
		}
	}

	#------------------------- Movimientos de Carne -------------------------#

	static public function ctrMovCarne(){

		if (isset($_POST["idCarneMovimientoCarne"])||
			isset($_POST["idCuentaMovimientoCarne"])||
			isset($_POST["idDesposteMovimientoCarne"])||
			isset($_POST["cantidadMovimientoCarne"])) {

			#Crear el Array con todos los datos que se necesitarán
			$longitud=1;
			$datos2= array(	'idCarne_'		=> [$_POST["idCarneMovimientoCarne"]],
							'idCuenta_'		=> [$_POST["idCuentaMovimientoCarne"]], #VariableFIJA!
							'idDesposte_'	=> [$_POST["idDesposteMovimientoCarne"]],
							'cantidad_'		=> [$_POST["cantidadMovimientoCarne"]],
							'idOrenProd_'	=> array_fill(0,$longitud,null),
							'idDecomiso_'	=> array_fill(0,$longitud,null),
							'idUsuario_'	=> array_fill(0,$longitud,$_SESSION['userId']),
							'descripcion_'	=> [$_POST["descripcionMovimientoCarne"]],
							'funcion_'	=> array_fill(0,$longitud,"ActualizarCarne"));
				
			$datos3 = array_column($datos2,0);
			
			#Validar que exista el stock suficiente para realizar el movimiento
			$respuesta1=ModeloFormularios::mdlValidacionMovCarne($datos3);
		
			$stockActual=$respuesta1[0]['stock'];

				if ($stockActual>=$_POST["cantidadMovimientoCarne"]) {
					#$respuesta='OK';
					$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
				}else{
					$respuesta='Stock insuficiente.';
				}
			return $respuesta;

		}
	}


	#-------------PROCEO PARA ANULAR DESPOSTES----------------

	static public function ctrValidacionAnularDesposte(){

			if (isset($_POST["idDesposteVerDetalles"])&&empty($_POST["motivoAnulacionDesposte"])){

			$id_desposte=$_POST["idDesposteVerDetalles"];
			
			#Validar que no exista ninguna OP(no anulada) que consuma las carnes del desposte a anulr
			$respuesta=ModeloFormularios::mdlValidacionAnularDesposte1($id_desposte);
			$longitud=count($respuesta);
			if ($longitud>0) { 
				#En caso de que existan OP cargadas, informará cuales son
				$opAeliminar= array_column($respuesta,1);#Columan de ID_OP
				$cadena= 'Debe anular la op: ';

					for ($i=0; $i <$longitud ; $i++) {
						$cadena=$cadena.$opAeliminar[$i].', ';
					}
				$respuesta= substr($cadena,0,strlen($cadena)-2);
				return $respuesta;					
			}#Exit 1ra validacion
			
			#Validar que la cuenta de carnes del $desposte este en cero. 
			$respuesta2= ModeloFormularios::mdlValidacionAnularDesposte2($id_desposte);
			$longitud2=count($respuesta2);
			if ($longitud2>0) {	
				#En caso de que las cuentas no estén balanceadas le informara que carnes tiene que corregir
				$cadena2= 'Debe corregir el stock de las siguientes carnes: <br>';
					for ($i=0; $i < $longitud2 ; $i++) { 
						$carne= $respuesta2[$i][1];
						$cantidad= $respuesta2[$i][2];
						$cadena2= $cadena2.$carne.' ('.$cantidad.'),<br>';
					}
				$respuesta=substr($cadena2,0,strlen($cadena2)-5);
				return $respuesta;
			}else{
			$respuesta=0;#Exit 2da Validacion
		return $respuesta;
		}	}

			#Si cumple con las dos validaciones pedira que informe porque lo anula
     if (isset($_POST["idDesposteVerDetalles"])&&!empty($_POST["motivoAnulacionDesposte"])){

     			$id_desposte=$_POST["idDesposteVerDetalles"];
				
				#1)Ejecuta un Procedure(act) para anular el desposte.
				#2)Se ejecuta un trigger para realizar el contra-asiente.
				$datos= array(	'idDesposte_'=> $id_desposte,
								'idUsuario_'=>$_SESSION['userId'],
								'motivoAnulacion_'=> $_POST["motivoAnulacionDesposte"]);#[TO DO]
				$respuesta=ModeloFormularios::mdlAnularDesposte($datos);
				return $respuesta;
			}else{
				$respuesta="error al intentar anular"; #[TO DO] #Envía esta variable para que complete el motivo
				return $respuesta; 
			}
	}

#------------------------- Lista de Compras -------------------------#

	static public function ctrListaCompras(){

		$respuesta= ModeloFormularios::mdlListaCompras();
		
		return $respuesta;
		
	}



#------------------------- Detalle de Compra -------------------------#

	static public function ctrDetalleCompra(){

		if (isset($_GET["idCompra"])){

			$id_compra= $_GET["idCompra"];
			$respuesta= ModeloFormularios::mdlDetalleCompra($id_compra);
		
			return $respuesta;	
		}
	}


#------------------------- Detalle de CompraInsmos -------------------------#

	static public function ctrDetalleCompraInsumos(){


		if (isset($_GET["idCompra"])){

			$id_compra= $_GET["idCompra"];
			$respuesta= ModeloFormularios::mdlDetalleCompraInsumos($id_compra);
		
			return $respuesta;	
		}
	
	}

#-------------------------  Validar anulacion de  Compra -------------------------#

static public function ctrValidarAnulacionCompra(){

		if (isset($_POST["idCompraDetalle"])){

			$detalleCompra= ModeloFormularios::mdlDetalleCompra($_POST["idCompraDetalle"]);
			$anulado=$detalleCompra[0]['anulado'];
			if ($anulado==0) {
				$respuesta="OK";
			}else{
				$respuesta="La Compra Mro:".$_POST["idCompraDetalle"]." ya se encuentra anulada";
			}

			return $respuesta;	
		}
	}


#-------------------------  Anular Compra -------------------------#

	static public function ctrAnularCompra(){

		if (isset($_POST["idCompraDetalle"])||
			isset($_POST["motivoAnulacionCompra"])) {

			$validacion=ControladorFormularios::ctrValidarAnulacionCompra();
			if ($validacion="OK") {

				$datos= array(	'idCompra_'=> $_POST["idCompraDetalle"],
								'idUsuario_'=>$_SESSION['userId'], 
								'motivoAnulacion_'=> $_POST["motivoAnulacionCompra"]);
					
				$respuesta=ModeloFormularios::mdlAnularCompra($datos);
			}else{
				$respuesta=$validacion;
			}
			
		return $respuesta;
		}
	}	

	#------------------------- Agregar Compra de INSUMOS -------------------------#

	static public function ctrCompraInsumo(){
	
		if (isset($_POST["idInsumoCompraInsumo"])||
			isset($_POST["cantidadCompraInsumo"])||
			isset($_POST["idProvedorCompraInsumo"])||
			isset($_POST["fechaCompraInsumo"])){

			#Datos de la compra
			$datosC= array(	'idProveedor_'	=> $_POST["idProvedorCompraInsumo"],
							'nroRemito_'	=>$_POST["nroRemitoCompraInsumo"],
							'fechaCompra_'	=> strval(date("y-m-d",strtotime($_POST["fechaCompraInsumo"]))),
							'descripcion_'	=>$_POST["descripcionCompraInsumo"],
							'idUsuario_'	=> $_SESSION['userId']);

			$id_compra_nueva= ModeloFormularios::mdlCompraInsumo($datosC);

			#Datos de los Movimiento de Insumo
			$longitud= count($_POST["idInsumoCompraInsumo"]);

			$datosMI= array('idInsumo_'		=>$_POST["idInsumoCompraInsumo"],
							'cantidad_'		=>$_POST["cantidadCompraInsumo"],
							'idCuenta_'		=>array_fill(0,$longitud,10), #Número fijo para la cuenta compra
							'idOrdenProd_'	=>array_fill(0,$longitud,null),
							'idCompra_'		=>array_fill(0,$longitud,$id_compra_nueva),
							'idUsuario_'	=>array_fill(0,$longitud,$_SESSION['userId']),
							'descripcion_'	=>array_fill(0,$longitud,null),
							'funcion_'		=>array_fill(0,$longitud,'CompraInsumo'));

			#Cargar los Movimientos de Insumo
			for ($i=0; $i < $longitud ; $i++) { 
				$datos=array_column($datosMI,$i);
				
				$respuesta=ModeloFormularios::mdlMovimientoInsumo($datos);
				if ($respuesta != "OK") { return $respuesta;}
			}
			
			$respuesta2 = array('validacion_' => $respuesta,
								'idCompra_' => $id_compra_nueva);
			return $respuesta2;
		}	
	}


# !!!ORDENES DE PRODUCCION !!!#

#------------------------- Calculo de Insumos 	FRONT!-------------------------#

	static public function ctrCalculoInsumos(){

	#Al seleccionar una Receta, e introducir una Q deberia de ejecutarse esta función
		
		if (isset($_POST["idRecetaAltaOP"])&&
			isset($_POST["pesoPastonAltaOP"])){

		$datos= array(	'idRecetaAltaOP_'	=> $_POST["idRecetaAltaOP"],
						'pesoPastonAltaOP_'	=> $_POST["pesoPastonAltaOP"]);
		
		$tablaInsumosOP=ModeloFormularios::mdlListaInsumosOP($datos);
		$respuesta2=ModeloFormularios::mdlValidacionStockInsumosOP($datos);

			#Valida si alcanza el stock actual de insumo
			if (count($respuesta2)>0) {
				$validacion="NO";
			}else{
				$validacion="SI";
			}
		#Transformado la tabla para JSON
		$tablaInsumos=array();
			foreach ($tablaInsumosOP as $insumo) {
				
				$tablaInsumos[]=$insumo;
			}

		$respuesta= array(	'tablaInsumos_'	 => $tablaInsumosOP,
							'validacion_'	 => $validacion);

		#Transformado la tabla para JSON
		$respuestacod=json_encode($respuesta);
		echo $respuestacod;

		#return $respuesta;

		}
	}


#------------------------- Calculo de Insumos 	FRONT!-------------------------#

	static public function ctrCalculoInsumosBack(){

	#Al seleccionar una Receta, e introducir una Q deberia de ejecutarse esta función
		
		if (isset($_POST["idRecetaAltaOP"])&&
			isset($_POST["pesoPastonAltaOP"])){

			$datos= array(	'idRecetaAltaOP_'	=> $_POST["idRecetaAltaOP"],
							'pesoPastonAltaOP_'	=>$_POST["pesoPastonAltaOP"]);
			
			$tablaInsumosOP=ModeloFormularios::mdlListaInsumosOP($datos);
			$respuesta2=ModeloFormularios::mdlValidacionStockInsumosOP($datos);

				#Valida si alcanza el stock actual de insumo
				if (count($respuesta2)>0) {
					$validacion="NO";
				}else{
					$validacion="SI";
				}
			
			$respuesta= array(	'tablaInsumos_'	 => $tablaInsumosOP,
								'validacion_'	 => $validacion);

		return $respuesta;
		}
	}

#------------------------- Calculo de Insumos Productos-------------------------#

	static public function ctrCalculoInsumosProductos(){

		if (isset($_POST["array_ProductoAltaOP"])&&
			isset($_POST["array_QProductoAltaOP"])){

			$array_Producto=$_POST["array_ProductoAltaOP"];
			$array_QProducto=$_POST["array_QProductoAltaOP"];


			$longitud=count($array_Producto);

			for ($i=0; $i < $longitud ; $i++) { 
				
				#Buscar los insumos correspondiente a la tabla
				$idProducto=$array_Producto[$i];
				$qProducto=$array_QProducto[$i];


				$datos = array(	'idProducto_'	=> $idProducto,
								'qProducto_' 	=> $qProducto);

				$insXProd=ModeloFormularios::mdlListaInsumosOPProductos($datos);	
				$validacion1=ModeloFormularios::mdlValidacionInsumosOPProductos($datos);

				#Cuanta la cantidad de registros que la diferencia es negativa
				$validacion2=count($validacion1);
				if ($validacion2>0) {
					$validacion3="NO";
				}

				#Si es el primer registro no hace el Merge
				if ($i==0) {
					$tablaInsumosOP=$insXProd;
				}else{
					$tablaInsumosOP=array_merge($tablaInsumosOP,$insXProd);
				}
			}#Termina el for
			
			#Si la variable validacion 3 no esta declarada le asigna un "si"
			if (isset($validacion3)==false) {$validacion3="SI";}

				$respuesta= array(	'tablaInsumos_'	 => $tablaInsumosOP,
									'validacion_'	 => $validacion3);
			return $respuesta;
		}
	}

	#--------------Nro Lote de Producccion------------------------

	static public function ctrNroLoteProd(){

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

		$respuesta = array(	'creado_' => $creado, #OK / NO
							'nroLote_' => $nroLote); #nro lote

		return $respuesta;

	}
	

	#------------------------- Agregar OP -------------------------#

	static public function ctrAgregarOP(){

		
		if (isset($_POST["nroLoteAltaOP"])&& #NEW
			isset($_POST["idRecetaAltaOP"])&&
			isset($_POST["pesoPastonAltaOP"])&&
			isset($_POST["qUniFrescasAltaOP"])&& 
				#Cantidad de Unidades Frescas= [Peso_Paston * cantidad_unidad_lote(TablaReceta_n)]/100 #REDONDEAR CON CERO DECIMALES
				#$detalleReceta= ModeloFormularios::ctrDetalleReceta();
				#$qUniLote=$detalleReceta[0]['cantidad_unidades_lote'];
			isset($_POST["idCarnesAgregarOP"])&&
			isset($_POST["catidadCarnesAgregarOP"])&&
			isset($_POST["array_ProductoAltaOP"])&&
			isset($_POST["array_QProductoAltaOP"])){



			$carnesOP = array(	'idCarnes' =>$_POST["idCarnesAgregarOP"] ,
								'cantidad' =>$_POST["catidadCarnesAgregarOP"]);


			#1)Validación de Insumos
			$calculo_Insumos=ControladorFormularios::ctrCalculoInsumosBack();
			$validacion_Insumos=$calculo_Insumos['validacion_'];

				if ($validacion_Insumos=="SI") {

				#1B)Validacion de insumos para los produtos
					$calculo_Insumos_productos=ControladorFormularios::ctrCalculoInsumosProductos();
					$Validacion_insumos_productos=$calculo_Insumos_productos['validacion_'];
					
					if ($Validacion_insumos_productos=="SI") {

					#2)Validacion de Carnes
						$validacion_Carnes= ControladorFormularios::ctrValidarStockCarnesOP($carnesOP);
						if ($validacion_Carnes=='OK') {
						
						#3)Validación Peso de paston=Peso total de carnes(Esta validación no se hace ya que se realizó desde la vista)

						#Si el Nuro de lote no existe lo crea
						$datosUltimoLote=ModeloFormularios::mdlNroLoteProd();
						$ultimoNroLote=$fechaDatos=$datosUltimoLote[0]['nro_lote'];

						if ($_POST["nroLoteAltaOP"]>$ultimoNroLote) {
							$nroLote=ModeloFormularios::mdlCrearNroLoteProd();

						}
								
								#Crear Alta de OP
								$datosOP = array(	'nroLote_' 		=> $_POST["nroLoteAltaOP"],
													'idReceta_' 	=> $_POST["idRecetaAltaOP"],
													'pesoPaston_' 	=> $_POST["pesoPastonAltaOP"],
													'qUniFrescas_' 	=> $_POST["qUniFrescasAltaOP"], 
													'idUsuario_' 	=> $_SESSION['userId'] ); 

								$idOrdenProd=ModeloFormularios::mdlAltaOP($datosOP);

								#4)Movimiento de Insumos
									$respuesta=ControladorFormularios::ctrMovInsumoAltaOP($calculo_Insumos,$idOrdenProd);
									if ($respuesta != "OK") { return $respuesta;}
								#4b)Movimiento de insumos 
									$respuesta=ControladorFormularios::ctrMovInsumoAltaOP($calculo_Insumos,$idOrdenProd);
									if ($respuesta != "OK") { return $respuesta;}

								#5)Movimiento de Carne
									$respuesta=ControladorFormularios::ctrMovCarneAltaOP($carnesOP,$idOrdenProd);
									if ($respuesta != "OK") { return $respuesta;}
								#6)Producto esperados

									#Crea el Array de Producto
										$longitud=count( $_POST["array_ProductoAltaOP"]);	
										$datos2= array(	'idOrdenAlta_'	=>array_fill(0,$longitud,$idOrdenProd),
														'idOrdenBaja_'	=>array_fill(0,$longitud,null),
														'idProducto_'	=>$_POST["array_ProductoAltaOP"],
														'cantidad_'		=>$_POST["array_QProductoAltaOP"]);

									#Recorre el Array de INSUMOS agregandolos en la BD
										for ($i=0; $i <$longitud ; $i++) { 
										
											$datos3= array_column($datos2,$i);
											$respuesta=ModeloFormularios::mdlAgregarProductoOP($datos3);
											
										#Si no dio error sigue el loop
											if ($respuesta != "OK") { return $respuesta;}
										} #exit for OK
						}else{
							$respuesta=$validacion_Carnes;
						}
				
					}else{$respuesta="Stock de Insumos insuficientes para los productos";}					
				}else{$respuesta="Stock de Insumos insuficientes";}#cierre de la validación de insumos
			

			$respuesta2 = array('validacion_' => $respuesta,
								'idOrdenProd_' => $idOrdenProd);

			$respuestaOrden=json_encode($respuesta2);
   			 echo $respuestaOrden;

			#return $respuesta2;
		}		
	}

 #---------------------------------------------------------------------

	static public function ctrValidarStockCarnesOP($carnesOP){


		$longitud=count($carnesOP['idCarnes']);
		$cadena=null;
			for ($i=0; $i <$longitud ; $i++) { 
				
				$respuestaVC=ModeloFormularios::mdlValidacionStockCarnes($carnesOP['idCarnes'][$i]);
				
				#Valida si hay stock de carnes
				if ($respuestaVC[0]['Stock']<$carnesOP['cantidad'][$i]) {
					$cadena=$cadena.$respuestaVC[0]['nombre'].", ";
				}
			}
			#Si Cadena tiene datos envía el mensaje
			if (strlen($cadena)== null) {
				$respuesta="OK";
			}else{
				$respuesta= "Stock insuficiente de las siguientes carnes: ".substr($cadena,0,strlen($cadena)-2).".";}
	return $respuesta;

	}

#-------------------MOVIMIENTO DE INSUMO PARA ALTA DE OP---------------------

	static public function ctrMovInsumoAltaOP($calculo_Insumos,$idOrdenProd){

		$tablaInsumos_receta=$calculo_Insumos['tablaInsumos_'];#del array solo me quedo con la tabla de insumos
		$longitud=count($tablaInsumos_receta);#cuento los registros
		
			#Armo el array
			$datosMI= array('idInsumo_'		=>array_column($tablaInsumos_receta, 'id_insumo'),
							'cantidad_'		=>array_column($tablaInsumos_receta, 'cantidad_op'),
							'idCuenta_'		=>array_fill(0,$longitud,2), #Número fijo para la cuenta compra
							'idOrdenProd_'	=>array_fill(0,$longitud,$idOrdenProd),
							'idCompra_'		=>array_fill(0,$longitud,null),
							'idUsuario_'	=>array_fill(0,$longitud,$_SESSION['userId']),
							'descripcion_'	=>array_fill(0,$longitud,null),
							'funcion_'		=>array_fill(0,$longitud,'OrdenProd'));
		#Recorro el Array 
		for ($i=0; $i <$longitud ; $i++) { 
			# Inserto insumo por insumo
			$datos=array_column($datosMI,$i);
			$respuesta=ModeloFormularios::mdlMovimientoInsumo($datos);

			if ($respuesta != "OK") { return $respuesta;}
		}

	return "OK";
	}


#---------------MOVIMIENTO DE CARNE PARA ALTA DE OP-----------------

	static public function ctrMovCarneAltaOP($carnesOP,$idOrdenProd){

		$longitud=count($carnesOP['idCarnes']);
		#Con este for navego las carnes que componene a la op
		for ($z=0; $z <$longitud ; $z++) { 
		
			$stockCarnes_composicion=ModeloFormularios::mdlComposicionStockCarnes($carnesOP['idCarnes'][$z]);

			$resta=$carnesOP['cantidad'][$z];
			
			if ($resta>0) {
				$i=0;
				#Navego los desposte para descontarle la carne
				while ( $resta != 0) {

					#IF el stock de ese desposte en menor a lo que resta, descuento toda la carne de ese desposte, ELSE solo lo que resta
					if ($resta>$stockCarnes_composicion[$i]['stock']) {
						$cantidad=$stockCarnes_composicion[$i]['stock'];
					}else{
						$cantidad=$resta;
					}
						#Armo el array
						$datosMC= array(	'idCarne_'		=> [$stockCarnes_composicion[$i]['id_carne']],
											'idCuenta_'		=> [2], #VariableFIJA!
											'idDesposte_'	=> [$stockCarnes_composicion[$i]['id_desposte']],
											'cantidad_'		=> [$cantidad],
											'idOrenProd_'	=> [$idOrdenProd],
											'idDecomiso_'	=> [null],
											'idUsuario_'	=> [$_SESSION['userId']],
											'descripcion_'	=> [null],
											'funcion_'		=> ['OrdenProd']);

						#Agregar el registro en la BD
						$respuesta=ModeloFormularios::mdlMovimientoCarne(array_column($datosMC,0));
						if ($respuesta != "OK") { return $respuesta;}

					#A lo que falta repartir le resto la cantidad del desposte anterior
					$resta=$resta-$cantidad;
					$i++;#siguiente desposte

				}#cierra el while de despostes
			}#Cierra el if
		}#cierra el for de carnes

	return "OK";
	}#Cierra la funcion

#------------------------- Lista Orden de produccion -------------------------#

	static public function ctrListaOP(){
		$respuesta= ModeloFormularios::mdlListaOP();
		return $respuesta;
	}	

#------------------------- Detallede Orden De Produccion -------------------------#

	static public function ctrDetalleOP(){

		if (isset($_GET["idOrdenProdDetalle"])){

			$id_OrdenProd=$_GET["idOrdenProdDetalle"];
			$detalleAltaOP= ModeloFormularios::mdlDetalleOpAlta($id_OrdenProd);
			$detalleFinOP=ModeloFormularios::mdlDetalleOpFin($id_OrdenProd);
			$detalleInsumosOP=ModeloFormularios::mdlDetalleOpInsumos($id_OrdenProd);
			$detalleCarnesOP=ModeloFormularios::mdlDetalleOpCarnes($id_OrdenProd);
			$detalleMediciones=ModeloFormularios::mdlDetalleOpMediciones($id_OrdenProd);
			$productosOP=ModeloFormularios::mdlDetalleOPProductos($id_OrdenProd);

			$id_Receta=$detalleAltaOP[0]['id_receta'];

			$detalleReceta=ModeloFormularios::mdlDetalleReceta($id_Receta);

			$respuesta = array(	'detalleAltaOP_' 		=> $detalleAltaOP,
								'detalleFinOP_' 		=> $detalleFinOP,
								'detalleInsumosOP_' 	=> $detalleInsumosOP,
								'detalleCarnesOP_' 		=> $detalleCarnesOP,
								'detalleMedicionesesOP_'=> $detalleMediciones,
								'detalleReceta_'		=> $detalleReceta,
								'productos_'			=> $productosOP);
	
			return $respuesta;	
		}	
	}

#------------------------- Finalizar Orden de produccion -------------------------#

	static public function ctrFinalizarOP(){
				
		if (isset($_POST["idOrdenProdAlta_FinOP"])||
			isset($_POST["unidadesFrescas_FinOP"])||#NEW
			isset($_POST["pesoFresco_FinOP"])||#NEW
			isset($_POST["productoObtenido_FinOp"])||
			isset($_POST["unidades_FinOP"])||
			isset($_POST["MedicionesSort_FinOP"])||#NEW
			isset($_POST["MedicionesPeso_FinOP"])||
			isset($_POST["MedicionesMerma_FinOP"])||#NEW
			isset($_POST["MedicionesResponsable_FinOP"])||
			isset($_POST["MedicionesFechaMedicion_FinOP"])){
			#$_POST["descripcion_FinOP"]

		#1)valida que la OP Alta no esté anulada
			$detalleAltaOP=ModeloFormularios::mdlDetalleOpAlta($_POST["idOrdenProdAlta_FinOP"]);
			$opAnulada=$detalleAltaOP[0]['anulado'];
			if ($opAnulada==0) {
				
			#2)valida que ya nose encuentre una finalización de OP que no esté anulada
				$detalleFinOP=ModeloFormularios::mdlDetalleOpFin($_POST["idOrdenProdAlta_FinOP"]);
				$longitud=count($detalleFinOP);
				if ($longitud==0) {

				#3)Insertar los campos en la finalización de OP
					$datosOP= array('idOrdenProdAlta_'	=> $_POST["idOrdenProdAlta_FinOP"],
									'unidadesFrescas_'	=> $_POST["unidadesFrescas_FinOP"],
									'pesoFresco_'		=> $_POST["pesoFresco_FinOP"],
									'productoObtenido_'	=> $_POST["productoObtenido_FinOp"],
									'unidadesObtenidas_'=> $_POST["unidades_FinOP"],
									'descripcion_'		=> $_POST["descripcion_FinOP"],
									'idUsuarioAlta_'	=> $_SESSION['userId']); 

						$id_ordenprod_fin=ModeloFormularios::mdlFinOP($datosOP);

				#4)insertar Datos de Mediciones
					$longitud=count($_POST["MedicionesPeso_FinOP"]);
						
						#Formatear Array de Fechas
						$fechasMediciones=array();
						foreach ($_POST["MedicionesFechaMedicion_FinOP"] as $fecha) {
							if ($fecha>0) {
								$fechasMediciones[]=strval(date("y-m-d",strtotime($fecha)));
							}
						}

					$datosMediciones=array(
							'idOrdenProdFin_'			=> array_fill(0,$longitud,$id_ordenprod_fin),
							'MedicionesSort_'			=> $_POST["MedicionesSort_FinOP"],
							'MedicionesPeso_'			=> $_POST["MedicionesPeso_FinOP"],
							'MedicionesMerma_'			=> $_POST["MedicionesMerma_FinOP"],
							'MedicionesResponsable_'	=> $_POST["MedicionesResponsable_FinOP"],
							'MedicionesFechaMedicion_'	=> $fechasMediciones);

					for ($i=0; $i <$longitud ; $i++) {

						$datosM=array_column($datosMediciones,$i);
						$respuesta=ModeloFormularios::mdlAgregarMedicionFinOP($datosM);
						if ($respuesta != "OK") { return $respuesta;}
					}

				#5)Producto obtenidos reales

					#Crea el Array de Productos
					$longitud=count( $_POST["idProductosFinalizarOP"]);	
					$datos2= array(	'idOrdenAlta_'	=>array_fill(0,$longitud,null),
									'idOrdenBaja_'	=>array_fill(0,$longitud,$id_ordenprod_fin),
									'idProducto_'	=>$_POST["idProductosFinalizarOP"],
									'cantidad_'		=>$_POST["CantidadProdFinalizarOP"]);

					#Recorre el Array de PRODUCTOS agregandolos en la BD
					for ($i=0; $i <$longitud ; $i++) { 
					
						$datos3= array_column($datos2,$i);
						$respuesta=ModeloFormularios::mdlAgregarProductoOP($datos3);
						
					#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta;}
					} #exit for OK

					#Ajustar los insumos por la 
					$respuesta2=ControladorFormularios::ctrFinOPAjusteInsumoProductos($id_OrdenProd);
					if ($respuesta2 =="OK") {
						$respuesta="OK";
					}else{
						$respuesta="Error en el ajuste de insumo. Comunicare con soporte";
					}

				}else{
					$respuesta="La OP ".$_POST["idOrdenProdAlta_FinOP"]." ya está finalizada.";	
				}

			}else{
				$respuesta="La OP ".$_POST["idOrdenProdAlta_FinOP"]." se encuetra anulada.";
			}

		return $respuesta;
		}
	}



#------------------------- ANULAR Orden de produccion -------------------------#

	static public function ctrAnularOP(){
				
		if (isset($_POST["idOrdenProd_AnularOP"])&&
			isset($_POST["motivo_AnularOP"])){

			#Validar que no tenga una FIN OP asociada
			$detalleOP= ModeloFormularios::mdlDetalleOpFin($_POST["idOrdenProd_AnularOP"]);
			if (empty($detalleOP)) {
				#Validar que tenga un motivo
				if (isset($_POST["motivo_AnularOP"])) {	

					$datos = array(	'idOrdenProd_' 	=>$_POST["idOrdenProd_AnularOP"],
					 				'idUsuario_' 	=>$_SESSION['userId'],
					 				'motivo_' 		=>$_POST["motivo_AnularOP"]);

				$respuesta=ModeloFormularios::mdlAnularOP($datos);
					/*--- Al actualizar el campo anulado a 1, se disparan los trigger para 
					realizar el contrasiento de Insumos y Carnes  ---*/
				}else{
					$respuesta="ingrese el motivo de la anulación";
				}
			}else{
				$respuesta="Primero debe anular la finalización de la orden";
			}		
		return $respuesta;
		}
	}

#------------------------- Fin OP Ajuste insumos-------------------------#

	static public function ctrFinOPAjusteInsumoProductos($id_OrdenProd){

	#1)tomar el valor de la id_orden_alta
	#$id_OrdenProd=1;
#2)Ir a buscar a la vista "v_productos_op_1_esperado" el ajuste de stock 
	$productosTabla=ModeloFormularios::mdlDiferenciaOPProductos($id_OrdenProd);	
#3)genero un array al cual debero recorrer
	$longitud=count($productosTabla);
#4)recorrer el array con la lista de producto
	for ($i=0; $i <$longitud ; $i++) { 
		#Si el ejuste es != a 0, caso contrario no tiene sentido
		if ($productosTabla[$i]['ajuste'] !== 0){
			#5)Armar el array para ajustar los insumos por el producto
			$datos1 = array('ajuste_' 		=>$productosTabla[$i]['ajuste'],
							'idUsuario_'	=>$_SESSION['userId'],
							'idOrdenFin_'	=>$productosTabla[$i]['id_orden_fin'],
							'idProducto_'	=>$productosTabla[$i]['id_producto']);
			#6)EL siguiente procedure busca los insumos de los products y hace el ajsute que sea necesario.
			$ajusteProducto=ModeloFormularios::mdlDiferenciaOPProductos($datos1);
			if ($ajusteProducto!="OK") {return $respuesta;}
		}
	}
return $respuesta;
/*
IMPORTANTE:
-Modificar la vista InsumosXop, debe incluir el ajuste de la op finalizada
-Al anular la finalización de OP debe hacerse el contraasiente de movimiento de insumos del ajuste de los productos.
*/



	}


#------------------------- ANULAR Finalizacion Orden de produccion -------------------------#

	static public function ctrAnularFinOP(){
				
		if (isset($_POST["idOrdenProd_AnularOP"])&&
			isset($_POST["motivo_AnularFinOP"])){

			$datos = array(	'idOrdenProdFin_' 	=>$_POST["idOrdenProd_AnularOP"],
							'idUsuario_' 		=>$_SESSION['userId'],
							'motivo_' 			=>$_POST["motivo_AnularFinOP"] );

			$respuesta=ModeloFormularios::mdlAnularFinOP($datos);

			return $respuesta;

		}
	}
#DECOMISO

#----------- Mostrar lista de Carnes a Decomisar -----------#

	static public function ctrListaCarnesDecomisar(){		

		#Mostrar todas las carnes que esten a X dias del vencimiento
		$respuesta=ModeloFormularios::mdlListaCarnesDecomisar();
		return $respuesta;
	}

#----------- Alerta Carnes A Decomisar

	static public function ctrAlertaDecomisos(){		

		$carnesADecomisar=ControladorFormularios::ctrListaCarnesDecomisar();
		$contarCarnes=count($carnesADecomisar);

		if ($contarCarnes>0) {
			$alerta='SI';

			$respuesta = array(	'alerta_' 	=> $alerta,
								'cantidad_'	=> $contarCarnes);
			return $respuesta;
		}
	}

#----------- Ultimo Decomiso -----------#

	static public function ctrIdUltimosIdDecomiso(){		

		$UltimoIdDecomiso=ModeloFormularios::mdlUltimoDecomiso();
		$UltimoIdOrdenProd=ModeloFormularios::mdlUltimaOrdenProd();
		
		$respuesta = array(	'UltimoIdDecomiso_' => $UltimoIdDecomiso,
							'UltimoIdOrdenProd_'=> $UltimoIdOrdenProd);
		return $respuesta;
	}


#------------------------- ANULAR Orden de produccion -------------------------#

	static public function ctrCrearDecomiso(){
				
		if (isset($_POST["ultimoIdDecomisCrearDecomiso"])||
			isset($_POST["ultimoIdOrdenProdCrearDecomiso"])||
			isset($_POST["destinoCrearDecomiso"])||
			isset($_POST["fechaDecomisoCrearDecomiso"])||
			isset($_POST["descripcionCrearDecomiso"])||
			isset($_POST["arrayIdDesposteCrearDecomiso"])||
			isset($_POST["arrayIdCarneCrearDecomiso"])||
			isset($_POST["arrayCantDecomisarCrearDecomiso"])||
			isset($_POST["arrayCantPostergarCrearDecomiso"])){
		
				#Validar que no se haya creado ningún Decomiso
				$ultimoIdDecomiso=ModeloFormularios::mdlUltimoDecomiso();
				$UltimoIdOrdenProd=ModeloFormularios::mdlUltimaOrdenProd();
				
				if ($ultimoIdDecomiso[0][0]==$_POST["ultimoIdDecomisCrearDecomiso"]&&
					$UltimoIdOrdenProd[0][0]==$_POST["ultimoIdOrdenProdCrearDecomiso"]) {
					
					#Crear registro de Decomiso
					$datos1 = array('destino_' 			=> $_POST["destinoCrearDecomiso"],
									'fecha_decomiso_' 	=> strval(date("y-m-d",strtotime($_POST["fechaDecomisoCrearDecomiso"]))),
									'descripcion_' 		=> $_POST["descripcionCrearDecomiso"],
									'id_usuario_' 		=> $_SESSION['userId']);


					$idDecomiso=ModeloFormularios::mdlCrearDecomiso($datos1);					

					#Crear Movimientos de Decomisos
					$array_IdDesposte=$_POST["arrayIdDesposteCrearDecomiso"];
					$array_IdCarne=$_POST["arrayIdCarneCrearDecomiso"];
					$array_Qdecomisar=$_POST["arrayCantDecomisarCrearDecomiso"];
					$array_Qpostergar=$_POST["arrayCantPostergarCrearDecomiso"];

					$longitud=count($array_IdDesposte);

						for ($i=0; $i <$longitud ; $i++) { 
							
							#Si tiene Carne a Decomisar
							if (isset($array_Qdecomisar[$i])&&
								$array_Qdecomisar[$i]>0) {		
							#CrearArray
								$datos3[0]=$idDecomiso;
								$datos3[1]=$array_IdDesposte[$i];
								$datos3[2]=$array_IdCarne[$i];
								$datos3[3]=$array_Qdecomisar[$i];
								$datos3[4]=13;#Cuenta Decomiso
								$datos3[5]=$_SESSION['userId'];
								#Cargarlo en la BD
								$respuesta=ModeloFormularios::mdlAgregarMovimientoDecomiso($datos3);
							} 
							#Si tiene Carne para postergar Decomiso
							if (isset($array_Qpostergar[$i])&&
								$array_Qpostergar[$i]>0) {
								#CrearArray
								$datos3[0]=$idDecomiso;
								$datos3[1]=$array_IdDesposte[$i];
								$datos3[2]=$array_IdCarne[$i];
								$datos3[3]=$array_Qpostergar[$i];
								$datos3[4]=15;#Postergar Decomiso
								$datos3[5]=$_SESSION['userId'];	
								#Cargarlo en la BD
								$respuesta=ModeloFormularios::mdlAgregarMovimientoDecomiso($datos3);
							}
						}#Exit FOR
				}else{
					$respuesta="Otro usuario ya ah creado un decomiso";
					$idDecomiso=$ultimoIdDecomiso[0][0];
				}

			#Respuesta que se enviará 1) OK o mensaje de error 2)Id del decomiso (que se creo por detras/el nuevo creado)
			$respuesta2 = array('estado_' 		=> $respuesta,
								'idDecomiso_'	=> $idDecomiso );
			return $respuesta2; 		
		}
	}


	#----------- Anular Decomiso -----------#

	static public function ctrAnularDecomiso(){		

		if (isset($_POST["IdDecomisoAnularDecomiso"])&&
			isset($_POST["MotivoAnularDecomiso"])){

			$datos = array(	'idDecomiso_'		=> $_POST["IdDecomisoAnularDecomiso"],
							'idUsuario_'		=> $_SESSION['userId'],
							'motivoAnulacion_'	=> $_POST["MotivoAnularDecomiso"]);


			$respuesta=ModeloFormularios::mdlAnularDecomiso($datos);
			return $respuesta; #Retorna un OK
		}
	}

#------------------------- Lista de Decomisos -------------------------#

	static public function ctrListaDecomisos(){

		$respuesta= ModeloFormularios::mdlListaDecomisos();
		
		return $respuesta;	
	}

#------------------------- Detalle de Decomiso -------------------------#

	static public function ctrDetalleDecomisos(){

		if (isset($_GET["idDecomiso"])){

			$idDecomiso= $_GET["idDecomiso"];
			$registro= ModeloFormularios::mdlDetalleDecomisosReg($idDecomiso);
			$carnes= ModeloFormularios::mdlDetalleDecomisosCarnes($idDecomiso);
		
			$respuesta = array(	'registros_' => $registro,
								'carnes_' => $carnes);
			return $respuesta;	
		}
	}

#------------------------- Stock de Productos -------------------------#

	static public function ctrStockProductos(){

		$respuesta= ModeloFormularios::mdlStockProductos();
		return $respuesta;
		
	}


#------------------------- Agregar Producto -------------------------#

	static public function ctrAgregarProducto(){
				
		if (isset($_POST["codigoAgregarProducto"])||
			isset($_POST["nombreAgregarProducto"])||
			isset($_POST["descripcionAgregarProducto"])||
			isset($_POST["insumosAgregarProducto"])||
			isset($_POST["cantidadAgregarProducto"])){


				$datos= array(	'codigo_' => $_POST["codigoAgregarProducto"],
								'nombre_' => $_POST["nombreAgregarProducto"],
								'descripcion_' => $_POST["descripcionAgregarProducto"]);


			$idPruductoNuevo=ModeloFormularios::mdlAgregarProducto($datos);


			#Crea el Array de INSUMO por Producto
					$longitud=count( $_POST["insumosAgregarProducto"]);	
					$datos2= array(	'idProducto_'	=>array_fill(0,$longitud,$idPruductoNuevo),
									'idInsumo_'		=>$_POST["insumosAgregarProducto"],
									'cantidad_'		=>$_POST["cantidadAgregarProducto"]);

				#Recorre el Array de INSUMOS agregandolos en la BD
					for ($i=0; $i <$longitud ; $i++) { 
					
						$datos3= array_column($datos2,$i);
						$respuesta=ModeloFormularios::mdlAltaProductoInsumos($datos3);
						
					#Si no dio error sigue el loop
						if ($respuesta != "OK") { return $respuesta;}
					} #exit for OK

			$respuesta2 = array('validacion_' => $respuesta,
								'idProducto_' => $idPruductoNuevo);

			return $respuesta2;
		}

	}

#------------------------- Detalle de productos -------------------------#

	static public function ctrDetalleProducto(){


		if (isset($_GET["idProductoDetalle"])){

			$detalleProducto=ModeloFormularios::mdlDetalleProductos($_GET["idProductoDetalle"]);
			$insumosProducto=ModeloFormularios::mdlInsumosPorductos($_GET["idProductoDetalle"]);

			$respuesta = array(	'detalleProducto' 		=> $detalleProducto,
								'insumosProducto' 		=> $insumosProducto);
	
			return $respuesta;	
		}	

	}


#------------------------- Detalle de productos -------------------------#

	static public function ctrAjusteStockInsumos(){


		if (isset($_GET["ArrayIdInsumosAjusteStock"])&&
			isset($_GET["ArrayCantidadAjusteStock"])&&
			isset($_GET["DescripcionAjusteStock"])){

			#$idAjusteInventario=;




			$respuesta = array(	'detalleProducto' 		=> $detalleProducto,
								'insumosProducto' 		=> $insumosProducto);
	
			return $respuesta;	
		}	

	}




}	#cierra la clase

?>
