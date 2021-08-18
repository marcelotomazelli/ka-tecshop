class Carousel {
	constructor(name, time_interval) {
		this.s_element = document.getElementById('S' + name)
		this.collection = document.getElementsByClassName('I' + name)
		// 'S' => super
		// 'I' => items

		this.quant_items = this.collection.length

		// Largura que o slide deve se mover
		this.s_width = 0

		// Quantidade de elemntos que aparecem na tela
		this.view_elements = undefined

		// Usados no eventos de toque
		this.ipx = 0
		this.mpx = 0
		this.rpx = 0
		// ipx => initial positionX
		// mpx => move positionX

		// Usados para controle do movimento
		this.t_current = 0
		this.auxt_current = 0
		this.t_limit = 0
		this.t_relative = 0
		// t => translate

		// Usados para controle do intervalo
		this.time_interval = time_interval
		this.interval = this.intervalControl()

		this.interactions = [(name + 't'), (name + 'p'), (name + 'n')]

		this.interactions.forEach((id, i) => {
			let el = document.getElementById(id)

			if (i === 0)
				el.ontouchstart = () => this.touch(event)
			else if (i === 1)
				el.onclick = () => this.prev()
			else if (i === 2)
				el.onclick = () => this.next()

		})

		this.refWidth_to_Cal = document.getElementsByClassName('content')[0]
	}

	// Metodo que retorne o intevalo
	intervalControl() {
		return setInterval(() => {
			this.autonext()
		}, this.time_interval)
	}

	// Metodo responsavel por percorrer e atualizar os valores, causando o movimento dos items
	moveItems() {
		this.s_element.style.transform = 'translateX(-' + this.t_current + 'px)'
	}

	// Metodo utilizado no botão "proximo >"
	next() {
		clearInterval(this.interval)
		this.t_current += this.s_width

		if (this.t_current >= this.t_limit)
			this.t_current = 0

		this.moveItems()
		this.interval = this.intervalControl()
	}

	// Metodo utilizado no batão "anterior <"
	prev() {
		clearInterval(this.interval)
		this.t_current -= this.s_width

		if (this.t_current == -this.s_width)
			this.t_current = this.t_limit - this.s_width

		this.moveItems()
		this.interval = this.intervalControl()
	}

	// Metodo utilizado no intervalo para os elementos se moverem sozinhos
	autonext() {
		this.t_current += this.s_width

		if (this.t_current >= this.t_limit)
			this.t_current = 0

		this.t_current
		this.moveItems()
	}

	// Metodo utilizado no evento de touchstart
	touch(downevent) {
		clearInterval(this.interval)
		this.auxt_current = this.t_current
		this.ipx = Math.round(downevent.touches[0].clientX)
		this.mpx = 0
		this.t_relative = 0
		this.s_element.style.transition = '0s'

		document.ontouchmove = () => this.move(event)
		document.ontouchend = () => this.stop()
		document.ontouchcancel = () => this.stop()
	}

	// Metodo utilizado no evento de touchmove
	move(moveevent) {
		let permition = true

		this.mpx = Math.round(event.touches[0].clientX) - this.ipx

		if (this.t_relative > (this.t_limit - this.s_width) + 50) {
			permition = false
			this.rpx = Math.round(event.touches[0].clientX)
			if (this.rpx < this.ipx) {
				this.ipx = Math.round(event.touches[0].clientX)
			} else {
				this.auxt_current = this.t_relative
				permition = true
			}
		}

		if (this.t_relative < -50) {
			permition = false
			this.rpx = Math.round(event.touches[0].clientX)
			if (this.rpx > this.ipx) {
				this.ipx = Math.round(event.touches[0].clientX)
			} else {
				this.auxt_current = this.t_relative
				permition = true
			}
		}

		if (permition) {
			this.t_relative = this.auxt_current - this.mpx
			this.s_element.style.transform = 'translateX(' + -this.t_relative + 'px)'
		}
	}

	// Metodo utilizado no evento de touchend
	stop() {
		this.s_element.style.transition = ''

		let a = Math.round(this.t_relative) % this.s_width

		if (this.t_relative > (this.t_limit - this.s_width)) {
			this.t_current = 0
		} else if (this.t_relative < 0) {
			this.t_current = this.t_limit - this.s_width
		} else {
			this.t_relative = this.t_relative - a

			if (a > this.s_width / 3) {
				this.t_relative += this.s_width
			}

			this.t_current = this.t_relative
		}

		this.moveItems()

		document.ontouchmove = null
		document.ontouchend = null
		document.ontouchcancel = null

		this.interval = this.intervalControl()
	}

	// Metodo responsavel por atualizar os valor no evento de resize
	sizing(w, t) {
		clearInterval(this.interval)

		let content_width = this.refWidth_to_Cal.offsetWidth
		this.t_current = 0
		this.s_width = w
		if (t == 'i') {
			this.view_elements = 1
		} else {
			this.view_elements = content_width / this.s_width
			if (!Number.isInteger(this.view_elements)) {
				this.view_elements = Math.round(this.view_elements)
			}
		}
		this.t_limit = this.s_width * (this.quant_items - this.view_elements + 1)
		this.moveItems()
		this.interval = this.intervalControl()
	}

	// Metodo que redimenciona os elementos do carousel com visualização de um unico elemento
	sizeAnItem(id, items, size = null) {
		let item = document.getElementById(id)
		let w = item.offsetWidth
		let h = w / size
		item.style.maxHeight = h + 'px'

		let list = document.getElementsByClassName(items)

		for (let i = 0; i < list.length; i++) {
			list[i].style.width = w + 'px'
			list[i].style.height = h + 'px'
		}

		this.sizing(w, 'i')
	}

	// Metodo que redimenciona os elementos do carousel com visualização de um ou mais elementos
	sizeSeveralItems(min, max, view1, view2) {
		let list = this.collection
		let w = this.refWidth_to_Cal.offsetWidth

		let wWidth = window.innerWidth

		let result
		if (wWidth < max) {
			if (wWidth < min) {
				w /= view1
			} else if (wWidth >= min && wWidth < max) {
				w /= view2
			}
			result = w + 'px'
		} else {
			w = this.collection.offsetWidth
			result = ''
		}

		for (let i = 0; i < list.length; i++)
			list[i].style.minWidth = result

		if (!Number.isInteger(w)) {
			w = Math.round(w)
		}

		this.sizing(w, 'si')
	}

	// Metodo para atualizar alguns valores no evento de resize devido a não necessidade de ficar redimencioando
	updSeveralItems() {
		for (let i = 0; i < this.quant_items; i++)
			this.collection[i].style.minWidth = ''

		this.sizing(this.collection[0].offsetWidth, 'si')
	}
}