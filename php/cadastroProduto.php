<?php
    include_once('../includes/conexao.php');

    if (isset($_POST['cadastrar'])) {

        $idVendedor = $_POST['idUsuario'];
        $imagem1 = $_FILES["imagem1"];
        $imagem2 = $_FILES["imagem2"];
        $imagem3 = $_FILES["imagem3"];
        $imagem4 = $_FILES["imagem4"];
        $imagem5 = $_FILES["imagem5"];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco']; 
        $marca = $_POST['marca']; 
        $loja = $_POST['loja']; 
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $tipo = $_POST['tipo'];

        if ((!empty($imagem1["name"])) && (!empty($imagem2["name"])) && (!empty($imagem3["name"])) && (!empty($imagem4["name"])) && (!empty($imagem5["name"]))) {

            $error = array();

            if (!preg_match("/^image\/(pjpeg|jpeg|png)$/", $imagem1["type"])) {
                $error[1] = "Isso não é uma imagem válida!";
            }
            if (!preg_match("/^image\/(pjpeg|jpeg|png)$/", $imagem2["type"])) {
                $error[2] = "Isso não é uma imagem válida!";
            }
            if (!preg_match("/^image\/(pjpeg|jpeg|png)$/", $imagem3["type"])) {
                $error[3] = "Isso não é uma imagem válida!";
            }
            if (!preg_match("/^image\/(pjpeg|jpeg|png)$/", $imagem4["type"])) {
                $error[4] = "Isso não é uma imagem válida!";
            }
            if (!preg_match("/^image\/(pjpeg|jpeg|png)$/", $imagem5["type"])) {
                $error[5] = "Isso não é uma imagem válida!";
            }

            if (count($error) === 0) {
                
                preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem1["name"], $ext);
                preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem2["name"], $ext);
                preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem3["name"], $ext);
                preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem4["name"], $ext);
                preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem5["name"], $ext);

                $nome_imagem1 = md5(uniqid(time())) . "." . $ext[1];
                $nome_imagem2 = md5(uniqid(time())) . "." . $ext[1];
                $nome_imagem3 = md5(uniqid(time())) . "." . $ext[1];
                $nome_imagem4 = md5(uniqid(time())) . "." . $ext[1];
                $nome_imagem5 = md5(uniqid(time())) . "." . $ext[1];

                $caminho_imagem1 = "../uploads/" . $nome_imagem1;
                $caminho_imagem2 = "../uploads/" . $nome_imagem2;
                $caminho_imagem3 = "../uploads/" . $nome_imagem3;
                $caminho_imagem4 = "../uploads/" . $nome_imagem4;
                $caminho_imagem5 = "../uploads/" . $nome_imagem5;

                move_uploaded_file($imagem1["tmp_name"], $caminho_imagem1);
                move_uploaded_file($imagem2["tmp_name"], $caminho_imagem2);
                move_uploaded_file($imagem3["tmp_name"], $caminho_imagem3);
                move_uploaded_file($imagem4["tmp_name"], $caminho_imagem4);
                move_uploaded_file($imagem5["tmp_name"], $caminho_imagem5);

                $sql = mysqli_query($GLOBALS['con'], "INSERT INTO produto(cod_vendedor, imagem1, imagem2, imagem3, imagem4, imagem5, nome, descricao, preco, marca, loja, endereco, cidade, cod_tipo) VALUES('$idVendedor', '$nome_imagem1', '$nome_imagem2', '$nome_imagem3', '$nome_imagem4', '$nome_imagem5', '$nome', '$descricao', '$preco', '$marca', '$loja', '$endereco', '$cidade', '$tipo');");

                if ($sql) {
                    echo "<script> alert('Anúncio efetuado com sucesso!'); window.location.href='../frm_cadastroProduto.php';  </script>";
                }
            }

            if (count($error) != 0) {
                foreach ($error as $erro) {
                    echo $erro;
                }
            }
        }
    }
?>