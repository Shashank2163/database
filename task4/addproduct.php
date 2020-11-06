<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include('config.php');

error_reporting(0);
?>
<?php
if (isset($_GET['id'])) {
    if ($_GET['action'] == 'remove') {
        $id = $_GET['id'];
        $sql = "DELETE FROM addproduct WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?td=2">
</head>

<body>
    <h1 id="dar"> ADD PRODUCT IN DATABASE</h1><br>
    <a href="dashboard.php" id="remove">ADMIN PANEL</a>
    <a href="logout.php" id="remove">LOGOUT</a><br><br>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="id">ID: <input type="text" name="id" required></label>
        <label for="price">Price: <input type="text" name="price" required></label>
        <label for="image">Image: <input type="file" name="uploadfile" value="" /></label>
        <input type="submit" name="submit" value="Submit" id="addproduct">
    </form>
    <?php
    $msg = "";
    if (isset($_POST['submit'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/" . $filename;
        $id = $_POST['id'];
        $price = $_POST['price'];
        $sql = "INSERT INTO addproduct VALUES( '$filename','$id','$price')";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
    }
    ?>
    <div>
        <?php include('show.php'); ?>
        <div>
</body>

</html>