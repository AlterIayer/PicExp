<?php
include 'db/conexion.php';

// Obtener los datos enviados desde el frontend
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
$telefono1 = isset($_POST['telefono1']) ? $_POST['telefono1'] : null;
$telefono2 = isset($_POST['telefono2']) && !empty($_POST['telefono2']) ? $_POST['telefono2'] : null;

if ($codigo) {
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Consulta SQL para actualizar los teléfonos
    $consulta = "UPDATE beneficiario 
                 SET Telefono1_ben = :telefono1, Telefono2_ben = :telefono2 
                 WHERE Codigo_ben = :codigo";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':telefono1', $telefono1, PDO::PARAM_STR);
    $resultado->bindParam(':telefono2', $telefono2, PDO::PARAM_STR);
    $resultado->bindParam(':codigo', $codigo, PDO::PARAM_STR);

    if ($resultado->execute()) {
        echo json_encode(["success" => "Datos actualizados correctamente."]);
    } else {
        echo json_encode(["error" => "Error al actualizar los datos."]);
    }

    $conexion = null; // Cerrar conexión
} else {
    echo json_encode(["error" => "Código no proporcionado."]);
}
?>