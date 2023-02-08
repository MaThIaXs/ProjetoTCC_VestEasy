<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VestEasy</title>

        <!--css-->
        <link href="css/main.css" rel="stylesheet" type="text/css">

        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        
    </head>
    <?php include_once('includes/header.php')?>
    <body>
        <main class="principal">
            <div class="mainContent">
                <div class="textos">
                    <span class="titulo"><span class="titulo2">Street Wear</span><br>perto de você.</span>
                    <span class="subtitulo">Procure por roupas de um modo rápido e fácil.</span>

                    <div class="botao">
                        <a href="VIEW_cadastrar.php"><button class="conteudo-botao">COMECE JÁ!</button></a>
                    </div>
                </div>
                <div class="imagem">
                    <img src="imgs/principal.jpg" alt="">
                </div>
            </div>
            
            <div class="padding">
                <div class="cards">
                    <div class="card">
                        <div class="header">
                            <div class="img-box">
                                <img src="imgs/filter.svg" alt="">
                            </div>
                            <h1 class="title">Filtre</h1>
                        </div>
                        
                        <div class="content">
                            <p>
                                Filtre as buscas pela sua cidade.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <div class="img-box">
                                <img src="imgs/search.svg" alt="">
                            </div>
                            <h1 class="title">Procure</h1>
                        </div>
                        
                        <div class="content">
                            <p>
                                Procure por roupas perto de você.
                            </p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="header">
                            <div class="img-box">
                                <img src="imgs/shop.svg" alt="">
                            </div>
                            <h1 class="title">Anuncie</h1>
                        </div>
                        
                        <div class="content">
                            <p>
                                Sendo um vendedor, anuncie seu vestuário.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="funcionalidades">
                    <div class="procurar">
                        <div class="imagem">
                            <img src="imgs/modelo.jpg" alt="modelo" style="max-width: 33rem;">
                        </div>

                        <div class="botao">
                            <a href="produtos.php"><button>Ver Produtos</button></a> 
                        </div>
                    </div>
                    <div class="anunciar">
                        <div class="imagem">
                            <img src="imgs/calcas.jpg" alt="calcas" style="max-width: 33rem;">
                        </div>

                        <div class="botao">
                            <a href="frm_cadastroProduto.php"><button>Anuncie seus produtos</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <?php include_once('includes/footer.php')?>
</html>