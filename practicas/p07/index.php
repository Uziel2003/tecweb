<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'src/funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
    // Revisamos si el parámetro 'numero' ha sido pasado por la URL
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        $numero = intval($numero);
        // Llamamos a la función esMultiploDe5y7 y mostramos el resultado
        echo esMultiploDe5y7($numero);
    } else {
        echo "Por favor, pasa un número como parámetro en la URL. Ejemplo: ?numero=35";
    }
    ?>

<h2>Ejercicio 2</h2>
    <p>Generación repetitiva de 3 números aleatorios hasta obtener una secuencia impar, par, impar.</p>

    <?php
    // Llamamos a la función que genera la secuencia impar, par, impar
    $resultado = generarSecuenciaImparParImpar();

    // Mostramos la matriz con las secuencias generadas
    echo "<h3>Secuencia generada (Impar, Par, Impar)</h3>";
    echo "<table border='1'>";
    foreach ($resultado['matriz'] as $fila) {
        echo "<tr>";
        foreach ($fila as $numero) {
            echo "<td>$numero</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Mostramos el número de iteraciones y la cantidad de números generados
    echo "<p><strong>{$resultado['numerosGenerados']}</strong> números obtenidos en <strong>{$resultado['iteraciones']}</strong> iteraciones.</p>";
    ?>




    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p05/index.html" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>