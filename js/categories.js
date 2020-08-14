let button_grid = document.getElementById('button-grid')
button_grid.onclick = () => {
	_changes.class(['view-products'], 'grid', 'list')
}

let button_list = document.getElementById('button-list')
button_list.onclick = () => {
	_changes.class(['view-products'], 'list', 'grid')
}