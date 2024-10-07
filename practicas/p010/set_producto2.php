<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Productos</title>
</head>
<body>
<?php
// Comprobar si los campos están presentes
if (isset($_POST['nombre'], $_POST['marca'], $_POST['modelo'], $_POST['precio'], $_POST['unidades'], $_POST['detalles'], $_POST['imagen'])) {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $detalles = $_POST['detalles'];
    $imagen = $_POST['imagen'];

    // Conexión a la base de datos
    @$link = new mysqli('localhost', 'root', 'Uziel_123', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error);
    }

    // Comprobar si el producto ya existe
    $stmt = $link->prepare("SELECT COUNT(*) FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?");
    $stmt->bind_param("sss", $nombre, $marca, $modelo);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<h3>Error: El producto ya existe.</h3>";
    } else {
        // Insertar el nuevo producto
        $stmt = $link->prepare("INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("sssdiss", $nombre, $marca, $modelo, $precio, $unidades, $detalles, $imagen);

        if ($stmt->execute()) {
            echo "<h3>Producto insertado exitosamente</h3>";
            echo "<p>Nombre: $nombre</p>";
            echo "<p>Marca: $marca</p>";
            echo "<p>Modelo: $modelo</p>";
            echo "<p>Precio: $precio</p>";
            echo "<p>Unidades: $unidades</p>";
            echo "<p>Detalles: $detalles</p>";
            echo "<p>Imagen: $imagen</p>";
        } else {
            echo "<h3>Error al insertar el producto</h3>";
        }
        $stmt->close();
    }
    $link->close();
} else {
    echo "<h3>Todos los campos son requeridos</h3>";
}
?>
</body>
</html>
