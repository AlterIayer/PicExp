<?php
include 'head.php';
include 'db/conexion.php';
include 'navbar.php';

// Obtener el ID del beneficiario desde la URL
$idBeneficiario = isset($_GET['id']) ? $_GET['id'] : null;
$area = isset($_GET['area']) ? $_GET['area'] : null;

// Validar si se proporcionó un ID
if (!$idBeneficiario) {
    die("Error: No se proporcionó un ID de beneficiario.");
}

// Consulta para obtener los datos del beneficiario
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT Codigo_ben, Nombre_ben, Apellidos_ben FROM beneficiario WHERE Codigo_ben = :codigo";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':codigo', $idBeneficiario, PDO::PARAM_STR); 
$resultado->execute();

if ($resultado->rowCount() === 0) {
    die("Error: Beneficiario no encontrado.");
}

// Obtener los datos del beneficiario
$data = $resultado->fetch(PDO::FETCH_ASSOC);
$nombreCompleto = $data['Nombre_ben'] . " " . $data['Apellidos_ben'];
$codigoBeneficiario = $data['Codigo_ben'];

?>
<br>
<link rel="stylesheet" href="css/stylefoto.css">
<link rel="stylesheet" href="css/style.css">

<div class="text-center mb-4">
    <button id="showPanel1" class="btn btn-primary">Sección 1</button>
    <button id="showPanel2" class="btn btn-success">Sección 2</button>
</div>

<!-- Contenido principal -->
<div id="panel1">
    <div class="container" id="content" style="width:45%">
    <!-- Encabezado con el nombre completo y el código del beneficiario -->
    <center>
    <div class="text-center mb-4">
        <h2><?php echo htmlspecialchars($nombreCompleto); ?></h2>
        <h3 id="codigo_ben">Código: <?php echo htmlspecialchars($codigoBeneficiario); ?></h3>
        <h3 id="area_ben" style="visibility:hidden" >Área: <?php echo htmlspecialchars($area); ?></h3> 
    </div>
    </center>

    <table style="width: 100%; border-collapse: collapse; table-layout: fixed;">
        <tr>
        <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn1" for="fileInput1" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput1" accept="image/*" style="display:none;">
                <img id="preview1" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema1" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema1"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes1"></h5>
                    <select id="select_mes1" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
            <td></td>
            <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn2" for="fileInput2" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput2" accept="image/*" style="display:none;">
                <img id="preview2" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema2" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema2"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes2"></h5>
                    <select id="select_mes2" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
        </tr>
        <tr>
        <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn3" for="fileInput3" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput3" accept="image/*" style="display:none;">
                <img id="preview3" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema3" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema3"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes3"></h5>
                    <select id="select_mes3" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
            <td></td>
            <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn4" for="fileInput4" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput4" accept="image/*" style="display:none;">
                <img id="preview4" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema4" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema4"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes4"></h5>
                    <select id="select_mes4" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
        </tr>
    </table> 
    </div>
</div>


<!-- Contenido principal -->
<div id="panel2" class="d-none">
    <div class="container" id="content" style="width:45%">
    <!-- Encabezado con el nombre completo y el código del beneficiario -->
    <center>
    <div class="text-center mb-4">
        <h2><?php echo htmlspecialchars($nombreCompleto); ?></h2>
        <h3>Código: <?php echo htmlspecialchars($codigoBeneficiario); ?></h3>
    </div>
    </center>

    <table style="width: 100%; border-collapse: collapse; table-layout: fixed;">
        <tr>
        <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn5" for="fileInput5" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput5" accept="image/*" style="display:none;">
                <img id="preview5" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema5" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema5"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes5"></h5>
                    <select id="select_mes5" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
            <td></td>
            <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn2" for="fileInput2" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput2" accept="image/*" style="display:none;">
                <img id="preview2" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema2" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema2"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes2"></h5>
                    <select id="select_mes2" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
        </tr>
        <tr>
        <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn3" for="fileInput3" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput3" accept="image/*" style="display:none;">
                <img id="preview3" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema3" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema3"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes3"></h5>
                    <select id="select_mes3" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
            <td></td>
            <td style="width: 50%; padding: 10px; text-align: center; vertical-align: top;">
                <label id="btn4" for="fileInput4" class="btn btn-primary btn-sm">Cargar</label>
                <input type="file" id="fileInput4" accept="image/*" style="display:none;">
                <img id="preview4" src="" alt="" width="215" height="290"><br>
                <center>
                    <input id="tema4" class="form-control form-control-sm" type="text" placeholder="Tema:" aria-label=".form-control-sm">
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_tema4"></h5>
                    <h5 aria-label=".form-control-sm" style="visibility:hidden" id="txt_mes4"></h5>
                    <select id="select_mes4" class="form-select form-control-sm" aria-label=".form-control-sm">
                        <option value=1>Enero</option>
                        <option value=2>Febrero</option>
                        <option value=3>Marzo</option>
                        <option value=4>Abril</option>
                        <option value=5>Mayo</option>
                        <option value=6>Junio</option>
                        <option value=7>Julio</option>
                        <option value=8>Agosto</option>
                        <option value=9>Septiembre</option>
                        <option value=10>Octubre</option>
                        <option value=11>Noviembre</option>
                        <option value=12>Diciembre</option>
                    </select>
                </center>
            </td>
        </tr>
    </table>     
    </div>
</div>

<!-- Botones adicionales -->
<div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
    <button class="ExportToWord btn btn-success btn-lg">Generar documento</button>
    <button id="guardarFotos" class="btn btn-primary btn-lg">Guardar Fotos</button>
</div>

<?php include 'footer.php'; ?>
<script src="js/scriptsfoto.js"></script>