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

		<title>VestEasy | Criar Conta</title>
	</head>
	<body>
		<main>
			<?php
			if (isset($_SESSION['usuario_existe'])) {
			echo '<style type="text/css">
					.jaexiste-msg{
					text-transform: uppercase;
					font-size: 13px;
					font-weight: 650;
					margin-top: -5%;
					margin-left: 1%;
					align-self: left;
					width: 100%;
					color: #000000;
					opacity: 100%;
				}
			</style>';
			
			} else if (isset($_SESSION['campos_vazios'])) {
			echo '<style type="text/css">
					.campoempty-msg1{
					text-transform: uppercase;
					font-size: 13px;
					font-weight: 650;
					margin-top: -1%;
					margin-left: -37%;
					align-self: left;
					width: 100%;
					color: #000000;
					opacity: 100%;
				}
			</style>';
			} else if (isset($_SESSION['cadastrado'])) {
			echo '<style type="text/css">
					.modal_container{
					width: 115vw;
					height: 100vh;
					background: rgba(0, 0, 0, .5);
					position: fixed;
					top: 0;
					left: 0;
					z-index: 2000;
					display: flex;
					justify-content: center;
					align-items; 
				}
			</style>';
			}
			unset($_SESSION['cadastrado']);
			unset($_SESSION['campos_vazios']);
			unset($_SESSION['usuario_existe']);
			?>
			<form action="php/actioncadastrar.php" method="POST">

				<section class="cadas">
					<div class="wrapper__cadas">
						<a href="index.php"><img src="imgs/logo.png" class="login__logo"></a>

						<h1 class="login__title">Crie sua conta:</h1>

						<label style="font-size: 20px; font-weight: 500; margin-bottom: 15px; color: #005d41;">
							<span> Desejo me cadastrar como </span>
							<?php include('php/selectTipoUsuario.php') ?>
						</label>

						<label class="login__label">
							<span>Nome</span>
							<input type="text" name="username" required>
						</label>

						
						<label class="login__label">
							<span>Telefone</span>
							<input type="tel" name="telefone" onkeyup="handlePhone(event)"  maxlength="15" required>
						</label>
						
                        <label class="login__label">
							<span>CEP</span>
							<input type="text" name="cep" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" required><a class="botaoCEP" id="VerificarCEP" action="">Verificar CEP</a>
						</label>

						<label class="alter__label">
							<span>Endereço</span>
							<input style="background-color: lightgrey;" type="text" name="endereco" id="endereco">
						</label>
						
						<label class="alter__label">
							<span>Cidade</span>
							<input style="background-color: lightgrey;" type="text" name="cidade" id="cidade">
						</label>
						
						<label class="alter__label">
							<span>Estado</span>
							<input style="background-color: lightgrey;" type="text" name="estado" id="estado">
						</label>

						<label class="login__label">
							<span>Email</span>
							<input type="email" name="useremail" required>
						</label>

						<label class="login__label">
							<span>Senha</span>
							<input type="password" name="password" maxlength="16" required>
							<label class="jaexiste-msg"> O usuário já existe </label>
							<label class="campoempty-msg1"> Existem campos vazios </label>
						</label>
					</div>

					<div class="wrapper-login">
						<button type="submit" class="login__button">Seguir</button>

						<a href="VIEW_login.php" class="login__link">Ja possui uma conta?</a>
						<a href="VIEW_login.php" class="login__link">Entrar</a>
					</div>

					<div id="modal_sucesso" class="modal_container">
						<div class="modal">
							<a href="VIEW_login.php" class="modal__link"> Cadastrado com sucesso</a>
							<a href="VIEW_login.php" class="modal__link1"> Clique aqui para entrar na sua conta</a>
						</div>
					</div>
				</section>
			</form>
			<section class="wallpaper__cadas"></section>
		</main>

		<!-- ViaCep -->
		<script src="js/viacep.js"></script>

		<!-- Input Masks -->
		<script src="js/masks.js"></script>
	</body>
</html>