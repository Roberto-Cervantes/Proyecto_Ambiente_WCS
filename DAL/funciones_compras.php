<?php
require_once "../DB/database.php";


$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
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

function getProductos()
{
    global $conn;
    $sql_select_productos = "SELECT id_producto, nombre FROM productos";
    $result = $conn->query($sql_select_productos);
    if ($result && $result->num_rows > 0) {
        // Crear un array para almacenar los resultados
        $productos = array();
        // Iterar sobre los resultados y guardarlos en el array
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    } else {
        echo "No se encontraron productos.";
        return false;
    }
}

function getProductoCompra($id_producto = null)
{
    global $conn;
    if ($id_producto !== null) {
        $sql_select_producto = "SELECT nombre FROM productos WHERE id_producto=?";
        $stmt = $conn->prepare($sql_select_producto);
        $stmt->bind_param('i', $id_producto);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['nombre'];
    } else {
        return null;
    }
}


function getPrecioProducto($id_producto)
{
    global $conn;
    $sql_select_precio = "SELECT precio FROM productos WHERE id_producto=?";
    $stmt = $conn->prepare($sql_select_precio);
    $stmt->bind_param('i', $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['precio'];
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_compras':
            editarCompra();
            break;
        case 'borrar_compras':
            borrarCompra();
            break;
        case 'insertar_compras':
            insertarCompra();
            break;
        default:
            echo "Accion desconocida: " . $_POST['accion'];
            break;
    }
}

function editarCompra()
{
    extract($_POST);
    
    try {
        global $conn;
        
        // Obtener los valores del formulario
        $id_producto_editado = $producto_insertado;
        $fechas_editada = $fechas_insertado; 
        $estado_editado = $estado_insertado;
        $id_compra = $_POST['id_compra']; // Agregar la obtención de id_compra

        // Realizar la actualización en la base de datos
        $sql_edit_compras = "UPDATE compras SET id_producto = ?, fechas = ?, estado = ? WHERE id_compra = ?";
        $stmt = $conn->prepare($sql_edit_compras);
        $stmt->bind_param('ssss', $id_producto_editado, $fechas_editada, $estado_editado, $id_compra); 
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/compras.php');
}

function borrarCompra()
{
    extract($_POST);

    try {
        global $conn;
        // Borrar la compra de la base de datos
        if (!isset($id_compra)) {
            throw new Exception("ID de compra no especificado.");
        }
        $sql_edit_compras = "DELETE FROM compras WHERE id_compra = ?";
        $stmt = $conn->prepare($sql_edit_compras);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }
        $stmt->bind_param('i', $id_compra);
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
       
        $conn->close();
        // Redirigir al usuario después de la eliminación
        header('Location: ../SECTIONS/compras.php');
        exit(); 
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        // Cerrar la conexión a la base de datos en caso de error
        $conn->close();
    }
}


function insertarCompra()
{
    extract($_POST);

    try {
        global $conn;
        $sql_insert_compras = "INSERT INTO compras (id_producto, fechas, estado) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql_insert_compras);
        $stmt->bind_param('sss', $_POST['producto_insertado'], $_POST['fechas_insertado'], $_POST['estado_insertado']);
        $stmt->execute(); 
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/compras.php');
}

