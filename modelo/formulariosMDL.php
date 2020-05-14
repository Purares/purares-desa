<?php
#ACTUALIZADO 25/3-1.43hs

require_once"modelo/conexion.php";

$conexion=Conexion::conectarBD();

class ModeloFormularios{


	#------------------------- Lista  DEPOSITOS -------------------------#


	static public function mdlListaDeposito(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_deposito, nombre FROM depositos_n where activo=1");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


	#------------------------- Lista UDM -------------------------#


	static public function mdlListaUDM(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_udm, nombre FROM udm_n where activo=1");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#------------------------- Lista Productos -------------------------#

	static public function mdlListaProductos(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_producto, nombre FROM producto_n;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Lista CUENTAS -------------------------#


	static public function mdlListaCuentas($funcion){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_cuentasfunciones where funcion=$funcion");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Lista PROVEEDORES -------------------------#


	static public function mdlListaProveedor($tipoProveedor){

		$stmt=conexion::conectarBD()->prepare("SELECT id_proveedor, nombre FROM proveedores_n where activo=1 and tipo=$tipoProveedor");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#------------------------- AGREGAR INSUMO -------------------------#

	static public function mdlAgregarProveedor($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarProveedor( :nombre,:tipo );");
		
		$stmt -> bindparam (":nombre",$datos['nombre_'],PDO::PARAM_STR);
		$stmt -> bindparam (":tipo",$datos ['tipo_'],PDO::PARAM_STR);


		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}



#------------------------- Lista INSUMOS -------------------------#


	static public function mdlListaInsumos(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM insumos_n where activo=1");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



	#------------------------- Stock Insumos -------------------------#

	static public function mdlStockInsumo(){
 
		$stmt=conexion::conectarBD()->prepare("select * from v_stockinsumos;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#------------------------- AGREGAR INSUMO -------------------------#

	static public function mdlAgregarInsumo($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumo( :_nombre,:_id_udm,:_id_deposito,:_alertaQmin );");
		
		$stmt -> bindparam (":_nombre",$datos['nombreInsumo_'],PDO::PARAM_STR);
		$stmt -> bindparam (":_id_deposito",$datos['idDeposito_'],PDO::PARAM_INT);
		$stmt -> bindparam (":_id_udm",$datos['idUm_'],PDO::PARAM_INT);
		$stmt -> bindparam (":_alertaQmin",$datos ['alertaQmin_'],PDO::PARAM_STR);


		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


	#------------------------- ACTUALIZAR STOCK DE INSUMO -------------------------#

	static public function mdlMovimientoInsumo($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarMovInsumo( :idInsumo,:cantidad,:idCuenta, :idOrden,:idCompra,:idOrdenFin,:idAjusteStock, :idUsuario,:comentario,:funcion);");

		$stmt -> bindparam (":idInsumo",	$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",	$datos[1],PDO::PARAM_STR); 
		$stmt -> bindparam (":idCuenta",	$datos[2],PDO::PARAM_INT);
		$stmt -> bindparam (":idOrden",		$datos[3],PDO::PARAM_INT);
		$stmt -> bindparam (":idCompra",	$datos[4],PDO::PARAM_INT);
		$stmt -> bindparam (":idOrdenFin",	$datos[5],PDO::PARAM_INT);
		$stmt -> bindparam (":idAjusteStock",$datos[6],PDO::PARAM_INT); 
		$stmt -> bindparam (":idUsuario",	$datos[7],PDO::PARAM_INT);
		$stmt -> bindparam (":comentario",	$datos[8],PDO::PARAM_STR);
		$stmt -> bindparam (":funcion",		$datos[9],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


#------------------------- Insumos por Depositos -------------------------#


	static public function mdlInsumosDeposito($id_deposito){

		$stmt=conexion::conectarBD()->prepare("SELECT id_insumo, nombre from insumos_n where id_deposito=$id_deposito and activo = 1 order by nombre;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- UDM de Insumo  -------------------------#


	static public function mdlUdmInsumo($id_insumo){

		$stmt=conexion::conectarBD()->prepare("SELECT * from v_udminsumo where id_insumo=$id_insumo;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Lista RECETAS -------------------------#


	static public function mdlListaRecetas(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_lista_recetas");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Detalle de RECETA -------------------------#


	static public function mdlDetalleReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_receta where id_receta=$id_receta");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Insumos de RECETA -------------------------#

	static public function mdlInsumosReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_insumosreceta where id_receta = $id_receta;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Productos de RECETA -------------------------#

	static public function mdlproductosReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_productosreceta where id_receta = $id_receta;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Inactivar RECETA -------------------------#

	static public function mdlDesactivarReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call act_InactivarReceta($id_receta);");
		
		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;  
	}

#------------------------- Activar RECETA -------------------------#

	static public function mdlActivarReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call act_ActivarReceta($id_receta);");
		
		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;  
	}


#------------------------- Crear RECETA agrga el encabezado-------------------------#

	static public function mdlCrearReceta($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarReceta( :nombre,:diasPord,:diasVenc,:porcentCarne,:pesoTotInsumos, :largoUniLote,:pesoUniLote,:unidadesXpaston,:merma, :largoUniEsperado,:pesoUniEsperado,:unidadesFinalXunidad,:descripcion);");
		
		$stmt -> bindparam (":nombre",				$datos['nombre_'],PDO::PARAM_STR);
		$stmt -> bindparam (":diasPord",			$datos['diasProd_'],PDO::PARAM_STR);
		$stmt -> bindparam (":diasVenc",			$datos['diasVenc_'],PDO::PARAM_STR);
		$stmt -> bindparam (":porcentCarne",		$datos['porcentCarne_'],PDO::PARAM_STR);
		$stmt -> bindparam (":pesoTotInsumos",		$datos['pesoTotInsumos_'],PDO::PARAM_STR);
		$stmt -> bindparam (":largoUniLote",		$datos['largoUniLote_'],PDO::PARAM_STR);
		$stmt -> bindparam (":pesoUniLote",			$datos['pesoUniLote_'],PDO::PARAM_STR);
		$stmt -> bindparam (":unidadesXpaston",		$datos['unidadesXpaston_'],PDO::PARAM_STR);
		$stmt -> bindparam (":merma",				$datos['merma_'],PDO::PARAM_STR);
		$stmt -> bindparam (":largoUniEsperado",	$datos['largoUniEsperado_'],PDO::PARAM_STR);
		$stmt -> bindparam (":pesoUniEsperado",		$datos['pesoUniEsperado_'],PDO::PARAM_STR);
		$stmt -> bindparam (":unidadesFinalXunidad",$datos['unidadesFinalXunidad_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",			$datos['descripcion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){

				#Busca el ultimo ID insertado en la tabla
				$campo='id_receta';
				$tabla='recetas_n';
				$idReceta_nuevaArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$idReceta_nueva=$idReceta_nuevaArray[0][0];
			return $idReceta_nueva;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Crear RECETA Agrega los insumos -------------------------#

	static public function mdlAltaInsumosReceta($datos){

		#$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumosXReceta(:idReceta,:idInsumo,:cantidadInsumo);");

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumosXReceta(:idReceta,:idInsumo,:cantidadInsumo);");

		$stmt -> bindparam (":idReceta",$datos[2],PDO::PARAM_INT);
		$stmt -> bindparam (":idInsumo",$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidadInsumo",$datos[1],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Eliminar productos de receta -------------------------#

	static public function mdlEliminarProductosReceta($idReceta){

		$stmt=conexion::conectarBD()->prepare("Delete from productos_receta where id_receta=$idReceta;;");

		$stmt -> bindparam (":idProducto",		$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idReceta",		$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":unidadesNecesarias",$datos[2],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



#------------------------- Crear RECETA Agrega los Productos -------------------------#

	static public function mdlAltaProductosReceta($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarPoductoXReceta(:idProducto,:idReceta,:unidadesNecesarias);");

		$stmt -> bindparam (":idProducto",		$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idReceta",		$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":unidadesNecesarias",$datos[2],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Lista CARNES -------------------------#


	static public function mdlListaCarnes(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_carnes ");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Stock CARNES------------------------#

	static public function mdlStockCarnes(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_stockcarnes;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

#------------------------- Composicion Stock de CARNES------------------------#

	static public function mdlComposicionStockCarnes($id_carne){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_composicionstockcarne where stock>0 and id_carne=$id_carne;");

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

#------------------------- Composicion Stock de CARNES------------------------#

	static public function mdlComposicionStockCarnesTodos(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_composicionstockcarne where stock>0;");

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

#------------------------- Composicion Stock de CARNES------------------------#
	/*Esta función es utulizada para la impresion del stock de carnes*/

	static public function mdlComposicionStockCarnes2(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_qcarnesdesposte where stockactual>0");

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}



	#------------------------- AGREGAR CARNE -------------------------#

	static public function mdlAgregarCarne($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarCarne(:nombre, :udm, :vencimiento1,:vencimiento2);");
		
		$stmt -> bindparam (":nombre",		$datos['nombre_'],PDO::PARAM_STR);
		$stmt -> bindparam (":udm",			$datos['udm_'],PDO::PARAM_INT);
		$stmt -> bindparam (":vencimiento1",$datos['vencimiento1_'],PDO::PARAM_INT);
		$stmt -> bindparam (":vencimiento2",$datos['vencimiento2_'],PDO::PARAM_INT);


		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

#------------------------- Lista de DESPOSTE------------------------#

	static public function mdlListaDesposte($cantidadFilas){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_listadesposte LIMIT $cantidadFilas;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


#------------------------- Detalle de DESPOSTE------------------------#

	static public function mdlDetalleDesposte($id_desposte){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalledespostes where id_desposte=$id_desposte;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


#-------------------------Carnes de DESPOSTE------------------------#

	static public function mdlCarnesDesposte($id_desposte){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_qcarnesdesposte where id_desposte=$id_desposte;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


#------------------------- Registrar un nuevo DESPOSTE------------------------#

static public function mdlCrearDesposte($datos){

		
		$stmt=conexion::conectarBD()->prepare("call ins_AgregarDesposte( :nroRemito, :proveedor, :unidades , :pesoTotal, :mermaInicial, :fechaDesposte , :usuarioAlta ,:descripcion);");

		$stmt -> bindparam (":nroRemito",$datos['nroRemito_'],PDO::PARAM_STR);
		$stmt -> bindparam (":proveedor",$datos['proveedor_'],PDO::PARAM_INT);
		$stmt -> bindparam (":unidades",$datos['unidades_'],PDO::PARAM_STR);
		$stmt -> bindparam (":pesoTotal",$datos['pesoTotal_'],PDO::PARAM_STR);
		$stmt -> bindparam (":mermaInicial",$datos['mermaInicial_'],PDO::PARAM_STR); 
		$stmt -> bindparam (":fechaDesposte",$datos['fechaDesposte_'],PDO::PARAM_STR);
		$stmt -> bindparam (":usuarioAlta",$datos['usuarioAlta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":descripcion",$datos['descripcion_'],PDO::PARAM_STR);


		if ($stmt -> execute()){

				#Busca el ultimo ID insertado en la tabla
				$campo='id_desposte';
				$tabla='desposte_reg';
				$idReceta_nuevaArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$idReceta_nueva=$idReceta_nuevaArray[0][0];#De el array solo me quedo con el valor
			return $idReceta_nueva;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#-------------------------Agregar Movimiento de Carne -------------------------#

	#!!!Tener en cuenta que no envío el nombre de la fila, sino el número de fila.
	static public function mdlMovimientoCarne($datos){

	$stmt=conexion::conectarBD()->prepare("call ins_AgregarMovCarne(:idCarne, :idCuenta, :idDesposte, :cantidad, :idOrenProd,:idDecomiso,:idAjusteStock,:idUsuario, :descripcion,:funcion);");



		$stmt -> bindparam (":idCarne",			$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idCuenta",		$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":idDesposte",		$datos[2],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",		$datos[3],PDO::PARAM_STR);
		$stmt -> bindparam (":idOrenProd",		$datos[4],PDO::PARAM_INT);
		$stmt -> bindparam (":idDecomiso",		$datos[5],PDO::PARAM_INT);
		$stmt -> bindparam (":idAjusteStock",	$datos[6],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",		$datos[7],PDO::PARAM_INT);
		$stmt -> bindparam (":descripcion",		$datos[8],PDO::PARAM_STR);
		$stmt -> bindparam (":funcion",			$datos[9],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

	#------------Validaión MOVimiento de Carnes-----------------#

	static public function mdlValidacionMovCarne($datos){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_composicionstockcarne where id_carne= :idCarne and id_desposte=:idDesposte");

		$stmt -> bindparam (":idCarne",$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idDesposte",$datos[2],PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

	static public function mdlValidacionStockCarnes($id_carne){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_stockcarnes where id_carne=$id_carne;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null;

	}
	#-------------PROCEO PARA ANULAR DESPOSTE----------------#

	#-------- Validar que no exista OP sin anular --------#
	static public function mdlValidacionAnularDesposte1($id_desposte){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_validacion_op_desposte WHERE id_desposte= $id_desposte;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#-------- Validar que la diferencia de Stock sea  cero --------#
	static public function mdlValidacionAnularDesposte2($id_desposte){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_validacion_carne_difstock0 WHERE id_desposte= $id_desposte;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la 	conexion
		$stmt =null; 

	}


#-------------------------Anular DESPOSTE -------------------------#

	static public function mdlAnularDesposte($datos){

		$stmt=conexion::conectarBD()->prepare("call act_AnularDesposte(:idDesposte,:idUsuario,:motivoAnulacion);
");

		$stmt -> bindparam (":idDesposte",$datos['idDesposte_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",$datos['idUsuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":motivoAnulacion",$datos['motivoAnulacion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


 #COMPRA DE INSUMOS

#-------------------Lista de compra-----------------------------------------

	static public function mdlListaCompras(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_lista_compras;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

#-------------------Detalle de compra-----------------------------------------

	static public function mdlDetalleCompra($id_compra){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_compra where id_compra=$id_compra;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null;

	}

#------------------------- Detalle Compra Lista Insumos  -------------------------#

	static public function mdlDetalleCompraInsumos($id_compra){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_compra_insumos where id_compra=$id_compra");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



#------------------------- Generar Compra de Insumo-------------------------#

	static public function mdlCompraInsumo($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarCompra(:idProveedor,:nroRemito, :fechaCompra, :descripcion, :idUsuario);");
		
		$stmt -> bindparam (":idProveedor",$datos['idProveedor_'],PDO::PARAM_INT);
		$stmt -> bindparam (":nroRemito",$datos['nroRemito_'],PDO::PARAM_STR);
		$stmt -> bindparam (":fechaCompra",$datos['fechaCompra_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",$datos['descripcion_'],PDO::PARAM_STR);
		$stmt -> bindparam (":idUsuario",$datos['idUsuario_'],PDO::PARAM_INT);

		if ($stmt -> execute()){

				#Busca el ultimo ID insertado en la tabla
				$campo='id_compra';
				$tabla='compras_reg';
				$idCompra_nuevaArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$id_compra_nueva=$idCompra_nuevaArray[0][0];
			return $id_compra_nueva;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#-------------------------Anular Compra -------------------------#

	static public function mdlAnularCompra($datos){

		$stmt=conexion::conectarBD()->prepare("call act_AnularCompra(:idCompra,:idUsuario,:motivoAnulacion);
");

		$stmt -> bindparam (":idCompra",		$datos['idCompra_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",		$datos['idUsuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":motivoAnulacion",	$datos['motivoAnulacion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



#ORDENES DE PRODUCCION

#------------------------- Tabla de Insumo-------------------------#
	static public function mdlListaInsumosOP($datos){

		$stmt=conexion::conectarBD()->prepare("call v_insumosAltaOP(:idReceta, :pesoPaston);");

		$stmt -> bindparam (":idReceta",	$datos['idRecetaAltaOP_'],PDO::PARAM_INT);
		$stmt -> bindparam (":pesoPaston",	$datos['pesoPastonAltaOP_'],PDO::PARAM_STR);
		
		if ($stmt -> execute()){
			return $stmt -> fetchAll();
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Validacion stock de Insumo para OP-------------------------#
	static public function mdlValidacionStockInsumosOP($datos){

		$stmt=conexion::conectarBD()->prepare("call v_ValidacionInsumosAltaOP(:idReceta, :pesoPaston);");

		$stmt -> bindparam (":idReceta",	$datos['idRecetaAltaOP_'],PDO::PARAM_INT);
		$stmt -> bindparam (":pesoPaston",	$datos['pesoPastonAltaOP_'],PDO::PARAM_STR);
		
		if ($stmt -> execute()){
			return $stmt -> fetchAll();
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Tabla de Insumo PRODUCTOS------------------------#
	static public function mdlListaInsumosOPProductos($datos){

		$stmt=conexion::conectarBD()->prepare("call v_insumoAltaOP_Productos(:idProducto, :qUnidades);");

		$stmt -> bindparam (":idProducto",	$datos['idProducto_'],PDO::PARAM_INT);
		$stmt -> bindparam (":qUnidades",	$datos['qProducto_'],PDO::PARAM_INT);
		
		if ($stmt -> execute()){
			return $stmt -> fetchAll();
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Validacion Insumo PRODUCTOS------------------------#
	static public function mdlValidacionInsumosOPProductos($datos){

		$stmt=conexion::conectarBD()->prepare("call v_ValidacionInsumosAltaOpProducto(:idProducto, :qUnidades);");

		$stmt -> bindparam (":idProducto",	$datos['idProducto_'],PDO::PARAM_INT);
		$stmt -> bindparam (":qUnidades",	$datos['qProducto_'],PDO::PARAM_INT);
		
		if ($stmt -> execute()){
			return $stmt -> fetchAll();
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



#-----------------------Nro Lote de Producccion------------------------

	static public function mdlNroLoteProd(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM lotes_produccion WHERE Anulado IS NULL  ORDER BY nro_lote DESC limit 1;");

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 		

	}

#-----------------------CREAR Nro Lote de Producccion------------------------

	static public function mdlCrearNroLoteProd(){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarLote(NULL,0);");

		if ($stmt -> execute()){
			#Buscar el nuevo LOTE
			$Nro_loteD=ModeloFormularios::mdlNroLoteProd();
			$Nro_lote=$Nro_loteD[0]['nro_lote'];
			return $Nro_lote;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 	

	}



#------------------------- ALta de OP -------------------------#

static public function mdlAltaOP($datosOP){

		$stmt=conexion::conectarBD()->prepare("call ins_AltaOP(:nro_lote, :idReceta, :pesoPaston,:qUniFrescas,:unidadesSinAsignar :idUsuario);");

		$stmt -> bindparam (":nro_lote",			$datosOP['nroLote_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idReceta",			$datosOP['idReceta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":pesoPaston",			$datosOP['pesoPaston_'],PDO::PARAM_STR);
		$stmt -> bindparam (":qUniFrescas",			$datosOP['qUniFrescas_'],PDO::PARAM_INT);
		$stmt -> bindparam (":unidadesSinAsignar",	$datosOP['unidadesSinAsignar_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",			$datosOP['idUsuario_'],PDO::PARAM_INT);


		if ($stmt -> execute()){
			#Busca el ultimo ID insertado en la tabla
				$campo='id_ordenprod';
				$tabla='orden_produccion_alta';
				$idReceta_nuevaArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$idReceta_nueva=$idReceta_nuevaArray[0][0];
			return $idReceta_nueva;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Agregar PRODUCTOS por OP-------------------------#
	static public function mdlAgregarProductoOP($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarProductoXOP(:idOrdenAlta, :idOrdenFin, :idProducto, :cantidad);");

		$stmt -> bindparam (":idOrdenAlta",	$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idOrdenFin",	$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":idProducto",	$datos[3],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",	$datos[4],PDO::PARAM_STR);
		

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}




#-------------------------Lista de Oredenes de Produccion------------------------#

	static public function mdlListaOP(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_lista_op;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

#-------------------------Detalle de Oredenes de Produccion------------------------#

	static public function mdlDetalleOpAlta($id_OrdenProd){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_op where id_ordenprod=$id_OrdenProd;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#-------------------------Detalle de Oredenes de Produccion------------------------#

	static public function mdlDetalleOpFin($id_ordenprod_alta){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_fin_op where id_ordenprod_alta=$id_ordenprod_alta and anulado=0;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

 	static public function mdlDetalleOpInsumos($id_OrdenProd){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_op_insumos where id_orden=$id_OrdenProd;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	static public function mdlDetalleOpCarnes($id_OrdenProd){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_op_carnes where id_ordenprod=$id_OrdenProd;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

static public function mdlDetalleOpMediciones($id_OrdenProd){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_op_mediciones where id_ordenprod_alta=$id_OrdenProd;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Detalle OP Productos -------------------------#

	static public function mdlDetalleOPProductos($id_OrdenProd){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_productos_op_3_final where id_orden_alta=$id_OrdenProd;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



#------------------------- Finalizacion de OP -------------------------#

static public function mdlFinOP($datosOP){

		$stmt=conexion::conectarBD()->prepare("call ins_Fin_OrdenProd(:idOrdenProdAlta,:unidadesFrescas,:pesoFresco, :productoObtenido, :unidadesObtenidas, :descripcion, :idUsuarioAlta);");

		$stmt -> bindparam (":idOrdenProdAlta",		$datosOP['idOrdenProdAlta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":unidadesFrescas",		$datosOP['unidadesFrescas_'],PDO::PARAM_INT);
		$stmt -> bindparam (":pesoFresco",			$datosOP['pesoFresco_'],PDO::PARAM_STR);
		$stmt -> bindparam (":productoObtenido",	$datosOP['productoObtenido_'],PDO::PARAM_STR);
		$stmt -> bindparam (":unidadesObtenidas",	$datosOP['unidadesObtenidas_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",			$datosOP['descripcion_'],PDO::PARAM_STR);
		$stmt -> bindparam (":idUsuarioAlta",		$datosOP['idUsuarioAlta_'],PDO::PARAM_INT);

		if ($stmt -> execute()){
			#Busca el ultimo ID insertado en la tabla
				$campo='id_ordenprod_fin';
				$tabla='orden_produccion_fin';
				$nuevoCampoArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$nuevoID=$nuevoCampoArray[0][0];
			return $nuevoID;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Agregar Mediciones a la Fin De OP -------------------------#

	static public function mdlAgregarMedicionFinOP($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarMedicionFinOP( :idOrdenProdFin,:sort,:peso,:merma, :responsable,:fechaMedicion);");
		
		$stmt -> bindparam (":idOrdenProdFin",	$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":sort",			$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":peso",			$datos[2],PDO::PARAM_STR);
		$stmt -> bindparam (":merma",			$datos[3],PDO::PARAM_STR);  
		$stmt -> bindparam (":responsable",		$datos[4],PDO::PARAM_STR);
		$stmt -> bindparam (":fechaMedicion",	$datos[5],PDO::PARAM_STR);
		
		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

	#Ajuste de Stock de insumos por la ^ de los productos al finalizar la OP
	#------------------------- Diferencia Productos -------------------------#

	static public function mdlDiferenciaOPProductos($id_OrdenProd){

		$stmt=conexion::conectarBD()->prepare("SELECT *,q_esperada-q_real as ajuste FROM v_productos_op_3_final where id_orden_alta=$id_OrdenProd;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Anular FIn OP -------------------------#

	static public function mdlAjustarInsumosOPxProducto($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AjusteInsumosFinOP_Productos(:ajuste, :idUsuario, :idOrdenFin, :idProducto);");
		
		$stmt -> bindparam (":ajuste",		$datos['ajuste_'],PDO::PARAM_STR);
		$stmt -> bindparam (":idUsuario",	$datos['idUsuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idOrdenFin",	$datos['idOrdenFin_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idProducto",	$datos['idProducto_'],PDO::PARAM_INT);
		
		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


#------------------------- Anular FIn OP -------------------------#

	static public function mdlAnularOP($datos){

		$stmt=conexion::conectarBD()->prepare("call act_Anular_OP(:idOrdenProd, :idUsuario, :motivo);");
		
		$stmt -> bindparam (":idOrdenProd",	$datos['idOrdenProd_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",	$datos['idUsuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":motivo",		$datos['motivo_'],PDO::PARAM_STR);

		
		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


#------------------------- Anular FIn OP -------------------------#

	static public function mdlAnularFinOP($datos){

		$stmt=conexion::conectarBD()->prepare("call act_Anular_FinOP(:idOrdenProdFin, :idUsuario, :motivo);");
		
		$stmt -> bindparam (":idOrdenProdFin",	$datos['idOrdenProdFin_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",		$datos['idUsuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":motivo",			$datos['motivo_'],PDO::PARAM_STR);

		
		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

# -----------DECOMISO DE CARNES--------------

	#---------Lista de Carnes a Decomisar----------

	static public function mdlListaCarnesDecomisar(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_decomiso_7_final;");

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#-------------Crear Decomiso-------------

	static public function mdlCrearDecomiso($datos){


		#$stmt=conexion::conectarBD()->prepare("call ins_AgregarDecomiso_reg('destinoPrueba', '2020-01-01','descripcion prueba 1', 1);");

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarDecomiso_reg(:destino,:fecha_decomiso, :descripcion, :id_usuario);");
				
		$stmt -> bindparam (":destino",			$datos['destino_'],PDO::PARAM_STR);
		$stmt -> bindparam (":fecha_decomiso",	$datos['fecha_decomiso_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",		$datos['descripcion_'],PDO::PARAM_STR);
		$stmt -> bindparam (":id_usuario",		$datos['id_usuario_'],PDO::PARAM_INT);

		if ($stmt -> execute()){
			#Busca el ultimo ID insertado en la tabla
				$campo='id_decomiso';
				$tabla='decomiso_reg';
				$nuevoCampoArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$nuevoID=$nuevoCampoArray[0][0];
			return $nuevoID;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Agregar Movimiento Decomiso -------------------------#

	static public function mdlAgregarMovimientoDecomiso($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarDecomisoCarne(:idDecomiso, :idDesposte, :idCarne, :cantidad, :idCuenta, :idUsuario);");
		
		$stmt -> bindparam (":idDecomiso",	$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idDesposte",	$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":idCarne",		$datos[2],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",	$datos[3],PDO::PARAM_STR);  
		$stmt -> bindparam (":idCuenta",	$datos[4],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",	$datos[5],PDO::PARAM_INT);
		
		
		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


	#---------ID Ultimo Decomiso----------

	static public function mdlUltimoDecomiso(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT max(id_decomiso) from decomiso_reg;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#---------ID Ultimo Decomiso----------

	static public function mdlUltimaOrdenProd(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT max(id_ordenprod) from orden_produccion_alta;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#-------------------------Anular DECOMISO -------------------------#

	static public function mdlAnularDecomiso($datos){

		$stmt=conexion::conectarBD()->prepare("call act_AnularDecomiso(:idDecomiso,:idUsuario,:motivoAnulacion);");

		$stmt -> bindparam (":idDecomiso",		$datos['idDecomiso_'],PDO::PARAM_INT);
		$stmt -> bindparam (":idUsuario",		$datos['idUsuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":motivoAnulacion",	$datos['motivoAnulacion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Lista Decomisos -------------------------#

	static public function mdlListaDecomisos(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_lista_decomisos");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Detalle de Decomisos -------------------------#

	static public function mdlDetalleDecomisosReg($idDecomiso){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_decomiso_reg where id_decomiso=$idDecomiso");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Detalle de Decomisos -------------------------#

	static public function mdlDetalleDecomisosCarnes($idDecomiso){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalle_decomiso_carnes where id_decomiso=$idDecomiso");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#------------------------- AGREGAR CARNE -------------------------#

	static public function mdlAgregarProducto($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarProducto(:codigo, :nombre, :descripcion);");
		
		$stmt -> bindparam (":codigo",		$datos['codigo_'],PDO::PARAM_STR);
		$stmt -> bindparam (":nombre",		$datos['nombre_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",	$datos['descripcion'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			#Busca el ultimo ID insertado en la tabla
				$campo='id_producto';
				$tabla='producto_n';
				$nuevoCampoArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$nuevoID=$nuevoCampoArray[0][0];
			return $nuevoID;
	

			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

#------------------------- Crear RECETA Agrega los Productos -------------------------#

	static public function mdlAltaProductoInsumos($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumosProducto(:idProducto,:idInsumo,:cantidad);");

		$stmt -> bindparam (":idProducto",	$datos[0],PDO::PARAM_INT);
		$stmt -> bindparam (":idInsumo",	$datos[1],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",	$datos[2],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "OK";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Detalle Producto -------------------------#

	static public function mdlDetalleProductos($idProducto){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM producto_n where id_producto=$idProducto;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- insumos Producto -------------------------#

	static public function mdlInsumosPorductos($idProducto){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_producto_insumos where id_producto=$idProducto;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}
#------------------------- STOCK PRODUCTOS -------------------------#

	static public function mdlStockProductos(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_stockproductos");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- AGREGAR Ajuste de Stock -------------------------#

	static public function mdlAgregarAjusteStock($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarAjustarInventario(:tipo, :motivo, :descripcion,:idUsuario);");
		
		$stmt -> bindparam (":tipo",		$datos['tipo_'],PDO::PARAM_STR);
		$stmt -> bindparam (":motivo",		$datos['motivo_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",	$datos['descripcion_'],PDO::PARAM_STR);
		$stmt -> bindparam (":idUsuario",	$datos['idUsuario_'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			#Busca el ultimo ID insertado en la tabla
				$campo='id_producto';
				$tabla='producto_n';
				$nuevoCampoArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$nuevoID=$nuevoCampoArray[0][0];
			return $nuevoID;
	

			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


















#ESTA FUNCION DEBERIA SER REEMPLAZADA POR LA FUNCION DEL OBJETO!!!!!!!!!

#------------------------- Ultimo id de la tabla -------------------------#

	static public function mdlUltimoId($campo,$tabla){


		$stmt=conexion::conectarBD()->prepare("SELECT max($campo) from $tabla;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

} #Cierra la clase

?>
