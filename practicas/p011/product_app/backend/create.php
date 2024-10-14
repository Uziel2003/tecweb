<?php
include_once __DIR__ . '/database.php';

// Obtener el JSON enviado por el cliente
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Verificar que el JSON se haya decodificado correctamente
if ($data === null) {
    echo json_encode(["status" => "error", "message" => "Datos inválidos."]);
    exit;
}

// Extraer los valores del JSON
$nombre = $data['nombre'];
$precio = $data['precio'];
$unidades = $data['unidades'];
$modelo = $data['modelo'];
$marca = $data['marca'];
$detalles = $data['detalles'];
$imagen = $data['imagen'];

// Validar si el producto ya existe
$query = "SELECT * FROM productos WHERE nombre = ? AND eliminado = 0";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $nombre);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si el producto ya existe, enviar un mensaje de error
    echo json_encode(["status" => "error", "message" => "El producto con el mismo nombre ya existe."]);
    $stmt->close();
    $conexion->close();
    exit;
}

// Si el producto no existe, realizar la inserción
$insertQuery = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($insertQuery);
$stmt->bind_param("sdisssss", $nombre, $precio, $unidades, $modelo, $marca, $detalles, $imagen);

if ($stmt->execute()) {
    // Buscamos el producto recién agregado
    $lastId = $conexion->insert_id; // Obtener el último ID insertado
    $searchQuery = "SELECT * FROM productos WHERE id = ?";
    $searchStmt = $conexion->prepare($searchQuery);
    $searchStmt->bind_param("i", $lastId);
    $searchStmt->execute();
    $searchResult = $searchStmt->get_result();

    if ($searchResult->num_rows > 0) {
        $producto = $searchResult->fetch_assoc();
        // Enviar el producto agregado como respuesta
        echo json_encode(["status" => "success", "message" => "Producto agregado correctamente.", "producto" => $producto]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al buscar el producto recién agregado."]);
    }

    $searchStmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Error al agregar el producto: " . mysqli_error($conexion)]);
}

$stmt->close();
$conexion->close();
?>
