<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transacciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Compras</li>
            <li><a href="SECTIONS/compras.php">Registrar Compra</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Registrar factura</li>
            <li><a href="SECTIONS/facturaciones.php">Facturar</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Inventarios</li>
            <li><a href="SECTIONS/inventarios.php">Revisar inventario</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parametros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Administrativas</li>
            <li><a href="SECTIONS/provincias.php">Provincias</a></li>
            <li><a href="SECTIONS/cantones.php">Cantones</a></li>
            <li><a href="SECTIONS/distritos.php">Distritos</a></li>
            <li><a href="SECTIONS/almacenes.php">Almacenes</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Activos</li>
            <li><a href="SECTIONS/productos.php">Productos</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Organizaciones</li>
            <li><a href="SECTIONS/clientes.php">Clientes</a></li>
            <li><a href="SECTIONS/proveedores.php">Proveedores</a></li>
          </ul>
        </li>
        <li><a href="nosotros.php">Nosotros</a></li>
        <li><a href="contactenos.php">Contactenos</a></li>
        <span class="text-success">
          <?php echo $_SESSION['nombre']; ?>
        </span>
        <span class="text-success">Rol:
          <?php echo $_SESSION['rol']; ?>
        </span>
        <a href="login.php" class="btn btn-danger">Cerrar sesión</a>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>