<?php  
include_once('includes/conexao.php');

$sql = mysqli_query($GLOBALS['con'], "SELECT * FROM produto ORDER BY id");

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