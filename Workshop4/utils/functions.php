<?php

/**
 * Summary of getProvinces
 * @return array
 * Gets the provinces from the database
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

function getConnection(): bool|mysqli {
  $connection = mysqli_connect('localhost:3306', 'root', '', 'workshop4');
  return $connection;
}

/**
 * Summary of saveUser
 * @param mixed $user
 * @return bool
 *Saves an specific user into the database
 */
function saveUser($user): bool{

  $firstName = $user['firstName'];
  $lastName = $user['lastName'];
  $username = $user['email'];
  $password = md5($user['password']);

  $sql = "INSERT INTO users (name, lastname, username, password) VALUES('$firstName', '$lastName', '$username','$password')";

  try {
    $conn = getConnection();
    mysqli_query($conn, $sql);
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }
  return true;
}

/**
 * Summary of authenticate
 * @param mixed $username
 * @param mixed $password
 * @return bool|array|null
 * Get one specific student from the database
 * @id Id of the student
 */
function authenticate($username, $password): bool|array|null{
  $conn = getConnection();
  $password = md5($password);
  $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $results = $result->fetch_array();
  $conn->close();
  return $results;
}