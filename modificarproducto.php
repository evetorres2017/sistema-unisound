<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Formulario de ediciones</title>
	</head>
	<body>
		<?php
            if(isset($_POST['btnConsultar'])){
                $codigo = $_POST['txtCodigo']; // Asignamos el valor de la etiqueta de texto a una variable.
                require_once("conexion.php"); // Incluimos el archivo conexion.php
                $sql = "select *from productos where codigo = '$codigo'"; // Sentencia SQL para realizar la consulta de un producto.
                $consulta = $conexion->query($sql);
                if($registros=$consulta->fetch_array()){ // En caso de resultar verdadera la comparacion obtenemos los datos de la DB.
                    // A diferencia del archivo consultarproducto.php aqui haremos uso de un segundo formulario con cajas de texto.
                    ?>
                    <form name="form2" method="post" action="scripteditar.php">
                        <p>
                            Código de barras: <input type="text" name="txtCodigo" value=" <?php echo $codigo; ?> " maxlength="20" required/>
                        </p>
                        <p>
                            Nombre del producto: <input type="text" name="txtNombre" value=" <?php echo $registros['nombre']; ?> " maxlength="50" required/>
                        </p>
                        <p>
                            Marca: <input type="text" name="txtMarca" value=" <?php echo $registros['marca']; ?> " maxlength="30" required/>
                        </p>
                        <p>
                            Precio: <input type="text" name="txtPrecio" value=" <?php echo $registros['precio']; ?> " maxlength="10" required/>
                        </p>
                        <p>
                            Cantidad: <input type="text" name="txtCantidad" value=" <?php echo $registros['cantidad']; ?> " maxlength="20" required/>
                        </p>
                        <p>
                            Descripcion: 
                              <label for="textarea"></label><br>
                              <textarea name="txtCantidad" cols="100" required> <?php echo $registros['descripcion']; ?> </textarea>
                        </p>
                        <p>
                            <input type="submit" name="btnModificar" value="Modificar">
                        </p>
                    </form>
                    <?php
            	}
                else{ // En caso de no encontrar el registro mostraremos un mensaje de error.
                    echo "<script language='JavaScript' type='text/javascript'>";
                    echo "alert('No se ha encontrado ningun registro!, disculpe las molestias...');";
                    echo "</script>";
                }
                $conexion->close(); // Cerramos la conexion de mysql.
                echo "<a href='modificarProductos.html'>Regresar</a>";
            }
        ?>
	</body>
 </html>