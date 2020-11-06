<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include('config.php');
error_reporting(0);
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
    <h1 id="dar"> ADD PRODUCT IN DATABASE</h1>
    <a href="logout.php" id="remove">LOGOUT</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="id">ID: <input type="text" name="id" required></label>
        <label for="price">Price: <input type="text" name="price" required></label>
        <label for="image">Image: <input type="file" name="uploadfile" value="" /></label>
        <input type="submit" name="submit" value="Submit" id="addproduct">
        <buttton><a href="admin.php" id="addproduct">SHOW PRODUCT</a></buttton>
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


</body>

</html>



















<!-- <?php
        if (isset($_POST["submit"])) {
            //$sql="DELETE FROM picture WHERE category='cat'";
            $sql = "SELECT * FROM addproduct ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            unlink("" . $row['image']);
        }
        ?>
    <!-- <?php
            if (isset($_POST['submit'])) {
                if (isset($_FILES['image'])) {
                    echo ($_FILES['image']['temp_name']);
                    $picture = $_FILES['image']['name'];
                    if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $_FILES['image']['name'])) {
                        echo "image uploaded successfully";
                    } else {
                        echo "upload failed";
                    }

                    $sql = "INSERT INTO addproduct (image) VALUES('$picture')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            } ?> --> -->
</body>

</html>