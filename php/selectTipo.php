<?php
    include_once('includes/conexao.php');
    
    $sql = mysqli_query($GLOBALS['con'], "SELECT * FROM tipo_produto ORDER BY id_tipo;");

    echo "<select class='input' name='tipo' id='tipo' style='cursor:pointer; width: 230px;' required>";
    echo "<option value='' selected disable>Selecionar Tipo do Produto</option>";

    while ($tipo = mysqli_fetch_assoc($sql)) {
            $id = $tipo["id_tipo"];
            $tipo = $tipo["tipo"];
                                
        echo "<option value='$id'>$tipo</option>";                            
    }

    echo "</select>";
?>