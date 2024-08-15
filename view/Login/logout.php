
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script></head>
<?php 
session_start();
 
if($_SESSION['login']){
    $_SESSION = array();
    session_destroy();

}else{
    echo "<p  style='margin-top:-100px;' class='bg-danger text-center p-5 rounded text-light'> you are guest </p> ";
    session_destroy();
}
echo "<a href='login.php' style='margin-top:-500px;' class='mx-auto btn btn-primary px-3' > Login again </a>"; 
?>