<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getCantones()
{
    global $conn;
    $sql_select_cantones = "select id_canton, nombre, id_provincia from cantones";
    return $result = $conn->query($sql_select_cantones);
}

function getProvincia($id_provincia)
{
    global $conn;
    $sql_select_provincias = "select nombre from provincias where id_provincia=$id_provincia";
    $result = $conn->query($sql_select_provincias);
    $row = $result->fetch_assoc();
    return $row['nombre'];
}

function getIdProvinciaCanton($id_canton)
{
    global $conn;
    $sql_select_provincias = "select id_provincia from cantones where id_canton=$id_canton";
    $result = $conn->query($sql_select_provincias);
    $row = $result->fetch_assoc();
    return $row['id_provincia'];
}

function getProvincias()
{
    global $conn;
    $sql_select_provincias = "select id_provincia, nombre from provincias";
    $result = $conn->query($sql_select_provincias);
    return  $result->fetch_all();
}

if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_cantones':
            editCantones();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_cantones':
            borrarCantones();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_cantones':
            insertarCantones();
            break;
    }
}


function editCantones()
{
    extract($_POST);
    try {
        global $conn;
        $sql_edit_cantones = "update cantones set nombre='" . $nombre_editado . "', id_provincia='" . $provincia_editada . 
        "' where id_canton='". $id_canton . "';";
        echo $sql_edit_cantones;
        $stmt = $conn->prepare($sql_edit_cantones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/cantones.php');
}

function borrarCantones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_cantones = "delete from cantones where id_canton=$id_canton";
        //echo $sql_edit_cantones;
        $stmt = $conn->prepare($sql_edit_cantones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/cantones.php');
}

function insertarCantones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_cantones = "insert into cantones values (NULL,'".$nombre_insertado."','".$provincia_insertada."')";
        //echo $sql_insert_cantones;
        $stmt = $conn->prepare($sql_insert_cantones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/cantones.php');
}
