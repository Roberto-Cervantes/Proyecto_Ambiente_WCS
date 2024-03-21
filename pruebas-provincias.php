<?php
require_once "DAL/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "INCLUDE/head.php";
    ?>
</head>

<body>
    <?php
    include "INCLUDE/nav.php";
    ?>
    <div class="container">
        <div class="row">
            <h3>PROVINCIAS DE COSTA RICA</h3>
        </div>
        <div class="row">
            <p>
                <a href="xxx.php" class="btn btn-success">Nueva Provincia</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id provincia</th>
                        <th>Nombre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM provincias';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['id_provincia'] . '</td>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td width=250>';
                        echo '<a class="btn btn-primary" href="xxx.php?id=' . $row['nombre'] . '">Ver</a>';
                        echo ' ';
                        echo '<a class="btn btn-success" href="xxx.php?id=' . $row['nombre'] . '">Actualizar</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="xxx.php?id=' . $row['nombre'] . '">Borrar</a>';
                        echo ' ';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

    <?php
    include "INCLUDE/footer.php";
    ?>
</body>

</html>