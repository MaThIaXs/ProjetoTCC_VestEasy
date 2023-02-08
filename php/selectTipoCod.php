<?php 
    function selectTipoCod($codigo) {
        include_once('includes/conexao.php');

        $sql = "SELECT * FROM tipo_produto";

        $resultado = mysqli_query($GLOBALS['con'], $sql);

        echo "<select class='input' name='tipo' id='tipo' style='cursor:pointer;' required>";

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $id = $dados["id_tipo"];
            $tipo = $dados["tipo"];

            if ($id == $codigo) {
                echo "<option value='$id' selected=selected>$tipo</options>";
            }else {
                echo "<option value='$id'>$tipo</option>";
            }
        }

        echo "</select>";
    }
?>