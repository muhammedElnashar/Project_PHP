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
    <div class="card mt-5 w-75 m-auto">
        <div class="card-header">
            Add User
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">


                <div class="input-group mb-3">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control" placeholder="Name" name="name" aria-label="Username">
                </div>


                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" name="email"
                           aria-label="Recipient's Email">
                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" placeholder="Password" name="password"
                           aria-label="password">

                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text">Confirm Password</span>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password"
                           aria-label="password">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Room No.</span>
                    <select class="form-select" aria-label="Default select example" name="room">
                        <option selected>Open this Select Rome</option>
                        <option value="application_1">Application 1</option>
                        <option value="application_2">Application 2</option>
                        <option value="cloud">Cloud</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Ext.</span>
                    <select class="form-select" aria-label="Default select example" name="ext">
                        <option selected>Open this Select Rome</option>
                        <option value="1000">1000</option>
                        <option value="2000">2000</option>
                        <option value="3000">3000</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="image">
                    <label class="input-group-text" for="inputGroupFile01">Profile Image</label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-grid gap-2 ">
                            <button class="btn" style="background-color: #23569c ;color: white" type="submit">Create User</button>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="d-grid gap-2">
                            <button class="btn" style="background-color: #153257;color: white"  type="submit">Reset</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="../../assets/script.js"></script>
</body>
</html>
