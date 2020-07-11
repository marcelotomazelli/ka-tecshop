class Carousel {

	constructor(reference_items, carousel_slide_width, time_interval, last_visible_elements) {
		this.reference_items = document.getElementsByClassName(reference_items)
		this.carousel_slide_count = 0
		this.carousel_slide_width = carousel_slide_width
		this.time_interval = time_interval
		this.interval = this.intervalControl(this.time_interval)
		this.last_visible_elements = last_visible_elements
		this.last_traslate_possible = this.carousel_slide_width * (this.reference_items.length - this.last_visible_elements + 1)
		this.movePermition = false
		this.position_move_relative = 0
		this.ipx = 0
	}

	intervalControl(time) {
		return setInterval(() => {
			this.autonext()
		}, time)
	}

	moveItems() {
		for(let i = 0; i < this.reference_items.length; i++) {
			this.reference_items[i].style.transform = 'translateX(-' + this.carousel_slide_count + 'px)'
		}
	}

	next() {
		clearInterval(this.interval)
		this.carousel_slide_count += this.carousel_slide_width

		if(this.carousel_slide_count == this.last_traslate_possible) {
			this.carousel_slide_count = 0
		}
		this.moveItems()
		this.interval = this.intervalControl(this.time_interval)
	}

	prev() {
		clearInterval(this.interval)
		if(this.carousel_slide_count == 0) {
			this.carousel_slide_count = this.carousel_slide_width * (this.reference_items.length - this.last_visible_elements)
		} else {
			this.carousel_slide_count -= this.carousel_slide_width
		}
		this.moveItems()
		this.interval = this.intervalControl(this.time_interval)
	}

	autonext() {
		this.carousel_slide_count += this.carousel_slide_width
		let aux = this.carousel_slide_width * (this.reference_items.length - this.last_visible_elements + 1)
		
		if(this.carousel_slide_count >= aux) {
			this.carousel_slide_count = 0
		}
		this.moveItems()

	}

	resizing(new_carousel_slide_width, new_last_visible_elements) {
		clearInterval(this.interval)
		this.carousel_slide_count = 0
		this.moveItems()
		this.carousel_slide_width = new_carousel_slide_width
		this.last_visible_elements = new_last_visible_elements
		this.last_traslate_possible = this.carousel_slide_width * (this.reference_items.length - this.last_visible_elements + 1)
		this.interval = this.intervalControl(this.time_interval)
	}

	down(obj) {
		clearInterval(this.interval)
		this.ipx = event.clientX
		this.position_move_relative = 0
		this.movePermition = true
		for(let i = 0; i < this.reference_items.length; i++) {
			this.reference_items[i].style.transition = '0s'
		}
		let body_reference = document.getElementsByTagName('body')[0]
		body_reference.onmousemove = () => this.move()
		body_reference.onmouseup = () => this.stop()
		body_reference.onmouseleave = () => this.stop()
	}

	stop() {
		this.movePermition = false
		for(let i = 0; i < this.reference_items.length; i++) {
			this.reference_items[i].style.transition = ''
		}

		let a = this.position_move_relative % this.carousel_slide_width
		let b = this.carousel_slide_width / 2

		this.position_move_relative -= a
		this.position_move_relative /= this.carousel_slide_width

		if(a < 0) {
			a *= -1
			if(a >= b) {
				this.position_move_relative--
			}
		} else if(a > 0) {
			if(a >= b) {
				this.position_move_relative++
			}
		}

		if(this.position_move_relative > 0) {
			this.carousel_slide_count -= this.carousel_slide_width * this.position_move_relative
		} else {
			this.carousel_slide_count += this.carousel_slide_width * (-this.position_move_relative)
		}

		let translate_value = this.reference_items[0].style.transform
		translate_value = translate_value.replace('translateX(', '')
		translate_value = translate_value.replace('px)', '')
		translate_value = parseInt(translate_value) * (-1)
		translate_value += this.carousel_slide_width

		if(translate_value > this.last_traslate_possible) {
			this.carousel_slide_count = 0
		} else if(translate_value < this.carousel_slide_width) {
			this.carousel_slide_count = this.last_traslate_possible - this.carousel_slide_width
		}

		this.moveItems()

		let body_reference = document.getElementsByTagName('body')[0]
		body_reference.onmousemove = ''
		body_reference.onmouseup = ''
		body_reference.onmouseleave = ''
	}

	move() {
		let translate_value = this.reference_items[0].style.transform
		if(translate_value != '') {
			translate_value = translate_value.replace('translateX(', '')
			translate_value = translate_value.replace('px)', '')
			translate_value = parseInt(translate_value) * (-1)
			translate_value += this.carousel_slide_width
		} else {
			translate_value = this.carousel_slide_width
		}
		if(this.movePermition && translate_value < this.last_traslate_possible + 50 && translate_value > this.carousel_slide_width - 50) {
			this.position_move_relative = event.clientX - this.ipx
			for(let i = 0; i < this.reference_items.length; i++) {
				this.reference_items[i].style.transform = 'translateX(' + -(this.carousel_slide_count + (-this.position_move_relative)) + 'px)'
			}
		}
	}

	static resizeImages(items, id, size = null) {
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

	static resizeSlideItem(items, min, max) {
		let list = document.getElementsByClassName(items)
		let w = document.getElementsByClassName('content')[0].offsetWidth

		if(window.innerWidth < min) {
			w /= 2
			w = Math.round(w)
			for(let i = 0; i < list.length; i++) {
				list[i].style.minWidth = w + 'px'
			}
		} else if(window.innerWidth >= min && window.innerWidth < max) {
			w /= 3
			w = Math.round(w)
			for(let i = 0; i < list.length; i++) {
				list[i].style.minWidth = w + 'px'
			}
		} else {
			for(let i = 0; i < list.length; i++) {
				list[i].style = ''
			}
			w = document.getElementsByClassName(items)[0].offsetWidth
			w = Math.round(w)
		}

		return w
	}
}

let carousel_obj_intro
let carousel_obj_trend

function onloadBody() {
	carousel_intro_width = Carousel.resizeImages('carousel-image', 'carousel-introduction', 2)

	let content_width = document.getElementsByClassName('content')[0].offsetWidth
	let slide_width_1 = Carousel.resizeSlideItem('slide_items_1', 620, 768)
	let last_slide_elements = Math.round(content_width / slide_width_1)

	// Carousel da introdução
	carousel_obj_intro = new Carousel('carousel-item', carousel_intro_width, 4000, 1)
	carousel_obj_trend = new Carousel('slide_items_1', slide_width_1, 7000, last_slide_elements)
}

function resizingWindow() {
	carousel_intro_width = Carousel.resizeImages('carousel-image', 'carousel-introduction', 2)

	let slide_content = document.getElementsByClassName('content')[0].offsetWidth
	let slide_items_width_1 = Carousel.resizeSlideItem('slide_items_1', 620, 768)

	let last_view_elements = Math.round(slide_content / slide_items_width_1)

	carousel_obj_intro.resizing(carousel_intro_width, 1)
	carousel_obj_trend.resizing(slide_items_width_1, last_view_elements)
}