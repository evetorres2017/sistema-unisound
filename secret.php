<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Página secreta</title>
</head>
<body>
<?php
	/* 
		Esta pagina es de prueba para ejemplificar una sesion, favor de investigar como configurar las variables globales de XAMPP, porque por default
		las sesiones estan desactivadas, es importante trabajar con sesiones para evitar que usuarios sin permisos accedan al sistema de ventas. 
	*/
	session_start();
	if($_SESSION['registro'] == 1){
		echo "Acceso a la página secreta.";
	}
	else{ // Al no estar la configuracion habilitada este es el mensaje que nos va a mostrar.
		echo "No tiene permiso para acceder a esta página.";
	}
?>
</body>
</html>