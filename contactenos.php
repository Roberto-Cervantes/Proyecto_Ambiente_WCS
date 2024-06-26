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
  <h2>INTEGRANTES</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="IMG/Roberto.png" alt="Los Angeles" style="width:15%;">
        <div class="carousel-caption">
          <h3>Roberto</h3>
          <p>Cervantes Castillo</p>
        </div>
      </div>

      <div class="item">
        <img src="IMG/logo.png" alt="Chicago" style="width:15%;">
        <div class="carousel-caption">
          <h3>Nombre</h3>
          <p>Apellidos</p>
        </div>
      </div>
    
      <div class="item">
        <img src="IMG/logo.png" alt="Chicago" style="width:15%;">
        <div class="carousel-caption">
          <h3>Nombre</h3>
          <p>Apellidos</p>
        </div>
      </div>

      <div class="item">
        <img src="IMG/logo.png" alt="Chicago" style="width:15%;">
        <div class="carousel-caption">
          <h3>Nombre</h3>
          <p>Apellidos</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>




    <?php
    include "INCLUDE/footer.php";
    ?>
</body>

</html>