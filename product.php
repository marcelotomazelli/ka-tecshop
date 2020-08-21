<?php
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
	<link rel="stylesheet" type="text/css" href="css/product.css">

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
					<a href="#">Apple</a>
				</li>
				<li>
					<a href="#">iPhone SE Preto</a>
				</li>
			</ul>
		</div>
	</section>
	
	<? $id = rand(1,40) ?>			
	<? $names = array('Romero', 'Jessica', 'José', 'Mateus', 'Marcelo', 'Ana', 'Augusto', 'Maria'); ?>

	<!--|➖➖➖➖  Parte central  ➖➖➖➖|-->
	<main id="mainproduct">
		<div class="content">

			<div id="product-imgs">

				<div id="main-image">
					<img src="./img_produtos/<?= $id ?>/index.jpg">
				</div>

				<div id="Ssi-imgs">
					<div id="si-imgs">
						<button>
							<img src="./img_produtos/<?= $id ?>/index.jpg">
						</button>
						<button>
							<img src="./img_produtos/<?= $id ?>/1.jpg">
						</button>
						<button>
							<img src="./img_produtos/<?= $id ?>/2.jpg">
						</button>
						<button>
							<img src="./img_produtos/<?= $id ?>/3.jpg">
						</button>
						<button>
							<img src="./img_produtos/<?= $id ?>/4.jpg">
						</button>
					</div>
				</div>

			</div>

			<div id="info">
				<div id="name">
					<h1>iPhone SE Preto, 128GB - MXD02</h1>
				</div>

				<div id="dates">
					<table>
						<tr>
							<th>Marcas:</th>
							<td><a href="#">Apple</a></td>
						</tr>
						<tr>
							<th>Código do produto:</th>
							<td><?= $i ?></td>
						</tr>
						<tr>
							<th>Estado:</th>
							<td>Em estoque</td>
						</tr>
					</table>
				</div>

				<div id="numbers">
					<span>R$ <?= rand(0, 9999).','.rand(0, 99) ?></span>
					<div>
						<button><i class="fas fa-minus"></i></button>
						<span>1</span>
						<button><i class="fas fa-plus"></i></button>
					</div>
				</div>

				<div id="add-cart">
					<a href="#">Adicionar ao carrinho</a>
					<a href="#"><i class="fas fa-heart"></i></a>
				</div>
	
				<div id="reviews-link">
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
					<span>2,7</span>
					<button href="#"><span>10</span> Avalições</button>
					<button href="#">Avaliar</button>
				</div>

				<div id="midias">
					<span>Compartilhe: </span>
					<a href="#"><img src="img/midias/whatsapp.svg"></a>
					<a href="#"><img src="img/midias/facebook.svg"></a>
					<a href="#"><img src="img/midias/instagram.svg"></a>
					<a href="#"><img src="img/midias/pinterest.svg"></a>
					<a href="#"><img src="img/midias/twitter.svg"></a>
					<a href="#"><img src="img/midias/google-plus.svg"></a>
				</div>
			</div>

			<div id="informations">

				<div id="description" class="info-container">
					<div><i class="fas fa-pencil-ruler"></i> Descrição</div>
					<div id="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A illo eum voluptates qui expedita culpa fugiat! Obcaecati, ipsa, adipisci? Odit quas iure amet doloribus. Dolores cupiditate quibusdam, veniam dolore sint? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique repellat voluptatibus et iure accusamus reiciendis ipsam! Maxime nisi deserunt aspernatur amet quo, molestiae asperiores, quaerat, qui architecto nostrum et. Cumque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo consectetur, amet. Quasi pariatur harum enim doloribus itaque molestiae, totam saepe, cumque. Rem, iste, minus! Quasi eos error, commodi perspiciatis quisquam.
					</div>
				</div>

				<div id="specification" class="info-container">
					<div><i class="fas fa-pencil-ruler"></i> Especificações</div>
					<div>

						<table>
							<tr class="tittle-item">
								<th>Caracteristicas:</th>
								<td></td>
							</tr>
							<tr class="row-item">
								<td>Marca: </td>
								<td>Galax</td>
							</tr>
							<tr class="row-item">
								<td>Modelo: </td>
								<td>GTX 1650</td>
							</tr>
						</table>

						<table>
							<tr class="tittle-item">
								<th>Mecanismo da GPU:</th>
								<td></td>
							</tr>
							<tr class="row-item">
								<td>CUDA Cores: </td>
								<td>1280</td>
							</tr>
							<tr class="row-item">
								<td>Clock do núcleo (MHz): </td>
								<td>1530</td>
							</tr>
							<tr class="row-item">
								<td>Boost Clock (MHz): </td>
								<td>1740</td>
							</tr>
							<tr class="row-item">
								<td>1-Click OC Clock (MHz): </td>
								<td>1755 (instalando o Xtreme Tuner Plus Software e usando o 1-Click OC)</td>
							</tr>
						</table>

						<table>
							<tr class="tittle-item">
								<th>Memória:</th>
								<td></td>
							</tr>
							<tr class="row-item">
								<td>Velocidade de memória: </td>
								<td>12 Gbps</td>
							</tr>
							<tr class="row-item">
								<td>Largura da interface de memória GDDR6: </td>
								<td>128 bits</td>
							</tr>
							<tr class="row-item">
								<td>Largura de banda da memória (GB / s): </td>
								<td>192</td>
							</tr>
						</table>

						<table>
							<tr class="tittle-item">
								<th>Suporte de exibição:</th>
								<td></td>
							</tr>
							<tr class="row-item">
								<td>Multi monitores: </td>
								<td>3</td>
							</tr>
							<tr class="row-item">
								<td>Conectores de exibição padrão: </td>
								<td>DP 1.4 / HDMI 2.0b / DVI-D</td>
							</tr>
						</table>

						<table>
							<tr class="tittle-item">
								<th>Energia:</th>
								<td></td>
							</tr>
							<tr class="row-item">
								<td>Potência máxima da placa gráfica (W): </td>
								<td>100W</td>
							</tr>
							<tr class="row-item">
								<td>Requisito mínimo de energia do sistema (W): </td>
								<td>350W</td>
							</tr>
						</table>

						<table>
							<tr class="tittle-item">
								<th>Conteúdo embalagem:</th>
							</tr>
							<tr>
								<td>1 x Placa de Vídeo Galax NVIDIA GeForce GTX 1650 Super EX 1 Click OC</td>
							</tr>
						</table>

						<table>
							<tr class="tittle-item">
								<th>Peso:</th>
							</tr>
							<tr>
								<td>170 gramas (bruto com embalagem)</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="info-container">
					<div><i class="fas fa-comments"></i> Perguntas</div>
					<div id="questions">
						<?php
							$x = rand(1,4);
							for($i = 0; $i < $x; $i++) {
						?>
							<div class="question">
								<div><i class="fas fa-comment"></i></div>
								<div>
									<span class="question-tittle">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
									<span class="question-author"><?= $names[rand(0,7)]?> <span>16/03/2011</span></span>
									<span class="button-answer"><button>Responder</button></span>
									<div class="answers">
										<?php
										$y = rand(1,4);
										for($j = 0; $j < $y; $j++) {
											?>
											<div class="answer">
												<div><i class="fas fa-comment"></i></div>
												<div>
													<span class="answer-tittle"><i>Lorem iusto vero hic omnis illo reprehenderit ullam quo quod!</i></span>
													<span class="answer-author"><?= $names[rand(0,7)]?> <span><?= rand(1,31).'/'.rand(1,12).'/'.rand(2017,2020)?></span></span>
												</div>
											</div>
										<? } ?>
										<? if(1 == rand(1,3)) { ?>
											<div class="new-aswer">
												<label for="a1">Resposta:</label>
												<form action="#">
													<textarea name="#" id="a1"></textarea>
												</form>
												<div><button class="button-send-answer">Enviar</button></div>
											</div>
										<? } ?>
									</div>
								</div>
							</div>
						<? } ?>

					</div>
				</div>

				<div id="reviews" class="info-container">
					<div><i class="fas fa-star"></i>Avaliações (<span>10</span>)</div>
					<div>

						<div id="old-reviews">
							<?php
								$x = rand(1,10);
								for($i = 1 ; $i <= $x; $i++) { 
							?>
								<div class="old-review">
									<div>

										<div class="name-review">
											<span>Teste <?= $i ?></span>
										</div>

										<div class="stars">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span>
												<i class="fas fa-star-half filled"></i>
												<i class="far fa-star-half not-filled medium"></i>
											</span>
											<i class="far fa-star not-filled"></i>
										</div>

									</div>
									<div class="review-coment">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea quisquam, ratione deleniti iusto totam atque nulla culpa natus eveniet dignissimos, doloremque. Fugiat asperiores, laboriosam. At, possimus delectus quas maiores aut.
									</div>
									<div><?= $names[rand(0,7)]?> <span><?= rand(1, 30)?>/<?= rand(1,12)?>/<?= rand(2018, 2020)?></span></div>
								</div>
							<?}?>
						</div>

						<div id="new-review">

							<form action="#">
								<div>
									<label for="ta1">Título:</label>
									<input type="text" name="#">
								</div>
								<div>
									<label for="ta1">Comentário:</label>
									<textarea name="" id="ta1"></textarea>
								</div>
								<input type="hidden" name="review">
							</form>

							<div id="stars-review">
								<div>Avaliação:</div>
								<button id="button-star-review">
									<div class="stars">
										<i class="fas fa-star filled"></i>
										<span>
											<i class="fas fa-star-half filled"></i>
											<i class="far fa-star-half not-filled medium"></i>
										</span>
										<i class="far fa-star not-filled"></i>
										<i class="far fa-star not-filled"></i>
										
										<i class="far fa-star not-filled"></i>
									</div>
								</button>
							</div>

							<div id="send-review">
								<button id="button-send-review">Enviar</button>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div>
	</main>
	
	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/product.js"></script>
</body>
</html>