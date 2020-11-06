<?php 
/**
 * MyClass File Doc Comment    
 * PHP version 5
 * 
 * @category MyClass
 * @package  MyPackage
 * @author   My Name <my.name@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
require'config.php';
$errors = array();
$message = '';
if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $role = isset($_POST['role'])?$_POST['role']:'';

    if ($password != $repassword ) {
        $errors[] = array('input' => 'password', 'msg' => 'password dose not match');
    }
    $duplicate = mysqli_query( 
        $conn, "select * from users where username='$username' or email='$email'" 
    );
    if (mysqli_num_rows($duplicate)>0 ) {
        $errors[] = array('input' => 'password',
            'msg' => 'username or email already exists');
    }
    if (sizeof($errors)==0) {
        $sql = 'INSERT INTO users( `username` , `password` , `email` , `role`)
        VALUES ("'. $username .'","'. $password .'","'. $email .'" ,"'. $role .'")';
    
        if ($conn->query($sql) === true) {
            echo "New record created successfully";
        } else {
            $errors[] = array('input' => 'form', 'msg' => $conn->error);
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="signin-form">
                <h2>Sign In</h2>
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
                <form action="signup.php" method="POST">
                    <p>
                        <label for="username">Username: 
                        <input type="text" name="username" required></label>
                    </p>
                    <p>
                        <label for="password">Password:
                        <input type="text" name="password" required></label>
                    </p>
                    <p>
                        <label for="repassword">Re Password:
                        <input type="text" name="repassword" required></label>
                    </p>
                    <p>
                        <label for="role"> Role:
                        <input type="role" name="role" required></label>
                    </p>
                    <p>
                        <label for="email"> Email:
                        <input type="email" name="email" required></label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit">
                        already a user..? <a href="login.php"> log in</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>