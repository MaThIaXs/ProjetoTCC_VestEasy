<?php 
    function selectTipoUsuarioCod($codigo) {
        include_once('includes/conexao.php');

        $sql = "SELECT * FROM tipo_usuario";

        $resultado = mysqli_query($GLOBALS['con'], $sql);

        echo "<select class='input' name='tipo' id='tipo' style='cursor:pointer; margin-left: 15px; width: 120px;' required>";

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $id = $dados["id"];
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