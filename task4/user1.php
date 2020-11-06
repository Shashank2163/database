<?php
include('config.php');
error_reporting(0);
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
<?php include 'header.php'; ?>
<h1> WELCOME :<?php echo $_SESSION['username']; ?></h1><br>
<a href="logout.php" id="remove">LOGOUT</a>

<div id="header">
</div>
<?php if ($_GET['action'] == 'update') { ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="id">ID: <input type="text" name="id" value="<?php echo  $_GET['id'] ?>" disabled></label>
        <label for=" price">Quantity: <input type="number" name="quantity" value="<?php echo  $_GET['quantity'] ?>"></label>
        <input type="submit" name="submit" value="Submit" id="addproduct">
        <buttton><a href="#" id="addproduct">SHOW PRODUCT</a></buttton>
    </form>

    <?php
    $msg = "";
    if (isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $id = $_GET['id'];
        $sql = "UPDATE cart SET quantity='$quantity' WHERE id='$id' and username='$username'";
        mysqli_query($conn, $sql);
    } ?>
<?php } ?>
<?php
if (isset($_GET['id'])) {
    if ($_GET['action'] == 'remove') {
        $id = $_GET['id'];
        $sql = "DELETE FROM cart WHERE id='$id' and username='$username'";
        $result = mysqli_query($conn, $sql);
    }
}
?>
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
                    <span><?php echo "$" . $row['price']; ?></span>
                    <a class="add-to-cart" href="user1.php?id=<?php echo $row['id']; ?>&price=
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
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($conn, $sql);
        $x = true;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($_GET['id'] == $row['id'] && $username == $row['username']) {
                    $id = $_GET['id'];
                    $price = $_GET['price'];
                    $filename = $_GET['img'];
                    $quantity = $row['quantity'];
                    $quantity++;
                    $x = false;
                    $sql = "UPDATE  cart SET quantity='$quantity' where id='$id' and username='$username'";
                    mysqli_query($conn, $sql);
                }
            }
        }
        if ($x == true) {
            $id = $_GET['id'];
            $price = $_GET['price'];
            $filename = $_GET['img'];
            $quantity = 1;
            $sql = "INSERT INTO cart VALUES('$username','$filename','$id','$price','$quantity')";
            mysqli_query($conn, $sql);
        }
    }
}
?>
<?php show1();
function show1()
{
    include('config.php');
    $sql = "SELECT * FROM cart";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)  > 0) {
        echo '<table id="add">
            <tr>
                <th>ID</th>
                <th>PRICE</th>
                <th>IMAGE</th>
                <th>ACTION</th>
                <th>UPDATE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
            </tr>
            ';

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td>';
                echo $row['id'];
                echo '</td>
                <td>';
                echo $row['price'];
                echo '</td>
                <td><img src="images/';
                echo $row['image'];
                echo '"></td>

                <td><a href="user1.php?id=';
                echo $row['id'];
                echo '&action=remove" id="remove">REMOVE</a></td>
                <td>
                    <a href="user1.php?id=';
                echo $row['id'];
                echo '&quantity=';
                echo $row['quantity'];
                echo '&action=update" id="remove">UPDATE</a></td>
                <td>';
                echo $row['quantity'];
                echo '</td>
                <td>';
                echo $row['price'] * $row['quantity'];
                echo '</td>';
                $s += $row['price'] * $row['quantity'];
                echo '
            </tr>';
            }
        }
        echo ' <tr>
                <td>FINAL TOTAL</td>

                <td colspan="6">';
        echo $s;
        echo '</td>
            </tr>
        </table>';
        echo '<div id="out">
    <a href="checkout.php" id="check">CHECK OUT</a>
</div>';
    } ?>



<?php  } ?>

<!-- FOOOTER  SECTION-->
<?php include 'footer.php';
?>