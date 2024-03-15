<?php

include_once('../model/cliente.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $referencia_id = $_POST["referencia_id"];
  $telefono = $_POST["telefono"];
  $email = $_POST["email"];

  function sanitize_input($data) {
    $data = trim($data); // Elimina espacios en blanco al principio y al final
    $data = stripslashes($data); // Elimina barras invertidas
    $data = htmlspecialchars($data); // Convierte caracteres especiales en entidades HTML
    return $data;
  }

  // Sanitizar cada campo del formulario
  $nombre = sanitize_input($_POST["nombre"]);
  $apellido = sanitize_input($_POST["apellido"]);
  $referencia_id = sanitize_input($_POST["referencia_id"]);
  $telefono = sanitize_input($_POST["telefono"]);
  $email = sanitize_input($_POST["email"]);

  // Validar el correo electrónico
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Error: Correo electrónico inválido";
    exit(); // Detener la ejecución del script si el correo electrónico es inválido
  }

  // Aquí puedes realizar cualquier acción con los datos sanitizados, como guardarlos en una base de datos o enviar un correo electrónico de confirmación.

  // Por ejemplo, imprimir los datos sanitizados:
  echo "Nombre: " . $nombre . "<br>";
  echo "Apellido: " . $apellido . "<br>";
  echo "Referencia ID: " . $referencia_id . "<br>";
  echo "Teléfono: " . $telefono . "<br>";
  echo "Correo electrónico: " . $email . "<br>";
} else {
  // Si alguien intenta acceder directamente a este script sin enviar el formulario, mostrar un mensaje de error.
  echo "Error: Acceso no autorizado";
}
?>

