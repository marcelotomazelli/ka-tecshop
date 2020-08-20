<?php
	$qtd_pedidos = rand(0,20);
	$pedidos = array();

	for($i = 0; $i < $qtd_pedidos; $i++) {
		$qtd_produtos = rand(1,2);
		if(1 == rand(1,10)) {
			$qtd_produtos = rand(3,8);
		}
		$produtos = array();
		for($j = 0; $j < $qtd_produtos; $j++) {
			$id_produto = rand(1,50);
			array_push($produtos, $id_produto);
		}
		$codigo = rand(100000,999999);

		$pedido = [
			'codigo' => $codigo,
			'produtos' => $produtos
		];

		array_push($pedidos, $pedido);
	}
?>
<? if($qtd_pedidos == 0) { ?>
	<div class="empty">
		Nenhum pedido a mostrar.
	</div>
<? } else { ?>
	<? foreach($pedidos as $value) { ?>
		<div class="resultrequests">
			<div>
				<span>Código: <span><?= $value['codigo'] ?></span></span>
				<? if(1 == rand(1,5)) { ?>
					<span class="pending">Pendente</span>
				<? } else { ?>
					<span class="delivered">Entregue</span>
				<? } ?>
			</div>
			<div>
				<div class="imgsrequests">
					<? foreach($value['produtos'] as $id) { ?>
						<a href="#">
							<img src="../resourses-katecshop/img_produtos/<?= $id ?>/index.jpg">
						</a>
					<? } ?>
				</div>
				<span>
					<a>Mostrar mais <i class="fas fa-angle-down"></i></a>
				</span>
			</div>
		</div>
	<? } ?>
<? } ?>