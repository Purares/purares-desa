<?php
session_start();
require_once"controlador/plantillaCTR.php";
require_once"controlador/formulariosCTR.php";
require_once"modelo/formulariosMDL.php";

if(isset($_POST["idDepositoFiltroInsumo"]) && !empty($_POST["idDepositoFiltroInsumo"])){
    //Get all state data

    $inusmosxdeposito=ControladorFormularios::ctrInsumosDeposito();

   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    
    //Display states list
    if($inusmosxdeposito){
        echo '<option value="">Select inusumo</option>';
        foreach ($inusmosxdeposito as $insumo) {
        	 echo '<option value="'.$insumo[0].'">'.$insumo[1].'</option>';
        }
    }else{
        echo '<option value="">Insumo no disponible</option>';
    }
};

if(isset($_POST["idInsumoAgregarReceta"]) && !empty($_POST["idInsumoAgregarReceta"])){
    //Get all state data

    $unidaddeinsumo=ControladorFormularios::ctrUdmInsumos();

   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    
    //Display states list
    if($unidaddeinsumo){
        foreach ($unidaddeinsumo as $unidad) {
            echo $unidad['nombre'];
        }}

    else{
        echo 'error unidad';
    }
}

if(isset($_POST["chequeado"])){

 $recetas=ControladorFormularios::ctrListaRecetas();

    if($_POST["chequeado"]==1){
        
    foreach($recetas as $receta){

        if ($receta["activo"]==1) {
    
          echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col"><span class="badge badge-pill badge-success">Activa</span></td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&nombrereceta=' .  $receta["nombre"]  . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';
        }else{

            echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col"><span class="badge badge-pill badge-danger">Inactiva</span></td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&nombrereceta=' .  $receta["nombre"]  . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';
        }
    }
    }else{
       
    foreach($recetas as $receta){


        if ($receta["activo"]==1) {
        
        echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col"><span class="badge badge-pill badge-success">Activa</span></td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&nombrereceta=' .  $receta["nombre"]  . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';
   }
}
}
}

if (isset($_POST["idRecetaDetalle"])){

    if ($_POST['estado']==0) {
        
        $activar=ControladorFormularios::ctrActivarReceta();
        return $activar;
    }
    if ($_POST['estado']==1) {
    
        $desactivar=ControladorFormularios::ctrDesactivarReceta();
        return $desactivar;

}}

if(isset($_POST["chequeadoDesposte"])){

  $despostes=ControladorFormularios::ctrListaDesposte();

    if($_POST["chequeadoDesposte"]==0){
        
    foreach($despostes as $desposte){

        if ($desposte["anulado"]==0) {
    
    echo '<tr><td scope="col" class="text-center">' . $desposte["id_desposte"] . '</td><td scope="col" class="text-center"><span class="badge badge-pill badge-success">Activo</span></td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["unidades"] . ' medias reses</td><td scope="col">' . $desposte["peso_total"] . ' kg.</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar</a></td></tr>';


}          else{
    
    echo '<tr><td scope="col" class="text-center">' . $desposte["id_desposte"] . '</td><td scope="col" class="text-center"><span class="badge badge-pill badge-danger">Anulado</span></td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["unidades"] . ' medias reses</td><td scope="col">' . $desposte["peso_total"] . ' kg.</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar</a></td></tr>';


        }
    }
    }else{
       
    foreach($despostes as $desposte){


     if ($desposte["anulado"]==0) {
    
     echo '<tr><td scope="col" class="text-center">' . $desposte["id_desposte"] . '</td><td scope="col" class="text-center"><span class="badge badge-pill badge-success">Activo</span></td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["unidades"] . ' medias reses</td><td scope="col">' . $desposte["peso_total"] . ' kg.</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar</a></td></tr>';

}
}
}
}

if (isset($_POST["idDesposteVerDetalles"])){

   $anulacion=ControladorFormularios::ctrValidacionAnularDesposte();

   echo $anulacion;

}

 //   }

 //   echo $anulacion;

if(isset($_POST["funcion"])){
    //Get all state data

    $cuentas=ControladorFormularios::ctrListaCuentas();

   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    
    //Display states list
    if($cuentas){
        foreach ($cuentas as $cuenta) {
            echo '<option value="'.$cuenta["id_cuenta"].'">'.$cuenta["nombre"].'</option>';
        }}

    else{
        echo $cuentas . $_POST["funcion"];
    }
}

 if (isset($_POST["idCarneMovimientoCarne"])||
    isset($_POST["idCuentaMovimientoCarne"])||
    isset($_POST["idDesposteMovimientoCarne"])||
    isset($_POST["cantidadMovimientoCarne"])) {

$respuesta=ControladorFormularios::ctrMovCarne();

echo $respuesta;

}

if(isset($_POST["idRecetaAltaOP"])&&isset($_POST["pesoPastonAltaOP"])&&$_POST["establecerorden"]==0){

$calculoinsumos=ControladorFormularios::ctrCalculoInsumos();

    }

if (isset($_POST["nombreCrearReceta"])||
            isset($_POST["diasprodCrearReceta"])||
            isset($_POST["diasvencCrearReceta"])||
            isset($_POST["porcentcarneCrearReceta"])||
            isset($_POST["largouniLoteCrearReceta"])||
            isset($_POST["pesouniLoteCrearReceta"])||
            isset($_POST["mermaCrearReceta"])||
            isset($_POST["largoUniEsperadoCrearReceta"])||
            isset($_POST["pesoUniEsperadoCrearReceta"])||
            isset($_POST["uFinalXuCrearReceta"])|| #unidades_final_xunidadDe Lote       
            isset($_POST["descripcionCrearReceta"])){

    $nuevareceta=ControladorFormularios::ctrCrearReceta();

    $respuestacod=json_encode($nuevareceta);
    echo $respuestacod;
}

  if (isset($_POST["idOrdenProdAlta_FinOP"])||
            isset($_POST["productoObtenido_FinOp"])||
            isset($_POST["unidades_FinOP"])||
            isset($_POST["MedicionesPeso_FinOP"])||
            isset($_POST["MedicionesResponsable_FinOP"])||
            isset($_POST["MedicionesFechaMedicion_FinOP"])){

    $finalizarop=ControladorFormularios::ctrFinalizarOP();

    $respuestacod=json_encode($finalizarop);
    echo $respuestacod;
}

if(isset($_POST["chequeadocompras"])){

 $compras=ControladorFormularios::ctrListaCompras();

    if($_POST["chequeadocompras"]==0){
        
    foreach($compras as $compra){

        if ($compra["anulado"]==0) {
        echo '<tr><td scope="col" class="text-center">' . $compra["fecha_compra"] . '</td><td scope="col" class="text-center"></td><td scope="col" class="text-center">' . $compra["proveedor"] . '</td><td scope="col" class="text-center">' . $compra["nro_remito"] . '</td><td scope="col" class="text-center">' . $compra["descripcion"] . '</td><td scope="col" class="text-center"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleCompra&idCompra='.$compra["id_compra"].'&estado=' .  $compra["anulado"] . '">Ver detalles</a></td></tr>';
        }else{

        echo '<tr><td scope="col" class="text-center">' . $compra["fecha_compra"] . '</td><td scope="col" class="text-center"><span class="badge badge-pill badge-danger">Anulada</span></td><td scope="col" class="text-center">' . $compra["proveedor"] . '</td><td scope="col" class="text-center">' . $compra["nro_remito"] . '</td><td scope="col" class="text-center">' . $compra["descripcion"] . '</td><td scope="col" class="text-center"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleCompra&idCompra='.$compra["id_compra"].'&estado=' .  $compra["anulado"] . '">Ver detalles</a></td></tr>';
        }
    }
    }else{
       
    foreach($compras as $compra){


        if ($compra["anulado"]==0) {
    
    echo '<tr><td scope="col" class="text-center">' . $compra["fecha_compra"] . '</td><td scope="col" class="text-center"></td><td scope="col" class="text-center">' . $compra["proveedor"] . '</td><td scope="col" class="text-center">' . $compra["nro_remito"] . '</td><td scope="col" class="text-center">' . $compra["descripcion"] . '</td><td scope="col" class="text-center"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleCompra&idCompra='.$compra["id_compra"].'&estado=' .  $compra["anulado"] . '">Ver detalles</a></td></tr>';
   }
}
}
}


if (isset($_POST["idCompraDetalle"])&&empty($_POST["motivoAnulacionCompra"])){

   $validacion=ControladorFormularios::ctrValidarAnulacionCompra();

   echo $validacion;

}else{


if (isset($_POST["idCompraDetalle"])&&isset($_POST["motivoAnulacionCompra"])){

   $anulacion=ControladorFormularios::ctrAnularCompra();

   echo $anulacion;

}}

if (isset($_GET["idReceta"])){

//$_GET["idReceta"]=$_POST["idReceta"];

$detalleReceta=ControladorFormularios::ctrDetalleReceta();

$respuestacod1=json_encode($detalleReceta);
echo $respuestacod1;
}


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


    $nuevaorden=ControladorFormularios::ctrAgregarOP();
}

if (isset($_POST["nroRemitoAltaDesposte"])||
            isset($_POST["proveedorAltaDesposte"])||
            isset($_POST["unidadesAltaDesposte"])||
            isset($_POST["pesoTotalAltaDesposte"])||
            isset($_POST["mermaInicialAltaDesposte"])|| #NEW
            isset($_POST["fechaDesposteAltaDesposte"])) {

$nuevadesposte=ControladorFormularios::ctrCrearDesposte();


    $respuestacod1=json_encode($nuevadesposte);
    echo $respuestacod1;

}

if (isset($_POST["idInsumoCompraInsumo"])||
            isset($_POST["cantidadCompraInsumo"])||
            isset($_POST["idProvedorCompraInsumo"])||
            isset($_POST["fechaCompraInsumo"])){


$nuevacompra=ControladorFormularios::ctrCompraInsumo();


    $respuestacodcompra=json_encode($nuevacompra);
    echo $respuestacodcompra;

}

if (isset($_GET["idCarneVerComposicion"])){

    $respuesta= ControladorFormularios::ctrComposicionStockCarnes();


    $respuestacomposicion=json_encode($respuesta);
    echo $respuestacomposicion;
        } 

if (isset($_POST["idOrdenProd_AnularOP"])&&
            isset($_POST["motivo_AnularOP"])){

    $respuesta= ControladorFormularios::ctrAnularOP();

echo $respuesta;

}

if (isset($_POST["idOrdenProd_AnularOP"])&&
            isset($_POST["motivo_AnularFinOP"])){

    $respuesta= ControladorFormularios::ctrAnularFinOP();

echo $respuesta;

}

	if (isset($_POST["ultimoIdDecomisCrearDecomiso"])||
			isset($_POST["ultimoIdOrdenProdCrearDecomiso"])||
			isset($_POST["destinoCrearDecomiso"])||
			isset($_POST["fechaDecomisoCrearDecomiso"])||
			isset($_POST["descripcionCrearDecomiso"])||
			isset($_POST["arrayIdDesposteCrearDecomiso"])||
			isset($_POST["arrayIdCarneCrearDecomiso"])||
			isset($_POST["arrayCantDecomisarCrearDecomiso"])||
			isset($_POST["arrayCantPostergarCrearDecomiso"])){
		

$respuestacoddecomiso1=ControladorFormularios::ctrCrearDecomiso();

  $respuestacoddecomiso=json_encode($respuestacoddecomiso1);
echo $respuestacoddecomiso;
		}

if (isset($_POST["IdDecomisoAnularDecomiso"])&&
			isset($_POST["MotivoAnularDecomiso"])){


$respuestaanulardecomiso=ControladorFormularios::ctrAnularDecomiso();

echo $respuestaanulardecomiso;
}

if(isset($_POST["chequeadoDecomiso"])){

  $decomisos=ControladorFormularios::ctrListaDecomisos();

    if($_POST["chequeadoDecomiso"]==0){
        
    foreach($decomisos as $decomiso){

        if ($decomiso["anulado"]==0) {
    
 echo '<tr><td scope="col" class="text-center"><span class="badge badge-pill badge-success">Activo</span></td><td scope="col" class="text-center">' . $decomiso["id_decomiso"] . '</td><td scope="col">' . $decomiso["destino"] . '</td><td scope="col">' . $decomiso["fecha_decomiso"] . '</td><td scope="col">' . $decomiso["nombre"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDecomiso&idDecomiso=' . $decomiso["id_decomiso"] .'">Inspeccionar</a></td></tr>';


}          else{
    
 echo '<tr><td scope="col" class="text-center"><span class="badge badge-pill badge-danger">Anulado</span></td><td scope="col" class="text-center">' . $decomiso["id_decomiso"] . '</td><td scope="col">' . $decomiso["destino"] . '</td><td scope="col">' . $decomiso["fecha_decomiso"] . '</td><td scope="col">' . $decomiso["nombre"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDecomiso&idDecomiso=' . $decomiso["id_decomiso"] .'">Inspeccionar</a></td></tr>';

        }
    }
    }else{
       
    foreach($decomisos as $decomiso){


     if ($decomiso["anulado"]==0) {
    
    echo '<tr><td scope="col" class="text-center"><span class="badge badge-pill badge-success">Activo</span></td><td scope="col" class="text-center">' . $decomiso["id_decomiso"] . '</td><td scope="col">' . $decomiso["destino"] . '</td><td scope="col">' . $decomiso["fecha_decomiso"] . '</td><td scope="col">' . $decomiso["nombre"] . '</td><td scope="col"><a class="btn btn-info btn-sm" href="index.php?pagina=detalleDecomiso&idDecomiso=' . $decomiso["id_decomiso"] .'">Inspeccionar</a></td></tr>';

}
}
}
}

    if (isset($_POST["codigoAgregarProducto"])||
            isset($_POST["nombreAgregarProducto"])||
            isset($_POST["descripcionAgregarProducto"])||
            isset($_POST["insumosAgregarProducto"])||
            isset($_POST["cantidadAgregarProducto"])){


 $nuevoproducto=ControladorFormularios::ctrAgregarProducto();


    $respuestacod=json_encode($nuevoproducto);
    echo $respuestacod;

    }

    if (isset($_POST["idProductoCrearReceta"])&&
            isset($_POST["idReceta"])&&
            isset($_POST["unidadesNecesariasCrearReceta"])){

 $modificarproducto=ControladorFormularios::ctrAgregarProductosReceta();


    $respuestacod=json_encode($modificarproducto);
    echo $respuestacod;


    }


if (isset($_POST["nombreAgregarProveedor"])&&
            isset($_POST["tipoAgregarProveedor"])){

$nuevoproveedor=ControladorFormularios::ctrAgregarProveedor();


    $respuestacod=json_encode($nuevoproveedor);
    echo $respuestacod;

}

if (isset($_POST["idReceta"])&&
            isset($_POST["productos"])){

    $_GET["idReceta"]=$_POST["idReceta"];

$productos=ControladorFormularios::ctrProductosReceta();


    $respuestacod=json_encode($productos);
    echo $respuestacod;

}

if (isset($_POST["array_ProductoAltaOP"])&&
            isset($_POST["array_QProductoAltaOP"])&&$_POST["boleanocalculoproductos"]==1){

$insumosproductos=ControladorFormularios::ctrCalculoInsumosProductos();

$respuestacod=json_encode($insumosproductos);
echo $respuestacod;

    }


if (isset($_POST["ajustecarnes"])||
            isset($_POST["ajusteinsumos"])){

if(isset($_POST["ajustecarnes"])){

       $listacarnes=ControladorFormularios::ctrListaCarnes();

    if($listacarnes){

       /* echo '<thead><th>N°</th><th>Carne</th></thead><tbody>';
        foreach ($listacarnes as $carne) {

            $_GET["idCarneVerComposicion"]=1;
             $composicioncarne=ControladorFormularios::ctrComposicionStockCarnes();
             echo '<tr><td>'.$composicioncarne[0].'</td><td>'.$composicioncarne[1].'</td></tr>';
        };
        echo '<tbody>';*/
    }else{
        echo '<option value="">Carnes no disponibles</option>';
    }
}else{

$depositos=ControladorFormularios::ctrListaDepositos();

 echo '<option value="">Seleccione el depósito</option>';

foreach($depositos as $deposito){

  echo '<option value="' . $deposito["id_deposito"] . '">' . $deposito["nombre"] . '</option>';

}}

}

if (isset($_POST["idDepositoAjusteStock"])){
    $inusmosxdeposito=ControladorFormularios::ctrStockInsumos();

    echo '<thead><th scope="col" class="text-center text-white bg-dark">N°</th><th scope="col" class="text-center text-white bg-dark">Insumo</th><th scope="col" class="text-center text-white bg-dark">Stock Actual</th><th scope="col" class="text-center text-white bg-dark">Ajuste</th></thead><tbody>';
        foreach ($inusmosxdeposito as $insumo) {

            if($insumo[4]==$_POST["idDepositoAjusteStock"]){

             echo '<tr><td scope="col" class="text-center" width="15%">' . $insumo[0] . '<input type="hidden" name="" value="' . $insumo[0] . '"></td><td scope="col"  width="25%">' . $insumo[1] . '<input type="hidden" class="nominsumo" value="' . $insumo[1] . '"></td><td scope="col"  width="20%"><div class="input-group cantinsumo"><input type="number" min=0 step=0.001 name="" class="form-control text-right cantinsumo" value="'.$insumo[2].'" readonly><div class="input-group-append"><span class="input-group-text"><a class="unitinsumo">'. $insumo[3] . '</a></span></div></div></td><td scope="col"  width="40%"><div class="input-group cantinsumo"><input type="number" min=0 step=0.001 name="" class="form-control text-right cantinsumo" placeholder="Ajuste de stock"><div class="input-group-append"><span class="input-group-text"><a class="unitinsumo">'. $insumo[3] . '</a></span></div></div></td></tr>';
        }};
        echo '<tbody>';

}

?>