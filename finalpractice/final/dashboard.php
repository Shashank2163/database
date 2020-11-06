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
    <h1>ADMIN DASHBOARD </h1>
    <?php include("navigation.php") ?>
    <!-- <div>
        <h1>ADMIN DASHBOARD</h1><br>
        <a href="addproduct.php" class="remove">ADD PRODUCT</a>
        <a href="deleteproduct.php" class="remove">USER CART</a>
        <a href="viewuser.php" class="remove">VIEW USER</a></p>
        <a href="manageuser.php" class="remove">UPDATE USER </a>
        <a href="logout.php" class="remove">LOGOUT</a>
    </div> -->
    <h1 id="head-shop">ORDERS DETAILS</h1>
    <?php include('config.php');
    $sql = "SELECT * FROM order_details";
    $result = mysqli_query($conn, $sql); ?>
    <div id="cart1">
        <table id="cart-table">
            <tr class="row">
                <th class="row1">ORDER ID</th>
                <th class="row1">TOTAL PRICE</th>
                <th class="row1">STATUS</th>
                <th class="row1">DATE/TIME</th>
            </tr>
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="row">
                        <td class="row1"><?php echo $row['order_id']; ?></td>
                        <td class="row1"><?php echo $row['product_price'] ?></td>
                        <td class="row1"> <?php echo   $row['status'] ?></td>
                        <td class="row1"> <?php echo  $row['date'] ?></td>
                        <?php $s += $row['product_price'] * $row['product_qty']; ?>
                    </tr>

                <?php   } ?>
            <?php } ?>
            <?php if (mysqli_num_rows($result) > 0) {
                echo '<tr class="row">
                <td class="row1"></td>
                <td ></td>     
                <td>Total</td>
                <td class="row1">';
                echo "$" . $s;
                echo '</td>
            </tr>';
            } else {
                echo "<center><h3> YOUR CART IS EMPTY</h3></center>";
            } ?>
        </table>
    </div>
    <div>
        <h1 id="head-shop">USERS</h1>
        <?php show1();
        function show1()
        {
            // echo "<h1>VIEW USERS</h1>";
            include('config.php');
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql); ?>
            <table id="cart-table">
                <tr>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                </tr>
                <?php $s = 0;
                $result = mysqli_query($conn, $sql); ?>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['email'] ?></td>

                        </tr>
                    <?php   } ?>
                <?php   } ?>
            </table>
        <?php  } ?>
    </div>
</body>

</html>