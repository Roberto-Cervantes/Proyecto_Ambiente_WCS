<?php
require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}



function getClientes()
{
    global $conn;
    $sql_select_clientes = "SELECT c.id_cliente, c.nombre, c.apellidos, c.email, c.telefono, c.direccion,
                                   d.id_distrito, d.nombre AS nombre_distrito,
                                   ca.id_canton, ca.nombre AS nombre_canton,
                                   p.id_provincia, p.nombre AS nombre_provincia
                            FROM clientes AS c
                            JOIN distritos AS d ON c.id_distrito = d.id_distrito
                            JOIN cantones AS ca ON d.canton_id = ca.id_canton
                            JOIN provincias AS p ON ca.provincia_id = p.id_provincia";
    return $result = $conn->query($sql_select_clientes);
   
}


if (isset($_POST['accion'])) {
    
    switch ($_POST['accion']) {
        case 'editar_clientes':
            editClientes();
            break;
    }
    switch ($_POST['accion']) {
        case 'borrar_clientes':
            borrarClientes();
            break;
    }
    switch ($_POST['accion']) {
        case 'insertar_clientes':
            insertarClientes();
            break;
    }
}

function editClientes()
{
    try {
        // Establecer la conexión a la base de datos
        global $conn;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $provincia_editado = $_POST['provincia_editado'];
            $canton_editado = $_POST['canton_editado'];
            $distrito_editado = $_POST['distrito_editado'];

            $nombre_editado = $_POST['nombre_editado'];
            $apellidos_editado = $_POST['apellidos_editado'];
            $email_editado = $_POST['email_editado'];
            $telefono_editado = $_POST['telefono_editado'];
            $direccion_editado = $_POST['direccion_editado'];

            $id_cliente = $_POST['id_cliente']; // Asumiendo que recibes el id_cliente del formulario

            // Consulta SQL para actualizar el nombre de la provincia
            $sqlProvincia = "UPDATE provincias SET nombre=? WHERE nombre=?";
            $stmtProvincia = $conn->prepare($sqlProvincia);
            $stmtProvincia->bind_param("si", $provincia_editado, $provincia_editado);
            $stmtProvincia->execute();

            // Consulta SQL para actualizar el nombre del cantón y la provincia asociada
            $sqlCanton = "UPDATE cantones SET nombre=?, id_provincia=? WHERE nombre=?";
            $stmtCanton = $conn->prepare($sqlCanton);
            $stmtCanton->bind_param("sii", $canton_editado, $provincia_editado, $canton_editado);
            $stmtCanton->execute();

            // Consulta SQL para actualizar el nombre del distrito y el cantón asociado
            $sqlDistrito = "UPDATE distritos SET nombre=?, canton_id=? WHERE nombre=?";
            $stmtDistrito = $conn->prepare($sqlDistrito);
            $stmtDistrito->bind_param("sii", $distrito_editado, $canton_editado, $distrito_editado);
            $stmtDistrito->execute();

            // Consulta SQL para actualizar los datos del cliente
            $sqlCliente = "UPDATE clientes SET nombre=?, apellidos=?, email=?, telefono=?, id_distrito=?, direccion=? WHERE id_cliente=?";
            $stmtCliente = $conn->prepare($sqlCliente);
            $stmtCliente->bind_param("ssssis", $nombre_editado, $apellidos_editado, $email_editado, $telefono_editado, $distrito_editado, $direccion_editado, $id_cliente);
            $stmtCliente->execute();
            
            echo "Datos del cliente actualizados correctamente.";
        }
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos
        $conn->close();
    }

    // Redirigir al usuario después de la actualización
    header('Location: ../SECTIONS/clientes.php');
}


/*
function editClientes()
{
    try {
        global $conn;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $provincia_editado = $_POST['provincia_editado'];
            $canton_editado = $_POST['canton_editado'];
            $distrito_editado = $_POST['distrito_editado'];

            $nombre_editado = $_POST['nombre_editado'];
            $apellidos_editado = $_POST['apellidos_editado'];
            $email_editado = $_POST['email_editado'];
            $telefono_editado = $_POST['telefono_editado'];
            $direccion_editado = $_POST['direccion_editado'];

            $id_cliente = $_POST['id_cliente']; // Asumiendo que recibes el id_cliente del formulario

            // Consulta SQL para actualizar el nombre de la provincia
            $sqlProvincia = "UPDATE provincias SET nombre='$provincia_editado' WHERE id_provincia=$provincia_editado";
            if ($conn->query($sqlProvincia) === TRUE) {
                echo "Provincia actualizada correctamente.";
            } else {
                echo "Error al actualizar provincia: " . $conn->error;
            }

            // Consulta SQL para actualizar el nombre del cantón y la provincia asociada
            $sqlCanton = "UPDATE cantones SET nombre='$canton_editado', id_provincia='$provincia_editado' WHERE id_canton='$canton_editado'";
            if ($conn->query($sqlCanton) === TRUE) {
                echo "Cantón actualizado correctamente.";
            } else {
                echo "Error al actualizar cantón: " . $conn->error;
            }

            // Consulta SQL para actualizar el nombre del distrito y el cantón asociado
            $sqlDistrito = "UPDATE distritos SET nombre='$distrito_editado', canton_id='$canton_editado' WHERE id_distrito='$distrito_editado'";
            if ($conn->query($sqlDistrito) === TRUE) {
                echo "Distrito actualizado correctamente.";
            } else {
                echo "Error al actualizar distrito: " . $conn->error;
            }

            // Consulta SQL para actualizar los datos del cliente
            $sqlCliente = "UPDATE clientes SET nombre='$nombre_editado', apellidos='$apellidos_editado', email='$email_editado', telefono='$telefono_editado', id_distrito='$distrito_editado', direccion='$direccion_editado' WHERE id_cliente='$id_cliente'";
            if ($conn->query($sqlCliente) === TRUE) {
                echo "Datos del cliente actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del cliente: " . $conn->error;
            }
        }
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn->close();
    header('Location: ../SECTIONS/clientes.php');
}*/


function borrarClientes()
{
    extract($_POST);
    
    try {
        global $conn;
        $sql_edit_clientes = "DELETE from clientes where id_cliente=$id_cliente";
        $stmt = $conn->prepare($sql_edit_clientes);
        $stmt->execute();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }

    $conn = null;
    header('Location: ../SECTIONS/clientes.php');
}

function insertarClientes()
{
    try {
        global $conn;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $provincia = $_POST['provincia_insertado'];
            $canton = $_POST['canton_insertado'];
            $distrito = $_POST['distrito_insertado'];

            $nombre = $_POST['nombre_insertado'];
            $apellidos = $_POST['apellidos_insertado'];
            $email = $_POST['email_insertado'];
            $telefono = $_POST['telefono_insertado'];
            $direccion = $_POST['direccion_insertado'];

            // Consulta SQL para insertar los datos de ubicación
            $sqlProvincia = "INSERT INTO provincias (nombre) VALUES ('$provincia')";
            if ($conn->query($sqlProvincia) === TRUE) {
                echo "Provincia insertada correctamente.";
            } else {
                echo "Error al insertar provincia: " . $conn->error;
            }

            // Consulta SQL para obtener el ID de la provincia recién insertada
            $id_provincia = $conn->insert_id;

            // Consulta SQL para insertar los datos del cantón
            $sqlCanton = "INSERT INTO cantones (nombre, provincia_id) VALUES ('$canton', '$id_provincia')";
            if ($conn->query($sqlCanton) === TRUE) {
                echo "Cantón insertado correctamente.";
            } else {
                echo "Error al insertar cantón: " . $conn->error;
            }

            // Consulta SQL para obtener el ID del cantón recién insertado
            $id_canton = $conn->insert_id;

            // Consulta SQL para insertar los datos del distrito
            $sqlDistrito = "INSERT INTO distritos (nombre, canton_id) VALUES ('$distrito', '$id_canton')";
            if ($conn->query($sqlDistrito) === TRUE) {
                echo "Distrito insertado correctamente.";
            } else {
                echo "Error al insertar distrito: " . $conn->error;
            }
            
            $id_distrito = $conn->insert_id;
            // Preparar la consulta SQL para insertar los datos en la tabla clientes
            $stmt = $conn->prepare("INSERT INTO clientes (nombre, apellidos, email, telefono, id_distrito, direccion) VALUES (?, ?, ?, ?, ?,?)");
            // Vincular los parámetros
            $stmt->bind_param("ssssis", $nombre, $apellidos, $email, $telefono, $id_distrito, $direccion);
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Los datos del cliente se han insertado correctamente.";
            } else {
                echo "Error al insertar los datos del cliente: " . $stmt->error;
            }
            // Cerrar la declaración
            $stmt->close();

        }
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn->close();
    header('Location: ../SECTIONS/clientes.php');
}