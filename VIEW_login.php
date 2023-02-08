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

		<title>VestEasy | Entre na sua conta</title>
	</head>
	<body>
		<main>
			<?php
			if(isset($_SESSION['nao_autenticado'])){
						
				echo '<style type="text/css">
					.error-msg{
					text-transform: uppercase;
					font-size: 13px;
					font-weight: 650;
					margin-top: -2%;
					margin-left: 1%;
					align-self: left;
					width: 100%;
					color: #bd0000;
					font-style: italic;
					opacity: 100%;
					}

					input {
					width: 100%;
					border: 2px solid rgba(0, 0, 0, 0);
					border-radius: 10px;
					outline: none;
					font-size: 0.9em;
					padding: 25px 10px 10px;
					font-weight: 600;
					color: var(--deep-grey);
					background-color: #ffd4d4;
					border-color: #ff1919;
					transition: all ease;
					}
					
					.login__label span {
					position: absolute;
					font-size: 0.8em;
					font-weight: 700;
					text-transform: uppercase;
					color: #bd0000;
					margin: 20px;
					cursor: text;
					transition: all 200ms ease;
					}
					
				</style>';
				
			}else if(isset($_SESSION['campos_vazios'])){
				echo '<style type="text/css">
					.campoempty-msg{
					text-transform: uppercase;
					font-size: 13px;
					font-weight: 650;
					margin-top: -5%;
					margin-left: 1%;
					align-self: left;
					width: 100%;
					color: #000000;
					font-style: italic;
					opacity: 100%;
					}
				</style>';
			}

			unset($_SESSION['nao_autenticado']);
			unset($_SESSION['campos_vazios']);
			?>

			<form action="php/actionlogin.php" method="POST">
				<section class="login">
					<div class="wrapper">
						<a href="index.php"><img src="imgs/logo.png" class="login__logo"></a>

						<h1 class="login__title">Entre na sua conta</h1>
						
						<label class="login__label">
							<span>Email</span>
							<input type="email" name="useremail">
						</label>

						<label class="login__label">
							<span>Senha</span>
							<input type="password" name="password" maxlength="16">
						</label>

						<label class="error-msg"> Usuario ou senha invalido </label>
						<label class="campoempty-msg"> Existem campos vazios </label>
					</div>
					<div class="wrapper-login">
						<button type="submit" method="POST" class="login__button">Entrar</button>

						<a href="VIEW_cadastrar.php" class="login__link">Não possui uma conta?</a>
						<a href="VIEW_cadastrar.php" class="login__link">Crie uma!</a>
					</div>
				</section>
			</form>
				<section class="wallpaper__login"></section>
		</main>
	</body>
</html>