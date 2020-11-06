<?php show();
function show()
{
    include('config.php');
    $sql = "SELECT * FROM addproduct";
    $result = mysqli_query($conn, $sql); ?>
    <table id="add">
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
                    <td><img src="images/<?php echo $row['image'] ?>"></td>
                    <td><a href="addproduct.php?id=<?php echo $row['id']; ?>&action=remove" id="remove">REMOVE</a></td>
                </tr>
            <?php   } ?>
        <?php } ?>
    </table>
<?php  } ?>