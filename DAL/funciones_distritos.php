<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


// obtener el listados de todos los distritos
function getDistritos()
{
    global $conn;
    $sql_select_distritos = "select id_distrito, nombre, canton_id from distritos";
    return $result = $conn->query($sql_select_distritos);
}

//obtener el nombre de un canton en especifico por id canton
function getCanton($id_canton)
{
    global $conn;
    $sql_select_cantones = "select nombre from cantones where id_canton=$id_canton";
    $result = $conn->query($sql_select_cantones);
    $row = $result->fetch_assoc();
    return $row['nombre'];
}

//obtener el id del canton en la tabla distritos
function getIdCantonDistrito($id_distrito)
{
    global $conn;
    $sql_select_canton = "select canton_id from distritos where id_distrito=$id_distrito";
    $result = $conn->query($sql_select_canton);
    $row = $result->fetch_assoc();
    return $row['canton_id'];
}

// obtener el listados de todos los cantones
function getInventarios()
{
    global $conn;
    $sql_select_cantones = "select id_canton, nombre from cantones";
    $result = $conn->query($sql_select_cantones);
    return  $result->fetch_all();
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_distritos':
            editDistritos();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_distritos':
            borrarDistritos();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_distritos':
            insertarDistritos();
            break;
    }
}


function editDistritos()
{
    extract($_POST);
    try {
        global $conn;
        $sql_edit_distritos = "update distritos set nombre='" . $nombre_editado . "', canton_id='" . $canton_editado . 
        "' where id_distrito='". $id_distrito . "';";
        echo $sql_edit_distritos;
        $stmt = $conn->prepare($sql_edit_distritos);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/distritos.php');
}

function borrarDistritos()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_distritos = "delete from distritos where id_distrito=$id_distrito";
        //echo $sql_edit_cantones;
        $stmt = $conn->prepare($sql_edit_distritos);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/distritos.php');
}

function insertarDistritos()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_distritos = "insert into distritos values (NULL,'".$nombre_insertado."','".$canton_insertado."')";
        //echo $sql_insert_cantones;
        $stmt = $conn->prepare($sql_insert_distritos);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/distritos.php');
}
