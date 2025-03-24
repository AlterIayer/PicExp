<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db/conexion.php';

// Obtener el Codigo_ben desde la solicitud
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';

if ($codigo) {
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Consulta para obtener los datos del beneficiario
    $consulta = "SELECT Nombre_ben, Apellidos_ben, Telefono1_ben, Telefono2_ben FROM beneficiario WHERE Codigo_ben = :codigo";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':codigo', $codigo, PDO::PARAM_STR);
    $resultado->execute();

    if ($resultado->rowCount() >= 1) {
        // Obtener los datos
        $data = $resultado->fetch(PDO::FETCH_ASSOC);
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "Beneficiario no encontrado."]);
    }

    $conexion = null; // Cerrar conexión
} else {
    echo json_encode(["error" => "Código no proporcionado."]);
}
?>