<?php
	require './phpscripts/classConnection.php';
	require './phpscripts/classKAControl.php';
	require "./phpscripts/scriptSession.php";
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
	<link rel="stylesheet" type="text/css" href="css/cart.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body id="bodyid" class="close_s">

	<!--
		HEADER
	-->
	<? require_once "phphtml/header.php" ?>

	<!--
		LOC
	-->
	<section class="currentloc">
		<div class="content">
			<ul>
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Carrinho</a>
				</li>
			</ul>
		</div>
	</section>

	<main id="maincart">
		<div class="content">

			<? if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
				<section id="products-list">
					<div>
						<table id="product-table">

							<thead>
								<tr class="product-line">
									<th>Imagem</th>
									<th>Nome</th>
									<th>Quantidade</th>
									<th>Unidade</th>
									<th>Total</th>
									<th>Excluir</th>
								</tr>
							</thead>

							<!-- Tudo o que é necessario para esse  -->
							<tbody>
								<? foreach($listcart as $i => $product) { ?>
									<? $qtt = $_SESSION['cart'][$i]['qtt'] ?>
									<? $totalitem = $product->valor * $qtt ?>
									<tr class="product-line">
										<td>
											<a href="./product.php?id=<?= $product->id ?>">
												<img src="./img_produtos/<?= $product->id ?>/index.jpg" alt="">
											</a>
										</td>
										<td class="name-product"><?= $product->nome ?></td>
										<td><?= $qtt ?>x</td>
										<td>R$ <?= $_changes->correctRS($product->valor) ?></td>
										<td>R$ <?= $_changes->correctRS($totalitem) ?></td>
										<td class="button-delete">
											<button>
												<i class="fas fa-plus" style="transform: rotateZ(45deg)"></i>
											</button>
										</td>
									</tr>
								<? } ?>
							</tbody>
							
						</table>
					</div>
				</section>

				<section id="generalinfo-cart">
					<div id="infocart-total">
						<table class="cart-total">
							<tr class="two-items-table">
								<td>Frete:</td>
								<td>R$ 15,00</td>
							</tr>
							<tr class="two-items-table">
								<td>Desconto:</td>
								<td>Nenhum</td>
							</tr>
							<tr class="two-items-table">
								<td>Total:</td>

								<td>R$ <span><?= $valuetotal ?></span></td>
							</tr>
						</table>
					</div>

					<div id="infocart-footer">
						<div>
							<button>Continuar comprando</button>
							<button>Limpar carrinho</button>
						</div>
						<div>
							<a href="./phpscripts/scriptPurchase.php">Finalizar compra</a>
						</div>
					</div>
				</section>
			<? } else { ?>
				<section id="cartempty">
					<span>Seu carrinho de compras está vazio.</span>
					<span>Temos os melhores produtos e preços, aproveite!</span>
					<span><a href="index.php">Ir para Home</a></span>
				</section>
			<? } ?>
		</div>
	</main>
	
	<!--
		RODAPÉ
	-->
	<? require_once "phphtml/footer.php" ?>

	<!--
		SCRIPTS
	-->
	<script src="js/general.js"></script>
	<script src="js/product.js"></script>
</body>
</html>
