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


if (isset($_POST["idRecetaAltaOP"])&&
            isset($_POST["pesoPastonAltaOP"])&&
            isset($_POST["idCarnesAgregarOP"])&&
            isset($_POST["catidadCarnesAgregarOP"])){


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

if ($_POST["imprimir_carnes"]===1){

 echo'
      <table>
            
            <thead>
              <tr>
                <th scope="col" class="text-center text-white bg-dark">Carne</th>
                <th scope="col" class="text-center text-white bg-dark">Stock Total Carne</th>
                <th scope="col" class="text-center text-white bg-dark">N° Desposte</th>
                <th scope="col" class="text-center text-white bg-dark">Stock Desposte</th>
              </tr>
            </thead>
            <tbody>
';

  $tabla=ControladorFormularios::ctrImprimirStockCarnes();

  for ($i=0; $i < array_search(array_key_last($tabla), $tabla); $i++) { 


echo '<tr><td scope="col" class="text-center" rowspan="'.count($tabla[$tabla[$i]]['desposte']).'">'.$tabla[$i].'</td><td scope="col" class="text-center" rowspan="'.count($tabla[$tabla[$i]]['desposte']).'">'.$tabla[$tabla[$i]]['stockActualTotal'].'</td><td scope="col" class="text-center">'.$tabla[$tabla[$i]]['desposte'][0].'</td><td scope="col" class="text-center">'.$tabla[$tabla[$i]]['stockactual'][0].'</td>';   

    for ($j=1; $j <count($tabla[$tabla[$i]]['desposte']); $j++) {

echo '<tr><td scope="col" class="text-center">'.$tabla[$tabla[$i]]['desposte'][$j].'</td><td scope="col" class="text-center">'.$tabla[$tabla[$i]]['stockactual'][$j].'</td></tr>';

};
}
echo '       
              
        </tbody>

      </table>
';





}


?>