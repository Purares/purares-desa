<h1>RESULTADOS2:</h1>
<br>
<br>
<h1>pruebas</h1>

<?php 

#1)tomar el valor de la id_orden_alta
	$id_OrdenProd=1;
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

?>