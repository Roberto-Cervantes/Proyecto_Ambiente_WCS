<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2 class="mb-4">Registro de Usuario</h2>

          
            <?php if (isset($_GET['error'])): ?>
                <script>
                    alert("<?php echo $_GET['error']; ?>");
                </script>
            <?php endif; ?>

            <form id="registroForm" action="registroUsuario.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contrasenna" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
            <p class="mt-3 text-center">
                ¿Ya tienes una cuenta? 
                <a href="login.php">Inicia sesión aquí</a>
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/registrar.js"></script>
</body>
</html>
