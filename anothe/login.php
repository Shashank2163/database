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
require'config.php';
$errors = array();
$message = '';


if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';

    if (!$username || !$password ) {
        $errors[] = array('input' => 'form', 'msg' => 'please fill all the details');
    }

    if (sizeof($errors)==0) {
        $sql = "SELECT * FROM users WHERE 
		`username` ='". $username."' AND `password` ='" . $password."'" ;
        $result = $conn->query($sql);
    
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['userdata']=array('username'=>$row['username'],
                'user_id' => $row['user_id'],
                'role' => $row['role']);
                if ($_SESSION['userdata']['role'] === "admin" ) {
                    header('Location: admin');
                } else {
                    header('Location: index.php');
                }
            }
        } else {
            $errors[] = array('input' => 'form', 'msg' => 'user not found'); 
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="login-form">
                <h2>Login</h2>
                <div id="message"><?php echo $message; ?></div>
                <div id="errors">
                    <?php if (sizeof($errors)>0 ) : ?>
                    <ul>
                        <?php foreach($errors as $error) : ?>
                        <li><?php echo $error['msg'] ;?> </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <form action="login.php" method="POST">
                    <p>
                        <label for="username">Username: 
                        <input type="text" name="username" required></label>
                    </p>
                    <p>
                        <label for="password">Password:
                        <input type="text" name="password" required></label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit">
                        new user..? 
                        <a href="signup.php"> Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>