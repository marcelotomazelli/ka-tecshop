class Carousel {

	constructor(reference_items, carousel_slide_width, time_interval, last_visible_elements) {
		this.reference_items = document.getElementsByClassName(reference_items)
		this.carousel_slide_count = 0
		this.carousel_slide_width = carousel_slide_width
		this.time_interval = time_interval
		this.interval = this.intervalControl(this.time_interval)
		this.last_visible_elements = last_visible_elements
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

		if(this.carousel_slide_count == this.carousel_slide_width * (this.reference_items.length - this.last_visible_elements + 1)) {
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
		this.interval = this.intervalControl(this.time_interval)
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

let carousel_obj_intro;
let carousel_obj_trend;

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