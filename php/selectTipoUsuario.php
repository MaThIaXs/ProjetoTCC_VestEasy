<?php
    include_once('includes/conexao.php');
    
    $sql = mysqli_query($GLOBALS['con'], "SELECT * FROM tipo_usuario ORDER BY id;");

    echo "<select class='input' name='tipo' id='tipo' style='cursor:pointer;' required>";

    while ($tipo = mysqli_fetch_assoc($sql)) {
            $id = $tipo["id"];
            $tipo = $tipo["tipo"];
                                
        echo "<option value='$id'>$tipo</option>";                            
    }

    echo "</select>";
?>