<?php
// Inicialmente, $a es una cadena
$a = "PHP5";
echo "\$a: $a (tipo: " . gettype($a) . ")<br>"; // Imprime "PHP5", tipo: string

// $z es un array que contiene una referencia a $a
$z[] = &$a; // $z[0] es una referencia a $a
echo "\$z[0]: " . $z[0] . " (tipo: " . gettype($z) . ")<br>"; // Imprime "PHP5", tipo: array

// Asignamos un nuevo valor a $b
$b = "5a version de PHP";
echo "\$b: $b (tipo: " . gettype($b) . ")<br>"; // Imprime "5a version de PHP", tipo: string

// Multiplicamos $b por 10 (PHP intenta convertir $b en número, pero como no es numérico, $c será 0)
$c = $b * 10;
echo "\$c: $c (tipo: " . gettype($c) . ")<br>"; // Imprime 0, tipo: integer

// Concatenamos $a con $b
$a .= $b;
echo "\$a: $a (tipo: " . gettype($a) . ")<br>"; // Imprime "PHP55a version de PHP", tipo: string

// Multiplicamos $b por $c (como $c es 0, $b se convertirá a 0)
$b *= $c;
echo "\$b: $b (tipo: " . gettype($b) . ")<br>"; // Imprime 0, tipo: integer

// Asignamos "MySQL" a $z[0], lo que también cambia el valor de $a ya que $z[0] es una referencia a $a
$z[0] = "MySQL";
echo "\$a: $a (tipo: " . gettype($a) . ")<br>"; // Imprime "MySQL", tipo: string
echo "\$z[0]: " . $z[0] . " (tipo: " . gettype($z) . ")<br>"; // Imprime "MySQL", tipo: array

// Imprimimos el contenido completo del array $z
echo "Contenido del array \$z:<br>";
print_r($z); // Muestra el contenido del array
?>
