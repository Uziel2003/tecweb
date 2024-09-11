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
