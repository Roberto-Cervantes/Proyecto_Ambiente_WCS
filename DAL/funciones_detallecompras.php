<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}
function getDetalleCompras()
{
    global $conn;
    $sql_select_detalle = "SELECT id_detalle, compra_id, cantidad, precio_unitario FROM detalle_compras";
    $result = $conn->query($sql_select_detalle);
    if ($result && $result->num_rows > 0) {
        // Crear un array para almacenar los resultados
        $compras = array();
        // Iterar sobre los resultados y guardarlos en el array
        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }
        return $compras;
    } else {
        return false;
    }
}


function getCompras()
{
    global $conn;
    $sql_select_compras = "SELECT id_compra, id_producto, fechas, estado FROM compras";
    $result = $conn->query($sql_select_compras);
    if ($result && $result->num_rows > 0) {
        // Crear un array para almacenar los resultados
        $compras = array();
        // Iterar sobre los resultados y guardarlos en el array
        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }
        return $compras;
    } else {
        echo "No se encontraron compras.";
        return false;
    }
}

function getCompraDetalle($id_compra = null)
{
    global $conn;
    if ($id_compra !== null) {
        $sql_select_compra = "SELECT id_compra FROM compras WHERE id_compra=?";
        $stmt = $conn->prepare($sql_select_compra);
        $stmt->bind_param('i', $id_compra);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['id_compra'];
    } else {
        return null;
    }
}



function getProductoDetalleCompra($compra_id)
{
    global $conn;
    $sql_select_producto = "SELECT p.nombre 
                            FROM compras c 
                            INNER JOIN productos p ON c.id_producto = p.id_producto 
                            WHERE c.id_compra=?";
    $stmt = $conn->prepare($sql_select_producto);
    $stmt->bind_param('i', $compra_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nombre'];
    } else {
        return "Producto no encontrado";
    }
}



function calcularTotal($cantidad, $precio_unitario)
{
    return $cantidad * $precio_unitario;
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_detallecompras':
            editarDetalleCompra();
            break;
        case 'borrar_detallecompras':
            borrarDetalleCompra();
            break;
        case 'insertar_detallecompras':
            insertarDetalleCompra();
            break;
        default:
            echo "Accion desconocida: " . $_POST['accion'];
            break;
    }
}

function editarDetalleCompra()
{
    extract($_POST);
    
    try {
        global $conn;
        
        // Obtener los valores del formulario
        $id_compra_editado = $compra_insertado;
        $cantidad_editada = $cantidad_insertado; 
        $precio_unitario_editado = $precio_unitario_insertado;
        $id_detalle = $_POST['id_detalle']; 

        // Realizar la actualización en la base de datos
        $sql_edit_detallecompras = "UPDATE detalle_compras SET compra_id = ?, cantidad = ?, precio_unitario = ? WHERE id_detalle = ?";
        $stmt = $conn->prepare($sql_edit_detallecompras);
        $stmt->bind_param('ssss', $id_compra_editado, $cantidad_editada, $precio_unitario_editado, $id_detalle); 
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalle_compras.php');
}

function borrarDetalleCompra()
{
    extract($_POST);

    try {
        global $conn;
        // Borrar el detalle de compra de la base de datos
        if (!isset($id_detalle)){
            throw new Exception("ID de detalle de compra no especificada");
        }
        $sql_delete_detallecompras = "DELETE FROM detalle_compras WHERE id_detalle = ?";
        $stmt = $conn->prepare($sql_delete_detallecompras);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }
        $stmt->bind_param('i', $id_detalle); // Cambiar id_compra por compra_id
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
       
        $conn->close();
        // Redirigir al usuario después de la eliminación
        header('Location: ../SECTIONS/detalle_compras.php');
        exit(); 
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        // Cerrar la conexión a la base de datos en caso de error
        $conn->close();
    }
}


function insertarDetalleCompra()
{
    extract($_POST);

    try {
        global $conn;
        $compra_id = $_POST['compra_id'];
        $cantidad = $_POST['cantidad_insertada'];
        $precio_unitario = $_POST['precio_unitario_insertado'];

        // Insertar un solo registro en detalle_compras
        $sql_insert_detallecompra = "INSERT INTO detalle_compras (compra_id, cantidad, precio_unitario) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql_insert_detallecompra);
        $stmt->bind_param('iii', $compra_id, $cantidad, $precio_unitario);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/detalle_compras.php');
}
