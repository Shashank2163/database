<?php
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
    <h1 id="dar"> UPDATE PRODUCT IN DATABASE</h1>
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
         $sql = "UPDATE addproduct SET (id='$id' ,price='$price',image='$filename') WHERE id=$id";";
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