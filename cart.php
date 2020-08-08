<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<title>KA TECSHOP</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
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
					<a href="#">Carrinho</a>
				</li>
			</ul>
		</div>
	</section>

	<main id="maincart">
		<div class="content">
			
			<section id="products-list">
				<div>
					<table class="product-table">

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

						<tbody>
							<? foreach($products as $value) { ?>
								<tr class="product-line">
									<td>
										<a href="#">
											<img src="img_produtos/<?= $value['id']?>/index.jpg" alt="">
										</a>
									</td>
									<td class="name-product">Teste</td>
									<td><?= $value['qtd'] ?>x</td>
									<td>R$ <?= str_replace('.', ',', $value['valor']) ?></td>
									<td>R$ <?= str_replace('.', ',', ($value['valor'] * $value['qtd'])) ?></td>
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
							<td>R$ <span><?= str_replace('.', ',', ($total + 15))?></span></td>
						</tr>
					</table>
				</div>

				<div id="infocart-footer">
					<div>
						<button>Continuar comprando</button>
						<button>Limpar carrinho</button>
					</div>
					<div>
						<button>Finalizar compra</button>
					</div>
				</div>
			</section>

		</div>
	</main>
	
	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/product.js"></script>
</body>
</html>