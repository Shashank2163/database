<?php include 'header.php'; ?>
</div>
<?php
session_start();

global $products;
global $product;
if (isset($_SESSION['product'])) {
    $selected_product = $_SESSION['product'];
} else {
    global $selected_product;
    $selected_product = array();
}
$Product = array();
// ARRAY OF PRODUCTS
$products = array(
    array('id' => 'Product101', 'price' => '150', 'img' => 'images/football.png'),
    array('id' => 'Product102', 'price' => '120', 'img' => 'images/tennis.png'),
    array('id' => 'Product103', 'price' => '90', 'img' => 'images/basketball.png'),
    array('id' => 'Product104', 'price' => '110', 'img' => 'images/table-tennis.png'),
    array('id' => 'Product105', 'price' => '80', 'img' => 'images/soccer.png')
);  ?>
<div id="main">
    <div id="products">
        <form action="" method="GET">
            <?php foreach ($products as $key => $value) : ?>
                <div id="product-101" class="product">
                    <img src="<?php echo $value['img']; ?>">
                    <h3 class="title"><a href="#"><?php echo $value['id']; ?></a></h3>
                    <span><?php echo $value['price']; ?></span>
                    <a class="add-to-cart" href="user1.php?id=<?php echo $value['id']; ?>&price=<?php
                                                                                                echo $value['price']; ?>&img=<?php echo $value['img']; ?>&action=addtocart" name="Addtocart">Add To Cart</a>
                </div>
        </form>
    <?php endforeach ?>
    </div>
    <div>
        <?php function display1($selected_product)
        { ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>PRICE</th>
                    <th>IMAGE</th>
                    <th>QUANTITY</th>
                    <th>ACTION</th>
                    <th>TOTAL</th>
                </tr>
                <tr>
                    <?php
                    $s = 0;
                    foreach ($selected_product as $key =>
                        $value) : ?>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['price'] ?></td>
                        <td><?php echo $value['image'] ?></td>
                        <td>
                            <form action="" method="GET"><input type="text" name="tex" style="width:20px;" value="<?php echo $value['quantity']; ?>">
                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                <input type="submit" name="action" value="UPDATE" id="update">
                            </form>
                        </td>
                        <td>
                            <form action="" method="GET"><a href="user1.php?id=<?php echo
                                                                                    $value['id']; ?>&action=remove" id="remove">REMOVE</a></form>
                        </td>
                        <td><?php echo  $value['totalprice'] ?></td>
                        <?php $s += preg_replace("/[^0-9]/", "", $value['totalprice']); ?>
                </tr>
            <?php endforeach  ?>
            <tr>
                <td>FINAL TOTAL</td>

                <td colspan="5"><?php echo $s ?></td>
            </tr>
        <?php  }
        ?>
            </table>

            <?php
            //VALIDATE ID
            function validate($x, $y)
            {
                foreach ($y as $key => $value) {
                    if ($value['id'] == $x['id']) {
                        return ($value);
                    }
                }
            }
            if (isset($_GET['id'])) {
                if ($_GET['action'] == 'UPDATE') {
                    foreach ($selected_product as $key => $value) {
                        if ($value['id'] == $_GET['id']) {
                            $val = $_GET['tex'];
                            $tot = preg_replace("/[^0-9]/", "", $val);
                            $selected_product[$key]['quantity'] = $tot;
                            $price = $selected_product[$key]['price'];
                            $totalprice = preg_replace(
                                "/[^0-9]/",
                                "",
                                $price
                            );
                            $totalprice = $totalprice * $tot;
                            $selected_product[$key]['totalprice'] =
                                $totalprice;
                            display1($selected_product);
                        }
                    }
                } else if ($_GET['action'] == 'remove') {
                    foreach ($selected_product as $key => $value) {
                        if ($value['id'] == $_GET['id']) {
                            unset($selected_product[$key]);
                            break;
                        }
                    }
                    $_SESSION['product'] = $selected_product;
                    display1($selected_product);
                } else if ($_GET['action'] == 'addtocart') {
                    $id = $_GET['id'];
                    $price = $_GET['price'];
                    $image = $_GET['img'];
                    $i = "<img src='$image' alt='' >";
                    $totalprice = $price;
                    $new_selected_product = array('id' => $id, 'price' =>
                    $price, 'image' => $i, 'quantity' => 1, 'totalprice' => $totalprice);
                }
            }
            // CALCULATE PRICE AND QUANTITY
            if (isset($new_selected_product)) {
                $a = validate($new_selected_product, $selected_product);
                if ($a) {
                    foreach ($selected_product as $key => $value) {
                        if ($value['id'] == $a['id']) {
                            $quant = $selected_product[$key]['quantity']
                                += 1;
                            $price = $selected_product[$key]['price'];
                            $totalprice = preg_replace(
                                "/[^0-9]/",
                                "",
                                $price
                            );
                            $totalprice = $totalprice * $quant;
                            $selected_product[$key]['totalprice'] =
                                $totalprice;
                        }
                    }
                } else {
                    array_push($selected_product, $new_selected_product);
                }

                display1($selected_product);
                $_SESSION['product'] = $selected_product;
            }
            ?>

            <form action="check.php" method="POST">
                <input type="submit" name="submit" value="checkout" id="remove">
            </form>
    </div>
</div>
</body>

</html>