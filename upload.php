<?php

$target_dir = "uploads/";

if(isset($_POST["submit"])){

  $success = false;
  $countfiles = count($_FILES["filesToUpload"]["name"]);
  for($i = 0;$i<$countfiles;$i++){
  $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
    $success = true;
  } else {
    $success = false;
  }
 } 
  
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:<br>
  <input type="file" name="filesToUpload[]" id="filesToUpload" multiple><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php
echo "A(z)" . $countfiles . " file feltöltése:";
echo ($success) ? "sikeres" : "sikertelen";
?>