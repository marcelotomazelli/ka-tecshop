<?php
	require './phpscripts/scriptIndex.php';
	require './phpscripts/scriptSession.php';
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
	<link rel="stylesheet" type="text/css" href="css/carousel.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

	<!-- Para Estilos do menu Categoria -->
	<style type="text/css">
	</style>
</head>
<body id="bodyid" class="close_s">

	<!--|➖➖➖➖  Header  ➖➖➖➖|-->
	<? require_once "phphtml/header.php" ?>

	<!--|➖➖➖➖  Seção introdocção  ➖➖➖➖|-->
	<section id="section-introduction" class="close_l">
		<div class="content">

			<div> <!-- ⏩ Carousel -->
				<div id="carousel-intro" class="carousel-anitem">
					
					<!---\ Botões do Carousel--->
					<div id="introt" class="anitem-controls">
						<!--; Batão Prev-->
						<button id="introp">
							<i class="fas fa-chevron-left"></i>
						</button>
						<!--; Batão Next-->
						<button id="intron">
							<i class="fas fa-chevron-right"></i>
						</button>
					</div>

               		<!---\ Imagens do Carousel--->
					<div class="anitem-images">
						<div id="Sintro" class="anitem-content">
							<div class="anitem Iintro">
								<img class="anitem-image" src="img/poster1.jpg" alt="placeholder+image">
							</div>
							<div class="anitem Iintro">
								<img class="anitem-image" src="img/poster2.jpg" alt="placeholder+image">
							</div>
							<div class="anitem Iintro">
								<img class="anitem-image" src="img/poster3.jpg" alt="placeholder+image">
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
			<div class="carousel-several"> <!-- ⏩ SlideItems das tendencias -->
				
				<!---\ Cabeçalho do SlideItems --->
				<div class="several-controls">

					<!--; Titulo-->
					<div>
						<h3>Produtos em tendência</h3>
					</div>

					<!--; Links e Botões-->
					<div>
						<ul>
							<li>
								<button id="reqd">Destaque</button>
							</li>
							<li>
								<button id="reqb">BestSeller</button>
							</li>
							<li>
								<button id="requ">Últimos</button>
							</li>
							<div class="clear"></div>
						</ul>
						<div>
							<button id="trendp">
								<i class="fas fa-chevron-left"></i>
							</button>
							<button id="trendn">
								<i class="fas fa-chevron-right"></i>
							</button>
						</div>
					</div>
				</div>

				<!--; Corpo do SlideItems-->
				<div class="several-body" id="trendt">
					
					<div id="Strend" class="several-content">
						<!-- Script que constroe a visulização dos produtos em destaque -->

						<? foreach($list_trend as $value) { ?>
											
							<div class="severalitems Itrend">
								<div>
									<div>
										<a href="#">
											<img src="./img_produtos/<?= $value->id?>/index.jpg">
										</a>
										<div>
											<a href="#">
												<i class="fas fa-heart"></i>
											</a>
										</div>
									</div>
									
									<div>
										<h2><a href=""><?= $value->nome_curto?></a></h2>
										<h3>
											R$ <?= $value->valor ?>
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
					<img src="img/ad-02.jpg">
					<img src="http://dummyimage.com/370x245/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				</div>

				<div>
					<a href=""><img src="img/ad-01.jpg"></a>
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

			<div class="carousel-several"> <!-- ⏩ SlideItens dos Especiais -->
	
				<!---\ Cabeçalho do SlideItems /--->
				<div class="several-controls">

					<!--Titulo-->
					<div>
						<h3>Especiais do dia</h3>
					</div>

					<!--Links e Botões-->
					<div>
						<div>
							<button id="dealp">
								<i class="fas fa-chevron-left"></i>
							</button>
							<button id="dealn">
								<i class="fas fa-chevron-right"></i>
							</button>
						</div>
					</div>

				</div>

				<!--Corpo do SlideItems-->
				<div class="several-body" id="dealt">

					<div id="Sdeal" class="several-content">
						<? for($i = 1; $i <= 9; $i++) { ?>
							<div class="severalitems Ideal">
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
	<script src="js/home.js"></script>
</body>
</html>