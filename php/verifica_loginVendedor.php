<?php
    session_start();

    if ($_SESSION['tipoUsuario'] != 2) {
        header('Location: VIEW_cadastrar.php');
    }

?>