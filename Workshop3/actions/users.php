<?php
// Establecer la conexión a la base de datos
$connection = mysqli_connect('localhost', 'root', '', 'workshop3', 3306);

// Verificar si la conexión ha fallado
if (!$connection) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener todos los usuarios de la base de datos
$users = [];
$result = mysqli_query($connection, "SELECT users.name, users.lastname, users.username, provinces.name as province FROM users JOIN provinces ON users.province_id = provinces.id");

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;  // Almacenar cada usuario en el array $users
    }
}

// Cerrar la conexión
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al archivo de estilos -->
</head>

<body>
    <div class="container">
        <h1 class="my-4">Registered Users</h1>
        <div class="card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Province</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mostrar los usuarios en la tabla
                    foreach ($users as $user) {
                        echo "<tr>
                                <td>{$user['name']}</td>
                                <td>{$user['lastname']}</td>
                                <td>{$user['username']}</td>
                                <td>{$user['province']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
