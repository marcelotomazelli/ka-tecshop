document.getElementById('button-categories').onclick = () => {
	let elements = ['menu-categories', 'button-categories']
	_changes.class(elements, 'close_l', 'open_l')
}

document.getElementById('button-responsive-menu').onclick = () => {
	let elements = ['menu-categories', 'button-responsive-menu', 'bodyid']
	_changes.class(elements, 'open_s', 'close_s')
}
