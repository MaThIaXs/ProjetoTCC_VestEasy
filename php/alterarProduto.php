<?php
session_start();
    include_once('../includes/conexao.php');
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $marca = $_POST['marca'];
    $loja = $_POST['loja'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];

    $sql = mysqli_query($GLOBALS['con'], "UPDATE produto SET nome = '$nome', descricao = '$descricao', preco = '$preco', marca = '$marca', loja = '$loja', endereco = '$endereco', cidade = '$cidade' WHERE id = '$id';");

    if ($sql === true) {
        echo "<script> alert('Produto alterado com sucesso!'); window.location.href='../perfilUsuario.php?id=".$_SESSION['idUsuario']."'; </script>";
    }else {
        echo "<script> alert('Erro na alteração do produto!'); window.location.href='../frm_alterarProduto.php'; </script>";
    }
?>