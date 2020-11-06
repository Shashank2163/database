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
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn, "SELECT * FROM cart");

require 'header.php';
echo "<div id='main'><div id='products'>";



while ($row = mysqli_fetch_array($result)) {

    $show = '';
    // global $show;
    $show .= '<div id="product-10' . $row['id'] . '" class="product">
                <img src="images/' . $row["image"] . '">
                <h3 class="title"><a href="#">' . $row["id"] . '</a></h3>
                <span>Price: $' . $row["price"] . '</span>
                <button type="submit" class="add-to-cart" href="#">
                Add To Cart 
                </button>
            </div> ';
    echo $show;
}
echo "</div></div>";
require 'footer.php';

mysqli_close($conn);
