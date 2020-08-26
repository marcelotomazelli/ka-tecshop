<?php

require './phpscripts/scriptSession.php';
if($authenticated) {
	header('Location: index.php');
} else {
	$t_action = '';

	if(isset($_GET['t'])) {
		$t_action = $_GET['t'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>KA TECSHOP - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/access_page.css">
</head>
<body>

	<!--|➖➖  Header  ➖➖|-->
	<header>
		<div class="content">
			<a href="index.php">
				<img src="img/brand.png" alt="k a tecshop">
			</a>
		</div>
	</header>

	<!--|➖➖  Main  ➖➖|-->
	<main>
		<div id="content-forms">

			<!-- ⏩ ⏩ Botoes -->
			<div id="buttons-control-view">
				<button id="button-r">
					Cadastrar
					<span></span>
				</button>
				<button id="button-l">
					Login
					<span></span>
				</button>
			</div>

			<!-- ⏩ ⏩ Formulários -->
			<div id="forms">

				<!--\ Registro -->
				<div id="form-register">
					<span id="register-info" class="info">
						<?php
							if(isset($_GET['e']) && $_GET['e'] == 'register') {
								echo 'Email já está em uso, tente outro.';
							}
						?>
					</span>
					<form name="formregister" action="./phpscripts/scriptRegister.php" method="post">
						<span>Nome:</span>
						<input
							id="r_n" 
							type="text"
							name="name"
							placeholder="Nome de usuario"
							value="<?php if(isset($_GET['name']) && isset($_GET['e']) && $_GET['e'] == 'register') { echo $_GET['name']; } ?>">

						<span>Informe seu email:</span>

						<input 
							id="r_ie"
							type="email" 
							placeholder="Endereço de email"
							value="<?php if(isset($_GET['email']) && isset($_GET['e']) && $_GET['e'] == 'register') { echo $_GET['email']; } ?>">

						<input 
							id="r_iec"
							type="email" 
							name="email" 
							placeholder="Confirmar de email">

						<span>Informe sua senha:</span>

						<input 
							id="r_ip"
							type="password" 
							placeholder="Senha">

						<input 
							id="r_ipc"
							type="password" 
							name="password" 
							placeholder="Confirmar senha">
					</form>
					<button id="button-register">Criar conta</button>
					<div id="terms-regs">
						<span>Ao criar a conta você concorda com os <a href="">Termos de Acesso</a> e <a href="">Política de Privacidade</a>.</span>
					</div>
				</div>

				<!--\ Login -->
				<div id="form-login">
					<span id="login-info" class="info">
						<?php
							if(isset($_GET['e'])) {
								if($_GET['e'] == 'login')
									echo 'Email não encontrado.';
								else if($_GET['e'] == 'pass')
									echo 'Senha incorreta.';
							} else if(isset($_GET['register']) && $_GET['register'] == 'success') {
						?>
							<div class="success">Registro realizado com sucesso.</div>
						<? } else if(isset($_GET['newpass']) && $_GET['newpass'] == 'success') { ?>
							<div class="success">Senha alterada com sucesso.</div>
						<? } ?>
					</span>
					<form name="formlogin" action="./phpscripts/scriptLogin.php" method="post" >

						<span>Informe seu email:</span>

						<input
							id="l_ie" 
							type="email" 
							name="email" 
							placeholder="Endereço de email"
							value="<?php if(isset($_GET['e']) && isset($_GET['email'])) { echo $_GET['email']; } ?>">

						<span>Informe sua senha:</span>

						<input
							id="l_ip"
							type="password" 
							name="password" 
							placeholder="Senha">
					</form>
					<button id="button-login">Logar</button>
					<div id="forget-password">
						<span><a href="./forget_page.php">Esqueceu a senha?</a></span>
					</div>
				</div>

			</div>

		</div>
	</main>

	<!--|➖➖  Footer  ➖➖|-->
	<footer>
		<div class="content">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque rem autem, tenetur magni delectus vel molestias inventore sint.
		</div>
	</footer>

	<? if(!empty($t_action))  { ?>
		<div id="t-action" style="display: none;"><?= $t_action ?></div>
	<? } ?>
	
	<script src="./js/access_page.js"></script>
</body>
</html>