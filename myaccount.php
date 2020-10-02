<?php
require './phpscripts/scriptSession.php';
if(!$authenticated) {
	header('Location: ./access_page.php?t=register');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<title>KA TECSHOP</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/header-footer.css">
	<link rel="stylesheet" type="text/css" href="css/myaccount.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body id="bodyid" class="close_s">

	<!--|➖➖➖➖  Header  ➖➖➖➖|-->
	<? require_once "./phphtml/header.php" ?>
	<? require_once "./phpscripts/scriptMyAccount.php" ?>

	<!--|➖➖➖➖  Parte localização  ➖➖➖➖|-->
	<section class="currentloc">
		<div class="content">
			<ul>
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Minha Conta</a>
				</li>
			</ul>
		</div>
	</section>

	<main id="mainmyaccount">
		<div class="content">
			<aside id="asidemyaccount" class="close">
				<ul>
					<li class="<? if(empty($p) || $p == 'pedidos' || ($p != 'favoritos' && $p != 'avaliacoes')) { echo 'active'; } ?>">
						<a href="./myaccount.php?p=pedidos"><i class="fas fa-box-open"></i>Pedidos</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-ticket-alt"></i>Cupons</a>
					</li>
					<li class="<? if($p == 'favoritos') { echo 'active'; } ?>">
						<a href="./myaccount.php?p=favoritos"><i class="fas fa-heart"></i>Favóritos</a>
					</li>
					<li class="<? if($p == 'avaliacoes') { echo 'active'; } ?>">
						<a href="./myaccount.php?p=avaliacoes"><i class="fas fa-star"></i>Avaliações</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-cog"></i>Configurações</a>
					</li>
				</ul>
				<ul>
					<li>
						<a href="#"><i class="fas fa-retweet"></i> Trocar ou devolver</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-comment-dots"></i> Preciso de ajuda</a>
					</li>
				</ul>
			</aside>
			
			<section>
				<div id="search-bar">
					<span>Pesquisar</span>
					<div>
						<form action="#">
							<input type="text" placeholder="Código, produto, preço...">
						</form>
						<button><i class="fas fa-search"></i></button>
					</div>
				</div>
				
				<div id="accountpages">
					<?php
						if(empty($p) || $p == 'pedidos' || ($p != 'favoritos' && $p != 'avaliacoes')) {
							require_once "./phphtml/request_page.php";
						} else if($p == 'favoritos') {
							require_once "./phphtml/favorites_page.php";
						} else if($p == 'avaliacoes') {
							require_once "./phphtml/reviews_page.php";
						}
					?>
				</div>

				<div class="pages-list">
					<ul>
						<li class="active">
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-step-forward"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-fast-forward"></i>
							</a>
						</li>
					</ul>
					<div>
						<span>Mostrando 10 itens de 24, página 1 de 3</span>
					</div>
				</div>

			</section>

		</div>
	</main>

	<button id="btn-asidemyaccount"><i class="fas fa-ellipsis-v"></i></button>
	
	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/general.js"></script>
	<script src="js/myaccount.js"></script>
</body>
</html>