function changeLayoutProducts(id, class_name) {
	let el = document.getElementById(id) 
	if(el.className != class_name) {
		el.className = class_name
	}
}

let asidemyaccount = document.getElementById('btn-asidemyaccount')
asidemyaccount.onclick = () => {
	let class_name = 'open'

	if(document.getElementById('asidemyaccount').className == 'open')
		class_name = 'close'

	
	changeLayoutProducts('asidemyaccount', class_name)
}