<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2 class="mb-4">Iniciar sesión</h2>
            <form action="DAL/funciones_login.php" method="post">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contrasenna" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
