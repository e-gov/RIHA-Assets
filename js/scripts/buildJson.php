<?php
$file = "att/varamu.json";  //name and location of json file. if the file doesn't exist, it   will be created with this name

$fh = fopen($file, 'a');  //'a' will append the data to the end of the file. there are other arguemnts for fopen that might help you a little more. google 'fopen php'.

$new_data = $_POST["newData"]; //put POST data from ajax request in a variable

fwrite($fh, $new_data);  //write the data with fwrite

fclose($fh);  //close the dile
?>