<?php
include("config.php");
$error = array();
$message = '';

if (isset($_POST['submit'])) {
    $user =  $_POST['username'];
    $pass =  $_POST['password'];
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $x = true;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "username: " . $row["username"] . " - password: " . $row["password"] . " " . $row["role"] . "<br>";
            if ($user == $row["username"] && $pass == $row['password']) {
                session_start();
                $_SESSION['username'] = $row["username"];
                $_SESSION['password'] = $row["password"];
                header('location:welcome.php');
            } else {
                $x = true;
            }
        }
        if ($x) {
            echo '<p id="message">*INVALID USERNAME OR PASSWORD</p>';
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Login
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="wrapper">
        <div id="login-form">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <p>
                    <label for="username">Username: <input type="text" name="username" required></label>
                </p>
                <p>
                    <label for="password">Password: <input type="text" name="password" required></label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Submit">
                </p>
                <p>
                    <buttton><a href="signup.php">SIGNUP</a></buttton>
                </p>
            </form>
        </div>
    </div>
</body>

</html>