<?php
	require "./phpscripts/scriptSession.php";
	require "./phpscripts/scriptProduct.php";

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
</head>
<body id="bodyid" class="close_s">

	<!--|➖➖➖➖  Header  ➖➖➖➖|-->
	<? require_once "phphtml/header.php" ?>

	<!--|➖➖➖➖  Parte localização  ➖➖➖➖|-->
	<?php 
		$legendscategories = [
			'tc' => 'Teclado',
			'ms' => 'Mouse',
			'hs' => 'Headset',
			'gb' => 'Gabinete',
			'ki' => 'Kit',
			'mt' => 'Monitor',
			'wd' => 'Windows',
			'mc' => 'Mac',
			'an' => 'Android',
			'io' => 'IOS',
			'kd' => 'Kindle',
			'cm' => 'Camera',
			'tv' => 'Televisão',
			'pf' => 'Perifericos',
			'pc' => 'Computador',
			'nb' => 'Notebook',
			'sm' => 'Smartphone',
			'tb' => 'Tablet',
			'dk' => 'Desktop',
			'mb' => 'Mobile'
		];
	?>

	<section class="currentloc">
		<div class="content">
			<ul>
				<li>
					<a href="./index.php">Home</a>
				</li>
				<li>
					<a href="./categories.php">Produtos</a>
				</li>
				<li>
					<a href="#"><?= $legendscategories[$productpage->cespecifico] ?></a>
				</li>
				<li>
					<a href="#"><?= $productpage->nome_curto ?></a>
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
					<img src="./img_produtos/<?= $productpage->id ?>/index.jpg">
				</div>

				<div id="Ssi-imgs">
					<div id="si-imgs">

						<button>
							<img src="./img_produtos/<?= $productpage->id ?>/index.jpg">
						</button>
						<? for($i = 1; $i <= $productpage->imagens; $i++) { ?>
							<button>
								<img src="./img_produtos/<?= $productpage->id ?>/<?= $i ?>.jpg">
							</button>
						<? } ?>
					</div>
				</div>

			</div>

			<div id="info">
				<div id="name">
					<h1><?= $productpage->nome ?></h1>
				</div>

				<div id="dates">
					<table>
						<tr>
							<th>Marcas:</th>
							<td><a href="#"><?= $productpage->marca ?></a></td>
						</tr>
						<tr>
							<th>Código do produto:</th>
							<td><?= $productpage->id ?></td>
						</tr>
						<tr>
							<th>Estado:</th>
							<td>Em estoque</td>
						</tr>
					</table>
				</div>

				<div id="numbers">
					<span>R$ <?= $_changes->correctRS($productpage->valor)?></span>
					<div>
						<button><i class="fas fa-minus"></i></button>
						<span>1</span>
						<button><i class="fas fa-plus"></i></button>
					</div>
				</div>

				<div id="add-cart">
					<button id="id<?= $productpage->id?>" class="addcart">Adicionar ao carrinho</button>
					<a href="#"><i class="fas fa-heart"></i></a>
				</div>

				<div id="reviews-link">
					<? if(empty($average)) { ?>
						<? $qttreviews = 0 ?>
						<div class="superstars">
							<div class="stars">
								<? $_changes->starsConstruct(0) ?>
							</div>
							<span><?= '0,0' ?></span>
						</div>
						<button><span><?= $qttreviews ?></span> Avalições</button>
					<? } else { ?>
						<? $qttreviews = $average->quantidade ?>
						<div class="superstars">
							<div class="stars">
								<? $_changes->starsConstruct($average->media) ?>
							</div>
							<span><?= $_changes->correctReview($average->media) ?></span>
						</div>
						<button><span><?= $qttreviews ?></span> Avalições</button>
					<? } ?>

					<button>Avaliar</button>
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
						<?php
							if(!empty($productpage->descricao)) {
								echo $productpage->descricao;
							} else {
								echo $productpage->nome;
							}
						?>
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

						<? foreach($questions as $i => $question) { ?>
							<div class="question">
								<div><i class="fas fa-comment"></i></div>
								<div>
									<span class="question-tittle"><?= $question->descricao ?></span>
									<span class="question-author">
										<?= $question->nome ?>
										<span> <?= $_changes->correctDate($question->dia) ?></span>
									</span>
									<? if($authenticated) { ?>
										<span id="said-<?= $i ?>" class="button-answer open">
											<button id="aid-<?= $i ?>" class="answerbtns">Responder</button>
										</span>
									<? } ?>
									<? if(!empty($answers[$i])) { ?>
										<div class="answers">
											<? foreach($answers[$i] as $answer) { ?>
												<div class="answer">
													<div><i class="fas fa-comment"></i></div>
													<div>
														<span class="answer-tittle"><i><?= $answer->resposta ?></i></span>
														<span class="answer-author">
															<?= $answer->nome?>
															<span> <?= $_changes->correctDate($answer->dia) ?></span>
														</span>
													</div>
												</div>
											<? } ?>
										</div>
									<? } ?>
									<? if($authenticated) { ?>
										<div id="faid-<?= $i ?>" class="formstyle close">
											<div class="closeform">
												<button id="bcaid-<?= $i ?>" class="fas fa-times answerbtnsclose"></button>
											</div>
											<label for="taanswer<?= $i ?>">Resposta:</label>
											<form id="formannswer<?= $i ?>" action="./phpscripts/scriptQuestion.php?type=answer" method="post">
												<textarea name="answer" id="taanswer<?= $i ?>" placeholder="Digite aqui a resposta..."></textarea>
												<input type="hidden" name="question_id" value="<?= $question->id ?>">
												<input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">

											</form>
											<div>
												<button id="sendanswer<?= $i ?>">Enviar</button>
											</div>
										</div>
									<? } ?>
								</div>
							</div>
						<? } ?>

						<? if($authenticated) { ?>
							<div id="sfcquestion" class="formcontrol open">
								<button id="fcquestion">Tenho uma dúvida</button>
							</div>
							<div id="sfquestion" class="formstyle close">
								<div class="closeform">
									<button id="cfquestion" class="fas fa-times"></button>
								</div>
								<form name="formquestion" action="./phpscripts/scriptQuestion.php?type=question" method="post">
									<label for="b1">Pergunta:</label>
									<textarea name="question" id="b1" placeholder="Digite aqui sua pergunta..."></textarea>
									<input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">
								</form>
								<div>
									<button id="bsquestion">Enviar</button>
								</div>
							</div>
						<? } else { ?>
							<p>Faça login ou cadastre-se para que possa interagir.</p>
						<? } ?>
					</div>
				</div>

				<div id="reviews" class="info-container">
					<div><i class="fas fa-star"></i>Avaliações (<span><?=  $qttreviews ?></span>)</div>
					<div id="reviewscontent">

						<div id="old-reviews">
							<? foreach($reviews as $i => $review) { ?>
								<div class="old-review">

									<div>

										<div class="name-review">
											<span><?= $review->titulo ?></span>
										</div>

										<div class="superstars">
											<div class="stars">
												<? $_changes->starsConstruct($review->avaliacao) ?>
											</div>
											<span><?= $_changes->correctReview($review->avaliacao) ?></span>
										</div>

									</div>

									<div class="review-coment">
										<?= $review->descricao ?>
									</div>

									<div class="review-name-date">
										<?= $review->nome ?>
										<span><?= $_changes->correctDate($review->dia) ?></span>
									</div>

								</div>
							<? } ?>
						</div>

						<? if($authenticated) { ?>
							<? if($reviewpermition) { ?>

								<div id="sfcreview" class="formcontrol open">
									<button id="fcreview">Quero avaliar</button>
								</div>

								<div id="sfreview" class="formstyle close">

									<div class="closeform">
										<button id="cfreview" class="fas fa-times"></button>
									</div>

									<form name="formreview" action="./phpscripts/scriptReview.php" method="post">
										<div>
											<label for="ia1">Título:</label>
											<input id="ia1" type="text" name="tittle">
										</div>
										<div>
											<label for="ta1">Comentário:</label>
											<textarea id="ta1" name="description"></textarea>
										</div>
										<input id="reviewnote" type="hidden" name="review" value="0">
										<input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">
									</form>

									<div id="stars-review">
										<div>Avaliação:</div>
										<div id="superreviewnote">
											<button id="button-star-review"></button>
											<div class="superstars">
												<div id="viewstarsnewreview" class="stars">
													<i class="far fa-star not-filled"></i>
													<i class="far fa-star not-filled"></i>
													<i class="far fa-star not-filled"></i>
													<i class="far fa-star not-filled"></i>
													<i class="far fa-star not-filled"></i>
												</div>
												<span id="valueviewreview">0,0</span>
											</div>
										</div>
									</div>

									<div>
										<button id="bsreview">Enviar</button>
									</div>

								</div>

							<? } else { ?>
								<p>Você já avaliou esse produto e agradeçemos por isso.</p>
							<? } ?>
						<? } else { ?>
							<p>Faça login ou cadastre-se para que possa interagir.</p>
						<? } ?>
					</div>
				</div>

			</div>

		</div>
	</main>
	
	<!-- |➖➖➖➖  Rodapé  ➖➖➖➖| -->
	<? require_once "phphtml/footer.php" ?>


	<!-- ➖➖|´/ Script \`|➖➖ -->
	<script src="js/general.js"></script>
	<script src="js/product.js"></script>
</body>
</html>