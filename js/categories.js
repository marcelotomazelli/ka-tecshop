let button_grid = document.getElementById('button-grid')
button_grid.onclick = () => {
	changeClass(['view-products'], 'grid', 'list')
}

let button_list = document.getElementById('button-list')
button_list.onclick = () => {
	changeClass(['view-products'], 'list', 'grid')
}