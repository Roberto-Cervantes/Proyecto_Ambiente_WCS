<?php

session_start();

require_once "../DB/database.php";

$conn = conectar();

function Desconectar()
{
    global $conn;
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasenna = $_POST['contrasenna'];

    $sql = "SELECT u.id_usuario, u.id_rol, u.nombre, r.descripcion 
            FROM usuario u 
            JOIN rol r ON u.id_rol = r.id_rol 
            WHERE usuario = ? AND contrasenna = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasenna);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['id_rol'] = $row['id_rol'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['rol'] = $row['descripcion'];
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: ../login.php");
    }
} else {
    $_SESSION['error'] = "Usuario o contraseña incorrectos";
    header("Location: ../login.php");
}

