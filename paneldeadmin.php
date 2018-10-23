<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel de administración</title>
</head>
<body>
<?php
	if(isset($_POST['btnIngresar'])){ // Esperamos a que el usuario presione el boton Guardar
		require_once("conexion.php"); // Archivo externo en donde tenemos los datos para conectarnos a la DB.
		// Almacenamos en variables los datos que ingreso el usuario al sistema.
		$nick = $_POST['txtNick'];
		$password = md5($_POST['txtPassword']);
		$sql = "select *from usuarios where nick = '$nick'"; // Sentencia SQL para realizar la consulta de un producto.
		$consulta = $conexion->query($sql);
		if($registros=$consulta->fetch_array()){
			if($registros['contrasena'] == $password){				
				// Les recomiendo investigar la instruccion headerlocation para que redirijan al panel de usuario del admin.
				// Investigar como registrar y eliminar una sesion en PHP.
				session_start(); // Iniciando una sesion.
				$_SESSION['registro']=1;
				echo "<script language='JavaScript' type='text/javascript'>";
				echo "alert('Acceso concedido!');";
				echo "</script>";
				// Panel de admin
				echo "<h1>Panel de administración</h1>";
				echo "<a href='secret.php'>Página privada</a>";
			}
			else{
				echo "<script language='JavaScript' type='text/javascript'>";
				echo "alert('Error la contraseña no coincide!');";
				echo "</script>";
			}
		}
		else{ // En caso de no encontrar el registro mostraremos un mensaje de error.
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('El usuario no se encuentra registrado!, disculpe las molestias...');";
			echo "</script>";
		}
		$conexion->close(); // Cerramos la conexion de mysql.
	}
?>


</body>
</html>