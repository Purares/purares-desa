<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión PURARES - Iniciar sesión</title>

     <link rel="shortcut icon" href="recursos/logos/LogoPurares.ico" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

    <div class="row justify-content-center align-items-center">

  <img src="recursos/logos/LogoPurares.jpg">

    </div> 

    <br>

    <section class="container fluid" >
    
        <div class="container fluid col-5">

            <div class="container fluid">
        
                <label>Por favor, complete los campos para iniciar sesión:</label>
        
            <br>
            <br>
        
                <form action="" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
            
                <div class="form-group col-8">
                
                    <label for="usuario">Usuario:</label>
    
                    <input type="text" class="form-control" name="username" placeholder="Usuario">
            
                </div>
     
                <div class="form-group col-8">
    
                    <label for="usuario">Contraseña:</label>
    
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
  
                </div>

                <p style="color:#FF0000" id="mensajeerror"></p>

                <br>
        
                <div class="row justify-content-around">
            
                    <button class="btn btn-primary btn-sm" type="submit" value="Iniciar Sesión">Iniciar sesión</button>
            
                </div>
                    </form>

                </div>
        
            </form>
    
        </div>

    </section>

</body>
</html>