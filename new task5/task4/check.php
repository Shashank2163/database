<?php
include('config.php');
// error_reporting(0);
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

print_r($products);
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
        $sql1 = "INSERT INTO order_details (order_id,product_id,product_price,product_qty)VALUES ($order_id,'$id','$price','$quantity')";
        mysqli_query($conn, $sql1);
    }

    $arr['count'] = $count;
    // echo json_encode($arr);
} ?>