<?php
// require 'db.php';
include 'head.php';

// Obtener lista de usuarios
// try {
//     $stmt = $pdo->query('SELECT * FROM usuarios ORDER BY id ASC');
//     $usuarios = $stmt->fetchAll();
// } catch (PDOException $e) {
//     echo "Error al obtener usuarios: " . $e->getMessage();
// }
?>
<?php
include 'navbar.php';
?>
<?php
// Redirigir automáticamente
header("Location: foto.php");
exit(); // Finalizar el script para asegurar que no se ejecuta más código
?>
