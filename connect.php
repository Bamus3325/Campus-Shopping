<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "campus";

$con = mysqli_connect($server, $user, $pass, $db);
if (!$con) {
    echo "Database Not Connected";
}



?>