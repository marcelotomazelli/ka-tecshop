class Carousel {
	constructor(s_element, h_collection, time_interval) {
		this.s_element = document.getElementById(s_element)
		this.h_collection = document.getElementsByClassName(h_collection)
		this.quant_items = this.h_collection.length

		// Largura que o slide deve se mover
		this.sWidth = 0

		// Quantidade de elemntos que aparecem na tela
		this.view_elements = undefined

		// Usados no eventos de toque
		this.ipx = 0
		this.mpx = 0
		// ipx => initial positionX
		// mpx => move positionX

		// Usados para controle do movimento
		this.t_current = 0
		this.t_limit = undefined
		// t => translate

		// Usados para controle do intervalo
		this.time_interval = time_interval
		this.interval = this.intervalControl()


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
		this.t_current += this.sWidth

		console.log(this.t_current + ' | ' + this.t_limit)
		if(this.t_current >= this.t_limit)
			this.t_current = 0

		this.moveItems()
		this.interval = this.intervalControl()
	}

	// Metodo utilizado no batão "anterior <"
	prev() {
		clearInterval(this.interval)
		this.t_current -= this.sWidth

		if(this.t_current == -this.sWidth)
			this.t_current = this.t_limit - this.sWidth

		this.moveItems()
		this.interval = this.intervalControl()
	}

	// Metodo utilizado no intervalo para os elementos se moverem sozinhos
	autonext() {
		this.t_current += this.sWidth
		
		if(this.t_current >= this.t_limit)
			this.t_current = 0

		this.t_current 
		this.moveItems()
	}

	// Metodo utilizado no evento de touchstart
	touch(downevent) {
		clearInterval(this.interval)
		this.ipx = downevent.touches[0].clientX
		this.mpx = 0

		this.s_element.style.transition = '0s'

		document.ontouchmove = () => this.move(event)
		document.ontouchend = () => this.stop()
		document.ontouchcancel = () => this.stop()
	}

	// Metodo utilizado no evento de touchmove
	move(moveevent) {
		let t_relative = this.s_element.style.transform
		if(t_relative != '') {
			t_relative = t_relative.replace('translateX(', '')
			t_relative = t_relative.replace('px)', '')
			t_relative = parseInt(t_relative) * (-1)
			t_relative += this.sWidth
		} else {
			t_relative = this.sWidth
		}

		let m_permition
		let p_exception

		if(t_relative > this.sWidth - 50 && t_relative < this.t_limit + 50) {
			m_permition = true
		} else if(t_relative <= this.sWidth - 50) {
			p_exception = this.ipx + 50
			if(event.touches[0].clientX < p_exception) 
				m_permition = true
		} else if(t_relative >= this.t_limit + 50) {
			p_exception = this.ipx - 50
			if(event.touches[0].clientX > p_exception)
				m_permition = true
		}


		if(m_permition) {
			this.mpx = event.touches[0].clientX - this.ipx
			this.s_element.style.transform = 'translateX(' + -(this.t_current + (-this.mpx))  + 'px)'
		}
	}

	// Metodo utilizado no evento de touchend
	stop() {
		this.s_element.style.transition = ''

		let a = this.mpx % this.sWidth
		let b = this.sWidth / 2

		this.mpx -= a
		this.mpx /= this.sWidth

		if(a < 0) {
			a *= -1
			if(a >= b)
				this.mpx--
		} else if(a > 0) {
			if(a >= b)
				this.mpx++
		}

		if(this.mpx > 0)
			this.t_current -= this.sWidth * this.mpx
		else
			this.t_current += this.sWidth * (-this.mpx)

		let t_relative = this.s_element.style.transform
		t_relative = t_relative.replace('translateX(', '')
		t_relative = t_relative.replace('px)', '')
		t_relative = parseInt(t_relative) * (-1)
		t_relative += this.sWidth

		if(t_relative > this.t_limit)
			this.t_current = 0
		else if(t_relative < this.sWidth)
			this.t_current = this.t_limit - this.sWidth

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
		this.sWidth = w
		if(t == 'i') {
			this.view_elements = 1
		} else {
			this.view_elements = content_width / this.sWidth
			if(!Number.isInteger(this.view_elements)) {
				this.view_elements = Math.round(this.view_elements)
			}
		}
		this.t_limit = this.sWidth * (this.quant_items - this.view_elements + 1)
		console.log(this.view_elements)
		this.moveItems()
		this.interval = this.intervalControl()
	}

	// Metodo que redimenciona os elementos do carousel com visualização de um unico elemento
	sizeImages(id, items, size = null) {
		let item = document.getElementById(id)
		let w = item.offsetWidth
		let h = w / size
		item.style.maxHeight = h + 'px'

		let list = document.getElementsByClassName(items)

		for(let i = 0; i < list.length; i++) {
			list[i].style.width = w + 'px'
			list[i].style.height = h + 'px'
		}
		
		this.sizing(w, 'i')
	}

	// Metodo que redimenciona os elementos do carousel com visualização de um ou mais elementos
	sizeSlideItem(min, max, view1, view2) {
		let list = this.h_collection
		let w = this.refWidth_to_Cal.offsetWidth

		let wWidth = window.innerWidth

		let result
		if(wWidth < max) {
			if(wWidth < min) {
				w /= view1
			} else if(wWidth >= min && wWidth < max) {
				w /= view2
			}
			result = w + 'px'
		} else {
			w = this.h_collection.offsetWidth
			result = ''
		}

		for(let i = 0; i < list.length; i++)
			list[i].style.minWidth = result

		if(!Number.isInteger(w)) {
			w = Math.round(w)
		}

		this.sizing(w, 'si')
	}

	// Metodo para atualizar alguns valores no evento de resize devido a não necessidade de ficar redimencioando
	updValSlideItens() {
		for(let i = 0; i < this.quant_items; i++)
			this.h_collection[i].style.minWidth = ''

		this.sizing(this.h_collection[0].offsetWidth, 'si')
	}
}