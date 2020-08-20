<?
	$qtd_produtos = rand(0,5);

	$produtos = array();
	for($i = 0; $i < $qtd_produtos; $i++) {
		array_push($produtos, rand(1,50));
	}
?>

<? if($qtd_produtos == 0) { ?>
	<div class="empty">
		Nenhum produto está marcado.
	</div>
<? } else { ?>
	<? foreach($produtos as $value) { ?>
		<div class="favorite-product">

			<div class="fheart">
				<button>
					<i class="fas fa-heart"></i>
				</button>
			</div>

			<div class="fimg">
				<a href="#">
					<img src="../resourses-katecshop/img_produtos/<?= $value ?>/index.jpg">
				</a>
			</div>

			<div class="finfo">
				<a href="#">Test ok;</a>
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae voluptas assumenda...</span>
			</div>

			<div class="fstars">
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
				<a href="#">Ver página</a>
			</div>

		</div>
	<? } ?>
<? } ?>