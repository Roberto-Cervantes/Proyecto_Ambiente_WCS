<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getFacturaciones()
{
    global $conn;
    $sql_select_facturaciones = "SELECT f.id_factura, f.cliente_id, f.fecha, f.total, f.estado, c.nombre
                            FROM  facturaciones AS f
                            JOIN clientes AS c ON f.cliente_id = c.id_cliente;"
    return $result = $conn->query($sql_select_facturaciones);
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_facturaciones':
            editFacturaciones();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_facturaciones':
            borrarFacturaciones();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_facturaciones':
            insertarFacturaciones();
            break;
    }
}


/* function editFacturaciones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_clientes = "UPDATE clientes set nombre='" . $nombre_editado . "',
                                                  apellido='" . $apellido_editado . "',
                                                  id_distrito='" . $id_distrito_editado . "',
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
} */

function borrarFacturaciones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_facturaciones = "DELETE from facruraciones where id_factura=$id_factura";
        //echo $sql_edit_facturaciones;
        $stmt = $conn->prepare($sql_edit_facturaciones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/facturaciones.php');
}

/* function insertarFacturaciones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_clientes = "INSERT INTO clientes VALUES (NULL, :nombre, :apellido, :id_distrito, :telefono, :email)";
        
        $stmt = $conn->prepare($sql_insert_clientes);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':id_distrito', $id_distrito);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);
        
        $stmt = $conn->prepare($sql_insert_clientes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/clientes.php');
} */
