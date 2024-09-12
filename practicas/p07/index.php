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



<h2>Ejercicio 3</h2>
    <p>Encuentra el primer número aleatorio que sea múltiplo de un número dado.</p>

    <?php
    // Verificamos si el parámetro 'numero' ha sido pasado por la URL
    if (isset($_GET['numero'])) {
        $numeroDado = intval($_GET['numero']); // Convertimos el valor en un entero

        if ($numeroDado > 0) {
            // Llamamos a la función para encontrar el múltiplo usando while
            $resultadoWhile = encontrarMultiploWhile($numeroDado);

            // Llamamos a la función para encontrar el múltiplo usando do-while
            $resultadoDoWhile = encontrarMultiploDoWhile($numeroDado);

            // Mostramos los resultados de la función con while
            echo "<h3>Resultado usando ciclo <code>while</code></h3>";
            echo "<p>Número encontrado: {$resultadoWhile['numeroAleatorio']} después de {$resultadoWhile['intentos']} intentos.</p>";

            // Mostramos los resultados de la función con do-while
            echo "<h3>Resultado usando ciclo <code>do-while</code></h3>";
            echo "<p>Número encontrado: {$resultadoDoWhile['numeroAleatorio']} después de {$resultadoDoWhile['intentos']} intentos.</p>";
        } else {
            echo "Por favor, pasa un número mayor que 0 como parámetro en la URL. Ejemplo: ?numero=5";
        }
    } else {
        echo "Por favor, pasa un número como parámetro en la URL. Ejemplo: ?numero=5";
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Arreglo ASCII </title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Tabla ASCII de Letras a-z</h2>

    <?php
    // Crear el arreglo con índices de 97 a 122 y valores de 'a' a 'z'
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }

    // Mostrar el arreglo en una tabla XHTML
    echo "<table>";
    echo "<tr><th>Índice</th><th>Letra</th></tr>";

    foreach ($arreglo as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }

    echo "</table>";
    ?>

</body>
</html>










    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p05/supervariables.php" method="post">
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