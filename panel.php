<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ocultar y Mostrar Paneles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <!-- Botones para cambiar de panel -->
    <div class="text-center mb-4">
      <button id="showPanel1" class="btn btn-primary">Mostrar Panel 1</button>
      <button id="showPanel2" class="btn btn-secondary">Mostrar Panel 2</button>
    </div>

    <!-- Panel 1 -->
    <div id="panel1" class="card">
      <div class="card-header">Panel 1</div>
      <div class="card-body">
        Este es el contenido del Panel 1.
      </div>
    </div>

    <!-- Panel 2 -->
    <div id="panel2" class="card d-none">
      <div class="card-header">Panel 2</div>
      <div class="card-body">
        Este es el contenido del Panel 2.
      </div>
    </div>
  </div>

  <!-- Script para ocultar y mostrar -->
  <script>
    // Mostrar Panel 1 y ocultar Panel 2
    document.getElementById('showPanel1').addEventListener('click', function() {
      document.getElementById('panel1').classList.remove('d-none');
      document.getElementById('panel2').classList.add('d-none');
    });

    // Mostrar Panel 2 y ocultar Panel 1
    document.getElementById('showPanel2').addEventListener('click', function() {
      document.getElementById('panel2').classList.remove('d-none');
      document.getElementById('panel1').classList.add('d-none');
    });
  </script>
</body>
</html>
