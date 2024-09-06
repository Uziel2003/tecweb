<?php
$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);

// Mostrar los valores y tipos usando var_dump()
echo "<h2>Valores y tipos usando var_dump():</h2>";
echo "\$a: ";
var_dump($a);  // Imprime el tipo y valor de $a
echo "<br>";

echo "\$b: ";
var_dump($b);  // Imprime el tipo y valor de $b
echo "<br>";

echo "\$c: ";
var_dump($c);  // Imprime el tipo y valor de $c
echo "<br>";

echo "\$d: ";
var_dump($d);  // Imprime el tipo y valor de $d
echo "<br>";

echo "\$e: ";
var_dump($e);  // Imprime el tipo y valor de $e
echo "<br>";

echo "\$f: ";
var_dump($f);  // Imprime el tipo y valor de $f
echo "<br>";

// Función para convertir booleanos en cadenas legibles
function boolToStr($bool) {
    return $bool ? 'true' : 'false';
}

// Mostrar valores booleanos convertidos en cadenas
echo "<h2>Valores booleanos como cadenas:</h2>";
echo "\$c: " . boolToStr($c) . "<br>"; // Convertir y mostrar $c
echo "\$e: " . boolToStr($e) . "<br>"; // Convertir y mostrar $e
?>
