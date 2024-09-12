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
    <h2>Ejercicio 4  </h2>
    <h3> Arreglo ASCII </h3>
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
    <h2>Tabla ascii de Letras a-z</h2>

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



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Ejercico 5</h2>
    <h3>Formulario de Validación de Edad y Sexo</h3>
    <form action="index.php" method="POST">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="0" required>
        <br><br>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="">Seleccione su sexo</option>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    // Procesar los datos del formulario si han sido enviados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';

        // Validamos los datos
        if ($sexo === 'femenino' && $edad >= 18 && $edad <= 35) {
            echo "<h3>Bienvenida, usted está en el rango de edad permitido.</h3>";
        } else {
            echo "<h3>Error: Usted no cumple con los requisitos.</h3>";
        }
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2> Ejercicio 6 </h2>
    <h3>Consulta de Parque Vehicular</h3>
    <form action="index.php" method="POST">
        <label for="matricula">Consultar por Matrícula:</label>
        <input type="text" id="matricula" name="matricula" placeholder="LLLNNNN">
        <input type="submit" name="consulta" value="Consultar">
    </form>

    <form action="index.php" method="POST">
        <input type="submit" name="todos" value="Mostrar Todos los Autos">
    </form>

    <?php
    // Arreglo asociativo de 15 autos
    $parque_vehicular = [
        'UBN6338' => [
            'Auto' => ['marca' => 'HONDA', 'modelo' => 2020, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Alfonzo Esparza', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'C.U., Jardines de San Manuel']
        ],
        'UBN6339' => [
            'Auto' => ['marca' => 'MAZDA', 'modelo' => 2019, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'Ma. del Consuelo Molina', 'ciudad' => 'Puebla, Pue.', 'direccion' => '97 oriente']
        ],
        'ABC1234' => [
            'Auto' => ['marca' => 'TOYOTA', 'modelo' => 2018, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'Juan Pérez', 'ciudad' => 'Guadalajara, Jalisco', 'direccion' => 'Calle Falsa 123']
        ],
        'DEF5678' => [
            'Auto' => ['marca' => 'NISSAN', 'modelo' => 2017, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'Luis Gómez', 'ciudad' => 'Monterrey, Nuevo León', 'direccion' => 'Avenida Siempreviva 456']
        ],
        // Agrega los registros restantes aquí...
        'GHI9012' => [
            'Auto' => ['marca' => 'FORD', 'modelo' => 2021, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Carlos Martínez', 'ciudad' => 'CDMX', 'direccion' => 'Calle de las Flores 789']
        ],
        'JKL3456' => [
            'Auto' => ['marca' => 'CHEVROLET', 'modelo' => 2016, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'María López', 'ciudad' => 'Toluca, Estado de México', 'direccion' => 'Calle Estrella 101']
        ],
        'MNO7890' => [
            'Auto' => ['marca' => 'KIA', 'modelo' => 2019, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'José Ramírez', 'ciudad' => 'Morelia, Michoacán', 'direccion' => 'Calle Luna 202']
        ],
        'PQR2345' => [
            'Auto' => ['marca' => 'VOLKSWAGEN', 'modelo' => 2015, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Laura García', 'ciudad' => 'Querétaro, Qro.', 'direccion' => 'Calle Sol 303']
        ],
        // Continúa con el resto de los registros...
    ];

    // Consultar por matrícula
    if (isset($_POST['consulta']) && !empty($_POST['matricula'])) {
        $matricula = strtoupper($_POST['matricula']); // Convertir la matrícula a mayúsculas
        if (array_key_exists($matricula, $parque_vehicular)) {
            echo "<h3>Información del Vehículo</h3>";
            echo "<pre>";
            print_r($parque_vehicular[$matricula]);
            echo "</pre>";
        } else {
            echo "<p>No se encontró un vehículo con la matrícula: $matricula</p>";
        }
    }

    // Mostrar todos los autos registrados
    if (isset($_POST['todos'])) {
        echo "<h3>Todos los Vehículos Registrados</h3>";
        echo "<pre>";
        print_r($parque_vehicular);
        echo "</pre>";
    }
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