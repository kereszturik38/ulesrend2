<?php
class KijeloltFelhasznalok{
private $id;
protected $tabla;

public function get_id(){
    return $this->id;
}

function __construct($tablanev)
{
    $this->tabla = $tablanev;
}

public function lista($conn){
    $lista = array();
    $sql = "SELECT id FROM $this->tabla";
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lista[] = $row['id'];
            }
        }
    }
    return $lista;
}

}



?>