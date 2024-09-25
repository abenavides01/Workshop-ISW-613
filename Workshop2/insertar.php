<?php
echo ("The Name is " . $_POST['name'] . "<br>");
echo ("The Last Name is " . $_POST['lastName'] . "<br>");
echo ("The email is " . $_POST['email'] . "<br>");
echo ("The phone Number is " . $_POST['phone'] . "<br>");
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_information";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa<br>";

$sql = "INSERT INTO information (name, lastname, email, phone)
        VALUES ('" . $_POST['name'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

$conn->close();


?>