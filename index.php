<?php
include_once 'modelo/user.php';
include_once 'controlador/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user']) && isset($_SESSION['userId'])){
    //echo "hay sesion";
        
        $user->setUser($userSession->getCurrentUser());
        
    	#
    	require_once"controlador/plantillaCTR.php";
		require_once"controlador/formulariosCTR.php";
		require_once"modelo/formulariosMDL.php";

		#$plantilla = new ControladorPlantilla(); 
        #$plantilla -> ctrTraerPlantilla();	
		#
        include_once 'vista/plantilla.php';
        

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";

        $idUsuario=0;
        $userSession->setCurrentUser($userForm,$idUsuario);
        $user->setUser($userForm);
        $idUsuario=$user->getIdUsuario();
        $userSession->setCurrentUser($userForm,$idUsuario);

        #
        require_once"controlador/plantillaCTR.php";
		require_once"controlador/formulariosCTR.php";
		require_once"modelo/formulariosMDL.php";

		#$plantilla = new ControladorPlantilla(); 
		#$plantilla -> ctrTraerPlantilla();
		
        include_once 'vista/plantilla.php';

    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vista/login.php';
    }
}else{
    //echo "login";
	    include_once 'vista/login.php';
}


?>