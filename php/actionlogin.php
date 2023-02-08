<?php

session_start();

include('../includes/conexao.php');

if(empty($_POST['useremail']) || empty($_POST['password'])){
    $_SESSION['campos_vazios'] = true; 
    header('Location: ../VIEW_login.php'); 
    exit; 
}

$email = mysqli_real_escape_string($GLOBALS['con'], $_POST['useremail']);
$senha = mysqli_real_escape_string($GLOBALS['con'], $_POST['password']); 

$query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'"; 

$result = mysqli_query($GLOBALS['con'], $query); 

$row = mysqli_num_rows($result); 

if($row == 1){

    $dados_usuario = mysqli_fetch_assoc($result);
    
    $_SESSION['usuario'] = $email;
    $_SESSION['tipoUsuario'] = $dados_usuario['cod_tipo'];
    $_SESSION['idUsuario'] = $dados_usuario['id'];

    header('Location: ../index.php');
    exit; 
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../VIEW_login.php');

exit; 
}

?>