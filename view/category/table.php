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
    require "../../db.php";
    if($db){
        try{
            $select_stmt = "SELECT * FROM categories;";
            $stmt = $db->prepare($select_stmt);
            $res = $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    echo " <div class='card mt-5 w-75 m-auto' >
        <div class='card-header'>
            Category
        </div>
        <div class='card-body'>";
    if ($categories) {

        echo "
    <div class= >   
    <table class='table ' >  
    <tr  style='background-color: #d9d7d7;'>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Delete</th>
        <th>update</th>


     </tr>";
        foreach ($categories as $category) {
            echo "<tr> 
            <td> {$category['id']}</td>
            <td> {$category['name']}</td>
            <td><a href='delete.php?id={$category['id']}' class='btn btn-danger'>Delete</a></td>
            <td><a href='edit.php?id={$category['id']}' style='background-color: #23569c ;color: white' class='btn btn-primary'>Update</a></td>

        </tr>";

        }

    }

    echo "</table>";
    echo "<div class='row mt-4'>
                    <div class='col-12'>
                        <div class=''>
                            <a class='btn' href='create.php'  style='background-color: #23569c ;color: white' type='submit' >Add New Category</a>
                        </div>

                    </div>
          </div>";
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="../../assets/script.js"></script>
</body>
</html>
