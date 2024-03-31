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
    $sql_select_detalles_facturas = "SELECT f.id_factura, f.Estado,
                                             df.id_detalle, df.factura_id, df.producto_id, df.cantidad, df.precio_unitario,
                                             p.id_producto, p.nombre
                                    FROM
                                        facturas AS f
                                    INNER JOIN
                                        detalles_facturas AS df ON f.id_factura = df.factura_id
                                    INNER JOIN
                                        producto AS p ON df.producto_id = p.id_producto;";
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


 function editDetalles_Facturas()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_detalles_facturas = "UPDATE detalles_facturas  set cantidad='" . $cantidad_editado . "',
                                                                     precio_unitario='" . $precio_unitario_editado . "'
                                                                     where id_detalle_number=$id_detalle_number";
        //echo $sql_edit_clientes;
        $stmt = $conn->prepare($sql_edit_detalles_facturas);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalles_facturas.php');
} 

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

 function insertarFacturaciones()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_detalles_facturas = "INSERT INTO detalles_facturas VALUES (NULL, NULL, NULL, :cantidad, :precio_unitario)";
        
        $stmt = $conn->prepare($sql_insert_detalles_facturas);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio_unitario', $precio_unitario);
        
        $stmt = $conn->prepare($sql_insert_detalles_facturas);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalles_facturas.php');
}
