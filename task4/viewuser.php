<?php
// echo "<h1>VIEW USERS</h1>"
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include('config.php');
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1> WELCOME :<?php echo "VIEW USERS" ?></h1><br>
    <a href="logout.php" id="remove">LOGOUT</a>
    <a href="dashboard.php" id="remove">ADMIN PANEL</a><br>
    <?php
    if (isset($_GET['password'])) {
        if ($_GET['action'] == 'remove') {
            $password = $_GET['password'];
            $sql = "DELETE FROM users WHERE `password`='$password'";
            $result = mysqli_query($conn, $sql);
            // show1();
        }
    }
    ?>
    <?php show1();
    function show1()
    {
        // echo "<h1>VIEW USERS</h1>";
        include('config.php');
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql); ?>
        <table id="add">
            <tr>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
                <th>ACTION</th>
            </tr>
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><a href="viewuser.php?password=<?php echo $row['password']; ?>&action=remove" id="remove">REMOVE</a></td>
                    </tr>
                <?php   } ?>
            <?php   } ?>
        </table>
    <?php  } ?>
</body>

</html>