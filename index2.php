<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    require_once "INCLUDE/head.php";
    ?>

</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2 class="mb-4">Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
            <p>Rol: <?php echo $_SESSION['rol']; ?></p>
            <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>
</div>

<?php
    include "INCLUDE/nav.php";
    include "INCLUDE/plantilla-main.php";
    include "INCLUDE/footer.php";
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


