<?php
    session_start();
    include("../includes/conexao.php"); 

    if(empty($_POST['username']) || empty($_POST['useremail']) || empty($_POST['password']) || empty($_POST['telefone']) || empty($_POST['endereco']) || empty($_POST['cidade']) || empty($_POST['tipo'])){
        $_SESSION['campos_vazios'] = true; 
        header('Location: ../VIEW_cadastrar.php'); 
        exit; 
    }

    $nome = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['username'])); 
    $email = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['useremail'])); 
    $senha = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['password'])); 
    $telefone = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['telefone'])); 
    $endereco = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['endereco'])); 
    $cidade = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['cidade'])); 
    $estado = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['estado'])); 
    $tipo = mysqli_real_escape_string($GLOBALS['con'], trim($_POST['tipo'])); 

    $esql = "SELECT COUNT(*) AS total FROM usuario WHERE email = '$email'";
    $result = mysqli_query($GLOBALS['con'], $esql); 
    $row = mysqli_fetch_assoc($result); 

    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = true; 
        header('Location: ../VIEW_cadastrar.php'); 
        exit;
    }

    $sql = "INSERT INTO usuario(nomeUsuario, email, senha, telefone, endereco, cidade, estado, cod_tipo) VALUES ('$nome', '$email', '$senha', '$telefone', '$endereco', '$cidade', '$estado', '$tipo')"; 

    if($GLOBALS['con']->query($sql) === true){
        $_SESSION['cadastrado'] = true;
    }

    $GLOBALS['con']->close(); 
    header('Location: ../VIEW_login.php');
    exit; 
?>