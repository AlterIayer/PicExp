<?php
include 'db/conexion.php';

header("Content-Type: application/json");

try {
    $datos = json_decode(file_get_contents("php://input"), true);

    if (!isset($datos['fotos']) || empty($datos['fotos'])) {
        echo json_encode(["success" => false, "error" => "No se proporcionaron datos válidos."]);
        exit;
    }

    $conexion = new Conexion();
    $pdo = $conexion->Conectar();

    // Directorio donde se guardarán las imágenes
    $directorioImagenes = "fotos/";
    if (!is_dir($directorioImagenes)) {
        mkdir($directorioImagenes, 0777, true); // Crear el directorio si no existe
    }

    $consulta = "INSERT INTO fotos (Foto_foto, Tema_foto, Fecha_foto, Codigo_ben, Id_area, Id_sec, Id_an) VALUES (:Foto_foto, :Tema_foto, :Fecha_foto, :Codigo_ben, :Id_area, :Id_sec, :Id_an)";
    $stmt = $pdo->prepare($consulta);

    foreach ($datos['fotos'] as $foto) {
        // Decodificar la imagen Base64 (si es necesario)
        $nombreArchivo = $foto['Foto_foto'];
        $rutaCompleta = $directorioImagenes . $nombreArchivo;

        // Aquí puedes manejar la conversión de Base64 a archivo si es necesario
        // Por ahora, asumimos que la imagen ya está en formato válido

        // Guardar la ruta en la base de datos
        $stmt->bindParam(":Foto_foto", $nombreArchivo);
        $stmt->bindParam(":Tema_foto", $foto['Tema_foto']);
        $stmt->bindParam(":Fecha_foto", $foto['Fecha_foto']);
        $stmt->bindParam(":Codigo_ben", $foto['Codigo_ben']);
        $stmt->bindParam(":Id_area", $foto['Id_area'], PDO::PARAM_INT);
        $stmt->bindValue(":Id_sec", 1,  PDO::PARAM_INT); // Valor fijo
        $stmt->bindValue(":Id_an", 1,  PDO::PARAM_INT);  // Valor fijo

        if (!$stmt->execute()) {
            throw new Exception("Error al insertar los datos en la base de datos.");
        }
    }

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>