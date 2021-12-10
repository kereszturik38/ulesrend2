<?php
include 'model/Irszam.php';
$telep = new Irszam();
$t_lista = $telep->telepulesekListaja($conn);

if(sizeof($t_lista) > 0){
    include 'view/irszam.php';
}else{
    echo "A tábla tartalma üres.<a href=irszam_upload.php>Importálás</a>";
}

?>