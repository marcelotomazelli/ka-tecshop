/*
==== Legenda ====

crsl - carousel
si - several items

*/

// Criando as instâncias
const _crslIntro = new Carousel('intro', 4000)
const _crslTrend = new Carousel('trend', 7000)
const _crslDeal = new Carousel('deal', 7000)

const _carousel = {
	sizing: () => {
		// Aplicando resize no carousel da intro
		_crslIntro.sizeAnItem('carousel-intro', 'anitem-image', 2)

		if(window.innerWidth < si_maxW) {
			// Trabalhando o resize
			_crslTrend.sizeSeveralItems(si_minW, si_maxW, 2, 3)
			_crslDeal.sizeSeveralItems(si_minW, si_maxW, 2, 3)
		} else {
			// Trabalhando o update dos valores, pois não é necessario resize
			_crslTrend.updSeveralItems()
			_crslDeal.updSeveralItems()
		}
	}
}

const _ajax = {
	requisition: (new_index, current_index, _instance) => {
		if(new_index != current_index) {
			let xhttp = new XMLHttpRequest();
			xhttp.open('POST', `../phpscripts/index_request.php?i=${new_index}`, true)
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					let json_result = JSON.parse(this.responseText)
					_instance.execute(json_result, new_index)
				}
			}
			xhttp.send()
		}
	}
}

const _ajaxTrend = {
	execute: (json_result, new_index) => {
		const content = document.getElementById('Strend')
		let h = content.offsetHeight

		content.style.animationName = 'ajax-trend'
		content.style.minHeight = h + 'px'

		setTimeout(function() {
			content.innerHTML = '';

			json_result.forEach((obj) => {
				let item = document.createElement('div')
				item.className = 'severalitems Itrend'

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

				content.appendChild(item)
			})


			if(window.innerWidth < 768) {
				_crslTrend.sizeSeveralItems(si_minW, si_maxW, 2, 3)
			} else {
				_crslTrend.updSeveralItems()
			}

			setTimeout(function() {
				content.style.animationName = ''
			},1500)

			content.style.height = ''
			ctrend = new_index
		},1500);
	}
}

let si_minW, si_maxW, ctrend
let retime
// largura inicial do client
let iw_client

window.onload = () => {
	// Definindo a largura inicial
	iw_client = window.innerWidth
	si_minW = 620
	si_maxW = 768
	ctrend = 'destaque'

	/* 
	Para o carousel todos os ids e class tem um mesmo nome em comum
	que será utilizado no construct para fazer as 
	devidas referencias a elementos,
	devem estar corretamente nomeados no html
	*/ 

	_carousel.sizing()

	let elements = ['menu-categories', 'section-introduction', 'button-categories']
	_changes.class(elements, 'close_l', 'open_l')
	
	setTimeout(() => {
		_crslIntro.sizeAnItem('carousel-intro', 'anitem-image', 2)
	}, 750)

	_ajax.requisition('destaque', ctrend, _ajaxTrend)
}

// Verifica se o evento foi somente no eixo x
/* A intenção é evitar o resize em dispositivos moveis quando o evento é disparado 
ao rolar a tela e a barra superior do proprio navegador esconder */
window.onresize = () => {
	clearTimeout(retime)
	retime = setTimeout(() => {
		if(iw_client != window.innerWidth) {
			_carousel.sizing()
		}
	}, 500)
}

// Sobreescreve o definido no header.js, pois no caso da home algumas diferenças no layout
document.getElementById('button-categories').onclick = () => {
	let elements = ['menu-categories', 'section-introduction', 'button-categories']
	_changes.class(elements, 'close_l', 'open_l')

	setTimeout(() => {
		_crslIntro.sizeAnItem('carousel-intro', 'anitem-image', 2)
	}, 750)
}

const btns_trend = ['destaque', 'bestseller', 'ultimos']

btns_trend.forEach((value) => {
	let id = 'req' + value.replace((value.slice(1, value.length)), '')
	let el = document.getElementById(id)
	el.onclick = () => _ajax.requisition(value, ctrend, _ajaxTrend)
})