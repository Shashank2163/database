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
// session_start();
require '../config.php';

$userid = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$role = $_GET['role'];


$errors = array();
$message = '';

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $role = isset($_POST['role'])?$_POST['role']:'';

    $duplicate = mysqli_query( 
        $conn, "select * from users where username='$username' or email='$email'" 
    );
    if (mysqli_num_rows($duplicate)>0 ) {
        $errors[] = array('input' => 'password',
            'msg' => 'username or email already exists');
    }


    if (sizeof($errors)==0) {
        $sql = 'INSERT INTO users( `username` , `email` , `role`)
        VALUES ("'. $username .'","'. $email .'" ,"'. $role .'")';

    
        if ($conn->query($sql) === true) {
            echo " record updated successfully";
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
        <title>Edit User</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="signin-form">
                <h2>update entry</h2>
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
                <form action="editUser.php" method="POST">
                    <p>
                        <label for="username">Username: 
                        <input type="text" value=
                        "<?php echo "$name"?>" name="username" required></label>
                    </p>
                    <p>
                        <label for="role"> Role:
                        <input type="role" value=
                        "<?php echo "$role"?>" name="role" required></label>
                    </p>
                    <p>
                        <label for="email"> Email:
                        <input type="email" value=
                        "<?php echo "$email"?>" name="email" required></label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Update">
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>