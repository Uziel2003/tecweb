<?php
// Mostrar la versión de Apache y PHP
echo "<h2>Información del servidor:</h2>";

// La versión de PHP
echo "Versión de PHP: " . phpversion() . "<br>";

// La versión de Apache puede estar disponible en la variable 'SERVER_SOFTWARE'
if (isset($_SERVER['SERVER_SOFTWARE'])) {
    echo "Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
} else {
    echo "No se pudo determinar la versión de Apache.<br>";
}

// Mostrar el nombre del sistema operativo del servidor
// La variable 'SYSTEM' no está disponible directamente en $_SERVER, pero
// se puede inferir mediante el sistema que ejecuta PHP.
$server_os = php_uname('s');
echo "Sistema operativo del servidor: " . $server_os . "<br>";

// Mostrar el idioma del navegador del cliente
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";
} else {
    echo "No se pudo determinar el idioma del navegador.<br>";
}
?>
