<?php
    session_start();    
    if(!$_SESSION['usuario']){
        header('Location: VIEW_login.php');
    }
?>