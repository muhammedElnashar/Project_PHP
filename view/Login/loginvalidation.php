<?php
require '../../db.php';

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

if ($db) {
    if (isset($_POST['login_btn'])) {
        if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $login_qry = "select * from users  where email='$email' and password='$password' limit 1 ";
            $stmt = $db->prepare($login_qry);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['login'] = true;
                $_SESSION["user_id"] = $user['id'];
                $_SESSION["user_image"] = $user['image'];
                $_SESSION["username"] = $user['name'];
                $_SESSION["email"] = $user['email'];
                $_SESSION["permission"] = $user['permission_id'];
                header("Location: ../order/create-order.php");
            }else {
                $_SESSION['status'] = 'Invalid Email or Password';
                header("Location: login.php");
        }
        }
    }
}

}

