<?php
echo "<table>";
if($t_lista){
    foreach($t_lista as $id){
        $telep->set_irszam($id,$conn);
        echo "<tr>";
        echo "<td>" . $telep->get_irszam() . "</td>";
        echo "<td>" . $telep->get_telepules() . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>