<?php
    include_once __DIR__.'/database.php';

  if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "UPDATE productos SET nombre = '$name', detalles = '$description' WHERE id = $id";
    $result = $conexion->query($query);

    if(!$result) {
      die('Error al actualizar el producto');
    }

    echo 'Producto actualizado exitosamente';
  }
?>
