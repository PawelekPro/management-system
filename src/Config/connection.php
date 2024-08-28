<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "0808";
$dbname = "employees";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!isset($conn)) {
    echo die("Database connection failed");
}
?>