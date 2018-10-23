<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Formulario para añadir productos</title>
</head>
<body>
<h1>Formulario para añadir productos</h1>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="textfield2"></label>
    Código de barras: 
    <input type="text" name="txtCodigo" id="codigo" required>
  </p>
  <p>Nombre del producto: 
    <label for="textfield"></label>
    <input type="text" name="txtNombre" id="nombre" required>
  </p>
  <p>Marca: 
    <label for="textfield3"></label>
    <input type="text" name="txtMarca" id="marca" required>
  </p>
  <p>Precio: 
    <label for="textfield4"></label>
    <input type="text" name="txtPrecio" id="precio" required>
  </p>
  <p>Cantidad: 
    <label for="textfield5"></label>
    <input type="text" name="txtCantidad" id="cantidad" required>
  </p>
  <p>Descripcion:</p>
  <p>
    <label for="textfield6"></label>
    <input type="text" name="txtDescripcion" id="descripcion" required>
  </p>
  <p>
    <input type="submit" name="btnGuardar" id="button" value="Guardar">
  </p>
</form>
<?php
	if(isset($_POST['btnGuardar'])){
		require_once("conexion.php");
		$codigo = $_POST['txtCodigo'];
		$nombre = $_POST['txtNombre'];
		$marca = $_POST['txtMarca'];
		$precio = $_POST['txtPrecio'];
		$cantidad = $_POST['txtCantidad'];
		$descripcion = $_POST['txtDescripcion'];
		$sql = "INSERT INTO productos (codigo, nombre, marca, precio, cantidad, descripcion) ";
        $sql .= "VALUES ('$codigo', '$nombre', '$marca', '$precio', '$cantidad', '$descripcion')";
		$consulta = $conexion->query($sql);
        if(!$consulta){
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('Error no hemos podido almacenar la informacion.');";
			echo "</script>";
		}
		else{
			echo "<script language='JavaScript' type='text/javascript'>";
			echo "alert('Hemos almacenado la informacion, gracias.');";
			echo "</script>";
		}	
	}
?>
<p>&nbsp;</p>
</body>
</html>