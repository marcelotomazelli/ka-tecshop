<? if(!empty($reviews)) { ?>
	<? foreach($reviews as $item) { ?>
		<? $pid = $item->produto_id ?>
		<? $dproduct = './product.php?id='.$pid ?>

		<div class="reviews">

			<div class="review-product">

				<div>
					<a href="<?= $dproduct ?>">
						<img src="./img_produtos/<?= $pid ?>/index.jpg">
					</a>
				</div>

				<div>
					<a href="<?= $dproduct ?>"><?= $item->nome ?></a>
				</div>

				<div>
					<a href="#"><i class="fas fa-trash-alt"></i> Excluir</a>
					<a href="<?= $dproduct ?>">Ver página</a>
				</div>
				
			</div>

			<div class="review-comment">

				<div>
					<span><?= $item->titulo ?></span>
					<div class="superstars">
						<?php
							$valuereviewp = $item->avaliacao;
							if(empty($valuereviewp))
								$valuereviewp = 0;
						?>
						<div class="stars">
							<? $_changes->starsConstruct($valuereviewp) ?>
						</div>
						<span><?= $_changes->correctReview($valuereviewp) ?></span>
					</div>
				</div>

				<div>
					<span><?= $item->descricao ?></span>
				</div>

				<div>
					<span><?= $_changes->correctDate($item->dia) ?></span>
				</div>
			</div>

		</div>
	<? } ?>
<? } else { ?>
	<div class="empty">
		Nenhuma avaliação feita.
	</div>
<? } ?>