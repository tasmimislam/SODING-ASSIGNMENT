<?php
$server     ="localhost";
$username   ="root";
$password   ="";
$db         ="soding_tasmim";

$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn)
{
    die("connection failed: " . mysqli_connect_error());
}
?>