<?php

$target_dir = "uploads/";
$supported_files = array("jpg","jpeg","png");

if(isset($_POST["submit"])){

  $errors = [];

  $countfiles = count($_FILES["filesToUpload"]["name"]);
  for($i = 0;$i<$countfiles;$i++){
  $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($_FILES["filesToUpload"]["size"][$i] < 1000){
    array_push($errors,"A file mérete túl kicsi");
  }

if($_FILES["filesToUpload"]["size"][$i] > 100000){
    array_push($errors,"A file mérete túl nagy");
  }

  if(!in_array($imageFileType,$supported_files)){
    array_push($errors,"A file típusa nem támogatott");
  }
  
  if(file_exists($target_file)){
    array_push($errors,"A file már létezik");
  }

  if(sizeof($errors) == 0){
    if (@move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
    } else {
      array_push($errors,"A file feltöltése nem sikeres");
    }
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
if(isset($_POST["submit"])){
echo "A(z)" . $countfiles . " file feltöltése:";
if(sizeof($errors) > 0){
  echo "Sikertelen<br>";
  foreach($errors as $error){
    echo $error . "<br>";
  }
}else{
  echo "Sikeres";
  unset($errors);
}

}
?>