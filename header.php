<!-- ➖➖➖➖➖➖  PARTE DO HEADER  ➖➖➖➖➖➖ -->
<header>
	<div id="header-banner"> <!-- ⏩ Banner -->

		<div class="content">

			<!---\ Logo /--->
			<div id="h-brand">
				<img src="img/brand.png" alt="k a tecshop" />
			</div>

			<!---\ Formulario /--->
			<div id="h-search">
				<form>
					<select id="">
						<option value="all">Todas as categorias</option>
						<option value="#">Teste</option>
						<option value="#">Teste</option>
						<option value="#">Teste</option>
					</select>
					<input type="text" placeholder="Digite aqui sua pesquisa..." />
					<button><i class="fas fa-search"></i></button>
				</form>
			</div>

			<!---\ Painel /--->
			<div id="h-panel">
				<!--Link Carrinho-->
				<a id="cart" href="#"></a>

				<!--Link Favoritos-->
				<a id="favorites" href="#"></a>

				<!--Link Perfil-->
				<a id="link-profile" href="#"></a>

				<!--Botao-->
				<button 
				   id="button-responsive-menu"
				   onclick="changeClass([
							   	'menu-categories_resp',
							   	'button-responsive-menu',
							   	'bodyid'
							   ], 'open', '')">
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
				</button>

			</div>
		</div>
	</div> <!-- ◼ Banner -->

	<div id="header-navegation"> <!-- ⏩ Navegação principal -->
		<div class="content">
			<nav id="nav-main">
				<ul>
					<li id="menu-categories" class="close">
						<button 
							id="button-categories" 
							onclick="changeClass([
											'menu-categories', 
											'section-introduction'
										], 'open', 'close');
										categoriesMenu()">
							<i class="fas fa-shapes"></i>
							Categorias
						</button>
						<nav>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-clock"></i>
										Smartwatch
									</a>
								</li>
								<li class="catedorie-dropdown">
									<a href="#">
										<i class="fas fa-mobile-alt"></i>
										Smartphone
									</a>
									<div>
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
								<li>
									<a href="#">
										<i class="fas fa-laptop"></i>
										Laptops
									</a>
								</li>
								<li class="catedorie-dropdown">
									<a href="#">
										<i class="fas fa-desktop"></i>
										Desktops
									</a>
									<div>
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
								<li>
									<a href="#">
										<i class="fas fa-tablet-alt"></i>
										Tablets
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-headphones-alt"></i>
										Headphone
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-microphone"></i>
										Microphone
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-camera"></i>
										Cameras
									</a>
								</li>
								<li>
									<a href="#">
										<i class="far fa-keyboard"></i>
										Teclados
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-mouse"></i>
										Mouse
									</a>
								</li>
								<li class="last-item-aside">
									<a href="#">
										<i class="fas fa-gamepad"></i>
										Videogame
									</a>
								</li>
							</ul>
						</nav>
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
<!-- ➖➖➖➖➖➖  PARTE DO HEADER  ➖➖➖➖➖➖ -->








<!-- ⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡⚡ -->







<!-- ➖➖➖➖➖➖  ASIDE  ➖➖➖➖➖➖ -->
<aside id="menu-categories_resp"> <!-- ⏩ Menu categorias -->
 	<nav>
 		<ul>
 			<li>
 				<a href="#">
 					<i class="fas fa-clock"></i>
 					Smartwatch
 				</a>
 			</li>
 			<li class="catedorie-dropdown">
 				<button href="#" onclick="changeClass(['smartphone-categories'], 'open', '')">
 					<i class="fas fa-mobile-alt"></i>
 					Smartphone
 				</button>
 				<div id="smartphone-categories">
 					<ul>
						<li><a href="#">VER TODOS</a></li>
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
 			<li>
 				<a href="#">
 					<i class="fas fa-laptop"></i>
 					Laptops
 				</a>
 			</li>
 			<li class="catedorie-dropdown">
 				<button href="#" onclick="changeClass(['desktops-categories'], 'open', '')">
 					<i class="fas fa-desktop"></i>
 					Desktops
 				</button>
 				<div id="desktops-categories">
 					<ul>
						<li><a href="#">VER TODOS</a></li>
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
 			<li>
 				<a href="#">
 					<i class="fas fa-tablet-alt"></i>
 					Tablets
 				</a>
 			</li>
 			<li>
 				<a href="#">
 					<i class="fas fa-headphones-alt"></i>
 					Headphone
 				</a>
 			</li>
 			<li>
 				<a href="#">
 					<i class="fas fa-microphone"></i>
 					Microphone
 				</a>
 			</li>
 			<li>
 				<a href="#">
 					<i class="fas fa-camera"></i>
 					Cameras
 				</a>
 			</li>
 			<li>
 				<a href="#">
 					<i class="far fa-keyboard"></i>
 					Teclados
 				</a>
 			</li>
 			<li>
 				<a href="#">
 					<i class="fas fa-mouse"></i>
 					Mouse
 				</a>
 			</li>
 			<li class="last-item-aside">
 				<a href="#">
 					<i class="fas fa-gamepad"></i>
 					Videogame
 				</a>
 			</li>
 		</ul>
 	</nav>
</aside> <!-- ◼ Navegação principal -->
<!-- ➖➖➖➖➖➖  ASIDE  ➖➖➖➖➖➖ -->