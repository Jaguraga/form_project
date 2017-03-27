<?php
require_once("connect.php");

$conn = dbase("tut");


//Get from data


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


$title = $_POST['title'];
$descr = $_POST['descr'];
$image = $_POST["title"];
$ip_address = basename($_SERVER['REMOTE_ADDR']);

//Convert html tags for securtiy issues

$title = htmlspecialchars($title);
$descr = htmlspecialchars($descr);
$image = htmlspecialchars($image);
$ip_address = htmlspecialchars($ip_address);


$query = "INSERT INTO userinfo(
title,  description, image_name, time_entered, ip_address, id) VALUES(?,?,?,NULL,?,NULL      
 )";

$stmt = mysqli_prepare($conn, $query);




mysqli_stmt_bind_param($stmt, "ssss", $title, $descr, $image, $ip_address);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if ($affected_rows == 1){
	 echo "User entered";
	 mysqli_stmt_close($stmt);
	 mysqli_close($conn);
   
}else{

    echo "An error Occured" . mysqli_error($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}


?>

