<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "cinema";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Sorry your connection is failed");
}
echo "connection wa successful";
?>