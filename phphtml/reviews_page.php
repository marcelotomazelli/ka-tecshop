<?php
	$qtd_produtos = rand(0,5);

	$produtos = array();
	for($i = 0; $i < $qtd_produtos; $i++) {
		array_push($produtos, rand(1,50));
	}
?>	
<? if($qtd_produtos == 0) { ?>
	<div class="empty">
		Nenhuma avaliação feita.
	</div>
<? } else { ?>
	<? foreach($produtos as $id) { ?>
		<div class="reviews">

			<div class="review-product">

				<div>
					<a href="#">
						<img src="../resourses-katecshop/img_produtos/<?= $id ?>/index.jpg">
					</a>
				</div>

				<div>
					<a href="#">Nome do produto</a>
				</div>

				<div>
					<a href="#"><i class="fas fa-trash-alt"></i> Excluir</a>
					<a href="#">Ver página</a>
				</div>
				
			</div>

			<div class="review-comment">

				<div>
					<span>Titulo da avaliação que vai receber na hora que eu possibilitar isso kk</span>
					<div class="superstars">
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
					</div>
				</div>

				<div>
					<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo reprehenderit magni maiores...</span>
				</div>

				<div>
					<span><?= rand(1,31).'/'.rand(1,12).'/'.rand(2017, 2020) ?></span>
				</div>
			</div>

		</div>
	<? } ?>
<? } ?>