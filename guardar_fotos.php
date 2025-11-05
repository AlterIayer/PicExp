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

    // Consulta base para insertar
    $consulta = "INSERT INTO fotos (Foto_foto, Tema_foto, Fecha_foto, Codigo_ben, Id_area, Id_sec, Id_an) 
                 VALUES (:Foto_foto, :Tema_foto, :Fecha_foto, :Codigo_ben, :Id_area, :Id_sec, :Id_an)";
    $stmt = $pdo->prepare($consulta);

    // Consulta para verificar existencia
    $consultaExiste = "SELECT COUNT(*) FROM fotos 
                       WHERE Codigo_ben = :Codigo_ben AND Id_area = :Id_area AND Id_sec = :Id_sec";
    $stmtExiste = $pdo->prepare($consultaExiste);

    $guardadas = 0;
    $omitidas = 0;

    foreach ($datos['fotos'] as $foto) {
         // Verificar si ya existe una foto en esa posición
        $stmtExiste->execute([
            ':Codigo_ben' => $foto['Codigo_ben'],
            ':Id_area' => $foto['Id_area'],
            ':Id_sec' => $foto['Id_sec']
        ]);
        $existe = $stmtExiste->fetchColumn();

        if ($existe > 0) {
            $omitidas++;
            continue; // Saltar si ya existe
        }
        // Generar un nombre único para la imagen
        $timestamp = microtime(true) * 10000; // Timestamp único
        $extension = "jpg"; // Extensión predeterminada
        $nombreArchivo = "{$foto['Codigo_ben']}_{$timestamp}.{$extension}";
        $rutaCompleta = $directorioImagenes . $nombreArchivo;

        // Decodificar la imagen Base64 y guardarla en el sistema de archivos
        if (strpos($foto['Foto_foto'], 'data:image') === 0) { // Verificar si es Base64
            list(, $imagenBase64) = explode(',', $foto['Foto_foto']); // Separar el encabezado Base64
            $imagenDecodificada = base64_decode($imagenBase64); // Decodificar la imagen

            // Guardar la imagen en el sistema de archivos
            if (!file_put_contents($rutaCompleta, $imagenDecodificada)) {
                throw new Exception("Error al guardar la imagen en el sistema de archivos.");
            }
            
        } else {
            throw new Exception("Formato de imagen no válido.");
        }

        // Guardar la ruta en la base de datos
        $stmt->bindParam(":Foto_foto", $foto['Foto_foto'], PDO::PARAM_STR);
        $stmt->bindParam(":Tema_foto", $foto['Tema_foto'], PDO::PARAM_STR);
        $stmt->bindParam(":Fecha_foto", $foto['Fecha_foto'], PDO::PARAM_STR);
        $stmt->bindParam(":Codigo_ben", $foto['Codigo_ben'], PDO::PARAM_STR);
        $stmt->bindParam(":Id_area", $foto['Id_area'], PDO::PARAM_INT);
        $stmt->bindValue(":Id_sec", $foto['Id_sec'], PDO::PARAM_INT); // Valor fijo
        $stmt->bindValue(":Id_an", 1, PDO::PARAM_INT);  // Valor fijo

        if (!$stmt->execute()) {
            throw new Exception("Error al insertar los datos en la base de datos.");
        }        
        $guardadas++;
    }

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>