<?php
    session_start();
    include_once('../includes/conexao.php');

    $nome = $_POST['username'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['useremail'];
    $tipo = $_POST['tipo'];

    $sql = mysqli_query($GLOBALS['con'], "UPDATE usuario SET nomeUsuario = '$nome', email = '$email', telefone = '$telefone', endereco = '$endereco', cidade = '$cidade', estado = '$estado' WHERE id = '".$_SESSION['idUsuario']."';");

    if ($sql === true) {
        echo "<script> alert('Dados alterados com sucesso!'); window.location.href='../perfilUsuario.php?id=".$_SESSION['idUsuario']."'; </script>";
    }else {
        echo "<script> alert('Erro na alteração!'); window.location.href='../VIEW_alterarUsuario.php'; </script>";
    }
?>