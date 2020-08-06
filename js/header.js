function changeClass(id_elements, new_class, old_class) {
	for(let i = 0; i < id_elements.length; i++) {
		let el = document.getElementById(id_elements[i])
		if(el.className.includes(old_class))
			el.className = el.className.replace(old_class, new_class)
		else 
			el.className = el.className.replace(new_class, old_class)

	}
}

document.getElementById('button-categories').onclick = () => {
	let elements = ['menu-categories', 'button-categories']
	changeClass(elements, 'close_l', 'open_l')
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
