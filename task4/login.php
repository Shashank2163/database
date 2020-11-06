<!DOCTYPE html>
<html>

<head>
    <title></title>

</head>

<body>
    <?php include 'config.php'; ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['submit'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            // $role = $_POST['role'];
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            //print_r($result);
        }
        $x = true;
        if (mysqli_num_rows($result) > 0) {
            //echo "yes...."; "<br>"
            while ($row = mysqli_fetch_assoc($result)) {
                // echo "username: " . $row["username"]. " - password: " . $row["password"]. " " . $row["role"]."<br>";

                if ($user == $row["username"] && $pass == $row["password"]) {
                    //echo "yes it is here!!!!!!! admin";

                    if ($row["admin"] == "admin") {
                        session_start();
                        $_SESSION['username'] = $row["username"];
                        $_SESSION['password'] = $row["password"];
                        $_SESSION['role'] = $row["admin"];
                        header('location:dashboard.php');
                    } else {
                        session_start();
                        $_SESSION['username'] = $row["username"];
                        $_SESSION['password'] = $row["password"];
                        $_SESSION['role'] = $row["user"];
                        header('location:user1.php');
                        $x = true;
                    }
                }
            }
            if ($x) {
                echo '<p id="message">*INVALID USERNAME OR PASSWORD</p>';
            }
        }
    }
    mysqli_close($conn);
    ?>
    <h1> LOG IN</h1>
    <form action="" method="POST">
        <p>
            <label for="username">Username: <input type="text" name="username" required></label>
        </p>
        <p>
            <label for="password">Password: <input type="text" name="password" required></label>
        </p>
        <p> <label> Role</label>
            <!-- <input type="text" name="role" id="role"><br> -->
            <select>
                <option value="admin" name="role" id="role">admin</option>
                <option value="user" name="role" id="role">user</option>
            </select>
        </p>
        <p> <input type="submit" name="submit" value="log in"></p>
        <p> <a href="signup.php" id="remove">SIGN UP</a></p>
    </form>
</body>

</html>