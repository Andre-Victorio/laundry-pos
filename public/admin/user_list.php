<?php
    include_once ("../../src/php/db_connect.php");

    // if(!isset($_SESSION["username"]) || $_SESSION["role"] != "Manager"){
    //     header('location:../../public/index.php');
    //     exit();
    // }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>E&R Laundry</title>

    <link rel="stylesheet" href="../../src/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../src/css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../src/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../src/css/style-sidebar.css">
    <link rel="stylesheet" href="../../src/css/style-tabular.css">
    <script src="../../src/js/bootstrap/bootstrap.js"></script>
</head>
<body>
    <?php
        require_once("partials/_sidebar.php")
    ?>
    <div class="main-content">
        <a href="new_user.php" class="btn btn-primary">Add New User</a>
    </div>
</body>
</html>