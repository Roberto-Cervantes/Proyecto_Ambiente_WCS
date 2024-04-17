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
    $sql_select_detalles_facturas = "SELECT  f.id_detalle_number, f.factura_id_number, f.producto_id, f.cantidad, f.precio_unitario,
                                              df.id_factura,
                                              p.id_producto, p.nombre
                                    FROM 
                                              detalles_facturas AS f
                                    INNER JOIN 
                                              facturaciones AS df ON f.factura_id_number = df.id_factura
                                    INNER JOIN 
                                             productos AS p ON f.producto_id = p.id_producto";
    return $conn->query($sql_select_detalles_facturas);
}


function getIDFacturaciones($id_factura)
{
    global $conn;
    $sql_select_facturaciones = "SELECT id_factura FROM facturaciones WHERE id_factura = $id_factura";
    $stmt = $conn->prepare($sql_select_facturaciones);
    $stmt->bind_param("i", $id_factura);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['id_factura'];
}



function getIdfacturacionesDetallesFacturas($id_detalle_number)
{
    global $conn;
    $sql_select_facturaciones = "SELECT factura_id_number FROM detalles_facturas WHERE id_detalle_number =$id_detalle_number";
    $stmt = $conn->prepare($sql_select_facturaciones);
    $stmt->bind_param("i", $id_detalle_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['factura_id_number'];
}

function getIdProductoDetallesFacturas($id_detalle_number)
{
    global $conn;
    $sql_select_detalles_facturas = "SELECT producto_id FROM detalles_facturas WHERE id_detalle_number=$id_detalle_number";
    $stmt = $conn->prepare($sql_select_detalles_facturas);
    $stmt->bind_param("i", $id_detalle_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['producto_id'];
}

function getFacturaciones()
{
    global $conn;
    $facturaciones = array();
    $sql_select_facturaciones = "SELECT id_factura, cliente_id, fecha, total, Estado FROM facturaciones";
    $result = $conn->query($sql_select_facturaciones);
    return $result->fetch_all();
}

function getProductos()
{
    global $conn;
    $productos = array();
    $sql_select_productos = "SELECT id_producto, id_proveedor, codigo, nombre, descripcion, precio FROM productos";
    $result = $conn->query($sql_select_productos);
    return $result->fetch_all();
}


function getNombreProducto($id_producto)
{
    global $conn;
    $sql_select_productos = "SELECT nombre FROM productos WHERE id_producto=?";
    $stmt = $conn->prepare($sql_select_productos);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['nombre'];
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_detalles_facturas':
            editDetalles_Facturas();
            break;
        case 'borrar_detalles_facturas':
            borrarDetalles_Facturas();
            break;
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
        $sql_edit_detalles_facturas = "UPDATE detalles_facturas SET factura_id_number=?, producto_id=?, cantidad=?, precio_unitario=? WHERE id_detalle_number=?";
        $stmt = $conn->prepare($sql_edit_detalles_facturas);
        $stmt->bind_param("iiidi", $factura_id_number, $producto_id, $cantidad, $precio_unitario, $id_detalle_number);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalles_facturas.php');
}

function borrarDetalles_Facturas()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_detalles_facturas = "DELETE FROM detalles_facturas WHERE id_detalle_number=?";
        
        $stmt = $conn->prepare($sql_edit_detalles_facturas);
        $stmt->bind_param("i", $id_detalle_number);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalles_facturas.php');
}

function insertarDetalles_Facturas()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_insert_detalles_facturas = "INSERT INTO detalles_facturas values (NULL,'".$factura_id_number."','".$producto_id."','".$cantidad_insertado."','".$precio_unitario_insertado."')"; 
        $stmt = $conn->prepare($sql_insert_detalles_facturas);
         $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalles_facturas.php');
}
