<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--CSS-->
        <link rel="stylesheet" href="css/perfil.css">

        <!--FontAwesome CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <title>VestEasy | Perfil do usuário</title>
    </head>
    <?php include_once('includes/header.php'); ?>
    <body>
        <main>
            <?php 
            @session_start();

            include_once('includes/conexao.php');

            $idUsuario = $_GET['id'];
            $cod_vendedor = $_GET['id'];

            $sqlUsuario = "SELECT * FROM usuario WHERE id='$idUsuario'";
            $sqlProduto = "SELECT * FROM produto WHERE cod_vendedor='$cod_vendedor' ORDER BY id";

            $resultadoUsuario = mysqli_query($GLOBALS['con'], $sqlUsuario);
            $resultadoProduto = mysqli_query($GLOBALS['con'], $sqlProduto);

            $usuario = mysqli_fetch_assoc($resultadoUsuario);

            $nome = $usuario['nomeUsuario'];
            $email = $usuario['email'];
            $telefone = $usuario['telefone'];
            $endereco = $usuario['endereco'];
            $cidade = $usuario['cidade'];
            $estado = $usuario['estado'];
                
                if ($_SESSION['tipoUsuario'] == 2) {
                    echo   "<section class='secao-infos'>
                                <div class='infos'>
                                    <div class='info-header'>
                                        <span>Seus Dados</span>
                                    </div>
                                    <div class='info-dados'>
                                        <span>".$nome."</span>
                                        <span>".$email."</span>
                                        <span>".$telefone."</span>
                                        <span>".$endereco."</span>
                                        <span>".$cidade."</span>
                                        <span>".$estado."</span>
                                    </div>
                                    <div class='info-alterar'>
                                        <a href='VIEW_alterarUsuario.php?id=$idUsuario'><button class='botao-alterar'>Alterar Dados</button></a>
                                        <a href='php/actionLogout.php'><button class='botao-alterar'>Sair da conta</button></a>
                                    </div>
                                </div>
                            </section>
                            <section class='secao-produtos'>
                                <div class='produtos-header'>
                                    <span>Seus Produtos</span>
                                </div>";
                    while ($produto = mysqli_fetch_assoc($resultadoProduto)) {
                        $id = $produto["id"];
                        $imagem1 = $produto["imagem1"];
                        $nomeProduto = $produto["nome"];
                        $preco = $produto["preco"];

                        echo    "<div class='produtos'>
                                    <div class='produtos-info'>
                                        <div class='produto-imagem'>
                                            <img src='uploads/".$imagem1."' alt='imagem do produto'>
                                        </div>
                                        <div class='produto-desc'>
                                            <span>".$nomeProduto."</span>
                                            <span>".$preco."</span>
                                        </div>
                                        <div class='produto-acoes'>
                                            <a href='infoProduto.php?id=$id' class='fa-solid fa-eye'></a>
                                            <a href='frm_alterarProduto.php?id=$id' class='fa-solid fa-pencil'></a>
                                            <a href='php/excluirProduto.php?id=$id' class='fa-solid fa-trash'></a>
                                        </div>
                                    </div>      
                                </div>";
                            }

                    echo "</section>";
                }else {
                    echo   "<section class='secao-infosUsuario'>
                                <div class='infos'>
                                    <div class='info-header'>
                                        <span>Seus Dados</span>
                                    </div>
                                    <div class='info-dados'>
                                        <span>".$nome."</span>
                                        <span>".$email."</span>
                                        <span>".$telefone."</span>
                                        <span>".$endereco."</span>
                                        <span>".$cidade."</span>
                                    </div>
                                    <div class='info-alterar'>
                                        <a href='VIEW_alterarUsuario.php?id=$idUsuario'><button class='botao-alterar'>Alterar Dados</button></a>
                                        <a href='php/actionLogout.php'><button class='botao-alterar'>Sair da conta</button></a>
                                    </div>
                                </div>
                            </section>";
                }
            ?>
        </main>
    </body>
    <?php include_once('includes/footer.php'); ?>
</html>