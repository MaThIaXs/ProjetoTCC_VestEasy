<?php
session_start();
    include_once('../includes/conexao.php');

    $id_produto = $_GET["id"];
    
    $select = mysqli_query($GLOBALS['con'], "SELECT * FROM produto;");
    $produto = mysqli_fetch_object($select);

    $sql = mysqli_query($con, "DELETE FROM produto WHERE id = '$id_produto';");

    if ($sql === true) {
        echo "<script> alert('Produto excluído com sucesso!'); window.location.href='../perfilUsuario.php?id=".$_SESSION['idUsuario']."' </script>";
    }else {
        echo "<script> alert('Erro na exclusão do produto!'); window.location.href='../perfilUsuario.php?id=".$_SESSION['idUsuario']."'; </script>";
    }
?>