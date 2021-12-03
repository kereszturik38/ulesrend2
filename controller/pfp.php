<?php

$target_dir = "profilkepek/";
$supported_files = array("jpg", "jpeg", "png");

if (isset($_POST["submit"]) && isset($_SESSION["id"])) {

    $errors = [];


    $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["pfp"]["name"]), PATHINFO_EXTENSION));
    $target_file = $target_dir . $_SESSION["id"] . "." . $imageFileType;

    if ($_FILES["pfp"]["size"] < 1000) {
      array_push($errors, "A file mérete túl kicsi");
    }

    if ($_FILES["pfp"]["size"] > 1000000) {
      array_push($errors, "A file mérete túl nagy");
    }

    if (!in_array($imageFileType, $supported_files)) {
      array_push($errors, "A file típusa nem támogatott");
    }

    if (file_exists($target_file)) {
      array_push($errors, "A file már létezik");
    }

    if (sizeof($errors) == 0) {
      if (@move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_file)) {
      } else {
        array_push($errors, "A file feltöltése nem sikeres");
      }
    }
  }
?>
<?php
if (isset($_POST["submit"])) {
  if (sizeof($errors) > 0) {
    echo "Sikertelen<br>";
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  } else {
    unset($errors);
    include('ulesrend.php'); //controller
  }
}
?>