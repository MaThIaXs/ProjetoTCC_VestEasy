<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--css-->
    <link href="css/header.css" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <title>header</title>
</head>

<body>
    <header class="cabecalho">
        <a href="index.php"><img class="cabecalho-logo" src="imgs/VestEasylogo.svg" alt="Logo" style="max-width: 14rem;"></a>

        <nav class="navegacao">
            <ul class="navBar">
                <a href="index.php"><li>Pagina Inicial</li></a>
                <a href="produtos.php"><li>Ver Produtos</li></a>
                <?php
                session_start();
                    if (@$_SESSION['tipoUsuario'] == 2) {
                        echo "<a href='frm_cadastroProduto.php'><li>Anunciar Produto</li></a>";
                    }

                ?>
            </ul>
            <div class="cabecalho-conta">
                <?php
                    if (@!$_SESSION['usuario']) {
                        echo "<a href='VIEW_login.php'><i class='fa-solid fa-user'></i></a>";
                    }else {
                        $sql = "SELECT * FROM usuario WHERE id='".$_SESSION['idUsuario']."'";
                        echo "<a href='perfilUsuario.php?id=".$_SESSION['idUsuario']."'><i class='fa-solid fa-user'></i></a>"; 
                    }
                ?>
            </div>
        </nav>
    </header>
</body>

</html>