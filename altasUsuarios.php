<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Formulario para agregar usuarios</title>
</head>
<body>
<h1>Formulario para agregar usuarios</h1>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="textfield2"></label>
    Nick: 
    <input type="text" name="txtNick" id="nick" required>
  </p>
  <p>Nombre completo: 
    <label for="textfield"></label>
    <input type="text" name="txtNombre" id="nombre" required>
  </p>
  <p>Contraseña: 
    <label for="textfield3"></label>
    <input type="password" name="txtPassword" id="password" required>
  </p>
  <p>Categoria: 
    <select name="menuCategoria" id="categoria">
      <option value="cajero" selected="selected">Cajero</option>
      <option value="admin">Administrador</option>
    </select>
  </p>
  <p>
    <input type="submit" name="btnGuardar" id="button" value="Guardar">
  </p>
</form>
<?php
	if(isset($_POST['btnGuardar'])){ // Esperamos a que el usuario presione el boton Guardar
		require_once("conexion.php"); // Archivo externo en donde tenemos los datos para conectarnos a la DB.
		// Almacenamos en variables los datos que ingreso el usuario al sistema.
		$nick = $_POST['txtNick'];
		$nombre = $_POST['txtNombre'];
		$password = $_POST['txtPassword'];
		$contrasena = md5($password);// Encriptamos en MD5
		$categoria = $_POST['menuCategoria'];
		// Si lo desean pueden agregar otro campo a la DB que active o no la cuenta.
		// Sentencia SQL
		$sql = "INSERT INTO usuarios (nick, nombre, contrasena, categoria) ";
                $sql .= "VALUES ('$nick', '$nombre', '$contrasena', '$categoria')";
		// Comprobamos si la peticion se realizo.
		$consulta = $conexion->query($sql);
		if(!$consulta){ // No se inserto los datos a la DB.
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('Error no hemos podido almacenar la informacion.');";
			echo "</script>";
         }
		else{ // Si se realizo la insercion de datos a la DB.
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('Hemos almacenado la informacion, gracias.');";
			echo "</script>";
		}		
	}
?>
<p>&nbsp;</p>
</body>
</html>