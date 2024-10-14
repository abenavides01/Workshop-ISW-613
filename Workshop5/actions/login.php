<?php
  require('../utils/functions.php');

  if ($_POST) {
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
  
      // Verificar si el usuario está activo
      $user = authenticate($username, $password);
  
      if ($user && $user['status'] === 'active') {
          session_start();
          $_SESSION['user'] = $user;
  
          // Actualizar la fecha y hora del último inicio de sesión
          $currentDateTime = date('Y-m-d H:i:s');
          updateLastLogin($user['id'], $currentDateTime);
  
          header('Location: /users.php');
      } else {
          header('Location: /index.php?error=login');
      }
  }