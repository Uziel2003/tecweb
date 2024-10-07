<?php
// Conectar a la base de datos MySQL
$link = mysqli_connect("localhost", "root", "Uziel_123", "marketzone");

// Verificar conexión
if ($link === false) {
    die("ERROR: No pudo conectarse con la base de datos. " . mysqli_connect_error());
}

// Verificar que los datos hayan sido enviados por POST
if (isset($_POST['id'], $_POST['nombre'], $_POST['marca'], $_POST['modelo'], $_POST['precio'], $_POST['unidades'], $_POST['detalles'], $_POST['imagen'])) {
    // Capturar los datos enviados por el formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $detalles = $_POST['detalles'];
    $imagen = $_POST['imagen'];

    // Preparar la consulta SQL para actualizar el registro del producto
    $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio=$precio, unidades=$unidades, detalles='$detalles', imagen='$imagen' WHERE id=$id";

    // Ejecutar la consulta y verificar el resultado
    if (mysqli_query($link, $sql)) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "ERROR: No se pudo ejecutar la actualización. " . mysqli_error($link);
    }
} else {
    echo "Faltan datos para la actualización.";
}

// Cerrar la conexión
mysqli_close($link);
?>

