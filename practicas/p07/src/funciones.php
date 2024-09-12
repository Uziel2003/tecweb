<?php
// Función para comprobar si un número es múltiplo de 5 y 7
function esMultiploDe5y7($numero) {
    if ($numero % 5 == 0 && $numero % 7 == 0) {
        return "$numero es múltiplo de 5 y 7.";
    } else {
        return "$numero no es múltiplo de 5 y 7.";
    }
}
?>


<?php
// Función para generar números aleatorios hasta obtener la secuencia impar, par, impar
function generarSecuenciaImparParImpar() {
    $matriz = [];  // Matriz para almacenar las secuencias
    $iteraciones = 0;  // Contador de iteraciones
    $numerosGenerados = 0;  // Contador de números generados

    // Repetir hasta que se obtenga la secuencia impar, par, impar
    do {
        $secuencia = [];

        // Generamos tres números aleatorios entre 100 y 999
        $numero1 = rand(100, 999);
        $numero2 = rand(100, 999);
        $numero3 = rand(100, 999);

        // Verificamos si cumplen con la secuencia impar, par, impar
        if ($numero1 % 2 != 0 && $numero2 % 2 == 0 && $numero3 % 2 != 0) {
            // Si cumplen, los agregamos a la matriz
            $secuencia = [$numero1, $numero2, $numero3];
            $matriz[] = $secuencia;
        }

        $iteraciones++;  // Aumentamos el número de iteraciones
        $numerosGenerados += 3;  // Aumentamos el número de números generados

    } while (empty($secuencia));  // Continuamos hasta que se obtenga la secuencia impar, par, impar

    // Retornamos la matriz con los resultados, el número de iteraciones y los números generados
    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'numerosGenerados' => $numerosGenerados
    ];
}
?>

<?php
// Función para encontrar el primer número aleatorio que sea múltiplo de un número dado usando while
function encontrarMultiploWhile($numeroDado) {
    $numeroAleatorio = 0;
    $intentos = 0;

    // Usamos un ciclo while para encontrar el múltiplo
    while ($numeroAleatorio % $numeroDado != 0) {
        $numeroAleatorio = rand(1, 100); // Generamos un número aleatorio entre 1 y 100
        $intentos++; // Contamos el número de intentos
    }

    return [
        'numeroAleatorio' => $numeroAleatorio,
        'intentos' => $intentos
    ];
}
?>

<?php
// Función para encontrar el primer número aleatorio que sea múltiplo de un número dado usando do-while
function encontrarMultiploDoWhile($numeroDado) {
    $numeroAleatorio = 0;
    $intentos = 0;

    // Usamos un ciclo do-while para encontrar el múltiplo
    do {
        $numeroAleatorio = rand(1, 100); // Generamos un número aleatorio entre 1 y 100
        $intentos++; // Contamos el número de intentos
    } while ($numeroAleatorio % $numeroDado != 0);

    return [
        'numeroAleatorio' => $numeroAleatorio,
        'intentos' => $intentos
    ];
}
?>
