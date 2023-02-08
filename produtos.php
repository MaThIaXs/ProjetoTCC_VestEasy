<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--CSS-->
        <link rel="stylesheet" href="css/produtos.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">	
            $(document).ready(function () {
            
                $.getJSON('js/estados_cidades.json', function (data) {

                    var items = [];
                    var options = '<option value="">escolha um estado</option>';	

                    $.each(data, function (key, val) {
                        options += '<option value="' + val.nome + '">' + val.nome + '</option>';
                    });					
                    $("#estados").html(options);				
                    
                    $("#estados").change(function () {				
                    
                        var options_cidades = '';
                        var str = "";					
                        
                        $("#estados option:selected").each(function () {
                            str += $(this).text();
                        });
                        
                        $.each(data, function (key, val) {
                            if(val.nome == str) {							
                                $.each(val.cidades, function (key_city, val_city) {
                                    options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                                });							
                            }
                        });

                        $("#cidades").html(options_cidades);
                        
                    }).change();		
                
                });
            
            });
	    </script>	

        <title>VestEasy | Produtos e Lojas</title>

    </head>
    <?php include_once('includes/header.php')?>
    <body>
        <?php @include('php/verifica_login.php')?>
        <main>
            <div class="filtrar">
                <span>
                    Produtos:
                </span>

                <form name="filter" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select id="estados" class="input" style="margin-right: 5px; width: 180px;">
                        <option value=""></option>
                    </select>
                    <select name="cidade" id="cidades" class="input" style="margin-right: 5px; width: 180px;">
                    </select>
                    <?php include('php/selectTipo.php'); ?>

                    <input class="botao-filtrar" name="submit" type="submit" value="Filtrar"></input>
                </form>
            </div>
            <section>
                <?php  
                if (isset($_POST['submit'])) {

                    include_once('php/listarProdutoFiltrar.php');

                } else {
                    
                    include_once('php/listarProduto.php');
                }
                ?>
            </section>
        </main>
    </body>
    <?php include_once('includes/footer.php')?>
</html>