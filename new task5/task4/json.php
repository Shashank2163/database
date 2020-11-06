<?php
 include('config.php');
$sql="SELECT * FROM addproduct";
$result=mysqli_query($conn,$sql) or die ("SQL QUERY FAILED");
$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);
