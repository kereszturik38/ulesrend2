<?php

require "KijeloltFelhasznalok";

class Admin extends KijeloltFelhasznalok{
    private $id;

    public function get_id(){
        return $this->id;
    }

    public function set_admin($id,$conn){
         // adatbázisból lekérdezzük
         $sql = "SELECT id FROM adminok";
         $sql .= " WHERE id = $id ";
         $result = $conn->query($sql);
         if ($conn->query($sql)) {
             if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                 $this->id = $row['id'];
             }else{
                 //
             }
         } 
         else {
             echo "Error: " . $sql . "<br>" . $conn->error;
         }
    }

    
}


?>