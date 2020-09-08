<?php
	require "./phpscripts/scriptSession.php";
	require "./phpscripts/scriptCategories.php";
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
	<link rel="stylesheet" type="text/css" href="css/categories.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body id="bodyid" class="close_s">

	<!--|➖➖➖➖  Header  ➖➖➖➖|-->
	<? require_once "./phphtml/header.php" ?>
	<? require "./phpscripts/scriptProductsFavorites.php" ?>

	<!--|➖➖➖➖  Parte localização  ➖➖➖➖|-->
	<section class="currentloc">
		<div class="content">
			<ul>
				<li>
					<a href="#">Smartphone</a>
				</li>
				<li>
					<a href="#">Android</a>
				</li>
				<li>
					<a href="#">Samsung</a>
				</li>
			</ul>
		</div>
	</section>

	<!--|➖➖➖➖  Parte filtro e produtos  ➖➖➖➖|-->
	<main id="maincategories">
		<div class="content">
			<aside id="asidecategories">
				<div id="filter">
					<form action="#" method="post">
						<div>
							<div>Filtros</div>
						</div>
						<div id="formprice">
							<div>Preço</div>
							<div>
								<input type="text" name="" value="R$ 234,12" disabled="disabled">
								<input type="text" name="" value="R$ 2334,12" disabled="disabled">
							</div>
							<div id="rangeprice">
								<span id="min-price-value">234.12</span>
								<span id="max-price-value">2334.12</span>
								<div id="min-box"></div>
								<div id="max-box"></div>
								<div id="view-middle"></div>
							</div>
							
						</div>
						<div id="formbrand">
							<div>Marca</div>
							<div>
								<input id="cb1" type="checkbox">
								<label for="cb1">Samsung</label>
							</div>
							<div>
								<input id="cb2" type="checkbox">
								<label for="cb2">Motorola</label>
							</div>
							
						</div>
						<div id="formstock">
							<div>Estoque</div>
							<div>
								<input id="rd1" name="1" type="radio">
								<label for="rd1">Em estoque</label>
							</div>
							<div>
								<input id="rd2" name="1" type="radio">
								<label for="rd2">Fora de estoque</label>
							</div>
						</div>
					</form>
				</div>
			</aside>

			<section id="view-products" class="list">
				<div id="central-filter">

					<div id="buttons-layout">
						<button id="button-list">
							<i class="fas fa-list"></i>
							<span>Lista</span>
						</button>
						<button id="button-grid">
							<i class="fas fa-th"></i>
							<span>Grid</span>
						</button>
					</div>

					<div>
						<form action="">
							<label for="sort">Ordenar por:</label>
							<select name="" id="sort">
								<option value="0">Padrão</option>
								<option value="1">(Nome) A - Z</option>
								<option value="1">(Nome) Z - A</option>
								<option value="1">(Preço) Crescente</option>
								<option value="1">(Preço) Decrescente</option>
							</select>
						</form>
					</div>

					<div>
						<form action="">
							<label for="show">Mostrar:</label>
							<select name="" id="show">
								<option value="0">10</option>
								<option value="1">25</option>
								<option value="1">50</option>
								<option value="1">75</option>
								<option value="1">100</option>
							</select>
						</form>
					</div>
				</div>


				<div id="list-products">

					<? foreach($listproducts as $productitem) { ?>
					<div class="superitem-products">
						<div class="item-products">

							<? $pid = $productitem->id ?>

							<div class="product-img">
								<a href="./product.php?id=<?= $pid ?>">
									<img src="./img_produtos/<?= $pid ?>/index.jpg">
								</a>
								<div class="heart-favorite">
									<button id="fid-<?= $pid ?>" class="favorites <?= isset($procutsfavorites[$pid]) ? 'isfavorite' : 'notfavorite' ?>">
										<i class="fas fa-heart"></i>
									</button>
								</div>
							</div>
							
							<div class="product-info">
								<h2 class="gridname">
									<a href="./product.php?id=<?= $pid ?>">
										<?= $productitem->nome_curto ?>
									</a>
								</h2>
								<h2 class="listname">
									<a href="./product.php?id=<?= $pid ?>">
										<?= $productitem->nome ?>
									</a>
								</h2>
								<div class="superstars">
									<?php
										$valuereviewp = $productitem->media;
										if(empty($valuereviewp))
											$valuereviewp = 0;
										$qttreviewp = $productitem->quantidade;
										if(empty($qttreviewp))
											$qttreviewp = 0;
									?>
									<div class="stars">
										<? $_changes->starsConstruct($valuereviewp) ?>
									</div>
									<span><?= $_changes->correctReview($valuereviewp) ?> (<span><?= $qttreviewp ?></span>)</span>
								</div>
								
							</div>

							<div class="product-addcart">
								<span>R$ <?= $_changes->correctRS($productitem->valor) ?></span>
								<button id="id<?= $pid ?>" class="addcart">Adicionar ao carrinho</button>
							</div>

						</div>
					</div>
					<? } ?>


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
	
	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/general.js"></script>
	<script src="js/categories.js"></script>
</body>
</html>