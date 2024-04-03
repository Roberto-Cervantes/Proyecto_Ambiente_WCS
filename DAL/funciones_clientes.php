<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getClientes()
{
    global $conn;
    $sql_select_clientes = "SELECT clientes.id_cliente ,clientes.nombre, clientes.apellido, clientes.id_distrito, clientes.telefono, clientes.email, distritos.id_distrito AS id_distrito_distrito
                            FROM clientes
                            INNER JOIN distritos ON clientes.id_distrito = distritos.id_distrito";
    return $result = $conn->query($sql_select_clientes);
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_clientes':
            editClientes();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_clientes':
            borrarClientes();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_clientes':
            insertarClientes();
            break;
    }
}


function editClientes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_clientes = "UPDATE clientes set nombre='" . $nombre_editado . "',
                                                  apellido='" . $apellido_editado . "',
                                                  telefono='" . $telefono_editado . "',
                                                  email='" . $email_editado . "'
                                                  where id_cliente=$id_cliente";
        //echo $sql_edit_clientes;
        $stmt = $conn->prepare($sql_edit_clientes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/clientes.php');
}

function borrarClientes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_clientes = "DELETE from clientes where id_cliente=$id_cliente";
        //echo $sql_edit_provincias;
        $stmt = $conn->prepare($sql_edit_clientes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/clientes.php');
}

function insertarClientes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_clientes = "INSERT INTO clientes VALUES (NULL, '".$nombre_insertado."', '".$apellido_insertado.
        "', '1', '".$telefono_insertado."', '".$email_insertado."')";
        echo $sql_insert_clientes;
        $stmt = $conn->prepare($sql_insert_clientes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/clientes.php');
}
