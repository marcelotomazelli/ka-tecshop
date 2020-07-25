<?php 
	require "./php/list_products.php";
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

	<!-- Para Estilos do menu Categoria -->
	<style type="text/css">
	</style>
</head>
<body id="bodyid" onresize="resizing()">

	<!--|➖➖➖➖  Header  ➖➖➖➖|-->
	<? require_once "phphtml/header.php" ?>

	<!--|➖➖➖➖  Seção introdocção  ➖➖➖➖|-->
	<section id="section-introduction" class="open">
		<div class="content">

			<div> <!-- ⏩ Carousel -->
				<div id="carousel-intro" class="carousel">
					
					<!---\ Botões do Carousel--->
					<div id="carousel_intro_buttons" class="buttons-carousel" ontouchstart="crslObj_intro.touch(event)">
						<!--; Batão Prev-->
						<button class="carousel-prev" onclick="crslObj_intro.prev()">
							<i class="fas fa-chevron-left"></i>
						</button>
						<!--; Batão Next-->
						<button class="carousel-next" onclick="crslObj_intro.next()">
							<i class="fas fa-chevron-right"></i>
						</button>
					</div>

               		<!---\ Imagens do Carousel--->
					<div class="carousel-images">
						<div id="SpCarousel-intro" class="carousel-content">
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

				</div>
			</div> <!-- ◼ Carosuel -->

			<div id="introduction-cards"> <!-- ⏩ Cards da Introdução -->
				<ul>

 					<!-- <|----------------------------|> -->
					<li>
						<div>
							<div>
								<img src="img/icons/card-gift.png">
							</div>
							<div>
								<h3>Presente Especial</h3>
								<h5>Consiga um perfeito</h5>
							</div>
						</div>
					</li>
					
 					<!-- <|----------------------------|> -->
					<li>
						<div>
							<div>
								<img src="img/icons/card-payment.png">
							</div>
							<div>
								<h3>Pagamento Seguros</h3>
								<h5>100% seguros</h5>
							</div>
						</div>
					</li>
					
 					<!-- <|----------------------------|> -->
					<li>
						<div>
							<div>
								<img src="img/icons/card-suport.png">
							</div>
							<div>
								<h3>7/24 Suporte</h3>
								<h5>Suporte online 7/24</h5>
							</div>
						</div>
					</li>
					
 					<!-- <|----------------------------|> -->
					<li>
						<div>
							<div>
								<img src="img/icons/card-offer.png">
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

	<!--|➖➖➖➖  Seção das têndencias  ➖➖➖➖|-->
	<section id="section-trending">
		<div class="content">
			<div class="content-slide-items"> <!-- ⏩ SlideItems das tendencias -->
				
				<!---\ Cabeçalho do SlideItems --->
				<div class="slide-tittle-controls">

					<!--; Titulo-->
					<div>
						<h3>Produtos em tendência</h3>
					</div>

					<!--; Links e Botões-->
					<div>
						<ul>
							<li>
								<button onclick="requisitionAjax('destaque')">Destaque</button>
							</li>
							<li>
								<button onclick="requisitionAjax('bestseller')">BestSeller</button>
							</li>
							<li>
								<button onclick="requisitionAjax('ultimos')">Últimos</button>
							</li>
							<div class="clear"></div>
						</ul>
						<div>
							<button onclick="crslObj_trend.prev()">
								<i class="fas fa-chevron-left"></i>
							</button>
							<button onclick="crslObj_trend.next()">
								<i class="fas fa-chevron-right"></i>
							</button>
						</div>
					</div>
				</div>

				<!--; Corpo do SlideItems-->
				<div class="slide-carousel" ontouchstart="crslObj_trend.touch(event)">
					
					<div id="SpSlide-trend" class="slide-content">
						<!-- Script que constroe a visulização dos produtos em destaque -->
						<? foreach($list_dstq as $value) { ?>
											
							<div class="slide_items si_trend">
								<div>
									<div>
										<a href="#">
											<img src="img_produtos/<?= $value['id_produto']?>/index.jpg">
										</a>
										<div>
											<a href="#">
												<i class="fas fa-heart"></i>
											</a>
										</div>
									</div>
									
									<div>
										<h2><a href=""><?= $value['nome_curto']?></a></h2>
										<h3>
											R$ 
											<?= 
												$value['valor']
											?>
										</h3>
									</div>
									<div>
										<a href="#">Adicionar ao carrinho</a>
									</div>
								</div>
							</div>
							
						<? } ?>

					</div>

				</div>
			</div> <!-- ◼ SlideItens das Tendencias -->
		</div>
	</section>

	<!--|➖➖➖➖  Seção dos anúncios ➖➖➖➖|-->
	<section id="section-advertising">
		<div class="content">

			<div>
				<div>
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				</div>

				<div>
					<img src="http://dummyimage.com/370x500
					/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				</div>

				<div>
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				</div>
			</div>

		</div>
	</section>


	<!-- |➖➖➖➖  Seção dos especiais do dia  ➖➖➖➖| -->
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
							<button onclick="crslObj_deal.prev()">
								<i class="fas fa-chevron-left"></i>
							</button>
							<button onclick="crslObj_deal.next()">
								<i class="fas fa-chevron-right"></i>
							</button>
						</div>
					</div>

				</div>

				<!--Corpo do SlideItems-->
				<div class="slide-carousel" ontouchstart="crslObj_deal.touch(event)">
					<div id="SpSlide-deal" class="slide-content">
						<? for($i = 1; $i <= 9; $i++) { ?>
							<div class="slide_items si_deal">
								<div>

									<div>
										<a href="#">
											<img src="http://dummyimage.com/1000x1000/4d494d/686a82.gif&text=<?= $i?>" alt="placeholder+image">
										</a>
										<div>
											<a href="#">
												<i class="fas fa-heart"></i>
											</a>
										</div>
										<div>
											<ul>
												<li><span><?= rand(0, 375); ?></span>dias</li>
												<li><span><?= rand(0, 23); ?></span>horas</li>
												<li><span><?= rand(0, 60); ?></span>min</li>
											</ul>
										</div>
									</div>
									
									<div>
										<h2><a href="">Teste</a></h2>
										<h3><?= rand(0, 9999).','.rand(0, 99) ?></h3>
									</div>

									<div>
										<a href="#">Adicionar ao carrinho</a>
									</div>

								</div>
							</div>
						<? } ?>
					</div>

				</div>

			</div> <!-- ◼ SlideItens dos Especiais -->

		</div>
	</section>

	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/carousel.class.js"></script>
	<script src="js/script.js"></script>
</body>
</html>