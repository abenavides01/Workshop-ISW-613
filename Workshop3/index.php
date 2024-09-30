<?php
include('utils/functions.php');
$provinces = getProvinces();
$error_msg = '';
if (isset($_GET['error'])) {
    $error_msg = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al archivo de estilos -->
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Signup</h1>
            <p class="lead">This is the signup process</p>
            <hr class="my-4">
        </div>
        <div class="card p-4">
            <form method="post" action="actions/signup.php">
                <div class="error text-danger mb-3">
                    <?php echo $error_msg; ?>
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input id="first-name" class="form-control" type="text" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input id="last-name" class="form-control" type="text" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="province">Provincia</label>
                    <select id="province" class="form-control" name="province" required>
                        <?php
                        foreach ($provinces as $id => $province) {
                            echo "<option value=\"$id\">$province</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary"> Sign up </button>
            </form>
        </div>
    </div>
</body>

</html>
