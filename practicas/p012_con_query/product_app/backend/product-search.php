<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA SI SE RECIBE EL PARÁMETRO 'search'
    if( isset($_GET['search']) ) {
        $search = $conexion->real_escape_string($_GET['search']); // Se usa real_escape_string para evitar inyecciones SQL

        // SE REALIZA LA CONSULTA SQL PARA LA BÚSQUEDA
        $sql = "SELECT * FROM productos 
                WHERE (id = '{$search}' 
                OR nombre LIKE '%{$search}%' 
                OR marca LIKE '%{$search}%' 
                OR detalles LIKE '%{$search}%') 
                AND eliminado = 0";

        // SE EJECUTA LA CONSULTA
        if ( $result = $conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS COMO ARRAY ASOCIATIVO
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if($rows) {
                // SE MAPEAN Y CODIFICAN LOS RESULTADOS
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $data[$num][$key] = $value; // Si ya está en UTF-8, no es necesario utf8_encode()
                    }
                }
            } else {
                // Si no se encuentran productos, se envía un mensaje
                $data['status'] = 'error';
                $data['message'] = 'No se encontraron productos con el criterio de búsqueda.';
            }

            // SE LIBERAN LOS RESULTADOS
            $result->free();
        } else {
            // En caso de error en la consulta SQL, devuelve un error más amigable
            $data['status'] = 'error';
            $data['message'] = 'Error en la consulta: '. $conexion->error;
        }

        // SE CIERRA LA CONEXIÓN
        $conexion->close();
    } else {
        // Si no se recibe parámetro de búsqueda, devuelve un mensaje de error
        $data['status'] = 'error';
        $data['message'] = 'No se proporcionó un criterio de búsqueda.';
    }

    // SE DEVUELVE EL RESULTADO COMO JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
