<?php
require_once 'model/KijeloltFelhasznalok.php';

class Admin extends Kijeloltfelhasznalok {
    
    function __construct() {
        $this->tablaNev = 'adminok';
    }
}

// Teszt
/*
$admin = new Admin();

$admin->set_id(1, $conn);
echo $admin->get_id();
*/

?>