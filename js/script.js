/*
Legenda
crsl - carousel
s - slide
si - slide items
*/

let crslObj_intro, crslObj_trend, crslObj_deal
let current_trend_list = 'destaque'

// largura inicial do client
let iw_client

function onloadBody() {
	// Definindo a largura inicial
	iw_client = window.innerWidth

	// Trabalhando a proporção do carousel da intro
	let crslWidth_intro = Carousel.resizeImages('carousel-intro', 'carousel-image', 2)

	// Se a largura do client for menor que 768 ele vai trabalhar com o tamanho dos slide items
	let sWidth_trend = Carousel.resizeSlideItem('si_trend', 400, 620, 768, 2, 2, 3)
	let slWidth_deal = Carousel.resizeSlideItem('si_deal', 400, 620, 768, 1, 2, 3)

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
			siWidth_trend = Carousel.resizeSlideItem('si_trend', 370, 620, 768, 2, 2, 3)
			siWidth_deal = Carousel.resizeSlideItem('si_deal', 370, 620, 768, 1, 2, 3)
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

// Função responsavel por fazer as requisições da seção das tendencias
function requisitionAjax(index) {
	if(index != current_trend_list) {
		let xhttp = new XMLHttpRequest();
		let list
		xhttp.open('POST', `../php/request_index.php?i=${index}`, true)
		xhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				list = JSON.parse(this.responseText)
				let t_list = document.getElementById('si-trend-content')
				let h = t_list.offsetHeight
				t_list.style.minHeight = h + 'px'

				let old_items = document.getElementsByClassName('si_trend')
				for(let i = 0; i < old_items.length; i++)
					old_items[i].style.opacity = 0

				setTimeout(function() {
					t_list.innerHTML = '';

					list.forEach((obj) => {
						let item = document.createElement('div')
						item.className = 'slide_items si_trend create'

						let divp = document.createElement('div')

						let div1 = document.createElement('div')
						let div2 = document.createElement('div')
						let div3 = document.createElement('div')

						let aimg = document.createElement('a')
						aimg.href = '#'
						let img = document.createElement('img')
						img.src = `img_produtos/${obj.id_produto}/index.jpg`
						aimg.appendChild(img)

						let div1_2 = document.createElement('div')
						let aheart = document.createElement('a')
						aheart.href = '#'
						let i = document.createElement('i')
						i.className = 'fas fa-heart'

						aheart.appendChild(i)
						div1_2.appendChild(aheart)
						div1.appendChild(aimg)
						div1.appendChild(div1_2)

						let h2 = document.createElement('h2')
						let h2a = document.createElement('a')
						h2a.href = '#'
						h2a.innerHTML = obj.nome_curto

						h2.appendChild(h2a)

						let h3 = document.createElement('h3')
						h3.innerHTML = 'R$ ' + obj.valor.replace('.', ',')

						div2.appendChild(h2)
						div2.appendChild(h3)

						let alast = document.createElement('a')
						alast.href = '#'
						alast.innerHTML = 'Adicionar ao carrinho'

						div3.appendChild(alast)

						divp.appendChild(div1)
						divp.appendChild(div2)
						divp.appendChild(div3)

						item.appendChild(divp)

						t_list.appendChild(item)
					})

					setTimeout(function() {
						let new_items = document.getElementsByClassName('si_trend')
						for(let i = 0; i < old_items.length; i++)
							new_items[i].style.opacity = 1
					}, 500)

					let slide_content = document.getElementsByClassName('content')[0].offsetWidth
					let siWidth_trend

					if(window.innerWidth < 768) {
						siWidth_trend = Carousel.resizeSlideItem('si_trend', 370, 620, 768, 2, 2, 3)
					} else {
						siWidth_trend = Carousel.updValSlideItens('si_trend')
					}

					// Definindo a quantidade de elementos que aparecem na tela
					let view_elements = Math.round(slide_content / siWidth_trend)

					crslObj_trend.resizing(siWidth_trend, view_elements)

					t_list.style.height = ''
					current_trend_list = index
				},1000);
			}
		}
		xhttp.send()
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

/*setTimeout(function() {
	console.log(document.getElementById('section-trending').offsetHeight)
}, 5000)*/


