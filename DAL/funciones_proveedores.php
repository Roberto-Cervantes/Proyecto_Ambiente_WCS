<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getProveedores()
{
    global $conn;
    $sql_select_proveedores = "select id_proveedor, nombre, direccion, telefono, email from proveedores";
    return $result = $conn->query($sql_select_proveedores);
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_proveedores':
            editProveedores();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_proveedores':
            borrarProveedores();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_proveedores':
            insertarProveedores();
            break;
    }
}


function editProveedores()
{
    extract($_POST);

    try {
        global $conn;

        // Assign edited values from form
        $nombre_editado = $nombre_insertado; // Assuming 'nombre_insertado' holds the edited name
        $direccion_editado = $direccion_insertado;
        $telefono_editado = $telefono_insertado;
        $email_editado = $email_insertado;

        $sql_edit_proveedores = "UPDATE proveedores
                                  SET nombre = ?, direccion = ?, telefono = ?, email = ?
                                WHERE id_proveedor = ?";

        $stmt = $conn->prepare($sql_edit_proveedores);
        $stmt->bind_param('sssss', $nombre_editado, $direccion_editado, $telefono_editado, $email_editado, $id_proveedor);
        $stmt->execute();

        header('Location: ../SECTIONS/proveedores.php');  // Redirect after successful update
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
}


function borrarProveedores()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_proveedores = "delete from proveedores where id_proveedor=$id_proveedor";
        $stmt = $conn->prepare($sql_edit_proveedores);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/proveedores.php');
}

function insertarProveedores()
{
    global $conn;

    $sql_insert_proveedores = "INSERT INTO proveedores (nombre, direccion, telefono, email) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql_insert_proveedores);

        $stmt->bind_param('ssss', $_POST['nombre_insertado'], $_POST['direccion_insertado'], $_POST['telefono_insertado'], $_POST['email_insertado']);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "<br>No se ha insertado el proveedor.";
            return;
        }

        header('Location: ../SECTIONS/proveedores.php');
        exit(); 
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}
