<? if(!empty($favorites)) { ?>
	<? foreach($favorites as $item) { ?>
		<? $pid = $item->id ?>
		<? $dproduct = './product.php?id='.$pid ?>

		<div id="sfavid-<?= $pid ?>" class="favorite-product">

			<div class="fheart">
				<button id="fid-<?= $pid ?>" class="favorites isfavorite">
					<i class="fas fa-heart"></i>
				</button>
			</div>

			<div class="fimg">
				<a href="<?= $dproduct ?>">
					<img src="./img_produtos/<?= $pid ?>/index.jpg">
				</a>
			</div>

			<div class="finfo">
				<a href="<?= $dproduct ?>"><?= $item->nome_curto ?></a>
				<span><?= $item->nome ?></span>
			</div>

			<div class="fstars">

				<div class="superstars fstyle">
					<?php
						$valuereviewp = $item->media;
						if(empty($valuereviewp))
							$valuereviewp = 0;
						$qttreviewp = $item->quantidade;
						if(empty($qttreviewp))
							$qttreviewp = 0;
					?>
					<div class="stars">
						<? $_changes->starsConstruct($valuereviewp) ?>
					</div>
					<span><?= $_changes->correctReview($valuereviewp) ?> (<span><?= $qttreviewp ?></span>)</span>
				</div>
				
				<a href="<?= $dproduct ?>">Ver página</a>
			</div>

		</div>
	<? } ?>
<? } else { ?>
	<div class="empty">
		Nenhum produto está marcado.
	</div>
<? } ?>