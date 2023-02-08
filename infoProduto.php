
<?php include_once("includes/scripts.php"); ?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link href="css/infoProduto.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <title>VestEasy | Informações Produto</title>
    </head>
    <?php include_once("includes/header.php"); ?> 
    <body>
        <main>
            <section id="carrousel">
                <div class='carousel' data-flickity='{ 
                                "wrapAround": true,
                                "freeScroll": false, 
                                "autoPlay": 2000, 
                                "pageDots": true, 
                                "prevNextButtons": true,
                                "contain": true,
                                "freeScrollFriction": 0.03,
                                "imagesLoaded": true,
                                "lazyLoad": 2,
                                "initialIndex": -1,
                                "rightToLeft": false
                                }'>
                <?php
                    include_once('includes/conexao.php');

                    $id_produto = $_GET['id'];

                    $sql = mysqli_query($GLOBALS['con'], "SELECT * FROM produto WHERE id = '$id_produto'");

                    while ($produto = mysqli_fetch_assoc($sql)) {

                        $imagem1 = $produto["imagem1"];
                        $imagem2 = $produto["imagem2"];
                        $imagem3 = $produto["imagem3"];
                        $imagem4 = $produto["imagem4"];
                        $imagem5 = $produto["imagem5"];
                        
                                        
                        echo "<div class='carousel-cell'><img src='uploads/".$imagem1."'></div>";
                        echo "<div class='carousel-cell'><img src='uploads/".$imagem2."'></div>";
                        echo "<div class='carousel-cell'><img src='uploads/".$imagem3."'></div>";
                        echo "<div class='carousel-cell'><img src='uploads/".$imagem4."'></div>";
                        echo "<div class='carousel-cell'><img src='uploads/".$imagem5."'></div>";
                    }
                ?>
                </div>
            </section>  
            <section id="produto" style="height: 35rem;">
                <?php
                    include_once('includes/conexao.php');

                    $id_produto = $_GET['id'];

                    $sql = mysqli_query($GLOBALS['con'], "SELECT P.*, U.nomeUsuario FROM produto P JOIN usuario U ON (U.id = P.cod_vendedor) WHERE P.id = '$id_produto'");


                    while ($produto = mysqli_fetch_assoc($sql)) {

                        $nome = $produto["nome"];
                        $preco = $produto["preco"];
                        $descricao = $produto["descricao"];
                        $endereco = $produto["endereco"];
                        $cidade = $produto["cidade"];
                        $vendedor = $produto["nomeUsuario"];

                        echo    "<div class='produto' style='height: 35rem;'>
                                    <div class='title'>
                                        <h2>".$nome."</h2>
                                        <h1>".$preco."</h1>
                                    </div>
                                    <div class='desc'>
                                        <p>".$descricao."</p>
                                    </div>
                                </div>
                                <a class='loja'>
                                    <div class='perfil'>
                                        <span class='material-symbols-rounded'>account_circle</span>
                                        <p>".$vendedor."</p>
                                        <span class='material-symbols-rounded'>person_pin_circle</span>
                                        <p>".$cidade." - ".$endereco."</p>
                                    </div>
                                </a>";
                    }
                ?>
            </section>
        </main>
    </body>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <?php include_once("includes/footer.php"); ?>
</html>