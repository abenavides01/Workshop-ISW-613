<?php
$name = @$_REQUEST["name"];
$lastName = @$_REQUEST["lastname"];
$email = @$_REQUEST["email"];
$phone = @$_REQUEST["phone"];
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
                        <form action="insertar.php" method="POST">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" id="" value="<?php echo $name; ?>"
                                    placeholder="Your name">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id=""
                                    value="<?php echo $lastName; ?>" placeholder="Your last name">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" id="" value="<?php echo $email; ?>"
                                    placeholder="Your email">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" id="" value="<?php echo $phone; ?>"
                                    placeholder="Your phone">
                            </div>
                            <div class="container-btn">
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