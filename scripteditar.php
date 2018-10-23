<?php
	if(isset($_POST['btnModificar'])){
		require_once("conexion.php"); // Incluimos el archivo conexion.php
		// Los datos obtenidos de las cajas de texto las asignamos a variables.
		$codigo = $_REQUEST['txtCodigo'];
		$nombre = $_POST['txtNombre'];
		$marca = $_POST['txtMarca'];
		$precio = $_POST['txtPrecio'];
		$cantidad = $_POST['txtCantidad'];
		$descripcion = $_POST['txtDescripcion'];
		// Instruccion SQL para modificar datos.
		$sql = "UPDATE productos SET nombre='$nombre', marca='$marca', precio='$precio', cantidad='$cantidad', descripcion='$descripcion' WHERE codigo='$codigo'";
		$consulta = $conexion->query($sql);
		if(!$consulta){ // En caso de no encontrar la entrada mostraremos un mensaje de error.
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('Error no se pudo modificar el registro!');";
			echo "</script>";
		}
		else{ // En caso de encontrar el registro se muestra esta informacion
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('Hemos actualizado los datos, gracias.');";
			echo "</script>";
		}
		$conexion->close(); // Cerramos la conexion de mysql.
		echo "<a href='modificarProductos.html'>Regresar</a>";
	}
?>