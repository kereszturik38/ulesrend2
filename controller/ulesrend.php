<?php
// form feldolgozása
require 'model/Admin.php';
require 'model/Hianyzo.php';

$hianyzo = new Hianyzo();

if(!empty($_POST["hianyzo_id"])) {
	$hianyzo->set_id($_POST["hianyzo_id"], $conn);
}
elseif(!empty($_GET['nem_hianyzo'])) {
	$sql = "DELETE FROM hianyzok WHERE id =".$_GET['nem_hianyzo'];
	$result = $conn->query($sql);	
}

$hianyzok = $hianyzo->lista($conn);

$admin = new Admin();

$adminok = $admin->lista($conn); // ebben leszek az adminok id-i felsorolva

$en = 0;
if(!empty($_SESSION["id"])) $en = $_SESSION["id"];

$tanar = 17;

$ID_lista = $tanulo->tanulokListaja($conn);

include 'view/ulesrend.php';
