<?php
require_once "../DAL/funciones_inventarios.php";
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
            <h3>INVENTARIOS</h3>
        </div>
        <div class="row">
            <p>
                <?php
                echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                data-target="#insertar">
                <i class="fa fa-edit ">Nuevo Inventario</i></button>';
                require "INVENTARIOS/insertar_inventarios.php";
                ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id Inventario</th>
                        <th>Id Almacén</th>
                        <th>Cantidad disponible</th>
                        <th>Producto</th>
                        <th>Ubicación</th>
                       
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    $result = getInventarios();
                    if ($result->num_rows > 0) {
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id_inventario'] . '</td>';
                            echo '<td>' . $row['producto_id'] . '</td>';
                            echo '<td>' . getCantidadByProduct($row['producto_id']) . '</td>';
                            echo '<td>' . $row['Ubicacion'] . '</td>';
                            echo '<td>' . $row['Cantidad_disponible'] . '</td>';
                            echo '<td width=250>';
                            /*echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                            data-target="#ver' . $row['id_inventarios'] . ' ">
                            <i class="fa fa-edit ">Ver</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                            data-target="#editar' . $row['id_inventarios'] . ' ">
                            <i class="fa fa-edit ">Actualizar</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#borrar' . $row['id_inventarios'] . ' ">
                            <i class="fa fa-edit ">Borrar</i></button>';
                            echo ' ';
                            echo '</td>';
                            require "INVENTARIOS/editar_inventarios.php";
                            require "INVENTARIOS/ver_inventarios.php";
                            require "INVENTARIOS/borrar_inventarios.php";*/
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