<?php

require_once 'model/KijeloltFelhasznalok.php';

class Hianyzo extends Kijeloltfelhasznalok {
    
    function __construct() {
        $this->tablaNev = 'hianyzok';
    }
    public function remove_id($id,$conn){
        $sql = "DELETE FROM hianyzok WHERE id =".$id;
	    $conn->query($sql);
    }
}

// Teszt
/*
$hianyzo = new Hianyzo();

$hianyzo->set_id(1, $conn);
echo $hianyzo->get_id();
*/

?>