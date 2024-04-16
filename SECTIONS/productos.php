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
        <div class="row">
            <h3>PRODUCTOS</h3>
        </div>
        <div class="row">
            <p>
                <?php
                echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                data-target="#insertar">
                <i class="fa fa-edit ">Nuevo producto</i></button>';
                require "PRODUCTOS/insertar_productos.php";
                ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id Producto</th>
                        <th>Id proveedor</th>
                        <th>codigo</th>
                        <th>Nombre</th>
                        <th>descripción</th>
                        <th>precio</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = getProductos();
                    if ($result->num_rows > 0) {
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id_producto'] . '</td>';
                            echo '<td>' . $row['codigo'] . '</td>';
                            echo '<td>' . $row['nombre'] . '</td>';
                            echo '<td>' . getProductoProveedor($row['id_proveedor']) . '</td>';
                            echo '<td width=250>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                            data-target="#ver' . $row['id_producto'] . ' ">
                            <i class="fa fa-edit ">Ver</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                            data-target="#editar' . $row['id_producto'] . ' ">
                            <i class="fa fa-edit ">Actualizar</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#borrar' . $row['id_producto'] . ' ">
                            <i class="fa fa-edit ">Borrar</i></button>';
                            echo ' ';
                            echo '</td>';
                            require "PRODUCTOS/editar_productos.php";
                            require "PRODUCTOS/ver_productos.php";
                            require "PRODUCTOS/borrar_productos.php";
                            echo '</tr>';
                        }
                    } else {
                        echo "No hay datos";
                    }
                    Desconectar();
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

    <?php
    include "../INCLUDE/footer.php";
    ?>
</body>

</html>