<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sc502_proyecto";

function Conectar()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}









/*
// prepare and bind
$stmt = $conn->prepare("INSERT INTO provincias (id_provincia, nombre) VALUES (?, ?)");
$stmt->bind_param("is", $id_provincias, $nombres);

// set parameters and execute
$id_provincias = 0;
$nombres = "Changuinola";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
*/
