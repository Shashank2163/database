<?php

/**
 * MyClass File Doc Comment    
 * PHP version 5
 * 
 * @category MyClass
 * @package  MyPackage
 * @author   Me <me@example.com>
 * @license  http://www.abc.org GNU General Public License
 * @link     http://www.abc.com/
 */

session_start();
require'../config.php';
$errors = array();
$message = '';

if (isset($_POST['submit'])) {
    $pname = isset($_POST['pname'])?$_POST['pname']:'';
    $pprice = isset($_POST['pprice'])?$_POST['pprice']:'';
    $img = isset($_POST['img'])?$_POST['img']:'';

    if (!$pname || !$pprice || !$img) {
        $errors[] = array('input' => 'form', 'msg' => 'please fill all the details');
    }

    $duplicate = mysqli_query( 
        $conn, "select * from product where pname='$pname' or " 
    );
    if (mysqli_num_rows($duplicate)>0 ) {
        $errors[] = array('input' => 'password',
         'msg' => 'product name already exists');
    }

    if (sizeof($errors)==0) {
        $sql = 'INSERT INTO product( `pname` , `pprice` , `img`)
        VALUES ("'. $pname .'" ,"'. $pprice .'" ,"'. $img .'")';
    
        if ($conn->query($sql) === true) {
            echo "New Product added";
        } else {
            $errors[] = array('input' => 'form', 'msg' => $conn->error);
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add Product</title>
        <link href='style.css' type='text/css' rel='stylesheet'>
    </head>
    <body>
        <div id="main">
            <div id="message"><?php echo $message; ?></div>
            <div id="errors">
                <?php if (sizeof($errors)>0 ) : ?>
                <ul>
                    <?php foreach($errors as $error) : ?>
                    <li><?php echo $error['msg'] ;?> </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div id="product-form">
                <form action="addProduct.php" method="POST">
                    <label for="pname">Product Name:</label>
                    <input type="text" name="pname">
                    <br><br>
                    <label for="pprice">Product Price:</label>
                    <input type="text" name="pprice">
                    <br><br>
                    <label for="img">Image Name.png:</label>
                    <input type="text" name="img">
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>
</html> 