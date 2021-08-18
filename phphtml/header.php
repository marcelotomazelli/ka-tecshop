<?php
	
	class Changes {
		public function correctRS($value) {
			$value *= 100;
			$value = floor($value);

			$value .= '';

			$aux = substr($value,(strlen($value)-2));

			$value = str_replace($aux, '', $value);
			$value .= ',';
			$value .= $aux;
			
			return $value;
		}

		public function correctDate($value) {
			$date = explode('-', $value);
			$date = array_reverse($date);
			$date = implode('/', $date);
			return $date;
		}

		public function starsConstruct($value) {
			$value /= 10;

			if(strlen($value) != 3)
				$value .= '.0';

			$value .= '';

			$value = explode('.', $value);

			$firstvalue = intval($value[0]);
			$mediumvalue = intval($value[1]);
			$lastvalue = 4 - $firstvalue;

			for($i = 1; $i <= $firstvalue; $i++)
				echo '<i class="fas fa-star filled"></i>';

			if($firstvalue < 5) {
				if($mediumvalue == 0 || ($mediumvalue > 0 && $mediumvalue < 3))
					echo '<i class="far fa-star not-filled"></i>';
				else if($mediumvalue >= 3)
					echo '<span><i class="fas fa-star-half filled"></i><i class="far fa-star-half not-filled medium"></i></span>';

				for($i = 1; $i <= $lastvalue; $i++)
					echo '<i class="far fa-star not-filled"></i>';
			}
		}

		public function correctReview($value) {
			$value /= 10;

			if(strlen($value) != 3) {
				$value .= '.0';
			}

			return str_replace('.', ',', $value);
		}
	}

	$_changes = new Changes();

?>

<!--
	HEADER
-->
<header>

	<? require './phpscripts/scriptMenu.php' ?>
	<? require './phpscripts/scriptRequestCart.php' ?>

	<!-- Banner -->
	<div id="header-banner"> 
		<div class="content">

			<!-- Logo -->
			<div id="h-brand">
				<a href="index.php">
					<img src="img/brand.png" alt="k a tecshop" />
				</a>
			</div>

			<!-- Formulário -->
			<div id="h-search">
				<form>
					<select id="">
						<option value="all">Categorias</option>
						<option value="#">Teste</option>
						<option value="#">Teste</option>
						<option value="#">Teste</option>
					</select>
					<input type="text" placeholder="Digite aqui sua pesquisa..." />
					<button><i class="fas fa-search"></i></button>
				</form>
			</div>
			<?php

				$valuetotal = '0,00';
				$items = 0;
				if(!empty($listcart) && is_array($listcart)) {
					$valuetotal = 0;
					foreach($listcart as $i => $product) {
						$valuetotal += $product->valor * $_SESSION['cart'][$i]['qtt'];
						$items++;
					}
					$valuetotal += 15;
					// Formatar o valor para a escrita correta na moeda REAL
					
					$valuetotal = $_changes->correctRS($valuetotal);
				}
			?>

			<?php
				$diciocategories = [
					'tc' => ['Teclado', 'far fa-keyboard'],
					'ms' => ['Mouse', 'fas fa-mouse'],
					'hs' => ['Headset', 'fas fa-headphones-alt'],
					'gb' => ['Gabinete', 'fas fa-mobile'],
					'ki' => ['Kit', 'fas fa-boxes'],
					'mt' => ['Monitor', 'fas fa-desktop'],
					'wd' => 'Windows',
					'mc' => 'Mac',
					'an' => 'Android',
					'io' => 'IOS',
					'kd' => 'Kindle',
					'cm' => ['Camera', 'fas fa-camera'],
					'tv' => ['Televisão', 'fas fa-tv'],
					'pf' => 'Perifericos',
					'pc' => ['Computador', 'fas fa-power-off'],
					'nb' => ['Notebook', 'fas fa-laptop'],
					'sm' => ['Smartphone', 'fas fa-mobile-alt'],
					'tb' => ['Tablet', 'fas fa-tablet-alt'],
					'dk' => 'Desktop',
					'mb' => 'Mobile'
				];
			?>

			<!-- Painel -->
			<div id="h-panel">

				<!-- Link Carrinho -->
				<div id="div-cart" class="dropdown-panel">

					<a id="link-cart" href="cart.php">
						<div>
							<div id="cart-tittle">
								<span>Carrinho</span>
								<span>
									<span>R$ </span>
									<span id="total-cart">
										<?= $valuetotal ?>
									</span>
								</span>
							</div>
							<span id="number-items-cart"><?= $items ?></span>
						</div>
					</a>

					<div id="cart">
						<? if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
							<div id="products-cart">
								<? if(is_array($listcart)) { ?>
									<? foreach($listcart as $i => $item) { ?>
										<table class="productsoncart">
											<tr class="product-cart">
												<td><img src="./img_produtos/<?= $item->id?>/index.jpg" height="60"alt=""></td>
												<td><?= $item->nome_curto ?></td>
												<td><?= $_SESSION['cart'][$i]['qtt'] ?>x</td>

												<? $valueproduct = $item->valor * $_SESSION['cart'][$i]['qtt'] ?>
												<td>R$ <?= $_changes->correctRS($valueproduct) ?></td>
												<td>
													<button id="iproduct<?= $i ?>">
														<i class="fas fa-plus" style="transform: rotateZ(45deg)"></i>
													</button>
												</td>
											</tr>
										</table>
									<? } ?>
								<? } ?>
							</div>
							<table id="infototalcart" class="cart-total">
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
									<td>R$ <span id="totalontable"><?= $valuetotal ?></span></td>
								</tr>
							</table>
						<? } else { ?>
							<span>Nenhum item no carrinho.</span>
						<? } ?>
					</div>

				</div>

				<!-- Link Favoritos -->
				<a id="favorites" href="./myaccount.php?p=favoritos"></a>

				<!-- Link Perfil -->
				<div id="div-login" class="dropdown-panel">

					<a id="link-profile" href="./myaccount.php"></a>
					
					<? if(!$authenticated) { ?>
						<div id="without-login">
							<div>
								<span>Novo consumidor?</span>
								<a href="./access_page.php?t=register">Cadastrar-se</a>
							</div>
							<div>
								<span>Bem-vindo ao KA TECSHOP</span>
								<a href="./access_page.php?t=login">Login</a>
							</div>
						</div>
					<? } else { ?>
						<div id="with-login">
							<span>Olá <span><?= $_SESSION['name'] ?></span></span>
							<ul>
								<li>
									<a href="./myaccount.php">Minha conta</a>
								</li>
								<li>
									<a href="./myaccount.php?p=pedidos">Pedidos</a>
								</li>
								<li>
									<a href="cart.php">Meu carrinho</a>
								</li>
								<li>
									<a href="./myaccount.php?p=favoritos">Lista de favoritos</a>
								</li>
								<li>
									<a href="./phpscripts/scriptSession.php?action=end">Logoff</a>
								</li>
							</ul>
						</div>
					<? } ?>

				</div>

				<!-- Botão -->
				<button id="button-responsive-menu" class="close_s">
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
				</button>

			</div>

		</div>
	</div>

	<!-- Navegação principal -->
	<div id="header-navegation">
		<div class="content">
			<nav id="nav-main">
				<ul>
					
 					<!-- Item categorias -->
					<li id="li-categories">
						
						<!-- Botão -->
						<button 
							id="button-categories"
							class="close_l" 
						>
							<i class="fas fa-shapes"></i>
							Categorias
						</button>
						
						<aside id="menu-categories" class="close_s close_l">
							<nav>
								<ul>
									

									<li id="painel-perfil-resp">
										<? if($authenticated) { ?>
											<div id="with-login-resp">
												<a href="./myaccount.php">
													<img src="img/icons/user.png">
												</a>
												<span>Olá <span><?= $_SESSION['name'] ?></span></span>
												<div>
													<ul>
														<li>
															<a href="./myaccount.php">Minha conta</a>
														</li>
														<li>
															<a href="./myaccount.php?p=pedidos">Pedidos</a>
														</li>
														<li>
															<a href="./cart.php">Meu carrinho</a>
														</li>
														<li>
															<a href="./myaccount.php?p=favoritos">Lista de favoritos</a>
														</li>
														<li>
															<a href="./phpscripts/session_end.php">Logoff</a>
														</li>
													</ul>
												</div>
											</div>
										<? } else { ?>
											<div id="without-login-resp">
												<a href="./access_page.php">
													<img src="img/icons/user.png">
												</a>
												<div>
													<div>
														<span>Novo consumidor?</span>
														<a href="./access_page.php?t=register">Cadastrar-se</a>
													</div>
														
													<div>
														<span>Bem-vindo ao KA TECSHOP</span>
														<a href="./access_page.php?t=login">Login</a>
													</div>
												</div>
											</div>
										<? } ?>
									</li>

									<? foreach($menu as $i => $item) { ?>

										<? if($i != 'e') { ?>
											<li class="categorie-dropdown close_s" id="idmenu<?= $i ?>">
												<a href="./categories.php?m=<?= $i ?>">
													<i class="<?= $diciocategories[$i][1] ?>"></i>
													<?= $diciocategories[$i][0] ?>
												</a>
												<button onclick="_changes.class(['idmenu<?= $i ?>'], 'open_s', 'close_s')">
													<i class="<?= $diciocategories[$i][1] ?>"></i>
													<?= $diciocategories[$i][0] ?>
												</button>
												<div>
													<ul>
														<li>
															<a href="./categories.php?m=<?= $i ?>">VER TUDO</a>
														</li>
													</ul>

													<? foreach($item as $j => $eitem) { ?>
														<ul>
															<?php 
																$totalper = 0;
																foreach($eitem as $qtt) {
																	$totalper += $qtt;
																}
															?>
															<li>
																<a href="./categories.php?m=<?= $i ?>&e=<?= $j ?>">
																	<?= $diciocategories[$j].' ('.$totalper.')' ?>
																</a>
															</li>
															<? foreach($eitem as $brand => $qtt) { ?>
																<li><a href="#"><?= $brand.' ('.$qtt.')' ?></a></li>
															<? } ?>
														</ul>
													<? } ?>
												</div>
											</li>

										<? } else { ?>
											<? foreach($item as $j => $sitem) { ?>
												<li>
													<a href="./categories.php?e=<?= $j ?>">
														<i class="<?= $diciocategories[$j][1] ?>"></i>
														<?= $diciocategories[$j][0] ?>
													</a>
												</li>
											<? } ?>
										<? } ?>

									<? } ?>



								</ul>
							</nav>
						</aside>
					</li>

					<li><a href="#">Home</a></li>
					<li><a href="#">Especiais</a></li>
					<li><a href="#">Contato</a></li>
					<li><a href="#">Sobre nós</a></li>

				</ul>
			</nav>
		</div>
	</div> <!-- Navegação principal -->

</header>
<script src="js/header.js"></script>
