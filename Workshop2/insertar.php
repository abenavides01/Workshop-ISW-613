<?php
// Configurar los detalles de la conexión a la base de datos
$host = "localhost";
$user = "sa";  
$password = "sql123";
$database = "workshop2"; 

// Crear la conexión
$conn = new mysqli($host, $user, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Preparar e insertar los datos en la base de datos
$sql = "INSERT INTO users (name, lastName, email, phone ) 
        VALUES ('$name', '$lastName', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
