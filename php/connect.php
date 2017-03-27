<?php

//be able to change db in any file you export this to
    
    function dbase($db){
    $servername = "localhost";
    $username = "ous";
    $password  = "ous";
    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn){
        die("Connection error" .  mysqli_connect_error());
	}
	echo(" "); //Connected succesfully nothing should happen
     return $conn;

}
?>
