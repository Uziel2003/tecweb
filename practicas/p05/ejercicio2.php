<!DOCTYPE html>
<html xmlns="http://prueba/xhtml">
<head>
    <title>Ejemplo PHP dentro de XHTML</title>
</head>
<body>
    <h1>Hola, profe</h1>
    <p>Este es un ejemplo de XHTML con código PHP.</p>
    <?php
    // Código PHP embebido en XHTML
    // Declaración de variables válidas
    $_myvar = "Hola";
    $_7var = 10;
    $myvar = 3.14;
    $var7 = true;
    $_element1 = array(1, 2, 3);
    
    // Usando las variables dentro del código PHP
    // Variables Primer Ejercicio
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a; // $c es una referencia a $a

// Bloque de asignaciones Ejercicio 2
$a = "PHP server"; // Cambiamos el valor de $a
$b = &$a; // Ahora $b es una referencia a $a

    // Imprimir valores de variables
    echo $_myvar; // Imprime "Hola"
    echo "<br>"; // Salto de línea en HTML
    
    echo $_7var; // Imprime 10
    echo "<br>";
    
    echo $myvar; // Imprime 3.14
    echo "<br>";
    
    if ($var7) {
        echo "La variable \$var7 es verdadera"; // Verifica si es true
        echo "<br>";
    }
    
    echo "El valor del segundo elemento en \$_element1 es: " . $_element1[1]; // Imprime el segundo valor del array
    // Mostrando variables Primer Ejercicio
    echo "Contenido inicial de las variables:<br>";
    echo "\$a: $a<br>"; // Imprime "ManejadorSQL"
    echo "\$b: $b<br>"; // Imprime "MySQL"
    echo "\$c: $c<br>"; // Imprime "ManejadorSQL" porque $c es una referencia a $a
    echo "<br>";




    // Imprimir el contenido de cada variable (ejercicio 2)
echo "Contenido después de las asignaciones:<br>";
echo "\$a: $a<br>"; // Imprime "PHP server"
echo "\$b: $b<br>"; // Imprime "PHP server" porque $b es referencia de $a
echo "\$c: $c<br>"; // Imprime "PHP server" porque $c sigue siendo referencia de $a
    ?>





</body>
</html>

