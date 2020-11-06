<?php
include('config.php');
// error_reporting(0);
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
<?php
if (isset($_GET['id'])) {
    if ($_GET['action'] == 'remove') {
        $id = $_GET['id'];
        $sql = "DELETE FROM cart WHERE id='$id' and username='$username'";
        $result = mysqli_query($conn, $sql);
    }
}
?>
<div id="container1">
    <?php include('header.php'); ?>

    <h1 id="head-shop">Shopping Cart</h1>

    <?php include('config.php');
    $sql = "SELECT * FROM cart";
    $result = mysqli_query($conn, $sql); ?>
    <div id="cart1">
        <table id="cart-table">
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $username = $_SESSION['username'];
                    if ($row['username'] == $username) {
                ?>
                        <tr class="row">
                            <td class="row"><img src="images/<?php echo $row['image'] ?>"></td>
                            <td class="row" id="row1"><?php echo $row['id']; ?></td>
                            <td class="row"><?php echo $row['quantity'] ?></td>
                            <td class="row"> <?php echo "$" . $row['price'] ?></td>
                            <td class="row"><a href="checkout.php?id=<?php echo $row['id']; ?>&action=remove"><i class="fa fa-times" style="color:red;"></i></a></td>
                            <!-- <td><?php echo  $row['price'] * $row['quantity']; ?></td> -->
                            <?php $s += $row['price'] * $row['quantity']; ?>
                        </tr>

                    <?php   } ?>
                <?php   } ?>
            <?php } ?>
            <?php if (mysqli_num_rows($result) > 0) {
                echo '<tr class="row">
                    <td class="row">Have a Promo Code ?</td>
                    <td class="row"></td>
                    <td class="row">Total</td>
                    <td class="row">';
                echo "$" . $s;
                echo '</td>
                </tr>';
            } else {
                echo "<center><h3> YOUR CART IS EMPTY</h3></center>";
            } ?>
        </table>
    </div>
    <div>
        <div id="continue">
            <a href="placedorder.php" id="shop">Continue Shopping</a>
            <a href="placedorder.php" id="check">CHECK OUT</a>
        </div>;
    </div>