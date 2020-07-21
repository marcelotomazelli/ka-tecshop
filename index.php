<?php

	require "controle.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<title>KA - Loja Virtual</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/carousel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/all.css">

	<!-- Para Estilos do menu Categoria -->
	<style type="text/css">
	</style>
</head>
<body id="bodyid" onresize="resizingWindow()" onload="onloadBody()">

	
	<? require_once "header.php" ?>


	<!-- ➖➖➖➖➖➖  INTRODUÇÂO DO MAIN  ➖➖➖➖➖➖ -->
	<section id="section-introduction" class="close">

		<div class="content">

			<div> <!-- ⏩ Carousel -->
				<div id="carousel-introduction" class="carousel">
					
					<!---\ Botões do Carousel /--->
					<div id="carousel_intro_buttons" class="buttons-carousel" ontouchstart="carousel_obj_intro.down(event)">
						<!--Batão Prev-->
						<button class="carousel-prev" onclick="carousel_obj_intro.prev()">
							<i class="fas fa-chevron-left"></i>
						</button>
						<!--Batão Next-->
						<button class="carousel-next" onclick="carousel_obj_intro.next()">
							<i class="fas fa-chevron-right"></i>
						</button>
					</div>

               		<!---\ Imagens do Carousel /--->
					<div class="carousel-images">
						<div class="carousel-item">
							<img class="carousel-image" src="img/poster1.jpg" alt="placeholder+image">
						</div>
						<div class="carousel-item">
							<img class="carousel-image" src="img/poster2.jpg" alt="placeholder+image">
						</div>
						<div class="carousel-item">
							<img class="carousel-image" src="img/poster3.jpg" alt="placeholder+image">
						</div>
					</div>

				</div>
			</div> <!-- ◼ Carosuel -->

			<div id="introduction-cards"> <!-- ⏩ Cards da Introdução -->
				<ul>

					<li>
						<div>
							<div>
								<img src="img/card-gift.png">
							</div>
							<div>
								<h3>Presente Especial</h3>
								<h5>Consiga um perfeito</h5>
							</div>
						</div>
					</li>
					
					<li>
						<div>
							<div>
								<img src="img/card-payment.png">
							</div>
							<div>
								<h3>Pagamento Seguros</h3>
								<h5>100% seguros</h5>
							</div>
						</div>
					</li>
					
					<li>
						<div>
							<div>
								<img src="img/card-suport.png">
							</div>
							<div>
								<h3>7/24 Suporte</h3>
								<h5>Suporte online 7/24</h5>
							</div>
						</div>
					</li>
					
					<li>
						<div>
							<div>
								<img src="img/card-offer.png">
							</div>
							<div>
								<h3>Ofertas Especiais</h3>
								<h5>Aproveite a melhores ofertas</h5>
							</div>
						</div>
					</li>

				</ul>
			</div> <!-- ◼ Cards da Introdução -->

		</div>

	</section>
	<!-- ➖➖➖➖➖➖  INTRODUÇÂO DO MAIN ➖➖➖➖➖➖ -->







	<!-- ⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡ -->







	<!-- ➖➖➖➖➖➖  SEÇÃO DAS TENDÊNCIAS ➖➖➖➖➖➖ -->
	<section id="section-trending">

		<div class="content">
			
			<div class="content-slide-items"> <!-- ⏩ SlideItems das Tendencias -->
				
				<!---\ Cabeçalho do SlideItems /--->
				<div class="slide-tittle-controls">

					<!--Titulo-->
					<div>
						<h3>Produtos em tendência</h3>
					</div>

					<!--Links e Botões-->
					<div>
						<ul>
							<li><button>Destaque</button></li>
							<li><button>BestSeller</button></li>
							<li><button>Últimos</button></li>
							<div class="clear"></div>
						</ul>
						<div>
							<button onclick="carousel_obj_trend.prev()">
								<i class="fas fa-chevron-left"></i>
							</button>
							<button onclick="carousel_obj_trend.next()">
								<i class="fas fa-chevron-right"></i>
							</button>
						</div>
					</div>
				</div>

				<!--Corpo do SlideItems-->
				<div class="slide-carousel" ontouchstart="carousel_obj_trend.down(event)">

					<? foreach($lista_produtos as $valor) { ?>

					<div class="slide_items slide_items_1">
						<div>
							<div>
								<a href="#">
									<img src="img_produtos/<?= $valor['id_produto']?>/index.jpg">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
							</div>
							
							<div>
								<h2><a href=""><?= $valor['nome_curto']?></a></h2>
								<h3><?= $valor['valor']?></h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<? } ?>
				</div>
			</div> <!-- ◼ SlideItens das Tendencias -->

		</div>

	</section>
	<!-- ➖➖➖➖➖➖  SEÇÃO DAS TENDÊNCIAS ➖➖➖➖➖➖ -->







	<!-- ⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡ -->







	<!-- ➖➖➖➖➖➖  SEÇÃO DOS ANÚNCIOS ➖➖➖➖➖➖ -->
	<section id="section-advertising">

		<div class="content">

			<div>
				<div>
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				</div>
				<div><img src="http://dummyimage.com/370x500
					/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"></div>
				<div>
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				</div>
			</div>

		</div>

	</section>
	<!-- ➖➖➖➖➖➖  SEÇÃO DOS ANÚNCIOS ➖➖➖➖➖➖ -->







	<!-- ⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡ -->







	<!-- ➖➖➖➖➖➖  SEÇÃO DOS ESPECIAIS DO DIA ➖➖➖➖➖➖ -->
	<section id="section-deal">

		<div class="content">

			<div class="content-slide-items"> <!-- ⏩ SlideItens dos Especiais -->
	
				<!---\ Cabeçalho do SlideItems /--->
				<div class="slide-tittle-controls">

					<!--Titulo-->
					<div>
						<h3>Especiais do dia</h3>
					</div>

					<!--Links e Botões-->
					<div>
						<div>
							<button onclick="carousel_obj_deal.prev()">
								<i class="fas fa-chevron-left"></i>
							</button>
							<button onclick="carousel_obj_deal.next()">
								<i class="fas fa-chevron-right"></i>
							</button>
						</div>
					</div>

				</div>

				<!--Corpo do SlideItems-->
				<div class="slide-carousel" ontouchstart="carousel_obj_deal.down(event)">

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=1" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=2" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=3" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=4" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=5" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=6" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=7" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=8" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

					<div class="slide_items slide_items_2">
						<div>
							<div>
								<a href="#">
									<img src="http://dummyimage.com/180x180/4d494d/686a82.gif&text=9" alt="placeholder+image">
								</a>
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
									</a>
								</div>
								<div>
									<ul>
										<li><span>273</span>dias</li>
										<li><span>14</span>horas</li>
										<li><span>6</span>min</li>
									</ul>
								</div>
							</div>
							
							<div>
								<h2><a href="">Teste</a></h2>
								<h3>R$12,34</h3>
							</div>
							<div>
								<a href="#">Adicionar ao carrinho</a>
							</div>
						</div>
					</div>

				</div>

			</div> <!-- ◼ SlideItens dos Especiais -->

		</div>

	</section>
	<!-- ➖➖➖➖➖➖  SEÇÃO DOS ESPECIAIS DO DIA ➖➖➖➖➖➖ -->







	<!-- ⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡ -->







	<!-- ➖➖➖➖➖➖  RODAPÉ ➖➖➖➖➖➖ -->
	<footer>
		<div class="content">
			<div id="footer-contate" class="close">
				<h3 onclick="changeClass(['footer-contate'], 'open', 'close')">
					Contato
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
					<div></div>
				</h3>
				<ul>
					<li><i class="fas fa-map-marker-alt"></i>Lorem ipsum dolor sit amet, 24</li>
					<li><i class="fas fa-envelope"></i>company@dominio.com</li>
					<li><i class="fas fa-phone"></i>+55 (12) 12345-1234</li>
				</ul>
			</div>
			<div id="footer-extra" class="close">
				<h3 onclick="changeClass(['footer-extra'], 'open', 'close')">
					Extras
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
					<div></div>
				</h3>
				<ul>
					<li>Brands</li>
					<li>Gift Certificates</li>
					<li>Affiliate</li>
					<li>Specials</li>
				</ul>
			</div>
			<div id="footer-information" class="close">
				<h3 onclick="changeClass(['footer-information'], 'open', 'close')">
					Information
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
					<div></div>
				</h3>
				<ul>
					<li>Sobre nós</li>
					<li>Delivery information</li>
					<li>Privacy Policy</li>
					<li>Terms & Conditions</li>
					<li>Contato</li>
					<li>Site Map</li>
				</ul>
			</div>
			<div id="footer-account" class="close">
				<h3 onclick="changeClass(['footer-account'], 'open', 'close')">
					Minha Conta
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
					<div></div>
				</h3>
				<ul>
					<li>My Account</li>
					<li>Order History</li>
					<li>Wish List</li>
				</ul>
			</div>
		</div>
	</footer>

	<script src="js/script.js"></script>
</body>
</html>