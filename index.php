<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  require_once "INCLUDE/head.php";

  session_start();

  if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
  }
  ?>

</head>

<body>
  <?php
  include "INCLUDE/nav Index.php";
  ?>


  <main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">BIENVENIDO!</h1>
        <p>Bienvenido al proyecto de clase, grupo Curso SC-502-MN - Ambiente Web Cliente Servidor.</p>
        <p><a class="btn btn-primary btn-lg" href="FILES/Proyecto.pdf" role="button">Mas información</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Facturar</h2>
          <p>Crea una factura a clientes </p>
          <p><a class="btn btn-secondary" href="SECTIONS/facturaciones.php" role="button">Ir &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Comprar</h2>
          <p>Compra nuevo inventario </p>
          <p><a class="btn btn-secondary" href="SECTIONs/compras.php" role="button">Ir &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Revisar inventario</h2>
          <p>Revisa Inventario Disponible</p>
          <p><a class="btn btn-secondary" href="SECTIONS/inventarios.php" role="button">Ir &raquo;</a></p>
        </div>
      </div>

      <hr>

    </div> <!-- /container -->

  </main>


  <?php
  include "INCLUDE/footer.php";
  ?>
</body>

</html>