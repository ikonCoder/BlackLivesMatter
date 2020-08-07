<?php
 include 'include/config.php';

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
<html>
<head>
    <title>BLM</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/carousel.css">
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div>";
        echo "<img id='img_div' src='uploads/" . $row['image']."' >";   
      echo "</div>";
    }
  ?>
  <form method="POST" action="index.php" enctype="multipart/form-data">
  	<div>
      <input type="file" name="image">
      <input> </input>
      <input> <input>
      <button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>