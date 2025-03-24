<?php
session_start();

include_once 'db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Definir el usuario
$usuario = "Diego";

// Ajustar la consulta para seleccionar `Id_usuario` y `Usuario_usu`
$consulta = "SELECT Id_usu, Usuario_usu, Id_tipo_usu FROM usuario WHERE Usuario_usu = :usuario";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':usuario', $usuario, PDO::PARAM_STR); // Vincular el parámetro
$resultado->execute();

if ($resultado->rowCount() >= 1) {
    // Obtener los valores de la consulta
    $data = $resultado->fetch(PDO::FETCH_ASSOC); // Obtener el primer registro
    $_SESSION["ss_id_usuario"] = $data['Id_usu']; // Guardar Id_usuario en la sesión
    $_SESSION["ss_usuario"] = $data['Usuario_usu'];   // Guardar Usuario_usu en la sesión
    $_SESSION["ss_id_tipo_usu"] = $data['Id_tipo_usu'];   // Guardar Usuario_usu en la sesión
} else {
    // Si no hay resultados, asignar null
    $_SESSION["ss_id_usuario"] = null;
    $_SESSION["ss_usuario"] = null;
}

$conexion = null; // Cerrar conexión
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">PicExp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item <?php echo ($current_page == 'beneficiario.php' || $current_page == 'beneficiarioadmin.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo ($_SESSION["ss_id_tipo_usu"] == 1) ? 'beneficiarioadmin.php' : 'beneficiario.php'; ?>">Beneficiarios</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'usuario.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="usuario.php">Usuarios</a>
      </li>
    </ul>
  </div>
  <span class="navbar-text">
    <strong>Hola <?php echo htmlspecialchars($_SESSION["ss_usuario"]); ?>!</strong>
  </span>
</nav>
<br>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNrd7H9xQeATGww4BlGAhFkw6oaGpOgy7t1gQPKuHh9u+BF7A6fCPCpW1GTO2vd" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-qjpkIW/lCeBuM8nWX0x98TWGyTi+QgsK5fOu5UmsRIVhgC/gMTI0nnaiB1QuXVbo" crossorigin="anonymous"></script>

