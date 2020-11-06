<?php
include('config.php');
$error = array();
$message = '';
if (isset($_POST['submit'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $repassword = $_REQUEST['password2'];
    $email = $_REQUEST['email'];
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $x = true;
    $y = false;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "username: " . $row["username"] . " - password: " . $row["password"] . " " . $row["role"] . "<br>";
            if ($email == $row['email']) {
                $x = false;
                $y = true;
            }
        }
    }
    if ($y) {
        echo "<p id='message'>*EMAIL ID IS ALREADY EXIST</p>";
    }
    if ($password != $repassword) {
        echo "<p id='message'>*PASSWORD IS NOT MATCHED</p>";
    } else if ($x) {
        $sql = "INSERT into users
                VALUES ('$username', '$password', '$email')";
        if ($conn->query($sql) === true) {
            echo "<p id='success'>*SUCESSFULL REGISTER</p>";
            echo "<a href='login.php'>LOGIN</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Register
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="wrapper">
        <div id="signup-form">
            <h2>Sign Up</h2>
            <form action="" method="POST">
                <p>
                    <label for="username">Username: <input type="text" name="username" required></label>
                </p>
                <p>
                    <label for="password">Password: <input type="password" name="password" required></label>
                </p>
                <p>
                    <label for="password2">Re-Password: <input type="password" name="password2" required></label>
                </p>
                <p>
                    <label for="email">Email: <input type="email" name="email" required></label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
    </div>
</body>

</html>