<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario de bajas de productos</title>
</head>
<body>
	<h1>Formulario de bajas de productos</h1>
	<p></p>
	<?php
		if(isset($_POST['btnConsultar'])){
			require_once("conexion.php"); // Archivo externo en donde tenemos los datos para conectarnos a la DB.
			$codigo = $_POST['txtCodigo'];
			$sql = "select *from productos where codigo = '$codigo'"; // Sentencia SQL para realizar la consulta de un producto.
             $consulta = $conexion->query($sql);
             if($registros=$consulta->fetch_array()){ // En caso de resultar verdadera la comparacion obtenemos los datos de la DB.
                    // A diferencia del archivo consultarproducto.php aqui haremos uso de un segundo formulario con cajas de texto.
                    ?>
                    <form name="form2" method="post" action="">
                        <p>
                            Código de barras: <input type="text" name="txtCodigo" value=" <?php echo $codigo; ?> " maxlength="20" disabled/>
                        </p>
                        <p>
                            Nombre del producto: <input type="text" name="txtNombre" value=" <?php echo $registros['nombre']; ?> " maxlength="50" disabled/>
                        </p>
                        <p>
                            Marca: <input type="text" name="txtMarca" value=" <?php echo $registros['marca']; ?> " maxlength="30" disabled/>
                        </p>
                        <p>
                            Precio: <input type="text" name="txtPrecio" value=" <?php echo $registros['precio']; ?> " maxlength="10" disabled/>
                        </p>
                        <p>
                            Cantidad: <input type="text" name="txtCantidad" value=" <?php echo $registros['cantidad']; ?> " maxlength="20" disabled/>
                        </p>
                        <p>
                            Descripción: 
                              <label for="textarea"></label><br>
                              <textarea name="txtCantidad" cols="100" disabled> <?php echo $registros['descripcion']; ?> </textarea>
                        </p>
                        <p>Esta seguro que desea eliminar este producto de la DB?</p>
                        <p>
                            <input type="submit" name="btnEliminar" value="Eliminar">
                        </p>
                    </form>
                    <?php
					if(isset($_POST['btnEliminar'])){
						require_once("conexion.php"); // Archivo externo en donde tenemos los datos para conectarnos a la DB.
						$codigo = $_POST['txtCodigo'];
						$sql = "delete *from productos where codigo = '$codigo'";
						$consulta = $conexion->query($sql);
						if(!$consulta){
							echo "<script language='JavaScript' type='text/javascript'>";
							echo "alert('Error no hemos podido eliminar el registro.');";
							echo "</script>";
						}
						else{
							echo "<script language='JavaScript' type='text/javascript'>";
							echo "alert('Hemos borrado la informacion, gracias.');";
							echo "</script>";
						}	
					}
			}
			else{ // En caso de no encontrar el registro mostraremos un mensaje de error.
				echo "<script language='JavaScript' type='text/javascript'>";
				echo "alert('No se ha encontrado ningun registro!, disculpe las molestias...');";
				echo "</script>";
			}
			$conexion->close(); // Cerramos la conexion de mysql.
			echo "<a href='consbajasProductos.html'>Regresar</a>";
        }
     ?>
</body>
</html>