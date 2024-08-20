
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafeteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
<link rel="stylesheet" href="../../assets/style.css">

<body>
<?php include("../../layouts/sidebar.php");?>
<div class="main p-3">
    <?php include("../../layouts/navbar.php");?>
    <div class=" ">
    <div class="row mt-5">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-8 bg-info">
        </div>
    </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
<<<<<<< Updated upstream
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../assets/script.js"></script>
</body>
</html>
=======
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="../../assets/script.js"></script>
<script>
    function changeStatus(order_id) {
        alert(order_id)
        $.ajax({
            url: 'changeStatus.php',
            type: 'POST',
            data: {order_id: order_id},
            success: function () {
                alert('Status updated successfully');
            },
            error: function () {
                alert('Error updating status');
            }
        })
    }
</script>
>>>>>>> Stashed changes
