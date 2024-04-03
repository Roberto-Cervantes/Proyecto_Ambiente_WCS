<?php
require_once "../DAL/funciones_distritos.php";
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
            <h3>DISTRITOS DE COSTA RICA</h3>
        </div>
        <div class="row">
            <p>
                <?php
                echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                data-target="#insertar">
                <i class="fa fa-edit ">Nuevo Distrito</i></button>';
                require "DISTRITOS/insertar_distritos.php";
                ?>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id Distrito</th>
                        <th>Nombre</th>
                        <th>Canton</th>
                        <th>Direccion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = getDistritos();
                    if ($result->num_rows > 0) {
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id_distrito'] . '</td>';
                            echo '<td>' . $row['nombre'] . '</td>';
                            echo '<td>' . getCanton($row['canton_id']) . '</td>';
                            echo '<td>' . $row['direccion'] . '</td>';
                            echo '<td width=250>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" 
                            data-target="#ver' . $row['id_distrito'] . ' ">
                            <i class="fa fa-edit ">Ver</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" 
                            data-target="#editar' . $row['id_distrito'] . ' ">
                            <i class="fa fa-edit ">Actualizar</i></button>';
                            echo ' ';
                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#borrar' . $row['id_distrito'] . ' ">
                            <i class="fa fa-edit ">Borrar</i></button>';
                            echo ' ';
                            echo '</td>';
                            require "DISTRITOS/editar_distritos.php";
                            require "DISTRITOS/ver_distritos.php";
                            require "DISTRITOS/borrar_distritos.php";
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