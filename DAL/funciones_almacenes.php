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
    $sql_select_almacenes = "select id_almacenes, nombre from almacenes";
    return $result = $conn->query($sql_select_almacenes);
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_almacenes':
            editAlmacenes();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_almacenes':
            borrarAlmacenes();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_almacenes':
            insertarAlmacenes();
            break;
    }
}


function editAlmacenes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_almacenes= "update almacenes set nombre='" . $nombre_editado . "' where id_almacenes=$id_almacenes";
        //echo $sql_edit_almacenes;
        $stmt = $conn->prepare($sql_edit_almacenes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/almacenes.php');
}

function borrarAlmacenes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_almacenes = "delete from almacenes where id_almacenes=$id_almacenes";
        //echo $sql_edit_provincias;
        $stmt = $conn->prepare($sql_edit_almacenes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/almacenes.php');
}

function insertarAlmacenes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_almacenes = "insert into almacenes values (NULL,'".$nombre_insertado."')";
        //echo $sql_insert_almacenes;
        $stmt = $conn->prepare($sql_insert_almacenes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/almacenes.php');
}
