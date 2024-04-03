<?php
require_once "../DAL/funciones_almacenes.php";
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
            <h3>ALMACENES</h3>
        </div>
        <div class="row">
            <p>
                <?php
                echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                data-target="#insertar">
                <i class="fa fa-edit ">Agregar Almacen</i></button>';
                require "ALMACENES/insertar_almacenes.php";
                ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id almacenes</th>
                        <th>Nombre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = getAlmacenes();
                    if ($result->num_rows > 0) {
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id_almacen'] . '</td>';
                            echo '<td>' . $row['ubicacion'] . '</td>';
                            echo '<td width=250>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                            data-target="#ver' . $row['id_almacen'] . ' ">
                            <i class="fa fa-edit ">Ver</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                            data-target="#editar' . $row['id_almacen'] . ' ">
                            <i class="fa fa-edit ">Actualizar</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#borrar' . $row['id_almacen'] . ' ">
                            <i class="fa fa-edit ">Borrar</i></button>';
                            echo ' ';
                            echo '</td>';
                            require "ALMACENES/editar_almacenes.php";
                            require "ALMACENES/ver_almacenes.php";
                            require "ALMACENES/borrar_almacenes.php";
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