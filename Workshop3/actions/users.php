<?php
include('utils/functions.php');

// Obtener todos los usuarios de la base de datos
function getUsers(): array {
    $conn = getConnection();
    if (!$conn) {
        return [];
    }

    $users = [];
    $result = mysqli_query($conn, "SELECT users.id, users.name, users.lastname, users.username, provinces.name as province FROM users JOIN provinces ON users.province_id = provinces.id");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    return $users;
}

$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Registered Users</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                    echo "<tr>
                            <td>{$user['id']}</td>
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
</body>

</html>
