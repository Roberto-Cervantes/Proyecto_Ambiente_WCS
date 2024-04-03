<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}

function getAlmacenes()
{
    global $conn;
    $sql_select_almacenes = "SELECT id_almacen, ubicacion FROM almacenes";
    return $result = $conn->query($sql_select_almacenes);
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_almacenes':
            editAlmacenes();
            break;
        case 'borrar_almacenes':
            borrarAlmacenes();
            break;
        case 'insertar_almacenes':
            insertarAlmacenes();
            break;
        default:
            // Manejar acción no válida
            break;
    }
}

function editAlmacenes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_almacenes = "UPDATE almacenes SET ubicacion=? WHERE id_almacen=?";
        $stmt = $conn->prepare($sql_edit_almacenes);
        $stmt->execute([$nombre_editado, $id_almacenes]);
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/almacenes.php');
}

function borrarAlmacenes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_delete_almacenes = "DELETE FROM almacenes WHERE id_almacen=?";
        $stmt = $conn->prepare($sql_delete_almacenes);
        $stmt->execute([$id_almacen]);
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/almacenes.php');
}

function insertarAlmacenes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_almacenes = "INSERT INTO almacenes (ubicacion) VALUES (?)";
        $stmt = $conn->prepare($sql_insert_almacenes);
        $stmt->execute([$nombre_insertado]);
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/almacenes.php');
}
?>
