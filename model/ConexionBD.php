<?php 
$usuario="root";
$password="usbw";
$DBnombre="dbcertificados";
$conect = mysqli_connect("localhost",$usuario,$password,$DBnombre);
if ($conect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>