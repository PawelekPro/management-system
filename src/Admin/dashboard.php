<?php
require_once "include/header.php";
?>

<?php
// database connection
require_once "../Config/connection.php";

$currentDay = date('Y-m-d', strtotime("today"));
$tomarrow = date('Y-m-d', strtotime("+1 day"));
?>

<?php
require_once "include/footer.php";
?>