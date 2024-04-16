<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}

function getinventarios()
{
    global $conn;
    $sql_select_inventarios = "select id_inventario, producto_id, almacen_id, Ubicacion, Cantidad_disponible from inventarios";
    return $result = $conn->query($sql_select_inventarios);
}

function getinventariosById($id_inventario) // Cambiado el nombre de la función
{
    global $conn;
    $sql_select_inventarios = "select nombre from almacenes where id_Aa=$id_inventario"; 
    $result = $conn->query($sql_select_inventarios);
    $row = $result->fetch_assoc();
    return $row['nombre'];
}

function getCantidadByProduct($id_inventario_editado) // Cambiado el nombre de la función
{
    global $conn;
    $sql_select_inventarios = "select Cantidad_disponible from inventarios where id_inventario=$id_inventario_editado";
    $result = $conn->query($sql_select_inventarios);
    $row = $result->fetch_assoc();
    return $row;
}

function getIdalmacenesinventarios($id_inventarios)
{
    global $conn;
    $sql_select_almacenes = "select almacenes_id from inventarios where id_inventarios=$id_inventarios";
    $result = $conn->query($sql_select_almacenes);
    $row = $result->fetch_assoc();
    return $row['almacenes_id']; // Corregido el nombre de la columna
}

function getAlmacenes() // Cambiado el nombre de la función
{
    global $conn;
    $sql_select_almacenes = "select id_almacenes, nombre from almacenes";
    $result = $conn->query($sql_select_almacenes);
    return $result->fetch_all();
}

if (isset($_POST['accion'])) 
{
    switch ($_POST['accion']) {
        case 'editar_inventarios':
            editInventarios();
            break;
        case 'borrar_inventarios':
            borrarInventarios();
            break;
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
        $sql_edit_inventarios = "update inventarios set nombre='" . $nombre_editado . "', almacenes_id='" . $almacen_editado . 
        "' where id_inventarios='". $id_inventarios . "';";
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
        $sql_edit_inventarios = "delete from inventarios where id_inventarios=$id_inventarios";
        //echo $sql_edit_inventarios;
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
        $sql_insert_inventarios = "insert into inventarios values (NULL,'".$producto_id."','".
        $almacen_id."','".$Ubicacion."','".$Cantidad_disponible."')";
        echo $sql_insert_inventarios;
        $stmt = $conn->prepare($sql_insert_inventarios);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/inventarios.php');
}

