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

    <title>VestEasy | Anunciar Produto</title>
</head>
<?php include_once('includes/header.php'); ?>

<body>
    <?php
    include_once('includes/conexao.php');
    include('php/selectTipoCod.php');

    $id = $_GET['id'];

    $sql = mysqli_query($GLOBALS['con'], "SELECT * FROM produto WHERE id = '$id';");

    $dados = mysqli_fetch_assoc($sql);

    $nome = $dados["nome"];
    $descricao = $dados["descricao"];
    $preco = $dados["preco"];
    $marca = $dados["marca"];
    $loja = $dados["loja"];
    $endereco = $dados["endereco"];
    $cidade = $dados["cidade"];
    $tipo = $dados["cod_tipo"];
    ?>

    <section>
        <div class="formulario">
            <form action="php/alterarProduto.php" method="POST" enctype="multipart/form-data" name="alterar">

                <div class="forms">
                    <div class="alinharForms">
                        <div class="forms-um">
                            <input type="text" class="id" name="id" id="id" value="<?php echo $id ?>" readonly style="display: none;">

                            <input placeholder="Nome" class="input" type="text" name="nome" value="<?php echo $nome ?>" required>

                            <textarea placeholder="Descrição" name="descricao" class="inputTextarea" cols="30" rows="10"><?php echo $descricao ?></textarea>

                            <input placeholder="Preço" class="input" type="text" name="preco" id="currency" value="<?php echo $preco ?>" data-thousands="." data-decimal="," data-prefix="R$ " required>
                            
                            <input placeholder="Marca" class="input" type="text" name="marca" value="<?php echo $marca ?>" required>
                        </div>
                        <div class="forms-dois">

                            <input placeholder="Loja" class="input" type="text" name="loja" value="<?php echo $loja ?>" required>

                            <input placeholder="Cep" class="input" type="text" name="cep" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9"><a class="botaoCEP" id="VerificarCEP" action="">Verificar CEP</a>

                            <input style="background-color: lightgrey; border-radius: 8px;" placeholder="Endereco" class = "inputReadonly" type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>">

                            <input style="background-color: lightgrey; border-radius: 8px;" placeholder="Cidade" class="inputReadonly" type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>">

                            <input style="background-color: lightgrey; border-radius: 8px;" placeholder="Estado" class="inputReadonly" type="text" name="estado" id="estado" readonly>

                            <?php selectTipoCod($tipo); ?>
                        </div>
                    </div>
                    <div class="botao-cadastrar">
                        <input class="botao" type="submit" name="alterar" id="alterar" value="Alterar">
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