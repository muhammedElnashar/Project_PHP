

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


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'db-connection.php';
if ($db){
    try {
        $select_qry ="SELECT * FROM `product`;";
        $stmt = $db->query($select_qry);
        $result = $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
    }
        echo "
         <h1 class='text-center m-3'>All Product</h1>";
    
    if ($products) {
    
        echo "<div class='container' >  
        <table class='table '> 
        <tr class='table-primary '>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>ِAction</th>
            <th>Update</th>
            <th>Delete</th>
         </tr>
    ";
    //    print_r($users);
        foreach ($products as $product) {
            echo "<tr>
                    <td>{$product["id"]}</td>
                    <td>{$product["name"]}</td>
                    <td > {$product["price"]} </td>
                    <td><img src='{$product["image"]}' width='50' height='50' class='mx-2'></td>
                    <td> Avilable Edite  </td>
                    <td><a href='update.php?id={$product["id"]}' class='btn btn-primary'>Update</a></td>
                    <td><a href='delete.php?id={$product["id"]}' class='btn btn-danger'>Delete</a></td>
                    <tr>";
    
        }
    }
    
    echo "</table>
             <div class='text-center mt-5'> <a class='btn btn-primary text-center' href='product.php'> Add New Product </a></div>
    </div>
             ";
    
    ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="../../assets/script.js"></script>
</body>
</html>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    </html>
    