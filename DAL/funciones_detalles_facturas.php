<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}


function getDetalles_Facturas()
{
    global $conn;
    $sql_select_detalles_facturas = "SELECT f.id_factura, f.cliente_id, f.fecha, f.total, f.estado, d.id_detalle_number, d.factura_id_number
                                     FROM 
                                            facturaciones f
                                     JOIN   detalles_facturas d ON f.id_factura = d.factura_id;";
    return $result = $conn->query($sql_select_detalles_facturas);
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_detalles_facturas':
            editDetalles_Facturas();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_detalles_facturas':
            borrarDetalles_Facturas();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_detalles_facturas':
            insertarDetalles_Facturas();
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

function borrarDetalles_Facturas()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_detalles_facturas = "DELETE from detalles_facturas where id_detalle_number=$id_detalle_number";
        //echo $sql_edit_facturaciones;
        $stmt = $conn->prepare($sql_edit_detalles_facturas);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalles_facturas.php');
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
