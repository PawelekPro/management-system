<?php
session_start();
if (empty($_SESSION["email_emp"])) {
    header("Location: ./login.php");
}