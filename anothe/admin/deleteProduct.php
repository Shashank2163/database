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

 require '../config.php';

 $pid = $_GET['pid'];
 $query = "DELETE from product WHERE `pid`='$pid'";

 $data = mysqli_query($conn, $query);

if ($data) {
    echo "record deleted";
} else {
    echo "fail to delete";
} 

?>