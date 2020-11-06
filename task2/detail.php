<?php
include('config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1> WELCOME :<?php echo "hi" ?></h1><br>
    <a href="logout.php" id="remove">LOGOUT</a>
    <!-- HEADER SECTION -->
    <div id="header">
        <?php include 'header.php'; ?>
    </div>
    <!-- UPDATE -->
    <?php if ($_GET['action'] == 'update') { ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="id">ID: <input type="disable" name="id" value="<?php echo  $_GET['id'] ?>"></label>
            <label for=" price">Quantity: <input type="number" name="quantity" value="<?php echo  $_GET['quantity'] ?>"></label>
            <!-- <label for="image">Image: <input type="file" name="uploadfile" value="<?php echo  $_GET['image'] ?>" /></label> -->
            <input type="submit" name="submit" value="Submit" id="addproduct">
            <buttton><a href="#" id="addproduct">SHOW PRODUCT</a></buttton>
        </form>

        <?php
        $msg = "";
        if (isset($_POST['submit'])) {
            $quantity = $_POST['quantity'];
            // echo $quantity;
            $id = $_GET['id'];
            $sql = "UPDATE cart SET `quantity`=$quantity WHERE id='$id' and username='$username'";
            mysqli_query($conn, $sql);
            // show1();

        } ?>
    <?php } ?>
    <!-- UPDATE END -->

    <!-- REMOVE  -->
    <?php
    if (isset($_GET['id'])) {
        if ($_GET['action'] == 'remove') {
            $id = $_GET['id'];
            $sql = "DELETE FROM cart WHERE id='$id' and username='$username'";
            $result = mysqli_query($conn, $sql);
            // show();
        }
    }
    ?>
    <!-- REMOVE END -->
    <div id="products">
        <?php show();
        function show()
        {
            include('config.php');
            $sql = "SELECT * FROM addproduct";
            $result = mysqli_query($conn, $sql); ?>
            <?php $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div id="product-101" class="product">
                        <img src="images/<?php echo $row['image']; ?>">
                        <h3 class="title"><a href="#"><?php echo $row['id']; ?></a></h3>
                        <span><?php echo $row['price']; ?></span>
                        <a class="add-to-cart" href="detail.php?id=<?php echo $row['id']; ?>&price=
                            <?php echo $row['price']; ?>&img=<?php echo $row['image']; ?>&action=addtocart" name="Addtocart">Add To Cart</a>
                    </div>
                <?php   } ?>
            <?php } ?>
            </table>
        <?php  } ?>
    </div>
    <?php
    $msg = "";
    if (isset($_GET['id'])) {
        if ($_GET['action'] == 'addtocart') {

            $id = $_GET['id'];
            $price = $_GET['price'];
            $filename = $_GET['img'];
            $quantity = 1;
            // echo $id;
            // echo $price;
            // echo $filename;
            // echo $username;
            // echo $quantity;
            $sql = "INSERT INTO cart VALUES('$username','$filename','$id','$price','$quantity')";
            mysqli_query($conn, $sql);
        }
    }
    ?>

    <?php show1();
    function show1()
    {
        include('config.php');
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($conn, $sql); ?>
        <table id="add">
            <tr>
                <th>ID</th>
                <th>PRICE</th>
                <th>IMAGE</th>
                <th>ACTION</th>
                <th>UPDATE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
            </tr>
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><img src="images/<?php echo $row['image'] ?>"></td>
                        <!-- <td><a href="javascript:onUpdateAdd(' +value['id']+' )" id="a1">+</a><input type="text" id="text" value="<?php echo ($value['quantity']); ?>"><a href="javascript:onUpdateRemove('+value['id']+')" id="a2">-</a></td> -->
                        <td><a href="detail.php?id=<?php echo $row['id']; ?>&action=remove" id="remove">REMOVE</a></td>
                        <td>
                            <a href="detail.php?id=<?php echo $row['id']; ?>&quantity=<?php echo $row['quantity']; ?>&action=update" id="remove">UPDATE</a>
                        </td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo  $row['price'] * $row['quantity']; ?></td>
                        <?php $s += $row['price'] * $row['quantity']; ?>
                    </tr>
                <?php   } ?>
            <?php } ?>
            <tr>
                <td>FINAL TOTAL</td>

                <td colspan="6"><?php echo $s ?></td>
            </tr>
        </table>
    <?php  } ?>

    <!-- FOOOTER  SECTION-->
    <div>
        <?php include 'footer.php';
        ?>
    </div>
</body>

</html>