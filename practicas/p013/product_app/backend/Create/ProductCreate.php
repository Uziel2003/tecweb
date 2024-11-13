<?php

namespace ProductApp\Create;

namespace App\Create;

use App\Config\database;

class ProductCreate {
    private $conexion;

    public function __construct() {
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $response = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );

        if(isset($data['nombre'])) {
            $sql = "SELECT * FROM productos WHERE nombre = '{$data['nombre']}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            
            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (null, '{$data['nombre']}', '{$data['marca']}', '{$data['modelo']}', {$data['precio']}, '{$data['detalles']}', {$data['unidades']}, '{$data['imagen']}', 0)";
                if($this->conexion->query($sql)){
                    $response['status'] =  "success";
                    $response['message'] =  "Producto agregado";
                } else {
                    $response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
            $result->free();
        }
        
        return $response;
    }
}