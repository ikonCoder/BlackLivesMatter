<?php 
include($_SERVER['DOCUMENT_ROOT']. '/blm/include/config.php');

//variable that can sees all the items in the 'upload folder'
$imgDir = $_SERVER['DOCUMENT_ROOT']. '/blm/uploads/';
$uploadedImages = scandir($imgDir); 

$imgArr = array();

//loop through all images in $imgDir
for($i = 0; $i < 5; $i++){
    array_push($imgArr, $uploadedImages[$i]); 
    print_r($imgArr);
}


if (isset($_POST['upload'])) {
//Get image name
$image = $_FILES['image']['name'];
  
//Get state
$state = $_POST['state_entered'];

//image file directory plus uploaded image name
$target =  $_SERVER['DOCUMENT_ROOT'] . "/blm/uploads/" . basename($image);

//isert image into mySQL table for "dba_blm"
$sql = "INSERT INTO images (image, state) VALUES ('$image', '$state')"; 
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
            <input placeholder="State" id="inputOne" name="state_entered">
            <label class="file">
                <input type="file" name="image" id="file">
                <span class="file-custom"></span>
            </label>   
            <!-- <button type="submit" name="upload">POST</button> -->
            <input style="text-align:center; display:block; margin:0 auto; margin-top:20px;" type="submit" name="upload" value="Upload Image" >
            <?php echo $msg ?>
        </form>

        <?php
            // while ($row = mysqli_fetch_array($result)) {
            // echo "<div>";
            //     echo "<img id='img_div' src='" . $_SERVER['DOCUMENT_ROOT'] . '/blm/uploads/' . $row['image']."' >";   
            //     echo "<div>" . $row['state'] . "</div>";
            // echo "</div>";
            // }
        ?>
    </div>
</body>
</html>
