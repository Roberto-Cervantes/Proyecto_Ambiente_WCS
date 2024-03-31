<?php
require_once "../DAL/funciones_compras.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<body>
    <?php
    include "../INCLUDE/nav.php";
    ?>
    <div class="container">
        <div class="row">
            <h3>COMPRAS</h3>
        </div>
        <div class="row">
            <p>
                <?php
                echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                data-target="#insertar">
                <i class="fa fa-edit">Nueva Compra</i></button>';
                require "COMPRAS/insertar_compras.php";
                ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Compra</th>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = getCompras();
                    foreach ($result as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['id_compra'] . '</td>';
                        echo '<td>' . getProductoCompra($row['id_producto']) . '</td>';
                        echo '<td>' . $row['fechas'] . '</td>';
                        echo '<td>' . ($row['estado'] == 1 ? 'Activo' : 'Inactivo') . '</td>';
                        echo '<td width=250>';
                        echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#ver' . $row['id_compra'] . ' ">
                        <i class="fa fa-edit ">Ver</i></button>';
                        echo ' ';
                        echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                        data-target="#editar' . $row['id_compra'] . ' ">
                        <i class="fa fa-edit ">Actualizar</i></button>';
                        echo ' ';
                        echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                        data-target="#borrar' . $row['id_compra'] . ' ">
                        <i class="fa fa-edit ">Borrar</i></button>';
                        echo ' ';
                        echo '</td>';
                        require "COMPRAS/editar_compras.php";
                        require "COMPRAS/ver_compras.php";
                        require "COMPRAS/borrar_compras.php";
                        echo '</tr>';
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
