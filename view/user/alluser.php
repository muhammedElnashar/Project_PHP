<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafeteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
<link rel="stylesheet" href="../../assets/style.css">
<body>
<?php include("../../layouts/sidebar.php"); ?>
<div class="main p-3">
    <?php include("../../layouts/navbar.php"); ?>
    
    <?php
require "../../db-connection.php";


if($db){
    try{
        $select_stmt = "SELECT * FROM users;";
        $stmt = $db->prepare($select_stmt);
        $res = $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


echo "<h1 class ='text-center m-3' fw-bold >ALL USER</h1>";
if ($users) {

    echo "
    <div class='container' >   
    <table class='table ' >  
    <tr  style='background-color: #d9d7d7;'>
        <th>ID</th>
        <th>Name</th>
        <th>Room</th>
        <th>Image</th>
        <th>Ext</th>
        <th>Action</th>
        <th>Delete</th>
        <th>update</th>


     </tr>";
    foreach ($users as $user) {
        echo "<tr> 
            <td> {$user['id']}</td>
            <td> {$user['name']}</td>
            <td> {$user['room']}</td>
            <td><img src='{$user['image']}' width='50' height='50'></td>
            <td> {$user['ext']}</td>
            <td> Edit Delete </td>
            <td><a href='delete.php?id={$user['id']}' class='btn btn-danger'>Delete</a></td>
            <td><a href='edit.php?id={$user['id']}' class='btn btn-primary'>Update</a></td>

        </tr>";

    }

}

echo "</table>";
echo "<div class='container text-center' >  <a class='btn btn-primary text-center' href='Create.php '> Add new user </a></div>";

?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="../../assets/script.js"></script>
</body>
</html>