<?php
// Comprobar si el formulario fue enviado por GET
if (isset($_GET['valor1'])) {
    echo "Valor recibido con GET: " . htmlspecialchars($_GET['valor1']) . "<br>";
}

// Comprobar si el formulario fue enviado por POST
if (isset($_POST['valor1'])) {
    echo "Valor recibido con POST: " . htmlspecialchars($_POST['valor1']);
}
?>
