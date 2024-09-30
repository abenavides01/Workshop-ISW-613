<?php
require '../utils/functions.php';

if ($_POST && $_REQUEST['firstname']) {
    //get each field and insert to the database
    $user['firstname'] = $_REQUEST['firstname'];
    $user['lastname'] = $_REQUEST['lastname'];
    $user['email'] = $_REQUEST['email'];
    $user['province_id'] = $_REQUEST['province'];
    $user['password'] = $_REQUEST['password'];


    if (saveUser($user)) {
        header("Location: ../actions/users.php ", );
    } else {
        header("Location: /?error=Invalid user data");
    }
}