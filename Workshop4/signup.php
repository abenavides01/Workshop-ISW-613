<?php
include('utils/functions.php');

$provinces = getProvinces();
$error_msg = '';
if (isset($_GET['error'])) {
    $error_msg = $_GET['error'];
}
?>
<?php require('inc/header.php') ?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Signup</h1>
        <p class="lead">This is the signup process</p>
        <hr class="my-4">
    </div>
    <form method="post" action="actions/signup.php">
        <div class="error">
            <?php echo $error_msg; ?>
        </div>
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input id="first-name" class="form-control" type="text" name="firstname">
        </div>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input id="last-name" class="form-control" type="text" name="lastname">
        </div>
        <div class="form-group">
            <label for="province">Provincia</label>
            <select id="province" class="form-control" name="province_id">
                <?php
                foreach ($provinces as $id => $province) {
                    echo "<option value=\"$id\">$province</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary"> Sign up </button>
    </form>
</div>
<?php require('inc/footer.php');