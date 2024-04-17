<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once __DIR__ . "/DB/database.php"; // Ruta corregida

    
    $conn = Conectar();

    
    if (isset($_POST['nombre'], $_POST['usuario'], $_POST['contrasenna'])) {
       
        $nombre = $_POST['nombre'];
        $username = $_POST['usuario'];
        $password = password_hash($_POST['contrasenna'], PASSWORD_DEFAULT); 
        $idRol = 1; 

       
        $sql = "INSERT INTO usuario (id_rol, nombre, usuario, contrasenna, activo)
                VALUES ('$idRol', '$nombre', '$username', '$password', 1)"; 

        if ($conn->query($sql) === TRUE) {
            
            header("Location: login.php");
            exit();
        } else {
           
            $response = array("exito" => false, "mensaje" => "Error al registrar usuario: " . $conn->error);
            echo json_encode($response);
        }
    } else {
        
        $response = array("exito" => false, "mensaje" => "Falta uno o más campos del formulario.");
        echo json_encode($response);
    }

   
    $conn->close();
} else {
   
    $response = array("exito" => false, "mensaje" => "Acceso denegado.");
    echo json_encode($response);
}

