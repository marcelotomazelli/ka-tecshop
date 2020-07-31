/*
Legenda
crsl - carousel
s - slide
si - slide items
*/

let crslObj_intro, crslObj_trend, crslObj_deal
let si_minW = 620
let si_maxW = 768
let current_trend_list = 'destaque'
let time_o
// largura inicial do client
let iw_client

function initialConfig() {
	// Definindo a largura inicial
	iw_client = window.innerWidth

	// Criando as instâncias
	crslObj_intro = new Carousel('SpCarousel-intro', 'carousel-item', 4000)
	crslObj_trend = new Carousel('SpSlide-trend', 'si_trend', 7000)
	crslObj_deal = new Carousel('SpSlide-deal', 'si_deal', 7000)

	sizing()
}

function resizing() {
	// Verifica se o evento foi somente no eixo x
	/* A intenção é evitar o resize em dispositivos moveis quando o evento é disparado 
	ao rolar a tela e a barra superior do proprio navegador esconder */
	clearTimeout(time_o)
	time_o = setTimeout(function() {
		if(iw_client != window.innerWidth) {
			sizing()
		}
	}, 500)
}

function sizing() {
	// Aplicando resize no carousel da intro
	crslObj_intro.sizeImages('carousel-intro', 'carousel-image', 2)

	if(window.innerWidth < si_maxW) {
		// Trabalhando o resize
		crslObj_trend.sizeSlideItem(si_minW, si_maxW, 2, 3)
		crslObj_deal.sizeSlideItem(si_minW, si_maxW, 2, 3)
	} else {
		// Trabalhando o update dos valores, pois não é necessario resize
		crslObj_trend.updValSlideItens()
		crslObj_deal.updValSlideItens()
	}
}

function changeClass(id_elements, new_class, old_class) {
	for(let i = 0; i < id_elements.length; i++) {
		let el = document.getElementById(id_elements[i])
		if(el.className.includes(old_class))
			el.className = el.className.replace(old_class, new_class)
		else 
			el.className = el.className.replace(new_class, old_class)

	}
}

window.onload =  initialConfig

document.getElementById('button-categories').onclick = () => {
	let elements = ['menu-categories', 'section-introduction', 'button-categories']
	changeClass(elements, 'close_l', 'open_l')
	
	setTimeout(() => {
		crslObj_intro.sizeImages('carousel-intro', 'carousel-image', 2)
	}, 750)
}

document.getElementById('button-responsive-menu').onclick = () => {
	let elements = ['menu-categories', 'button-responsive-menu', 'bodyid']
	changeClass(elements, 'open_s', 'close_s')
}

document.getElementById('button-smartphone-ctgr').onclick = () => {
	changeClass(['smartphone-ctgr'], 'open_s', 'close_s')
}


document.getElementById('button-desktop-ctgr').onclick = () => {
	changeClass(['desktop-ctgr'], 'open_s', 'close_s')
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
				let t_list = document.getElementById('SpSlide-trend')
				t_list.style.animationName = 'ajax-trend'
				let h = t_list.offsetHeight
				t_list.style.minHeight = h + 'px'

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


					if(window.innerWidth < 768) {
						crslObj_trend.sizeSlideItem(si_minW, si_maxW, 2, 3)
					} else {
						crslObj_trend.updValSlideItens()
					}

					setTimeout(function() {
						t_list.style.animationName = ''
					},1500)

					t_list.style.height = ''
					current_trend_list = index
				},1500);
			}
		}
		xhttp.send()
	}
}