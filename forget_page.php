<?php

require './phpscripts/scriptSession.php';

$verified_email = false;
$verified_code = false;

if($authenticated) {
	header('Location: index.php');
} else {
	if(isset($_SESSION['verified_email'])) {
		$verified_email = $_SESSION['verified_email'];
		if(isset($_SESSION['verified_code'])) {
			$verified_code = $_SESSION['verified_code'];
		}
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
	<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body onload="initialConfig()">

	<!--
		HEADER
	-->
	<header>
		<div class="content">
			<a href="index.php">
				<img src="img/brand.png" alt="k a tecshop">
			</a>
		</div>
	</header>

	<!--
		MAIN
	-->
	<main>
		<div id="content-forms">

			<!-- Formulários -->
			<div id="forms">

				<!-- Registro -->
				<? if(!$verified_email && $verified_code === false) { ?>
					<div id="form-verify-email">

						<span id="verify-info" class="info">
							<?php
								if(isset($_GET['e'])) {
									if($_GET['e'] == 'email') {
										echo 'Email não encontrado.';
									} else if($_GET['e'] == 'code') {
										echo 'Código incorreto nas duas tentativas.<br>Verifique seu email e tente novamente.';
									}
								}

							?>
						</span>

						<form name="formverifyemail" action="./phpscripts/scriptForget.php?t=email" method="post">
							<span>Informe seu email:</span>
							<input 
								id="v_ie"
								type="email" 
								name="email"
								placeholder="Endereço de email"
								value="<? if(isset($_GET['e']) && $_GET['e'] == 'email' && isset($_GET['email'])) { echo $_GET['email']; } ?>">
						</form>

						<button id="button-verify-email">Verificar</button>

					</div>
				<? } ?>
				
				<? if($verified_email && $verified_code === false) { ?>
					<div id="form-verify-code">

						<span id="verify-info" class="info">
							<?php
								if(isset($_GET['e']) && $_GET['e'] == 'code') {
									echo 'Código incorreto.<br>Você possui apenas mais uma tentativa.';
								}
							?>
						</span>

						<form name="formverifycode" action="./phpscripts/scriptForget.php?t=code" method="post">
							<span>Informe o código:</span>
							<input 
								id="v_ic"
								type="text" 
								name="code"
								placeholder="Código"
								value="">
						</form>

						<button id="button-verify-code">Verificar</button>

					</div>
				<? } ?>

				<? if($verified_email && $verified_code) { ?>
					<div id="form-new-pass">

						<form name="formnewpass" action="./phpscripts/scriptForget.php?t=newpass" method="post">
							<span>Informe a senha:</span>

							<input 
								id="v_ipn"
								type="password" 
								placeholder="Nova senha"
								value="">
					
							<input 
								id="v_ipc"
								type="password" 
								name="password"
								placeholder="Confirmar senha"
								value="">
						</form>

						<span id="verify-info" class="info"></span>

						<button id="button-new-pass">Enviar</button>
					</div>
				<? } ?>

			</div>

		</div>
	</main>

	<!--
		FOOTER
	-->
	<footer>
		<div class="content">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque rem autem, tenetur magni delectus vel molestias inventore sint.
		</div>
	</footer>

	<script src="./js/forget_page.js"></script>
</body>
</html>
