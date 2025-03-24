<?php
include 'head.php';
include 'db/conexion.php';

?>
<?php
include 'navbar.php';
?>
<link rel="stylesheet" href="css/stylefoto.css">
<link rel="stylesheet" href="css/style.css">
    <div class="container" id="content" style="width:45%">
        <table>
            <tr>
                <td>
                    <label id="btn1" for="fileInput1" class="btn btn-primary btn-sm">Cargar</label>
                    <input type="file" id="fileInput1" accept="image/*" style="display:none;">
                    <img id="preview1" src="" alt="" width="250" height="325"><br>
                    <center>
                        <input id="tema1" class="form-control form-control-sm" type="text" placeholder="Tema:"
                            aria-label=".form-control-sm"> 
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
                    <br><br>
                </td>
                <td></td>
                <td>
                    <label id="btn2" for="fileInput2" class="btn btn-primary btn-sm">Cargar</label>
                    <input type="file" id="fileInput2" accept="image/*" style="display:none;">
                    <img id="preview2" src="" alt="" width="250" height="325"><br>
                    <center>
                        <input  id="tema2" class="form-control form-control-sm" type="text" placeholder="Tema:"
                            aria-label=".form-control-sm">
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
                    <br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label id="btn3" for="fileInput3" class="btn btn-primary btn-sm">Cargar</label>
                    <input type="file" id="fileInput3" accept="image/*" style="display:none;">
                    <img id="preview3" src="" alt="" width="250" height="325"><br>
                    <center>
                        <input  id="tema3" class="form-control form-control-sm" type="text" placeholder="Tema:"
                            aria-label=".form-control-sm">
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
                <td>
                    <label id="btn4" for="fileInput4" class="btn btn-primary btn-sm">Cargar</label>
                    <input type="file" id="fileInput4" accept="image/*" style="display:none;">
                    <img id="preview4" src="" alt="" width="250" height="325"><br>
                    <center>
                        <input  id="tema4" class="form-control form-control-sm" type="text" placeholder="Tema:"
                            aria-label=".form-control-sm">
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
    <!-- Botones adicionales -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
        <button class="ExportToWord btn btn-success btn-lg">Generar documento</button>
    </div>


    <?php include 'footer.php'; ?>
    
    <script src="js/scriptsfoto.js"></script>