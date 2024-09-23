<?php
// Configurar los detalles de la conexión a la base de datos
$host = "localhost";
$usuario = "root";  // Cambia por tu usuario de MySQL
$contraseña = "";   // Cambia por tu contraseña de MySQL
$base_de_datos = "mi_base_de_datos";  // Cambia por el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Preparar e insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, telefono, correo) 
        VALUES ('$nombre', '$apellido', '$telefono', '$correo')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
