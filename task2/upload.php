<?php
error_reporting(0);

?>
<?php
$msg = "";
include('config.php');
// If upload button is clicked ... 
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;

    echo $filename;

    // Get all the submitted data from the form 
    $sql = "INSERT INTO image VALUES('$filename')";

    // Execute query 
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image 
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($dbname, "SELECT * FROM image");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <div id="content">

        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="uploadfile" value="" />


            <button type="submit" name="upload">UPLOAD</button>
            </d </form> </div> </body> </htm