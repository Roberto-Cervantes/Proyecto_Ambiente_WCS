<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getProvincias()
{
    global $conn;
    $sql_select_provincias = "select id_provincia, nombre from provincias";
    return $result = $conn->query($sql_select_provincias);
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_provincias':
            editProvincias();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_provincias':
            borrarProvincias();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_provincias':
            insertarProvincias();
            break;
    }
}


function editProvincias()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_provincias = "update provincias set nombre='" . $nombre_editado . "' where id_provincia=$id_provincia";
        //echo $sql_edit_provincias;
        $stmt = $conn->prepare($sql_edit_provincias);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/provincias.php');
}

function borrarProvincias()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_provincias = "delete from provincias where id_provincia=$id_provincia";
        //echo $sql_edit_provincias;
        $stmt = $conn->prepare($sql_edit_provincias);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/provincias.php');
}

function insertarProvincias()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_provincias = "insert into provincias values (NULL,'".$nombre_insertado."')";
        //echo $sql_insert_provincias;
        $stmt = $conn->prepare($sql_insert_provincias);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/provincias.php');
}
