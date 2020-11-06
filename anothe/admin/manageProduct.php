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
$result = mysqli_query($conn, "SELECT * FROM product");


echo "
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<h2>product table</h2>
<table>
<tr>
<th>product ID</th>
<th>product name</th>
<th>product price</th>
<th>Action</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['pid'] . "</td>";
    echo "<td>" . $row['pname'] . "</td>";
    echo "<td>" . $row['pprice'] . "</td>";
    echo "<td><a href='#'>Edit </a> <a href='deleteProduct.php?pid=$row[pid]'>
          Delete</a></td>";
    echo "</tr>";
}
echo "</table>
</body>
</html>";

mysqli_close($conn);
?>