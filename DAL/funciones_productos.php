<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}

function getProductos()
{
    global $conn;
    $sql_select_productos = "SELECT id_producto, id_proveedor, codigo, nombre, descripcion, precio FROM productos";
    $result = $conn->query($sql_select_productos);
    if ($result && $result->num_rows > 0) {
        // Crear un array para almacenar los resultados
        $productos = array();
        // Iterar sobre los resultados y guardarlos en el array
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    } elseif ($result) {
        // No se encontraron productos, pero la consulta se ejecutó correctamente
        echo "No se encontraron productos.";
        return array(); // Devolver un array vacío en lugar de false
    } else {
        // La consulta no se ejecutó correctamente
        echo "Error al buscar productos: " . $conn->error;
        return false;
    }
}


function getProveedores()
{
    global $conn;
    $sql_select_proveedores = "SELECT id_proveedor, nombre FROM proveedores";
    $result = $conn->query($sql_select_proveedores);
    if ($result && $result->num_rows > 0) {
        // Crear un array para almacenar los resultados
        $proveedores = array();
        // Iterar sobre los resultados y guardarlos en el array
        while ($row = $result->fetch_assoc()) {
            $proveedores[] = $row;
        }
        return $proveedores;
    } else {
        echo "No se encontraron proveedores.";
        return false;
    }
}

function getProveedorProducto($id_proveedor = null)
{
    global $conn;
    if ($id_proveedor !== null) {
        $sql_select_proveedor = "SELECT nombre FROM proveedores WHERE id_proveedor=?";
        $stmt = $conn->prepare($sql_select_proveedor);
        $stmt->bind_param('i', $id_proveedor);
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
        case 'editar_productos':
            editarProducto();
            break;
        case 'borrar_productos':
            borrarProducto();
            break;
        case 'insertar_productos':
            insertarProducto();
            break;
        default:
            echo "Accion desconocida: " . $_POST['accion'];
            break;
    }
}

function editarProducto()
{
    extract($_POST);
    
    try {
        global $conn;
        
        // Obtener los valores del formulario
        $id_proveedor_editado = $id_proveedor_insertado;
        $codigo_editado = $codigo_insertado; 
        $nombre_editado = $nombre_insertado;
        $descripcion_editada = $descripcion_insertado; 
        $precio_editado = $precio_insertado;
        $id_producto = $_POST['id_producto']; // Obtener el ID del producto

        // Realizar la actualización en la base de datos
        $sql_edit_productos = "UPDATE productos SET id_proveedor = ?, codigo = ?, nombre = ?, descripcion = ?, precio = ? WHERE id_producto = ?";
        $stmt = $conn->prepare($sql_edit_productos);
        $stmt->bind_param('isssdi', $id_proveedor_editado, $codigo_editado, $nombre_editado, $descripcion_editada, $precio_editado, $id_producto); 
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/productos.php');
}


function borrarProducto()
{
    extract($_POST);

    try {
        global $conn;
        // Borrar el producto de la base de datos
        if (!isset($id_producto)) {
            throw new Exception("ID de producto no especificado.");
        }
        $sql_delete_productos = "DELETE FROM productos WHERE id_producto = ?";
        $stmt = $conn->prepare($sql_delete_productos);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }
        $stmt->bind_param('i', $id_producto);
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
       
        $conn->close();
        // Redirigir al usuario después de la eliminación
        header('Location: ../SECTIONS/productos.php');
        exit(); 
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        // Cerrar la conexión a la base de datos en caso de error
        $conn->close();
    }
}

function insertarProducto()
{
    extract($_POST);

    try {
        global $conn;
        $sql_insert_productos = "INSERT INTO productos (id_proveedor, codigo, nombre, descripcion, precio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert_productos);
        $stmt->bind_param('sss', $_POST['proveedor_insertado'], $_POST['codigo_insertado'], $_POST['nombre_insertado'], $_POST['descripcion_insertado'], $_POST['precio_insertado']);
        $stmt->execute(); 
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/productos.php');
}


