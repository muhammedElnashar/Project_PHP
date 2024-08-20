<?php
require "../../db.php";
if ($db) {
    try {
        $select_stmt = "SELECT * FROM users ;";
        $stmt = $db->prepare($select_stmt);
        $res = $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    try {
        $select_user = "SELECT `user_id`, `name`,sum(`amount`) as total_amount from `orders` 
                   inner join users on users.id = orders.user_id 
                   group by user_id , order_date";
        $stat1 = $db->prepare($select_user);
        $stat1->execute();
        $users_amount = $stat1->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    // print_r($_POST);
    // if(isset($_POST['submit'])){
    if (!empty($_POST['date_from']) && !empty($_POST['date_to'])) {
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        try {
            $select_stmt = "SELECT * FROM orders WHERE order_date BETWEEN '$date_from' AND '$date_to';";
            $stmt = $db->prepare($select_stmt);
            $res = $stmt->execute();
            $dates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // }

    
    // }else if ($orders) {

    //     echo "<div class='container' >  
    //     <table class='table '> 
    //     <tr class='table-primary '>
    //         <th>ID</th>
    //         <th>Order Date</th>

    //      </tr>
    // ";
    // //    print_r($users);
    //     foreach ($orders as $order) {
    //         echo "<tr>
    //                 <td>{$order["id"]}</td>
    //                 <td>{$order["order_date"]}</td>                
    //                 <tr>";

    //     }


    // echo "</table>";
    // }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafeteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
<link rel="stylesheet" href="../../assets/style.css">

<body>
    <?php include("../../layouts/sidebar.php"); ?>
    <div class="main p-3">
        <?php include("../../layouts/navbar.php"); ?>
        <div class="card mt-3">
            <h6 class="card-header ">
                Checks
            </h6>
            <div class="card-body">
                <form action="checks.php" method="post">
                    <div class="container row mt-5 ">
                        <div class="col d-flex">
                            <span class="input-group-text fw-bold">Date From</span>
                            <input name="date_from" type="date" class="form-control" value="">
                        </div>
                        <div class="col d-flex">
                            <span class="input-group-text fw-bold">Date To</span>
                            <input name="date_to" type="date" class="form-control" value="">
                        </div>
                    </div>
                    <div class=" ">
                        <input type="submit" name="submit" class="btn btn-primary px-3 mx-auto  ">

                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-6 d-flex">
                        <span class="input-group-text pe-5 ps-4 fw-bold ">User</span>
                        <select name="user" class="form-control">
                            <option selected disabled>Select User</option>
                            <?php foreach ($users as $user) { ?>
                                <option value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?>
                                </option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <?php  
            if ($dates) {

                echo "<div class='container' >  
                <table class='table '> 
                <tr class='table-primary '>
                    <th>ID</th>
                    <th>Order Date</th>
            
                 </tr>
            ";
                //    print_r($users);
                foreach ($dates as $date) {
                    echo "<tr>
                            <td>{$date["id"]}</td>
                            <td>{$date["order_date"]}</td>                
                            <tr>";
        
                }
        
        
                echo "</table>";
            }
            ?>
            <table class="table  table-bordered " style="border: #0f1010 2px solid">
                <thead style="background-color: #153257;color: white;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Total Amount</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users_amount as $user_amount):
                        $user_id = $user_amount["user_id"];
                        ?>

                        <tr>
                            <td>
                                <button class="btn btn-success me-2 append-order" onclick="getDate(<?php echo ($user_id) ?>)"
                                    data-id="<?php echo ($user_id) ?>">
                                    <i class="lni lni-plus"></i>
                                </button> <?php echo $user_amount['name'] ?>
                            </td>
                            <td> <?php echo $user_amount['total_amount'] ?> </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>

            </table>
        </div>
        <div class="container mt-3">
            <table class="table table-bordered" id="user-order">
            </table>
        </div>
        <div class=" card m-auto " id="order_items" style="width: 1100px">

        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="../../assets/script.js"></script>
    <script>
        function getDate(user_id) {
            $.ajax({
                url: `getUserOrder.php`,
                method: 'GET',
                data: { user_id: user_id },
                dataType: 'json',
                success: function (orders) {
                    let tableHeader = `
                <thead style="background-color: #153257;color: white">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>`;
                    let tableBody = '<tbody>';
                    for (let i = 0; i < orders.length; i++) {

                        tableBody += `
                        <tr>
                            <td><button class="btn btn-success me-2 append-order" onclick="getItems(${orders[i].id})"
                             >
                            <i class="lni lni-plus"></i>
                    </button>
                              ${orders[i].order_date}</td>
                            <td>${orders[i].amount}</td>
                        </tr>`;
                    }
                    tableBody += '</tbody>';
                    $('#user-order').html(tableHeader + tableBody);
                },
            });
        }
        function getItems(order_id) {
            $.ajax({
                url: `getOrderItems.php`,
                method: 'GET',
                data: { order_id: order_id },
                dataType: 'json',
                success: function (items) {
                    let CardHeader = `
                <h6 class="card-header fw-bold" style="background-color: #153257">
                    Order Items
                </h6>`;
                    let CardBody = '<div class="card-body">';

                    // Create a container for the items in a single row
                    CardBody += '<div class="d-flex  justify-content-between ">';

                    for (let i = 0; i < items.length; i++) {
                        CardBody += `
                    <div class="card" style="width: 150px; border-radius: 20px; margin: 5px">
                        <img src='../../images.jpeg' class='card-img-top'
                             style='height: 130px; border-radius: 20px 20px 0 0;'
                             alt='Product Image'>
                        <div class='card-body'
                             style='background-color: #153257; border-radius: 0 0 20px 20px; color: white;'>
                            <h5 class='card-title fw-bold text-center'>${items[i].name}</h5>
                        </div>
                    </div>
                `;
                    }

                    CardBody += '</div> </div>';
                    $('#order_items').html(CardHeader + CardBody);
                },

            });
        }

    </script>
</body>

</html>