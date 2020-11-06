<?php
include('config.php');
// $user =  $_POST['username'];
// $pass =  $_POST['password'];
$sql = "SELECT * FROM addproduct";
$result = mysqli_query($conn, $sql);
show();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>ADMIN PANEL</h1>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>PRICE</th>
                <th>IMAGE</th>

                <th>ACTION</th>

            </tr>
            <?php $result = mysqli_query($conn, $sql); ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><img src="<?php echo $row['image'] ?>"></td>
                        <!-- <td><a href="javascript:onUpdateAdd(' +value['id']+' )" id="a1">+</a><input type="text" id="text" value="<?php echo ($value['quantity']); ?>"><a href="javascript:onUpdateRemove('+value['id']+')" id="a2">-</a></td> -->
                        <td> <a href="add.php?id=<?php echo $row['id']; ?>&action=remove" id="remove">REMOVE</a>
                        </td>
                        <!-- <td><?php echo $value['totalprice'] ?></td> -->
                    </tr>


                <?php   } ?>
            <?php } ?>
        </table>
    </div>
    <?php
    if (isset($_GET['id'])) {
        if ($_GET['action'] == 'remove') {
            echo "hi";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['id'] == $_GET['id']) {
                        echo "hi";
                        $sql = "DELETE FROM addproduct WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                    }
                }
            }
        }
    }
    ?>
</body>

</html>