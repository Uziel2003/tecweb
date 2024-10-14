<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA SI SE RECIBIÓ EL PARÁMETRO DE BÚSQUEDA
    if( isset($_POST['search']) ) {
        // ESCAPAR EL TEXTO DE BÚSQUEDA PARA EVITAR INYECCIÓN SQL
        $search = $conexion->real_escape_string($_POST['search']);
        
        // REALIZAR LA CONSULTA USANDO LIKE PARA BUSCAR COINCIDENCIAS PARCIALES EN NOMBRE, MARCA O DETALLES
        $sql = "SELECT * FROM productos 
                WHERE nombre LIKE '%{$search}%'
                OR marca LIKE '%{$search}%'
                OR detalles LIKE '%{$search}%'";
        
        // SE REALIZA LA QUERY DE BÚSQUEDA Y SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query($sql) ) {
            // OBTENER LOS RESULTADOS
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $producto = array();
                // CODIFICAR A UTF-8 LOS DATOS Y MAPEAR AL ARREGLO DE RESPUESTA
                foreach($row as $key => $value) {
                    $producto[$key] = utf8_encode($value);
                }
                $data[] = $producto; // Añadir producto al arreglo de resultados
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }
        $conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>