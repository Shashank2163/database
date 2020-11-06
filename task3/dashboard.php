<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include('config.php');
error_reporting(0);
$sql = "SELECT * FROM addproduct";
$result = mysqli_query($conn, $sql);
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
        <a href="addproduct.php" id="remove">ADD PRODUCT</a>
        <a href="deleteproduct.php" id="remove">USER CART</a>
        <a href="logout.php" id="remove">LOGOUT</a>
        <a href="viewuser.php" id="remove">VIEW USER |</a>
        <a href="manageuser.php" id="remove">UPDATE USER </a>
    </div><br><br>
    <div>
        <?php if ($_GET['action'] == 'update') { ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="id">ID: <input type="text" name="id" value="<?php echo  $_GET['id'] ?>" disabled></label>
                <label for=" price">Price: <input type="text" name="price" value="<?php echo  $_GET['price'] ?>"></label>
                <label for="image">Image: <input type="file" name="uploadfile" value="<?php echo  $_GET['image'] ?>" /></label>
                <input type="submit" name="submit" value="Submit" id="addproduct">
                <buttton><a href="#" id="addproduct">SHOW PRODUCT</a></buttton>
            </form>

        <?php
            $msg = "";
            if (isset($_POST['submit'])) {
                $filename = $_FILES["uploadfile"]["name"];
                if ($filename == NULL) {
                    $filename = $_GET['image'];
                }
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "images/" . $filename;
                $id = $_GET['id'];
                $price = $_POST['price'];
                $sql = "UPDATE addproduct SET price='$price', `image`='$filename'WHERE id='$id'";
                mysqli_query($conn, $sql);
            }
        } ?>
        <?php
        if (isset($_GET['id'])) {
            if ($_GET['action'] == 'remove') {
                $id = $_GET['id'];
                $sql = "DELETE FROM addproduct WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                // show();
            }
        }
        ?>
    </div>
    <div>
        <?php show();
        function show()
        {
            include('config.php');
            $sql = "SELECT * FROM addproduct";
            $result = mysqli_query($conn, $sql); ?>
            <table id="add">
                <tr>
                    <th>ID</th>
                    <th>PRICE</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                    <th>UPDATE</th>
                </tr>
                <?php $result = mysqli_query($conn, $sql); ?>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td><img src="images/<?php echo $row['image'] ?>"></td>
                            <td><a href="dashboard.php?id=<?php echo $row['id']; ?>&action=remove" id="remove">REMOVE</a></td>
                            <td>
                                <a href="dashboard.php?id=<?php echo $row['id']; ?>&price=<?php echo $row['price']; ?>&image=<?php echo $row['image']; ?>&action=update" id="remove">UPDATE</a>
                            </td>
                        </tr>
                    <?php   } ?>
                <?php } ?>
            </table>
        <?php  } ?>

    </div>
</body>

</html>