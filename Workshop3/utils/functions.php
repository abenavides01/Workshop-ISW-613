<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces(): array {
  //select * from provinces
  return [1 => 'Alajuela', 2 => 'San Jose', 3 => 'Cartago', 80 => 'Heredia', 90 => 'Limon', 100 => 'Puntarenas', 200 => 'Guanacaste'];
}

function getConnection(): bool|mysqli {
  $connection = mysqli_connect('localhost:3306', 'root', 'root1234', 'php_web2');
  print_r(mysqli_connect_error());
  return $connection;
}

/**
 * Saves an specific user into the database
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