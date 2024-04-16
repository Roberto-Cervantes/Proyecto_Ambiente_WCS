<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "INCLUDE/head.php";
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
    }
    ?>
</head>

<body>
    <?php
    include "INCLUDE/nav Index.php";
    ?>

<div class="container">
  <h1>Nosotros</h1>
  <h2>Grupo 3 nació para el proyecto del curso </h2>
  <h2> Curso SC-502-MN - Ambiente Web Cliente Servidor</h2>
  <h2>Esperamos que el mismo cumpla con las espectativas deseadas</h2>
</div>


    <?php
    include "INCLUDE/footer.php";
    ?>
</body>

</html>