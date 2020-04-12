<?php
include_once 'modelo/user.php';
include_once 'controlador/user_session.php';


$userSession = new UserSession();
$user = new User();

#Si existe una sessión abirta:
if(isset($_SESSION['user']) && isset($_SESSION['userId'])){
    #Existe una sesión abierta: ver tiempo de inactividad
        

        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) {
            // last request was more than 2 minutes ago
            session_destroy();   // destroy session data in storage
        }else{
            $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

            $user->setUser($userSession->getCurrentUser());
            
        	#
        	require_once"controlador/plantillaCTR.php";
    		require_once"controlador/formulariosCTR.php";
    		require_once"modelo/formulariosMDL.php";

    		#$plantilla = new ControladorPlantilla(); 
            #$plantilla -> ctrTraerPlantilla();	
    		
            include_once 'vista/plantilla.php';
        }
    #Si esta enviando los datos de loggin
}else if(isset($_POST['username']) && isset($_POST['password'])){
        
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";

            #Cargo las variables de sesion
            $idUsuario=0;
            $userSession->setCurrentUser($userForm,$idUsuario);
            $user->setUser($userForm);
            $idUsuario=$user->getIdUsuario();
            $userSession->setCurrentUser($userForm,$idUsuario);
            $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
            
            #
            require_once"controlador/plantillaCTR.php";
    		require_once"controlador/formulariosCTR.php";
    		require_once"modelo/formulariosMDL.php";

            #
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