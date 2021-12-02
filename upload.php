<?php

$target_dir = "uploads/";
if(isset($_POST["submit"])){
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));


  if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"])). " has been uploaded.<br>";
  } else {
    echo "Sorry, there was an error uploading your file.<br>";
  }
  if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"])). " has been uploaded.<br>";
  } else {
    echo "Sorry, there was an error uploading your second file.<br>";
  }
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:<br>
  <input type="file" name="fileToUpload1" id="fileToUpload1"><br>
  <input type="file" name="fileToUpload2" id="fileToUpload2"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>