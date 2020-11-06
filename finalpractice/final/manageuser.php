<?php
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
    <h1>MANAGE USER </h1>
    <?php include("navigation.php") ?>
    <?php
    if (isset($_GET['password'])) {
        if ($_GET['action'] == 'remove') {
            $password = $_GET['password'];
            $sql = "DELETE FROM users WHERE `password`='$password'";
            mysqli_query($conn, $sql);
            // show1();
        }
    }
    ?>
    <!-- UPDATE -->
    <?php if (isset($_GET['username'])) {
        if ($_GET['action'] == 'update') { ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="id">USERNAME: <input type="text" name="username" value="<?php echo  $_GET['username'] ?>" disabled></label>
                <label for=" price">PASSWORD: <input type="text" name="password" value="<?php echo  $_GET['password'] ?>"></label>
                <label for=" price">EMAIL: <input type="text" name="email" value="<?php echo  $_GET['email'] ?>"></label>
                <input type="submit" name="submit" value="Submit" id="addproduct">
            </form>
            <?php
            $msg = "";
            if (isset($_POST['submit'])) {
                $username = $_GET['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $sql1 = "UPDATE users SET email='$email' ,password='$password' WHERE username='$username'";
                mysqli_query($conn, $sql1);
            } ?>
        <?php } ?>
    <?php } ?>
    <!-- UPDATE END  -->
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
                <th>UPDATE</th>
            </tr>
            <?php $s = 0;
            $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><a href="manageuser.php?password=<?php echo $row['password']; ?>&action=remove" id="remove">REMOVE</a></td>
                        <td>
                            <a href="manageuser.php?username=<?php echo $row['username']; ?>&password=<?php echo $row['password']; ?>&email=<?php echo $row['email']; ?>&action=update" id="remove">UPDATE</a>
                        </td>
                    </tr>
                <?php   } ?>
            <?php   } ?>
        </table>
    <?php  } ?>
</body>

</html>