function changeLayoutProducts(id, class_name) {
	let el = document.getElementById(id) 
	if(el.className != class_name) {
		el.className = class_name
	}
}

let asidemyaccount = document.getElementById('btn-asidemyaccount')
asidemyaccount.onclick = () => {
	changeClass(['asidemyaccount'], 'open', 'close')
}