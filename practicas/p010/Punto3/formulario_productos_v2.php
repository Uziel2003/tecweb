<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    @$link = new mysqli('localhost', 'root', 'Uziel_123', 'marketzone');

    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error);
    }

    $stmt = $link->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();
    $stmt->close();
    $link->close();
} else {
    die('ID de producto no proporcionado.');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>
<body>
    <h3>Formulario de Modificación de Producto</h3>
    <form action="update_producto.php" method="POST">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?= $producto['marca'] ?>" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?= $producto['modelo'] ?>" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?= $producto['precio'] ?>" step="0.01" required><br><br>

        <label for="unidades">Unidades:</label>
        <input type="number" id="unidades" name="unidades" value="<?= $producto['unidades'] ?>" required><br><br>

        <label for="detalles">Detalles:</label>
        <textarea id="detalles" name="detalles"><?= $producto['detalles'] ?></textarea><br><br>

        <label for="imagen">URL Imagen:</label>
        <input type="text" id="imagen" name="imagen" value="<?= $producto['imagen'] ?>"><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
