let carousel_intro_width, carousel_intro_height;
let carousel_interval;
let carousel_obj_intro;

function onloadBody() {
	let carousel_intro = document.getElementById('carousel-introduction')
	let carousel_width = carousel_intro.offsetWidth
	carousel_intro.style.height = (carousel_width / 2) + 'px'

	carousel_intro_width = carousel_width
	carousel_intro_height = carousel_width / 2

	let carousel_imgs = document.getElementsByClassName('carousel-image')

	for(let i = 0; i < carousel_imgs.length; i++) {
		carousel_imgs[i].style.width = carousel_intro_width + 'px'
		carousel_imgs[i].style.height = carousel_intro_height + 'px'
	}

	// Carousel da introdução
	carousel_obj_intro = new Carousel(items_carousel_intro, carousel_intro_width, 4000)
}

function resizingWindow() {
	let carousel_intro = document.getElementById('carousel-introduction')
	let carousel_width = carousel_intro.offsetWidth
	carousel_intro.style.height = (carousel_width / 2) + 'px'

	carousel_intro_width = carousel_width
	carousel_intro_height = carousel_width / 2

	let carousel_imgs = document.getElementsByClassName('carousel-image')

	for(let i = 0; i < carousel_imgs.length; i++) {
		carousel_imgs[i].style.width = carousel_intro_width + 'px'
		carousel_imgs[i].style.height = carousel_intro_height + 'px'
	}

	carousel_obj_intro.resizing(carousel_intro_width)
}

class Carousel {

	constructor(reference_items, carousel_slide_width, time_interval) {
		this.reference_items = reference_items
		this.carousel_slide_count = 0
		this.carousel_slide_width = carousel_slide_width
		this.time_interval = time_interval
		this.interval = this.intervalControl(this.time_interval)
		console.log(this.interval)
	}

	intervalControl(time) {
		return setInterval(() => {
			this.autonext()
		}, time)
	}

	updateValues(new_carousel_slide_width) {
		this.carousel_slide_width = new_carousel_slide_width
	}

	moveItems() {
		for(let i = 0; i < this.reference_items.length; i++) {
			this.reference_items[i].style.transform = 'translateX(-' + this.carousel_slide_count + 'px)'
		}
	}

	next() {
		clearInterval(this.interval)
		this.carousel_slide_count += this.carousel_slide_width

		if(this.carousel_slide_count == this.carousel_slide_width * this.reference_items.length) {
			this.carousel_slide_count = 0
		}
		this.moveItems()
		this.interval = this.intervalControl(this.time_interval)
	}

	prev() {
		clearInterval(this.interval)
		if(this.carousel_slide_count == 0) {
			this.carousel_slide_count = this.carousel_slide_width * (this.reference_items.length -1)
		} else {
			this.carousel_slide_count -= this.carousel_slide_width
		}
		this.moveItems()
		this.interval = this.intervalControl(this.time_interval)
	}

	autonext() {
		this.carousel_slide_count += this.carousel_slide_width
		
		if(this.carousel_slide_count == this.carousel_slide_width * this.reference_items.length) {
			this.carousel_slide_count = 0
		}
		this.moveItems()
	}

	resizing(new_carousel_slide_width) {
		clearInterval(this.interval)
		this.carousel_slide_count = 0
		this.moveItems()
		this.updateValues(new_carousel_slide_width)
		this.interval = this.intervalControl(this.time_interval)
	}
}

let items_carousel_intro = document.getElementsByClassName('carousel-item')
