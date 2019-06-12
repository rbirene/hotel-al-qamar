<?php
ob_start(); //activates output buffering

setcookie("passCookie", "", -1); //expired cookie (deletes cookie)

ob_end_flush(); //outputs content

header("Location: makeBooking_1_login.php")//redirects back to login page
?>