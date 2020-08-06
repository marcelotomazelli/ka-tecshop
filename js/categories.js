function changeLayoutProducts(id, class_name) {
	let el = document.getElementById(id) 
	if(el.className != class_name) {
		el.className = class_name
	}
}

let button_grid = document.getElementById('button-grid')
button_grid.onclick = () => {
	changeLayoutProducts('view-products', 'grid')
}

let button_list = document.getElementById('button-list')
button_list.onclick = () => {
	changeLayoutProducts('view-products', 'list')
}