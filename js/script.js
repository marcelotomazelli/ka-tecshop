let carousel_intro_width, carousel_intro_height;
let carousel_slide_count = 0
let carousel_interval;

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

	carousel.resizing()
}

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

	carousel_interval = setInterval(function() {
		carousel.autonext()
	}, 5000)
}




let carousel = {
	next: function() {
		clearInterval(carousel_interval)
		let carousel_imgs = document.getElementsByClassName('carousel-item')
		carousel_slide_count += carousel_intro_width
		
		if(carousel_slide_count == carousel_intro_width * carousel_imgs.length) {
			carousel_slide_count = 0
		}

		for(let i = 0; i < carousel_imgs.length; i++) {
			carousel_imgs[i].style.transform = 'translateX(' + -carousel_slide_count + 'px)'
		}

		carousel_interval = setInterval(function() {
			carousel.autonext()
		}, 5000)
	},
	prev: function() {
		clearInterval(carousel_interval)
		let carousel_imgs = document.getElementsByClassName('carousel-item')
		if(carousel_slide_count == 0) {
			carousel_slide_count = carousel_intro_width * (carousel_imgs.length -1)
			for(let i = 0; i < carousel_imgs.length; i++) {
				carousel_imgs[i].style.transform = 'translateX(' + -carousel_slide_count + 'px)'
			}
		} else {
			if(carousel_slide_count == carousel_intro_width * (carousel_imgs.length -1)) {
				carousel_slide_count = carousel_intro_width * (carousel_imgs.length -2)
			} else {
				carousel_slide_count -= carousel_intro_width
			}

			for(let i = 0; i < carousel_imgs.length; i++) {
				carousel_imgs[i].style.transform = 'translateX(' + -carousel_slide_count + 'px)'
			}
		}

		carousel_interval = setInterval(function() {
			carousel.autonext()
		}, 5000)
	},
	autonext: () => {
		let carousel_imgs = document.getElementsByClassName('carousel-item')
		carousel_slide_count += carousel_intro_width
		
		if(carousel_slide_count == carousel_intro_width * carousel_imgs.length) {
			carousel_slide_count = 0
		}

		for(let i = 0; i < carousel_imgs.length; i++) {
			carousel_imgs[i].style.transform = 'translateX(' + -carousel_slide_count + 'px)'
		}
	},
	resizing: () => {
		clearInterval(carousel_interval)
		let carousel_imgs = document.getElementsByClassName('carousel-item')
		carousel_slide_count = 0
		for(let i = 0; i < carousel_imgs.length; i++) {
			carousel_imgs[i].style.transform = 'translateX(' + carousel_slide_count + 'px)'
		}
		carousel_interval = setInterval(function() {
			carousel.autonext()
		}, 5000)
	}
}
