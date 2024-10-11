<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workshop4</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="navId">
    <!-- Enlace Signup solo si el usuario no está autenticado -->
    <?php if (!$user): ?>
      <li class="nav-item">
        <a href="/signup.php" class="nav-link <?php echo ($currentPage == 'signup.php') ? 'active' : ''; ?>">Signup</a>
      </li>
      <li class="nav-item">
        <a href="/index.php" class="nav-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Login</a>
      </li>
    <?php endif; ?>

    <!-- Enlace Users y Logout solo si el usuario está autenticado -->
    <?php if ($user): ?>
      <li class="nav-item">
        <a href="/users.php" class="nav-link <?php echo ($currentPage == 'users.php') ? 'active' : ''; ?>">Users</a>
      </li>
      <li class="nav-item">
        <a href="/actions/logout.php" class="nav-link">Logout</a>
      </li>
      <li class="nav-item">
        <span class="nav-link">Hola <?php echo $user['name']; ?></span>
      </li>
    <?php else: ?>
      <li class="nav-item">
        <span class="nav-link">Hola Invitado</span>
      </li>
    <?php endif; ?>
  </ul>
</body>
</html>
