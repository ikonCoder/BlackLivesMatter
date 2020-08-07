<?php 
include '/include/config.php';

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
  $image = $_FILES['image']['name'];
  
  //Get fname and lname 
  $fname = $

    // image file directory plus uploaded image name
    $target =  $_SERVER['DOCUMENT_ROOT'] . "/blm/uploads/" . basename($image);

  // isert image into mySQL table for "dba_blm"
  $sql = "INSERT INTO images (image) 
  VALUES ('$image')";

    // execute query
    mysqli_query($db, $sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($db, "SELECT * FROM images");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel=stylesheet></link>
    <link href="../fonts/fonts.css" rel=stylesheet></link>
    <title>BLM</title>
</head>
<body>
    <div id="container">
        <span id="uploadTxt">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores officia, earum praesentium facilis impedit omnis odit quaerat eos repudiandae aliquid est repellendus animi, at sit magni aspernatur. Illo, voluptatum animi?</p>
        </span>
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <input placeholder="City" id="inputOne">
            <input placeholder="State" id="inputTwo">
            <label class="file">
                <input type="file" id="file">
                <span class="file-custom"></span>
            </label>       
        </form>
    </div>
</body>
</html>
