<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}

// obtener el listado de todos los productos
function getProductos()
{
    global $conn;
    $sql_select_productos = "SELECT id_productos, nombre, inventarios_id FROM productos";
    return $conn->query($sql_select_productos);
}

// obtener el nombre de un inventario en específico por id inventario
function getInventario($id_inventario)
{
    global $conn;
    $sql_select_inventario = "SELECT nombre FROM inventarios WHERE id_inventarios=$id_inventario";
    $result = $conn->query($sql_select_inventario);
    $row = $result->fetch_assoc();
    return $row['nombre'];
}

// obtener el id del inventario en la tabla productos
function getIdInventarioProductos($id_producto)
{
    global $conn;
    $sql_select_inventario = "SELECT inventarios_id FROM productos WHERE id_productos=$id_producto";
    $result = $conn->query($sql_select_inventario);
    $row = $result->fetch_assoc();
    return $row['inventarios_id'];
}

// obtener el listado de todos los inventarios
function getInventarios()
{
    global $conn;
    $sql_select_inventarios = "SELECT id_inventarios, nombre FROM inventarios";
    $result = $conn->query($sql_select_inventarios);
    return $result->fetch_all();
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_productos':
            editProductos();
            break;
        case 'borrar_productos':
            borrarProductos();
            break;
        case 'insertar_productos':
            insertarProductos();
            break;
    }
}

function editProductos()
{
    extract($_POST);
    try {
        global $conn;
        $sql_edit_productos = "UPDATE productos SET nombre=?, inventarios_id=? WHERE id_productos=?";
        $stmt = $conn->prepare($sql_edit_productos);
        $stmt->bind_param("sii", $nombre_editado, $inventario_editado, $id_productos);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/productos.php');
}

function borrarProductos()
{
    extract($_POST);
    try {
        global $conn;
        $sql_borrar_productos = "DELETE FROM productos WHERE id_productos=?";
        $stmt = $conn->prepare($sql_borrar_productos);
        $stmt->bind_param("i", $id_productos);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/productos.php');
}

function insertarProductos()
{
    extract($_POST);
    try {
        global $conn;
        $sql_insert_productos = "INSERT INTO productos VALUES (NULL, ?, ?)";
        $stmt = $conn->prepare($sql_insert_productos);
        $stmt->bind_param("si", $nombre_insertado, $inventario_insertado);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/productos.php');
}
?>
