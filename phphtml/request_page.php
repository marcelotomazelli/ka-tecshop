<? if(empty($requests)) { ?>
	<div class="empty">
		Nenhum pedido a mostrar.
	</div>
<? } else { ?>
	<?  foreach($requests as $value) { ?>
		<div class="resultrequests">
			<div>
				<span>Código: <span><?= $value['info']['id_request'] ?></span></span>
				<? if($value['info']['id_request'] == 1) { ?>
					<span class="pending">Pendente</span>
				<? } else { ?>
					<span class="delivered">Entregue</span>
				<? } ?>
			</div>
			<div>
				<div class="imgsrequests">
					<? foreach($value['products'] as $item) { ?>
						<a href="./product.php?id=<?= $item->produto_id ?>">
							<img src="./img_produtos/<?= $item->produto_id ?>/index.jpg">
						</a>
					<? } ?>
				</div>
				<span>
					<a>Mostrar mais <i class="fas fa-angle-down"></i></a>
				</span>
			</div>
		</div>
	<? }  ?>
<? } ?>