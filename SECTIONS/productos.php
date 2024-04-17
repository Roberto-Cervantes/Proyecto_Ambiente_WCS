<?php
require_once "../DAL/funciones_productos.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: ../login.php");
        exit();
    }
    ?>
</head>

<body>
    <?php
    include "../INCLUDE/nav.php";
    ?>
    <div class="container">
        <div class="producto">
            <h3>PRODUCTOS</h3>
        </div>
        <div class="producto">
            <p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertar">
                    <i class="fa fa-edit">Nuevo Producto</i>
                </button>
                <?php require "PRODUCTOS/insertar_productos.php"; ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Proveedor</th>
                        <th>Producto</th>
                        <th>Código</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productos = getProductos();
                    if (!empty($productos)) {
                        foreach ($productos as $producto) {
                            echo '<tr>';
                            echo '<td>' . $producto['id_producto'] . '</td>';
                            echo '<td>' . getProveedorProducto($producto['id_proveedor']) . '</td>';
                            echo '<td>' . $producto['nombre'] . '</td>';
                            echo '<td>' . $producto['codigo'] . '</td>';
                            echo '<td>' . $producto['precio'] . '</td>';
                            echo '<td width=250>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#ver' . $producto['id_producto'] . ' ">
                        <i class="fa fa-edit ">Ver</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                        data-target="#editar' . $producto['id_producto'] . ' ">
                        <i class="fa fa-edit ">Actualizar</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                        data-target="#borrar' . $producto['id_producto'] . ' ">
                        <i class="fa fa-edit ">Borrar</i></button>';
                            echo ' ';
                            echo '</td>';
                            require "PRODUCTOS/editar_productos.php";
                            require "PRODUCTOS/ver_productos.php";
                            require "PRODUCTOS/borrar_productos.php";
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay datos</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

    <?php include "../INCLUDE/footer.php"; ?>
</body>

</html>

