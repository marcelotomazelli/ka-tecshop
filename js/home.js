/*
==== Legenda ====

crsl - carousel
si - several items

*/

// Criando as instâncias
const _crslIntro = new Carousel('intro', 4000)
const _crslTrend = new Carousel('trend', 7000)
const _crslDeal = new Carousel('deal', 7000)

// objeto responsavel por funções do carousel no home
const _carousel = {
	sizing: () => {
		// Aplicando resize no carousel da intro
		_crslIntro.sizeAnItem('carousel-intro', 'anitem-image', 2)

		if (window.innerWidth < si_maxW) {
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

const _ajaxTrend = {
	execute: (result) => {
		const content = document.getElementById('Strend')
		let h = content.offsetHeight

		content.style.animationName = 'ajax-trend'
		content.style.minHeight = h + 'px'

		setTimeout(function () {
			content.innerHTML = '';

			result.forEach((obj, i) => {
				if (i < (result.length - 1)) {
					let item = document.createElement('div')
					item.className = 'severalitems Itrend'

					let divp = document.createElement('div')

					let div1 = document.createElement('div')
					let div2 = document.createElement('div')
					let div3 = document.createElement('div')

					let aimg = document.createElement('a')
					aimg.href = '#'
					let img = document.createElement('img')
					img.src = `img_produtos/${obj.id}/index.jpg`
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

					let buttonlast = document.createElement('button')
					buttonlast.id = `id${obj.id}`
					buttonlast.className = 'addcart'
					buttonlast.innerHTML = 'Adicionar ao carrinho'

					div3.appendChild(buttonlast)

					divp.appendChild(div1)
					divp.appendChild(div2)
					divp.appendChild(div3)

					item.appendChild(divp)

					content.appendChild(item)
				}
			})


			if (window.innerWidth < 768) {
				_crslTrend.sizeSeveralItems(si_minW, si_maxW, 2, 3)
			} else {
				_crslTrend.updSeveralItems()
			}

			setTimeout(function () {
				content.style.animationName = ''
			}, 1500)

			content.style.height = ''
			ctrend = result[(result.length - 1)]

			let active = document.querySelector(`.several-controls > div + div ul > li button.active`)
			active.className = ''

			document.getElementById(`req${ctrend.charAt(0)}`).className = 'active'

			_ajaxTrend.definitions()
			_changes.products()
		}, 1500);
	},
	condition: (info) => {
		if (info[2] != info[3])
			return true
		else
			return false
	},
	definitions: () => {
		let btns_trend = ['destaque', 'bestseller', 'ultimos']

		btns_trend.forEach((nindex) => {
			let directory = `../phpscripts/scriptIndex.php?i=${nindex}`
			let id = 'req' + nindex.replace((nindex.slice(1, nindex.length)), '')
			let el = document.getElementById(id)

			let info = [directory, _ajaxTrend, nindex, ctrend]

			el.onclick = () => _ajax.requisition(info)
		})
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

	_ajaxTrend.definitions()
}

// Verifica se o evento foi somente no eixo x
/* A intenção é evitar o resize em dispositivos moveis quando o evento é disparado 
ao rolar a tela e a barra superior do proprio navegador esconder */
window.onresize = () => {
	clearTimeout(retime)
	retime = setTimeout(() => {
		if (iw_client != window.innerWidth) {
			_carousel.sizing()
		}
	}, 600)
}

// Sobreescreve o definido no header.js, pois no caso da home algumas diferenças no layout
document.getElementById('button-categories').onclick = () => {
	let elements = ['menu-categories', 'section-introduction', 'button-categories']
	_changes.class(elements, 'close_l', 'open_l')

	setTimeout(() => {
		_crslIntro.sizeAnItem('carousel-intro', 'anitem-image', 2)
	}, 750)
}