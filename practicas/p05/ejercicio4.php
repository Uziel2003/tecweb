<?php
// Declaración y asignación de variables
$a = "PHP5";
$z[] = &$a; // $z[0] es una referencia a $a
$b = "5a version de PHP";
$c = $b * 10;
$a .= $b;
$b *= $c;
$z[0] = "MySQL";

// Mostrar los valores usando $GLOBALS
echo "<h2>Valores de las variables usando \$GLOBALS:</h2>";
echo "\$GLOBALS['a']: " . $GLOBALS['a'] . " (tipo: " . gettype($GLOBALS['a']) . ")<br>";
echo "\$GLOBALS['b']: " . $GLOBALS['b'] . " (tipo: " . gettype($GLOBALS['b']) . ")<br>";
echo "\$GLOBALS['c']: " . $GLOBALS['c'] . " (tipo: " . gettype($GLOBALS['c']) . ")<br>";
echo "\$GLOBALS['z'][0]: " . $GLOBALS['z'][0] . " (tipo: " . gettype($GLOBALS['z']) . ")<br>";

// Imprimir el contenido completo del array $GLOBALS
echo "Contenido del array \$GLOBALS:<br>";
print_r($GLOBALS);
?>
