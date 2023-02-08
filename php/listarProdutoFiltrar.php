<?php 
include_once('includes/conexao.php');
$cidade = $_POST['cidade'];
$tipo = $_POST['tipo'];

$sql = mysqli_query($GLOBALS['con'], "SELECT * FROM produto WHERE cidade = '$cidade' AND cod_tipo = '$tipo'");

if ($sql === FALSE) {
    die(mysqli_error($GLOBALS['con']));
}

while ($produto = mysqli_fetch_assoc($sql)) {

    $id = $produto["id"];
    $imagem1 = $produto["imagem1"];
    $nome = $produto["nome"];
    $preco = $produto["preco"];
                            
    echo    "<div class='card'>
                <div class='card-header'>
                    <img src='uploads/".$imagem1."'>
                </div>
                <div class='card-content'>
                    <span class='product'>".$nome."</span>
                    <span class='price'>".$preco."</span>
                    <a href='infoProduto.php?id=$id'><button>Visualizar</button></a>
                </div>
            </div>";
    } 

?>