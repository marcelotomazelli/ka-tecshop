<?php 
	require "./php/authentication_control.php";
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
	<link rel="stylesheet" type="text/css" href="css/categories.css">

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

			<section id="view-products" class="grid">
				<div id="central-filter">

					<div id="buttons-layout">
						<button id="button-grid">
							<i class="fas fa-th"></i>
							<span>Grid</span>
						</button>
						<button id="button-list">
							<i class="fas fa-list"></i>
							<span>Lista</span>
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
					
					<? for($i = 10; $i <= 20; $i++) { ?>
						<div class="item-products">
							<div>

								<div class="product-img">
									<a href="product.php">
										<img src="img_produtos/<?= $i?>/index.jpg">
									</a>
									<div>
										<a href="#">
											<i class="fas fa-heart"></i>
										</a>
									</div>
								</div>
								
								<div class="product-info">
									<h2><a href="">Teste</a></h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni nesciunt, impedit? Facere nesciunt, tempora...</p>
									<h3>R$ <?= rand(0, 9999).','.rand(0, 99) ?></h3>
								</div>

								<div class="product-addcart">
									<a href="#">Adicionar ao carrinho</a>
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
	<script src="js/categories.js"></script>
</body>
</html>