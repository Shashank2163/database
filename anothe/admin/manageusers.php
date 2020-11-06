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

$result = mysqli_query($conn, "SELECT * FROM users");

echo "
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<h2>User table</h2>
<table>
<tr>
<th>User name</th>
<th>Email id</th>
<th>Role</th>
<th>Action</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td><a href='editUser.php?id=$row[user_id]
          &name=$row[username]&email=$row[email]&role=$row[role]'>
          Edit </a> <a href='deleteUser.php?id=$row[user_id]'>
          Delete</a></td>";
    echo "</tr>";
}
echo "</table>
</body>
</html>";

mysqli_close($conn);
?>