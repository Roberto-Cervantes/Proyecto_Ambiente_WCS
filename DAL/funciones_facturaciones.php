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
    $sql_select_facturaciones = "SELECT f.id_factura, f.cliente_id, f.fecha, f.total, f.Estado, c.nombre
                            FROM  facturaciones AS f
                            JOIN clientes AS c ON f.cliente_id = c.id_cliente;";
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


 function editFacturaciones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_clientes = "UPDATE facturaciones set  fecha='" . $fecha_editado . "',
                                                        total='" . $total_editado . "',
                                                        Estado='" . $id_estado_insertado . "'
                                                        where id_factura=$id_factura";
        //echo $sql_edit_clientes;
        $stmt = $conn->prepare($sql_edit_facturaciones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/facturaciones.php');
} 

function borrarFacturaciones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_facturaciones = "DELETE from facturaciones where id_factura=$id_factura";
        //echo $sql_edit_facturaciones;
        $stmt = $conn->prepare($sql_edit_facturaciones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/facturaciones.php');
}

 function insertarFacturaciones()
{
    extract($_POST);
    try {
        global $conn;  
        $sql_insert_facturaciones = "INSERT INTO facturaciones VALUES (NULL,".$id_cliente_insertado.", 
        STR_TO_DATE('".$fecha_insertado."','%Y-%m-%d'), ".$total_insertado.", ".$id_estado_insertado.")";
        echo $sql_insert_facturaciones;
        $stmt = $conn->prepare($sql_insert_facturaciones);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/facturaciones.php');
} 
