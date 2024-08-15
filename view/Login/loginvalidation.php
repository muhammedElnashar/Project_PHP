<?php
require "../../utils.php";
var_dump($_POST);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
$old_data = [];
$data = [];

foreach ($_POST as $key => $value) {
    if (empty($value)) {

        $errors[$key] = "please enter a valid {$key}";
    } else {
        $old_data[$key] = $value;
    }
}
if ($errors) {
    $errors = json_encode($errors);
    $url = "Location: login.php?error={$errors}";
    if ($old_data) {
        $old_data = json_encode($old_data);
        $url .= "&old_data={$old_data}";
    }
    header($url);
} else {

    // var_dump($_POST);
    $users = ['mohamed@gmail.com', 'ahmed@gmail.com', 'ali@gmail.com'];
    $passwords = ['12121212', 'mohamed123', '11111111'];
    if (in_array($email, $users) && in_array($password, $passwords)) {
        // echo'hello';
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['login'] = true;
        header('Location: ../product/product.php');
    } else {
        //echo'Not Hello';
        header("Location: login.php");

    }
}