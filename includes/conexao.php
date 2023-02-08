<?php
    @define('HOST', 'localhost');
    @define('USUARIO', 'root');
    @define('SENHA', '');
    @define('DB', 'bd_VestEasy');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar;');
    $GLOBALS['con'] = $conexao;
?>