<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

echo "File tartalma:<br>";
readfile("newfile.txt");
//file átnevezés
rename('newfile.txt','oldfile.txt');
//copy
copy('oldfile.txt','copyfile.txt');
//copy tartalma
echo "<br>Copyfile tartalma:<br>";
readfile('copyfile.txt');
//régi törlése
unlink('oldfile.txt');
?>