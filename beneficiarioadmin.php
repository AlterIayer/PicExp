<br><br>
<?php
include 'head.php';
include 'navbar.php';

// Conexión a la base de datos
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Obtenemos el ID del usuario desde la sesión
$Id_usu = $_SESSION["ss_id_usuario"];

// Variables para el buscador
$terminoBusqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Configuración para la paginación
$registrosPorPagina = 10; // Registros por página
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // Página actual
$offset = ($paginaActual - 1) * $registrosPorPagina; // Desplazamiento

// Consultamos el total de registros filtrados para calcular las páginas
$totalConsulta = "SELECT COUNT(*) AS total FROM beneficiario WHERE (Codigo_ben LIKE :termino OR Nombre_ben LIKE :termino)";
$resultadoTotal = $conexion->prepare($totalConsulta);
$resultadoTotal->bindValue(':termino', "%$terminoBusqueda%", PDO::PARAM_STR); // Filtro para búsqueda
$resultadoTotal->execute();
$totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Consulta para obtener los registros filtrados con paginación
$consulta = "SELECT Codigo_ben, Nombre_ben, Apellidos_ben, Telefono1_ben, Telefono2_ben, DATE_FORMAT(Fechanac_ben, '%d-%m-%Y') AS Fechanac_ben_for
             FROM beneficiario
             WHERE (Codigo_ben LIKE :termino OR Nombre_ben LIKE :termino)
             LIMIT :offset, :registros";
$resultado = $conexion->prepare($consulta);
$resultado->bindValue(':termino', "%$terminoBusqueda%", PDO::PARAM_STR); // Filtro para búsqueda
$resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
$resultado->bindValue(':registros', $registrosPorPagina, PDO::PARAM_INT);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<br>
<!-- Inicializar tooltips de Bootstrap -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Buscador con botón a la derecha -->
            <form method="GET" class="form-inline mb-3">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar por Código o Nombre" value="<?php echo htmlspecialchars($terminoBusqueda); ?>">
                    <div class="input-group-append">
                        <button id="buscar_ben" type="submit" class="btn btn-primary">Buscar
                            <img src="icons/buscar.gif" alt="buscar" width="20" height="20">
                        </button>
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
                            <th>Teléfono Prin.</th>
                            <th>Teléfono Sec.</th>
                            <th>Fecha de Nac.</th>
                            <th></th>
                            <th>Agregar Fotos</th>
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
                                    <button id="Modificar" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-codigo="<?php echo $dat['Codigo_ben']; ?>">Modificar
                                        <img src="icons/modificar.gif" alt="modificar" width="20" height="20">
                                    </button>
                                </td>
                                <td>
                                    <!-- Botones de Agregar Fotos -->
                                    <button id="espiritual" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Espiritual" class="btn btn-success agregar-foto" data-codigo="<?php echo $dat['Codigo_ben']; ?>" data-area="espiritual">
                                        <img src="icons/espiritual.gif" alt="Espiritual" width="20" height="20">
                                    </button>
                                    <button id="fisica" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Física" class="btn btn-success agregar-foto" data-codigo="<?php echo $dat['Codigo_ben']; ?>" data-area="fisica">
                                        <img src="icons/fisica.gif" alt="Física" width="20" height="20">
                                    </button>
                                    <button id="cognitiva" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cognitiva" class="btn btn-success agregar-foto" data-codigo="<?php echo $dat['Codigo_ben']; ?>" data-area="cognitiva">
                                        <img src="icons/cognitiva.gif" alt="Cognitiva" width="20" height="20">
                                    </button>
                                    <button id="socioemocional" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Socioemocional" class="btn btn-success agregar-foto" data-codigo="<?php echo $dat['Codigo_ben']; ?>" data-area="socioemocional">
                                        <img src="icons/socioemocional.gif" alt="Socioemocional" width="20" height="20">
                                    </button>
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

<script src="js/upload.js"></script>
<?php include 'modal.php'; ?>
<?php include 'footer.php'; ?>