<?php
session_start();
session_destroy(); 
header('location: ../VIEW_login.php');
?>