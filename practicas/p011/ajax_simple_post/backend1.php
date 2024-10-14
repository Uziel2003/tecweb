<?php
// Verificar si se recibieron los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos de usuario y password enviados por POST
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Mostrar los datos
    echo "Usuario: " . $usuario . "<br>";
    echo "Password: " . $password;
} else {
    echo "No se enviaron datos.";
}
?>
