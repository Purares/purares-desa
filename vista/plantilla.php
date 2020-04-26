
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gestíon PURARES</title>

	 <link rel="shortcut icon" href="recursos/logos/LogoPurares.ico" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


		<!--Agrego las librerias de jquery y bootstrap--> 
  
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
		<script
  src="http://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<!--FINISH TO DO -->
  
  <title>Gestion PURARES</title>
  <br>
</head>

<body>

<!--BARRA DE NAVEGACION-->

<div class="container-fluid bg-light">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php"><img src="recursos/logos/LogoPurares.png" width="110" height="32"></a>
</nav>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
   <ul class="navbar-nav">

		 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordenes</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarOrdenProd">Nueva orden</a>
      <a class="dropdown-item" href="index.php?pagina=verOrdenes">Ver ordenes</a>
    </div>
		</li>

		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Despostes</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarDesposte&tipoProveedor_NuevaCompra=%27Carnes%27">Nuevo desposte</a>
      <a class="dropdown-item" href="index.php?pagina=verDespostes">Ver despostes</a>
    </div>


 	 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Decomisos</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarDecomiso">Agregar Decomiso</a>
      <a class="dropdown-item" href="index.php?pagina=verDecomisos">Ver decomisos</a>
    </div>
		</li>

		</li>
		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Carnes</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=verCarnes">Ver carnes</a>
    </div>
		</li>

		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Insumos</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=verInsumos">Ver insumos</a>
    </div>
		</li>

		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recetas</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarReceta">Nueva receta</a>
      <a class="dropdown-item" href="index.php?pagina=verRecetas">Ver recetas</a>
    </div>
		</li>

     <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Compras</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarCompra&tipoProveedor_NuevaCompra=%27Insumos%27">Agregar compra</a>
         <a class="dropdown-item" href="index.php?pagina=verCompras">Ver compras</a>
    </div>
		</li>

 	 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Configuraciones</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarInsumo">Agregar insumo</a>
      <a class="dropdown-item" href="index.php?pagina=agregarCorte">Agregar carne</a>
      <a class="dropdown-item" href="#">Agregar proveedores</a>
    </div>
		</li>

	</div>

	</ul>

 <ul class="nav navbar-nav navbar-right">
	<li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></span>  Usuario: <?php echo $_SESSION['user'];?></a>
    <div class="dropdown-menu">
      <a class="dropdown-item cerrar-sesion" href="controlador/logout.php">Cerrar sesión</a>
    </div>
		</li>

   </ul>
</nav>
	
	</div>
</div>

	<div>

		<?php
			if (isset($_GET["pagina"])) {
				if($_GET["pagina"]=="agregarOrdenProd"||
				   $_GET["pagina"]=="verInsumos"||
			   		$_GET["pagina"]=="verCarnes"||
				   $_GET["pagina"]=="verRecetas"||
				   $_GET["pagina"]=="agregarInsumo"||
					$_GET["pagina"]=="agregarReceta"||
					$_GET["pagina"]=="agregarCorte"||
					$_GET["pagina"]=="movimientoInsumo"||
					$_GET["pagina"]=="detalleReceta"||
					$_GET["pagina"]=="agregarDesposte"||
					$_GET["pagina"]=="agregarCompra"||
					$_GET["pagina"]=="verMasCarnes"||
					$_GET["pagina"]=="verDespostes"||
					$_GET["pagina"]=="detalleDesposte"||
					$_GET["pagina"]=="agregarDecomiso"||
					$_GET["pagina"]=="verDecomisos"||
					$_GET["pagina"]=="finalizarop"||
					$_GET["pagina"]=="detalleOp"||
					$_GET["pagina"]=="verOrdenes"||
					$_GET["pagina"]=="verCompras"||
					$_GET["pagina"]=="detalleCompra"||
					$_GET["pagina"]=="detalleDecomiso"||
					$_GET["pagina"]=="pruebas"){

				   	#var_dump($_GET["pagina"]);

					include "pagina/".$_GET["pagina"].".php";

				}else{
					include "pagina/error-404.php";
				}

		}else{
				include "pagina/agregarOrdenProd.php";	
			}

			

		?>
 
	</div>
</div>

</body>
</html>