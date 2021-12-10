<?php

class Irszam{
    private $id;
    private $irszam;
    private $telepules;

    public function set_irszam($id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT id, irszam, telepules FROM telepulesek";
        $sql .= " WHERE id = $id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->id = $row['id'];
                $this->irszam = $row['irszam'];
                $this->telepules = $row['telepules'];
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_irszam() {
        return $this->irszam;
    }

    public function get_telepules() {
        return $this->telepules;
    }

    public function get_id() {
        return $this->id;
    }

    public function telepulesekListaja($conn) {
        $lista = array();
        $sql = "SELECT id FROM telepulesek";
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