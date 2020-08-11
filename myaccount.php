<?php
	require "./php/authentication_control.php";
	if(!$authenticated) {
		header('Location: access_page.php');
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
	<link rel="stylesheet" type="text/css" href="css/myaccount.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

	<!-- Para Estilos do menu Categoria -->
	<style type="text/css">
	</style>
</head>
<body id="bodyid" class="close_s">

	<!--|➖➖➖➖  Header  ➖➖➖➖|-->
	<? require_once "phphtml/header.php" ?>

	<!--|➖➖➖➖  Parte localização  ➖➖➖➖|-->
	<section id="divloc">
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
					<li class="<? if(!isset($_GET['p']) || $_GET['p'] == 'pedidos') { echo 'active'; } ?>">
						<a href="./myaccount.php?p=pedidos"><i class="fas fa-box-open"></i>Pedidos</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-ticket-alt"></i>Cupons</a>
					</li>
					<li class="<? if(isset($_GET['p']) && $_GET['p'] == 'favoritos') { echo 'active'; } ?>">
						<a href="./myaccount.php?p=favoritos"><i class="fas fa-heart"></i>Favóritos</a>
					</li>
					<li class="<? if(isset($_GET['p']) && $_GET['p'] == 'avaliacoes') { echo 'active'; } ?>">
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
				<div class="account-search-bar">
					<span>Pesquisar</span>
					<div>
						<form action="#">
							<input type="text" placeholder="Código, produto, preço...">
						</form>
						<button><i class="fas fa-search"></i></button>
					</div>
				</div>
				
				
				<div id="accountresults">
					<? if(!isset($_GET['p']) || $_GET['p'] == 'pedidos') { ?>

						<?php
							$qtd_pedidos = rand(0,20);
							$pedidos = array();

							for($i = 0; $i < $qtd_pedidos; $i++) {
								$qtd_produtos = rand(1,2);
								if(1 == rand(1,10)) {
									$qtd_produtos = rand(3,8);
								}
								$produtos = array();
								for($j = 0; $j < $qtd_produtos; $j++) {
									$id_produto = rand(1,50);
									array_push($produtos, $id_produto);
								}
								$codigo = rand(100000,999999);

								$pedido = [
									'codigo' => $codigo,
									'produtos' => $produtos
								];


								array_push($pedidos, $pedido);
							}
						?>
						<? if($qtd_pedidos == 0) { ?>
							<div class="empty">
								Nenhum pedido a mostrar.
							</div>
						<? } else { ?>
							<? foreach($pedidos as $value) { ?>
								<div class="resultrequests">
									<div class="p1results">
										<span>Código: <span><?= $value['codigo'] ?></span></span>
										<? if(1 == rand(1,5)) { ?>
											<span class="pending">Pendente</span>
										<? } else { ?>
											<span class="delivered">Entregue</span>
										<? } ?>
									</div>
									<div class="p2resuls">
										<div class="imgsrequests">
											<? foreach($value['produtos'] as $id) { ?>
												<a href="#">
													<img src="img_produtos/<?= $id ?>/index.jpg">
												</a>
											<? } ?>
										</div>
										<span>
											<a>Mostrar mais <i class="fas fa-angle-down"></i></a>
										</span>
									</div>
								</div>
							<? } ?>
						<? } ?>
					<? } else if(isset($_GET['p']) && $_GET['p'] == 'favoritos') { ?>
						<?
							$qtd_produtos = rand(0,5);

							$produtos = array();
							for($i = 0; $i < $qtd_produtos; $i++) {
								array_push($produtos, rand(1,50));
							}
						?>

						<? if($qtd_produtos == 0) { ?>
							<div class="empty">
								Nenhum produto está marcado.
							</div>
						<? } else { ?>
							<? foreach($produtos as $value) { ?>
								<div class="favorite-product">
									<div>
										<button>
											<i class="fas fa-heart"></i>
										</button>
									</div>
									<div>
										<a href="#">
											<img src="img_produtos/<?= $value ?>/index.jpg">
										</a>
									</div>
									<div>
										<a href="#">Test ok;</a>
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae voluptas assumenda...</span>
									</div>
									<div>
										<div class="stars">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span>
												<i class="fas fa-star-half filled"></i>
												<i class="far fa-star-half not-filled medium"></i>
											</span>
											<i class="far fa-star not-filled"></i>
											<i class="far fa-star not-filled"></i>
										</div>
										<a href="#">Ver página</a>
									</div>
								</div>
							<? } ?>
						<? } ?>
					<? } else if(isset($_GET['p']) && $_GET['p'] == 'avaliacoes') { ?>
						<?
							$qtd_produtos = rand(0,5);

							$produtos = array();
							for($i = 0; $i < $qtd_produtos; $i++) {
								array_push($produtos, rand(1,50));
							}
						?>	
						<? if($qtd_produtos == 0) { ?>
							<div class="empty">
								Nenhuma avaliação feita.
							</div>
						<? } else { ?>
							<? foreach($produtos as $id) { ?>
								<div class="reviews">
									<div class="review-product">
										<div>
											<a href="#">
												<img src="img_produtos/<?= $id ?>/index.jpg">
											</a>
										</div>
										<div>
											<a href="#">Nome do produto</a>
											<div class="stars">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<span>
													<i class="fas fa-star-half filled"></i>
													<i class="far fa-star-half not-filled medium"></i>
												</span>
												<i class="far fa-star not-filled"></i>
												<i class="far fa-star not-filled"></i>
											</div>
										</div>
										<div>
											<a href="#"><i class="fas fa-trash-alt"></i> Excluir</a>
											<a href="#">Ver página</a>
										</div>
									</div>
									<div class="review-comment">
										<div>
											<span>Titulo da avaliação</span>
											<div class="stars">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<span>
													<i class="fas fa-star-half filled"></i>
													<i class="far fa-star-half not-filled medium"></i>
												</span>
											</div>
										</div>
										<div>
											<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo reprehenderit magni maiores...</span>
										</div>
										<div>
											<span><?= rand(1,31).'/'.rand(1,12).'/'.rand(2017, 2020) ?></span>
										</div>
									</div>
								</div>
							<? } ?>
						<? } ?>
					<? } ?>
				</div>
			</section>

		</div>
	</main>

	<button id="btn-asidemyaccount"><i class="fas fa-ellipsis-v"></i></button>
	
	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/general.js"></script>
</body>
</html>