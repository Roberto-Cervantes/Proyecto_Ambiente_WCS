<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getInventarios()
{
    global $conn;
    $sql_select_inventarios = "SELECT inventarios.id_inventario as id_inventario, 
    inventarios.producto_id as id_producto, productos.nombre as nombre_producto, 
    inventarios.almacen_id as id_almacen, almacenes.ubicacion as nombre_almacen, 
    inventarios.Ubicacion as ubicacion, inventarios.Cantidad_disponible as cant_disp
    from inventarios 
    INNER JOIN productos on inventarios.producto_id = productos.id_producto 
    INNER JOIN almacenes on inventarios.almacen_id=almacenes.id_almacen;";
    return $result = $conn->query($sql_select_inventarios);
}

function getProductos()
{
    global $conn;
    $sql_select_productos = "SELECT id_producto, nombre FROM PRODUCTOS;";
    $result = $conn->query($sql_select_productos);
    return  $result->fetch_all();
}

function getAlmacenes()
{
    global $conn;
    $sql_select_almacenes = "SELECT id_almacen, ubicacion FROM ALMACENES;";
    $result = $conn->query($sql_select_almacenes);
    return  $result->fetch_all();
}

if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_inventarios':
            editInventarios();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_inventarios':
            borrarInventarios();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_inventarios':
            insertarInventarios();
            break;
    }
}


function editInventarios()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_inventarios = "update inventarios set ". 
        "producto_id='" . $producto_id_editado . "', ".
        "almacen_id='" . $almacen_id_editado . "', ".
        "Ubicacion='" . $nombre_ubicacion . "', ".
        "Cantidad_disponible='" . $cant_disp_editado . "' ".
        "Where id_inventario='" . $inventario_id_editado . "';";
        echo $sql_edit_inventarios;
        $stmt = $conn->prepare($sql_edit_inventarios);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/inventarios.php');
}

function borrarInventarios()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_inventarios = "delete from inventarios Where id_inventario='" . $inventario_id_borrado . "';";
        echo $sql_edit_inventarios;
        $stmt = $conn->prepare($sql_edit_inventarios);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/inventarios.php');
}

function insertarInventarios()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_inventarios = "insert into inventarios values (".
            "NULL,'".$producto_id."','".$almacen_id."','".$ubicacion."','".$cant_disp."');";
        echo $sql_insert_inventarios;
        $stmt = $conn->prepare($sql_insert_inventarios);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/inventarios.php');
}
