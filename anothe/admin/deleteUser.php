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

 $userid = $_GET['id'];
 $query = "DELETE from users WHERE `user_id`='$userid'";

 $data = mysqli_query($conn, $query);

if ($data) {
    echo "record deleted";
} else {
    echo "fail to delete";
} 

?>