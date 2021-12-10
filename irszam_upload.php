<?php
include 'includes/db.inc.php';
set_time_limit(500);

$file = fopen('telepulesek.txt','r');
while(!feof($file)){
$line = fgets($file);
$seperated = explode("\t",$line);
$irsz = $seperated[0];
$nev = $seperated[1];
$sql = "INSERT INTO `telepulesek` (`irszam`,`telepules`) VALUES ('$irsz','$nev');";
$conn->query($sql); 
}

fclose($file);
header('Location: index.php');

?>