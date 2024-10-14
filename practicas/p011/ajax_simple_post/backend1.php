<?php
// Verificar si los datos fueron enviados a través del método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos de usuario y password enviados por POST
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Mostrar los datos recibidos
    echo "Usuario: " . $usuario . "<br>";
    echo "Password: " . $password;
} else {
    echo "No se enviaron datos.";
}
?>

