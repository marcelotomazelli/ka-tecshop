<!--|➖➖  Header  ➖➖|-->
<header>

	<!-- ⏩ ⏩ Banner -->
	<div id="header-banner"> 
		<div class="content">

			<!---\ Logo --->
			<div id="h-brand">
				<a href="index.php">
					<img src="img/brand.png" alt="k a tecshop" />
				</a>
			</div>

			<!---\ Formulario --->
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

				if(1 == rand(1,6)) {
					$items = rand(5,9);
				} else {
					$items = rand(0,4);
				}

				$products = array();

				for($i = 1; $i <= $items; $i++) {

					$first_value = 0;

					if(1 == rand(1,5)) {
						$first_value = rand(7,15999);
					} else {
						$first_value = rand(7,599);
					}

					$product = [
						'id' => rand(1,50),
						'qtd' => rand(1,3),
						'valor' => $first_value.'.'.rand(0,99)
					];

					array_push($products, $product);
				}

				$total = 0.00;

				if($items != 0) {
					foreach($products as $value) {
						$total += ($value['valor'] + 0) * $value['qtd'];
					}
				}

			?>

			<!---\ Painel --->
			<div id="h-panel">

				<!--; Link Carrinho-->
				<div id="div-cart" class="dropdown-panel">

					<a id="link-cart" href="cart.php">
						<div>
							<div id="cart-tittle">
								<span>Carrinho</span>
								<span>
									<?php
										echo 'R$ ';
										if($items != 0) {
											echo str_replace('.', ',', $total);
										} else {
											echo '0,00';
										}
									?>
								</span>
							</div>
							<span id="number-items-cart"><?= $items ?></span>
						</div>
					</a>

					<div id="cart">
						<div id="products-cart">
							<? foreach($products as $value) { ?>
								<table>
									<tr class="product-cart">
										<td><img src="./img_produtos/<?= $value['id']?>/index.jpg" height="60"alt=""></td>
										<td>Teste 1</td>
										<td><?= $value['qtd'] ?>x</td>
										<td>R$ <?= str_replace('.', ',', ($value['valor'] * $value['qtd']))?></td>
										<td>
											<button>
												<i class="fas fa-plus" style="transform: rotateZ(45deg)"></i>
											</button>
										</td>
									</tr>
								</table>
							<? } ?>
						</div>
						<? if($items != 0) { ?>
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
						<? } else { ?>
							<span>Nenhum item no carrinho.</span>
						<? } ?>
					</div>

				</div>

				<!--; Link Favoritos-->
				<a id="favorites" href="./myaccount.php?p=favoritos"></a>

				<!--; Link Perfil-->
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

				<!--; Botao-->
				<button id="button-responsive-menu" class="close_s">
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
				</button>

			</div>

		</div>
	</div>

	<!-- ⏩ ⏩ Navegação principal -->
	<div id="header-navegation">
		<div class="content">
			<nav id="nav-main">
				<ul>
					
 					<!--\ Item categorias -->
					<li id="li-categories">
						
						<!--; Botão -->
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

	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-clock"></i>
											Smartwatch
										</a>
									</li>


	 								<!-- <|Dropdown----------------------------|> -->
									<li class="categorie-dropdown close_s" id="smartphone-ctgr">
										<a href="categories.php?ctgr=sp">
											<i class="fas fa-mobile-alt"></i>
											Smartphone
										</a>
										<button id="button-smartphone-ctgr">
											<i class="fas fa-mobile-alt"></i>
											Smartphone
										</button>
										<div>
											<ul>
												<li>
													<a href="categories.php?ctgr=sp">VER TUDO</a>
												</li>
											</ul>
											<ul>
												<li><a href="#">Android</a></li>
												<li><a href="#">Samsung</a></li>
												<li><a href="#">Motorola</a></li>
												<li><a href="#">Teste</a></li>
												<li><a href="#">Teste</a></li>
											</ul>
											<ul>
												<li><a href="#">IOS</a></li>
												<li><a href="#">iPhone 9</a></li>
												<li><a href="#">Teste</a></li>
												<li><a href="#">Teste</a></li>
												<li><a href="#">Teste</a></li>
											</ul>
										</div>
									</li>


	 								<!-- <|Dropdown----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-laptop"></i>
											Laptops
										</a>
									</li>


									<li class="categorie-dropdown close_s" id="desktop-ctgr">
										<a href="#">
											<i class="fas fa-desktop"></i>
											Desktops
										</a>
										<button id="button-desktop-ctgr">
											<i class="fas fa-desktop"></i>
											Desktops
										</button>
										<div>
											<ul>
												<li>
													<a href="#">VER TUDO</a>
												</li>
											</ul>
											<ul>
												<li><a href="#">PC</a></li>
												<li><a href="#">Positivo</a></li>
												<li><a href="#">Dell</a></li>
												<li><a href="#">Teste</a></li>
												<li><a href="#">Teste</a></li>
												<li><a href="#">Teste</a></li>
											</ul>
											<ul>
												<li><a href="#">Mac</a></li>
												<li><a href="#">Teste</a></li>
												<li><a href="#">Teste</a></li>
											</ul>
										</div>
									</li>


	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-tablet-alt"></i>
											Tablets
										</a>
									</li>


	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-headphones-alt"></i>
											Headphone
										</a>
									</li>


	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-microphone"></i>
											Microphone
										</a>
									</li>


	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-camera"></i>
											Cameras
										</a>
									</li>


	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="far fa-keyboard"></i>
											Teclados
										</a>
									</li>


	 								<!-- <|----------------------------|> -->
									<li>
										<a href="#">
											<i class="fas fa-mouse"></i>
											Mouse
										</a>
									</li>


	 								<!-- <|----------------------------|> -->
									<li class="last-item-aside">
										<a href="#">
											<i class="fas fa-gamepad"></i>
											Consoles
										</a>
									</li>
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
	</div> <!-- ◼ Navegação principal -->

</header>
<script src="js/header.js"></script>