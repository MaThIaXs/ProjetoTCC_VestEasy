<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="css/style-login.css">

		<script src="js/script.js" defer></script>

		<title>VestEasy | Alterar Dados</title>
	</head>
	<body>
		<main>
			<?php
            include_once('includes/conexao.php');
            include('php/selectTipoUsuarioCod.php');
        
            $idUsuario = $_GET['id'];
        
            $sql = mysqli_query($GLOBALS['con'], "SELECT * FROM usuario WHERE id = '$idUsuario';");
        
            $dados = mysqli_fetch_assoc($sql);
        
            $nome = $dados["nomeUsuario"];
            $telefone = $dados["telefone"];
            $endereco = $dados["endereco"];
            $cidade = $dados["cidade"];
			$email = $dados["email"];
			$endereco = $dados["endereco"];
			$cidade = $dados["cidade"];
			$estado = $dados["estado"];

			?>
			<form action="php/alterarUsuario.php" method="POST">

				<section class="cadas">
					<div class="wrapper__cadas">
						<a href="index.php"><img src="imgs/logo.png" class="login__logo"></a>

						<h1 class="login__title">Altere sua conta:</h1>

						<label class="alter__label">
							<span>Nome</span>
							<input type="text" name="username" value="<?php echo $nome; ?>" required>
						</label>

						
						<label class="alter__label">
							<span>Telefone</span>
							<input type="text" name="telefone"  maxlength="14" value="<?php echo $telefone; ?>" required>
						</label>
						
						<label class="login__label">
							<span>CEP</span>
							<input type="text" name="cep" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9"><a class="botaoCEP" id="VerificarCEP" action="">Verificar CEP</a>
						</label>

						<label class="alter__label">
							<span>Endereço</span>
							<input style="background-color: lightgrey;" type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>">
						</label>
						
						<label class="alter__label">
							<span>Cidade</span>
							<input style="background-color: lightgrey;" type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>">
						</label>
						
						<label class="alter__label">
							<span>Estado</span>
							<input style="background-color: lightgrey;" type="text" name="estado" id="estado" value="<?php echo $estado ?>" readonly>
						</label>
						
						<label class="alter__label">
							<span>Email</span>
							<input type="email" name="useremail" value="<?php echo $email; ?>" required>
						</label>
					</div>

					<div class="wrapper-login">
						<button type="submit" class="login__button">Seguir</button>
					</div>

					<div id="modal_sucesso" class="modal_container">
						<div class="modal">
							<a href="perfilUsuario.php?id='$idUsuario" class="modal__link"> Alterado com sucesso</a>
						</div>
					</div>
				</section>
			</form>
			<section class="wallpaper__alter"></section>
		</main>

		<!-- ViaCep -->
		<script src="js/viacep.js"></script>

		<!-- Input Masks -->
		<script src="js/masks.js"></script>
	</body>
</html>