<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/cadastroProdutos.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <title>VestEasy | Anunciar Produto</title>
</head>
<?php include_once('includes/header.php'); ?>

<body>
    <?php @include('php/verifica_loginVendedor.php') ?>
    <section>
        <div class="formulario">
            <form action="php/cadastroProduto.php" method="POST" enctype="multipart/form-data" name="cadastro">
                <?php
                    @session_start();

                    echo "<input class='idVendedor' type='text' name='idUsuario' value='".$_SESSION['idUsuario']."' readonly>";
                ?>
                <div class="imagens">
                    <h3>Selecione fotos do produto</h3>
                    
                    <label for="imagem1" class="fa-solid fa-plus"></label>
                    <input type="file" id="imagem1" name="imagem1">

                    <label for="imagem2" class="fa-solid fa-plus"></label>
                    <input type="file" id="imagem2" name="imagem2">

                    <label for="imagem3" class="fa-solid fa-plus"></label>
                    <input type="file" id="imagem3" name="imagem3">

                    <label for="imagem4" class="fa-solid fa-plus"></label>
                    <input type="file" id="imagem4" name="imagem4">

                    <label for="imagem5" class="fa-solid fa-plus"></label>
                    <input type="file" id="imagem5" name="imagem5">
                </div>
                <div class="forms">
                    <div class="alinharForms">
                        <div class="forms-um">
                            <input placeholder="Nome" class="input" type="text" name="nome" required>

                            <textarea placeholder="Descrição" name="descricao" class="inputTextarea" cols="30" rows="10" required></textarea>

                            <input placeholder="Preço" class="input" type="text" name="preco" id="currency" data-thousands="." data-decimal="," data-prefix="R$ " required>

                            <input placeholder="Marca" class="input" type="text" name="marca" required>
                        </div>
                        <div class="forms-dois">

                            <input placeholder="Loja" class="input" type="text" name="loja" required>

                            <input placeholder="Cep" class="input" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" required><a class="botaoCEP" id="VerificarCEP" action="">Verificar CEP</a>

                            <input style="background-color: lightgrey; border-radius: 8px;" placeholder="Endereco" class = "inputReadonly" type="text" name="endereco" id="endereco">

                            <input style="background-color: lightgrey; border-radius: 8px;" placeholder="Cidade" class="inputReadonly" type="text" name="cidade" id="cidade">

                            <input style="background-color: lightgrey; border-radius: 8px;" placeholder="Estado" class="inputReadonly" type="text" name="estado" id="estado" readonly>

                            <?php include('php/selectTipo.php'); ?>
                        </div>
                    </div>
                    <div class="botao-cadastrar">
                        <input class="botao" type="submit" name="cadastrar" id="cadastrar" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
    </section>


    <!-- ViaCep -->
    <script src="js/viacep.js"></script>

    <!-- Input Masks -->
    <script src="js/masks.js"></script>

    <script>
        $(function(){
            $('#currency').maskMoney();
        })
    </script>
</body>
<?php include_once('includes/footer.php'); ?>

</html>