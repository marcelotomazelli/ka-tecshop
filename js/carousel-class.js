class Carousel {
	constructor(ref_items, sWidth, time_interval, view_elements) {
		this.ref_items = document.getElementsByClassName(ref_items)

		// Largura que o slide deve se mover
		this.sWidth = sWidth

		// Quantidade de elemntos que aparecem na tela
		this.view_elements = view_elements

		// Usados no eventos de toque
		this.ipx = 0
		this.mpx = 0
		// ipx => initial positionX
		// mpx => move positionX
		this.bpx = 0
		// bpx => border positionX

		// Usados para controle do movimento
		this.t_current = 0
		this.t_limit = this.sWidth * (this.ref_items.length - this.view_elements + 1)
		// t => translate

		// Usados para controle do intervalo
		this.time_interval = time_interval
		this.interval = this.intervalControl()
	}

	// Metodo que retorne o intevalo
	intervalControl() {
		return setInterval(() => {
			this.autonext()
		}, this.time_interval)
	}

	// Metodo responsavel por percorrer e atualizar os valores, causando o movimento dos items
	moveItems() {
		for(let i = 0; i < this.ref_items.length; i++)
			this.ref_items[i].style.transform = 'translateX(-' + this.t_current + 'px)'
	}

	// Metodo utilizado no botão "proximo >"
	next() {
		clearInterval(this.interval)
		this.t_current += this.sWidth
		
		if(this.t_current == this.t_limit)
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

		for(let i = 0; i < this.ref_items.length; i++)
			this.ref_items[i].style.transition = '0s'

		let body_reference = document.getElementsByTagName('body')[0]
		body_reference.ontouchmove = () => this.move(event)
		body_reference.ontouchend = () => this.stop()
		body_reference.ontouchcancel = () => this.stop()
	}

	// Metodo utilizado no evento de touchmove
	move(moveevent) {
		let t_relative = this.ref_items[0].style.transform
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
			for(let i = 0; i < this.ref_items.length; i++) 
				this.ref_items[i].style.transform = 'translateX(' + -(this.t_current + (-this.mpx))  + 'px)'
		}
	}

	// Metodo utilizado no evento de touchend
	stop() {
		for(let i = 0; i < this.ref_items.length; i++) 
			this.ref_items[i].style.transition = ''

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

		let t_relative = this.ref_items[0].style.transform
		t_relative = t_relative.replace('translateX(', '')
		t_relative = t_relative.replace('px)', '')
		t_relative = parseInt(t_relative) * (-1)
		t_relative += this.sWidth

		if(t_relative > this.t_limit)
			this.t_current = 0
		else if(t_relative < this.sWidth)
			this.t_current = this.t_limit - this.sWidth

		this.moveItems()

		let body_reference = document.getElementsByTagName('body')[0]
		body_reference.ontouchmove = ''
		body_reference.ontouchend = ''
		body_reference.ontouchcancel = ''

		this.interval = this.intervalControl()
	}

	// Metodo responsavel por atualizar os valor no evento de resize
	resizing(N_sWidth, N_view_elements) {
		clearInterval(this.interval)
		this.t_current = 0
		this.moveItems()
		this.sWidth = N_sWidth
		this.view_elements = N_view_elements
		this.t_limit = this.sWidth * (this.ref_items.length - this.view_elements + 1)
		this.interval = this.intervalControl()
	}

	// Metodo que redimenciona os elementos do carousel com visualização de um unico elemento
	static resizeImages(id, items, size = null) {
		let item = document.getElementById(id)
		let w = item.offsetWidth
		let h = w / size
		item.style.height = h + 'px'

		let list = document.getElementsByClassName(items)

		for(let i = 0; i < list.length; i++) {
			list[i].style.width = w + 'px'
			list[i].style.height = h + 'px'
		}
		return w
	}

	// Metodo que redimenciona os elementos do carousel com visualização de um ou mais elementos
	static resizeSlideItem(items, min, max) {
		let list = document.getElementsByClassName(items)
		let w = document.getElementsByClassName('content')[0].offsetWidth

		if(window.innerWidth < min) {
			w /= 2
			w = Math.round(w)
			for(let i = 0; i < list.length; i++)
				list[i].style.minWidth = w + 'px'
		} else if(window.innerWidth >= min && window.innerWidth < max) {
			w /= 3
			w = Math.round(w)
			for(let i = 0; i < list.length; i++)
				list[i].style.minWidth = w + 'px'
		} else {
			for(let i = 0; i < list.length; i++)
				list[i].style = ''
			w = document.getElementsByClassName(items)[0].offsetWidth
			w = Math.round(w)
		}
	
		return w
	}

	// Metodo para atualizar alguns valores no evento de resize devido a não necessidade de ficar redimencioando
	static updValSlideItens(items) {
		let list = document.getElementsByClassName(items)
		let w = document.getElementsByClassName('content')[0].offsetWidth
		
		for(let i = 0; i < list.length; i++)
			list[i].style = ''

		w = document.getElementsByClassName(items)[0].offsetWidth
		return Math.round(w)
	}
}