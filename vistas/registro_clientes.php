<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>

    <!-- Enlace a la CDN de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
  include_once('../controller/cliente.php');
?>

<div class="container">

    <h1>Formulario de Registro</h1>
    <form action="../controller/cliente.php" method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" required>
    </div>
    <div class="mb-3">
        <label for="referencia_id" class="form-label">Referencia ID</label>
        <input type="text" class="form-control" name="referencia_id" required>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" class="form-control" name="telefono" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</div>

<!-- Scripts opcionales de Bootstrap 5 para funcionamiento de algunos componentes -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
