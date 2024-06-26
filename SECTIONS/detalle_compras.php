<?php
require_once "../DAL/funciones_detallecompras.php";
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
            <h3>DETALLES DE COMPRAS</h3>
        </div>
        <div class="row">
            <p>
                <?php
                echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                data-target="#insertar">
                <i class="fa fa-edit">Nuevo Detalle de Compra</i></button>';
                require "DETALLES_COMPRAS/insertar_detallecompras.php";
                ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Detalle</th>
                        <th>ID Compra</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Monto Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = getDetalleCompras();
                    if ($result !== false) {
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id_detalle'] . '</td>';
                            echo '<td>' . $row['compra_id'] . '</td>';
                            echo '<td>' . getProductoDetalleCompra($row['compra_id']) . '</td>';
                            echo '<td>' . $row['cantidad'] . '</td>';
                            echo '<td>' . calcularTotal($row['cantidad'], $row['precio_unitario']) . '</td>';
                            echo '<td width=250>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#ver' . $row['id_detalle'] . ' ">
                        <i class="fa fa-edit ">Ver</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                        data-target="#editar' . $row['id_detalle'] . ' ">
                        <i class="fa fa-edit ">Actualizar</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                        data-target="#borrar' . $row['id_detalle'] . ' ">
                        <i class="fa fa-edit ">Borrar</i></button>';
                            echo ' ';
                            echo '</td>';
                            require "DETALLES_COMPRAS/editar_detallecompras.php";
                            require "DETALLES_COMPRAS/ver_detallecompras.php";
                            require "DETALLES_COMPRAS/borrar_detallecompras.php";

                            echo '</tr>';
                        }
                    } else {
                        echo "No se encontraron detalles de compras";
                    }


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
