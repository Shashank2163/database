<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    include('navigation.php');
    ?>
    <div id="bill">
        <div id="bill1">
            <h1>INVOICE NO # <?php echo 456 * 455; ?></h1>
            <h2>SHIPPED TO</h2>
            <p id="success">STATUS:<span id="success">SUCCESS</span></p>
            <address>
                <p>NAME :XXXXX</p>
                <p>PHONE :XXXXX</p>
                <p>ADDRESS :XXXXX</p>
            </address>
            <h1 id="head-shop">CART DETAILS</h1>
        </div>
        <?php include('config.php');
        $sql = "SELECT * FROM order_details";
        $result = mysqli_query($conn, $sql); ?>

        <table id="cart-table1">
            <tr class="row">
                <th class="row">PRODUCT ID</th>
                <th class="row">PRODUCT NAME</th>
                <th class="row">QUANTITY</th>
                <th class="row">TOTAL</th>
            </tr>
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="row">
                        <td class="row"><?php echo $row['order_id']; ?></td>
                        <td class="row"><?php echo $row['product_id'] ?></td>
                        <td class="row"> <?php echo   $row['product_qty'] ?></td>
                        <td class="row"> <?php echo "$" . $row['product_price'] ?></td>
                        <?php $s += $row['product_price'] * $row['product_qty']; ?>
                    </tr>

                <?php   } ?>
            <?php } ?>
            <?php if (mysqli_num_rows($result) > 0) {
                echo '<tr class="row">
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

</body>

</html>