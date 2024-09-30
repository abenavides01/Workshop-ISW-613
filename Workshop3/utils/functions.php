<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces(): array
{
    $conn = getConnection();
    if (!$conn) {
        return [];
    }

    $provinces = [];
    $result = mysqli_query($conn, "SELECT id, name FROM provinces");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $provinces[$row['id']] = $row['name'];
        }
    }
    return $provinces;
}


function getConnection(): bool|mysqli
{
    $connection = mysqli_connect('localhost:3306', 'root', '', 'workshop3');
    print_r(mysqli_connect_error());
    return $connection;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user): bool
{
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $username = $user['email'];
    $province_id = $user['province_id'];
    $password = password_hash($user['password'], PASSWORD_BCRYPT); // Usar password_hash para mayor seguridad

    // Insertamos la provincia en la tabla
    $sql = "INSERT INTO users (name, lastname, username, password, province_id) VALUES('$firstname', '$lastname', '$username', '$password', '$province_id')";

    try {
        $conn = getConnection();
        if (!$conn) {
            throw new Exception('Database connection failed');
        }
        mysqli_query($conn, $sql);
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    return true;
}
