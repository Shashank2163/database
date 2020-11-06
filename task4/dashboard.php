<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1>ADMIN PANEL</h1><br>
        <p> <a href="addproduct.php" class="remove">ADD PRODUCT</a></p><br><br>
        <p> <a href="deleteproduct.php" class="remove">USER CART</a></p><br><br>
        <p> <a href="viewuser.php" class="remove">VIEW USER</a></p><br><br>
        <p> <a href="manageuser.php" class="remove">UPDATE USER </a></p><br><br>
        <p> <a href="logout.php" class="remove">LOGOUT</a></p><br><br>
    </div>
</body>

</html>