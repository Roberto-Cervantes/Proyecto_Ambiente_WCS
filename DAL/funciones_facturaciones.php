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
                            FROM facturaciones AS f
                            JOIN clientes AS c ON f.cliente_id = c.id_cliente";
    return $conn->query($sql_select_facturaciones);
}

function getNombreCliente($id_cliente)
{
    global $conn;
    $sql_select_clientes = "SELECT nombre FROM clientes WHERE id_cliente=$id_cliente";
    $result = $conn->query($sql_select_clientes);
    $row = $result->fetch_assoc();
    return $row['nombre'];
}

function getApellidosCliente($id_cliente)
{
    global $conn;
    $sql_select_clientes = "SELECT apellidos FROM clientes WHERE id_cliente=$id_cliente";
    $result = $conn->query($sql_select_clientes);
    $row = $result->fetch_assoc();
    return $row['apellidos'];
}

function getIdClienteFacturaciones($id_factura)
{
    global $conn;
    $sql_select_clientes = "SELECT cliente_id FROM facturaciones WHERE id_factura=$id_factura";
    $result = $conn->query($sql_select_clientes);
    $row = $result->fetch_assoc();
    return $row['cliente_id'];
}

function getClientes()
{
    global $conn;
    $sql_select_clientes = "SELECT id_cliente, nombre, apellidos, email, telefono FROM clientes";
    $result = $conn->query($sql_select_clientes);
    return $result->fetch_all();
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_facturaciones':
            editFacturaciones();
            break;
        case 'borrar_facturaciones':
            borrarFacturaciones();
            break;
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
        $sql_edit_facturaciones = "UPDATE facturaciones SET cliente_id=?, fecha=?, total=?, Estado=? WHERE id_factura=?";
        $stmt = $conn->prepare($sql_edit_facturaciones);
        $stmt->bind_param("isssi", $cliente_editado, $fecha_editado, $total_editado, $Estado_editado, $id_factura);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    Desconectar();
    header('Location: ../SECTIONS/facturaciones.php');
}

function borrarFacturaciones()
{
    extract($_POST);

    try {
        global $conn;
        $sql_delete_facturaciones = "DELETE FROM facturaciones WHERE id_factura=?";
        $stmt = $conn->prepare($sql_delete_facturaciones);
        $stmt->bind_param("i", $id_factura);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    Desconectar();
    header('Location: ../SECTIONS/facturaciones.php');
}

function insertarFacturaciones()
{
    extract($_POST);

    try {
        global $conn;
        $sql_insert_facturaciones = "INSERT INTO facturaciones (cliente_id, fecha, total, Estado) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert_facturaciones);
        $stmt->bind_param('isss', $cliente_insertado, $fecha_insertado, $total_insertado, $Estado_insertado);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    Desconectar();
    header('Location: ../SECTIONS/facturaciones.php');
}
?>
