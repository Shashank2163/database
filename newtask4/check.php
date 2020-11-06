<?php
include('config.php');
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
global $products;
if (isset($_SESSION['product'])) {
    $products = $_SESSION['product'];
} else {
    $products = array();
}

// print_r($products);
?>

<?php if (isset($_POST['submit'])) {
    $arr = [];
    global $user_id;
    global $inputtotal;
    global $order_id;
    $user = $_SESSION['username'];
    $query = 'SELECT * FROM `users` WHERE `username` = "' . $user . '" ';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_All($result, MYSQLI_ASSOC);
    foreach ($row as $key => $product) :
        $user_id = $product['username'];

    endforeach;
    $arr["user_id"] = $user_id;
    foreach ($products as $key => $product) {
        $inputtotal = $inputtotal + $product['totalprice'];
    }
    $arr["inputtotal"] = $inputtotal;
    $time = date("Y-m-d,l, h:i:sa");
    $arr['time'] = $time;
    $status = "succsess";
    $arr['status'] = $status;
    // Inserting data in orders in table
    $sql = 'INSERT INTO `orders` (`userid`, `cartdata`, `date`,`status`) VALUES ("' . $user_id . '","' . $inputtotal . '","' . $time . '","' . $status . '") ';
    $result2 = mysqli_query($conn, $sql);
    $query1 = 'SELECT * FROM `orders` WHERE `userid` = "' . $user_id . '" ';
    $result1 = mysqli_query($conn, $query1);
    $row2 = mysqli_fetch_All($result1, MYSQLI_ASSOC);
    foreach ($row2 as $key => $product) :
        if ($product['userid'] == $user_id) {
            $order_id = $product['orderid'];
        }
    endforeach;
    $arr['order_id'] = $order_id;
    $len = sizeof($products);
    // echo $len;
    $count = 0;
    // Inserting  data order_details into table
    for ($i = 0; $i < $len; $i++) {
        $count = $count + 1;
        $id =  $products[$i]['id'];
        $price = $products[$i]['price'];
        $quantity = $products[$i]['quantity'];
        $time = date("Y-m-d,l, h:i:sa");
        $sql1 = "INSERT INTO order_details (order_id,product_id,product_price,product_qty,userid,`date`,`status`)VALUES ($order_id,'$id','$price','$quantity','$user_id','$time','$status')";
        mysqli_query($conn, $sql1);
    }

    $arr['count'] = $count;
    // echo json_encode($arr);
} ?>

<?php
if (isset($_GET['id'])) {
    if ($_GET['action'] == 'remove') {
        $id = $_GET['id'];
        // echo $id;
        $userid = $_GET['userid'];
        $sql = "DELETE FROM order_details WHERE `product_id`='$id' and `userid`='$userid'";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
    }
}
?>
<div id="container1">
    <?php include('header.php'); ?>

    <h1 id="head-shop">Shopping Cart</h1>

    <?php include('config.php');
    $sql = "SELECT * FROM order_details";
    $result = mysqli_query($conn, $sql); ?>
    <div id="cart1">
        <table id="cart-table">
            <tr class="row">

                <th class="row">PRODUCT ID</th>
                <th class="row">PRODUCT NAME</th>
                <th class="row">QUANTITY</th>
                <th class="row">TOTAL</th>
                <th class="row">ACTION</th>
            </tr>
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $username = $_SESSION['username'];
                    if ($row['userid'] == $username) {
                ?>
                        <tr class="row">
                            <!-- <td class="row"><img src="images/<?php echo $row['image'] ?>"></td> -->
                            <td class="row"><?php echo $row['order_id']; ?></td>
                            <td class="row"><?php echo $row['product_id'] ?></td>
                            <td class="row"> <?php echo   $row['product_qty'] ?></td>
                            <td class="row"> <?php echo "$" . $row['product_price'] ?></td>
                            <td class="row"><a href="checkout.php?id=<?php echo $row['product_id']; ?>&userid=<?php echo $row['userid']; ?>&action=remove"><i class="fa fa-times" style="color:red;"></i></a></td>
                            <?php $s += $row['product_price'] * $row['product_qty']; ?>
                        </tr>

                    <?php   } ?>
                <?php   } ?>
            <?php } ?>
            <?php if (mysqli_num_rows($result) > 0) {
                echo '<tr class="row">
                    <td class="row">Have a Promo Code ?</td>
                    <td class="row"></td>
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