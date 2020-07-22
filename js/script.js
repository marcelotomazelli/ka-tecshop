/*
Legenda
crsl - carousel
s - slide
si - slide items
*/

let crslObj_intro, crslObj_trend, crslObj_deal

// largura inicial do client
let iw_client

function onloadBody() {
	// Definindo a largura inicial
	iw_client = window.innerWidth

	// Trabalhando a proporção do carousel da intro
	let crslWidth_intro = Carousel.resizeImages('carousel-intro', 'carousel-image', 2)

	// Se a largura do client for menor que 768 ele vai trabalhar com o tamanho dos slide items
	let sWidth_trend = Carousel.resizeSlideItem('si_trend', 620, 768)
	let slWidth_deal = Carousel.resizeSlideItem('si_deal', 620, 768)

	// Definindo a quantidade de elementos que aparecem na tela
	let content_width = document.getElementsByClassName('content')[0].offsetWidth
	let view_elements = Math.round(content_width / sWidth_trend)

	// Criando as instâncias
	crslObj_intro = new Carousel('carousel-item', crslWidth_intro, 4000, 1)
	crslObj_trend = new Carousel('si_trend', sWidth_trend, 7000, view_elements)
	crslObj_deal = new Carousel('si_deal', slWidth_deal, 7000, view_elements)
}

function resizingWindow() {
	// Verifica se o evento foi somente no eixo x
	/* A intenção é evitar o resize em dispositivos moveis quando o evento é disparado 
	ao rolar a tela e a barra superior do proprio navegador esconder */ 
	if(iw_client != window.innerWidth) {
		// Aplicando resize no carousel da intro
		let crslWidth_intro = Carousel.resizeImages('carousel-intro', 'carousel-image', 2)
		crslObj_intro.resizing(crslWidth_intro, 1)

		// Pegando largura do content
		let slide_content = document.getElementsByClassName('content')[0].offsetWidth

		// Definindo variveis que serão usados em ambas as condições
		let siWidth_trend, siWidth_deal

		if(window.innerWidth < 768) {
			// Trabalhando o resize
			siWidth_trend = Carousel.resizeSlideItem('si_trend', 620, 768)
			siWidth_deal = Carousel.resizeSlideItem('si_deal', 620, 768)
		} else {
			// Trabalhando o update dos valores, pois não é necessario resize
			siWidth_trend = Carousel.updValSlideItens('si_trend')
			siWidth_deal = Carousel.updValSlideItens('si_deal')
		}

		// Definindo a quantidade de elementos que aparecem na tela
		let view_elements = Math.round(slide_content / siWidth_trend)

		crslObj_trend.resizing(siWidth_trend, view_elements)
		crslObj_deal.resizing(siWidth_deal, view_elements)
	}
}

// Função para mudança de visulização na interação com o menu de categorias
function categoriesMenu() {
	setTimeout(function() {
		let crslWidth_intro = Carousel.resizeImages('carousel-intro', 'carousel-image', 2)
		crslObj_intro.resizing(crslWidth_intro, 1)
	}, 1000)	
}

function changeClass(id_elements, new_class, old_class) {
	for(let i = 0; i < id_elements.length; i++) {
		let el = document.getElementById(id_elements[i])
		if(el.className == old_class) {
			el.className = new_class
		} else {
			el.className = old_class
		}
	}
}