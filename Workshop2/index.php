<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workshop2";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO users (name, lastName, email, phone) 
            VALUES ('$name', '$lastName', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Datos insertados correctamente";
    } else {
        $mensaje = "Error al insertar datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styless.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header custom-bg-red text-white text-center">
                        <h3>Formulario de Registro</h3>
                    </div>
                    <div class="card-body">

                        <!-- Mostrar mensaje de éxito o error -->
                        <?php if (!empty($mensaje)) { ?>
                            <div class="alert alert-info text-center">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>

                        <!-- Formulario de registro -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="Your name">
                                
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo isset($lastName) ? $lastName : ''; ?>" placeholder="Your last name">
                                
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Your email">
                                
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Your phone">
                            </div>
                            <div class="container-btn mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
