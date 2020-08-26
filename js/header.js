document.getElementById('button-categories').onclick = () => {
	let elements = ['menu-categories', 'button-categories']
	_changes.class(elements, 'close_l', 'open_l')
}

document.getElementById('button-responsive-menu').onclick = () => {
	let elements = ['menu-categories', 'button-responsive-menu', 'bodyid']
	_changes.class(elements, 'open_s', 'close_s')
}

document.getElementById('button-smartphone-ctgr').onclick = () => {
	_changes.class(['smartphone-ctgr'], 'open_s', 'close_s')
}


document.getElementById('button-desktop-ctgr').onclick = () => {
	_changes.class(['desktop-ctgr'], 'open_s', 'close_s')
}
