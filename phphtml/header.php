<?php
	require "./php/authentication_control.php";
?>
<link rel="stylesheet" type="text/css" href="css/header-footer.css">
<!--|➖➖  Header  ➖➖|-->
<header>

	<!-- ⏩ ⏩ Banner -->
	<div id="header-banner"> 
		<div class="content">

			<!---\ Logo --->
			<div id="h-brand">
				<img src="img/brand.png" alt="k a tecshop" />
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

			<!---\ Painel --->
			<div id="h-panel">
				<!--; Link Carrinho-->
				<a id="cart" href="#"></a>

				<!--; Link Favoritos-->
				<a id="favorites" href="#"></a>

				<!--; Link Perfil-->
				<div id="div-login">

					<a id="link-profile" href="./access_page.php">
					</a>
					
					<? if($authenticated) { ?>
						<div id="with-login">
							<span>Olá <span><?= $_SESSION['name'] ?></span></span>
							<ul>
								<li>
									<a href="#">Minha conta</a>
								</li>
								<li>
									<a href="#">Histórico</a>
								</li>
								<li>
									<a href="#">Meu carrinho</a>
								</li>
								<li>
									<a href="#">Lista de favoritos</a>
								</li>
								<li>
									<a href="./php/session_end.php">Logoff</a>
								</li>
							</ul>
						</div>
					<? } else { ?>
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
							class="open_l" 
						>
							<i class="fas fa-shapes"></i>
							Categorias
						</button>
						
						<aside id="menu-categories" class="close_s open_l">
							<nav>
								<ul>
									

									<li id="painel-perfil-resp">
										<? if($authenticated) { ?>
											<div id="with-login-resp">
												<a href="#">
													<img src="img/icons/user.png">
												</a>
												<span>Olá <span><?= $_SESSION['name'] ?></span></span>
												<div>
													<ul>
														<li>
															<a href="#">Minha conta</a>
														</li>
														<li>
															<a href="#">Histórico</a>
														</li>
														<li>
															<a href="#">Meu carrinho</a>
														</li>
														<li>
															<a href="#">Lista de favoritos</a>
														</li>
														<li>
															<a href="./php/session_end.php">Logoff</a>
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
										<a href="#">
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
													<a href="#">VER TUDO</a>
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

