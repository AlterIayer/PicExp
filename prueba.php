<?php
$directorioImagenes = "fotos/";
if (!is_dir($directorioImagenes)) {
    mkdir($directorioImagenes, 0777, true);
}

$rutaPrueba = $directorioImagenes . "prueba.txt";
if (file_put_contents($rutaPrueba, "Prueba de escritura")) {
    echo "Escritura exitosa.";
} else {
    echo "Error al escribir en la carpeta.";
}
?>