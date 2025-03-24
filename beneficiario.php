<br><br>
<?php
include 'head.php';
include 'navbar.php';

// Conexión a la base de datos
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Obtenemos el ID del usuario desde la sesión--------------
$Id_usu = $_SESSION["ss_id_usuario"];

// Variables para el buscador
$terminoBusqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Configuración para la paginación
$registrosPorPagina = 10; // Registros por página
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // Página actual
$offset = ($paginaActual - 1) * $registrosPorPagina; // Desplazamiento

// Consultamos el total de registros filtrados para calcular las páginas
$totalConsulta = "SELECT COUNT(*) AS total FROM beneficiario WHERE Id_usu = :Id_usu AND (Codigo_ben LIKE :termino OR Nombre_ben LIKE :termino)";
$resultadoTotal = $conexion->prepare($totalConsulta);
$resultadoTotal->bindParam(':Id_usu', $Id_usu, PDO::PARAM_STR);
$resultadoTotal->bindValue(':termino', "%$terminoBusqueda%", PDO::PARAM_STR); // Filtro para búsqueda
$resultadoTotal->execute();
$totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Consulta para obtener los registros filtrados con paginación
$consulta = "SELECT Codigo_ben, Nombre_ben, Apellidos_ben, Telefono1_ben, Telefono2_ben, DATE_FORMAT(Fechanac_ben, '%d-%m-%Y') AS Fechanac_ben_for
             FROM beneficiario
             WHERE Id_usu = :Id_usu AND (Codigo_ben LIKE :termino OR Nombre_ben LIKE :termino)
             LIMIT :offset, :registros";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':Id_usu', $Id_usu, PDO::PARAM_STR);
$resultado->bindValue(':termino', "%$terminoBusqueda%", PDO::PARAM_STR); // Filtro para búsqueda
$resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
$resultado->bindValue(':registros', $registrosPorPagina, PDO::PARAM_INT);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<br>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Buscador con botón a la derecha -->
            <form method="GET" class="form-inline mb-3">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar por Código o Nombre" value="<?php echo htmlspecialchars($terminoBusqueda); ?>">
                    <div class="input-group-append">
                        <button id="buscar_ben" type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th> 
                            <th>Teléfono 1</th>
                            <th>Teléfono 2</th>
                            <th>Fecha de Nac.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dat) { ?>
                            <tr>
                                <td><?php echo $dat['Codigo_ben'] ?></td>
                                <td><?php echo $dat['Nombre_ben'] . " " . $dat['Apellidos_ben']; ?></td>
                                <td><?php echo $dat['Telefono1_ben'] ?></td>
                                <td><?php echo $dat['Telefono2_ben'] ?></td>
                                <td><?php echo $dat['Fechanac_ben_for'] ?></td>
                                <td>
                                <button id="Modificar" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-codigo="<?php echo $dat['Codigo_ben']; ?>">Modificar</button>
                                </td>
                                <td>
                                <a href="foto.php?id=<?php echo $dat['Codigo_ben']; ?>"><button id="AgregarFoto" type="button" class="btn btn-success btn-sm">Agregar Fotos</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <nav aria-label="Paginación" id="Paginacion">
                <ul class="pagination justify-content-center">
                    <?php if ($paginaActual > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>&buscar=<?php echo urlencode($terminoBusqueda); ?>">Anterior</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                        <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>">
                            <a class="page-link" href="?pagina=<?php echo $i; ?>&buscar=<?php echo urlencode($terminoBusqueda); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($paginaActual < $totalPaginas): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>&buscar=<?php echo urlencode($terminoBusqueda); ?>">Siguiente</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>

</script>

<script src="js/upload.js"></script>
<?php include 'modal.php'; ?>
<?php include 'footer.php'; ?> 