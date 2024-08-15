<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<?php

session_start();
if ($_SESSION['login']){
    header('Location: ../product/product.php');
}else{
    session_destroy();
}

if (isset($_GET['error'])) {
    $errors = json_decode($_GET['error'], true);
}
;
if (isset($_GET['old_data'])) {
    $old_data = json_decode($_GET['old_data'], true);
}
// print_r($_SESSION);

session_start();
// print_r($_SESSION);
// $_SESSION['name'] = "mohamed";
?>

<body>
    <div class="content">
        <div class="text">
            login
        </div>
        <form action="loginvalidation.php" method="post">
            <div class="field">
                <input type="email" name="email" value="<?php $val = isset($old_data['email']) ? $old_data['email'] : "";
                echo $val ?>">
                <span class=" fas fa-user"></span>
                <span style="color :red">
                    <?php $errorname = isset($errors['email']) ? $errors['email'] : '';
                    echo $errorname; ?>
                </span>
                <label>Email or phone</label>
            </div>
            <div class="field">
                <input type="password" name="password" value="<?php $val = isset($old_data['password']) ? $old_data['password'] : "";
                echo $val ?>">
                <span class="fas fa-lock"></span>
                <span style="color :red">
                    <?php $errorpass = isset($errors['password']) ? $errors['password'] : '';
                    echo $errorpass; ?>
                </span>
                <label>password</label>
            </div>
            <div class="forgot-pass">
                <a href="#">forgot password?</a>
            </div>
            <button type="submit">Sign in</button>
            <div class="Sign-up">
                Not registered
                <a href="#">signup now </a>
            </div>

        </form>
    </div>
</body>

</html>