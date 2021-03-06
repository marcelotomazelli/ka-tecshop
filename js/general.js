const _changes = {
	class: (ids, new_class, old_class) => {
		for(let i = 0; i < ids.length; i++) {
			let el = document.getElementById(ids[i])
			if(el.className.includes(old_class))
				el.className = el.className.replace(old_class, new_class)
			else if(el.className.includes(new_class))
				el.className = el.className.replace(new_class, old_class)
			else if(el.className == '')
				el.className = ` ${new_class}`
		}
	},

	correctValueRS: (value, qtt, more) => {
		value *= 1
		qtt *= 1
		more *= 1

		value *= qtt
		value += more

		value *= 100
		value = parseInt(value)
		value += ''

		let aux = value.slice((value.length - 2), value.length)

		value = value.replace(aux, ',') + aux

		return value
	},

	products: () => {
		let addcart = document.getElementsByClassName('addcart')
		let idproducts = Array()

		for(let i = 0; i < addcart.length; i++)
			idproducts.push(addcart[i].id)

		idproducts.forEach((id) => {
			let el = document.getElementById(id)
			let product_id = id.replace('id', '') * 1
			let directory = `../phpscripts/scriptAddCart.php?id=${product_id}&qtt=1`

			let info = [directory, _ajaxCart]

			el.onclick = () => {
				_ajax.requisition(info);
			}
		})
	},

	favorites: () => {
		let favorites = document.getElementsByClassName('favorites')

		let idproducts = Array()

		for(let i = 0; i < favorites.length; i++)
			idproducts.push(favorites[i].id.replace('fid-', '') * 1)

		idproducts.forEach((id) => {
			let el = document.getElementById('fid-'+id)
			let directory = `./phpscripts/scriptFavorite.php?idproduct=${id}`

			if(el.className.includes('notfavorite'))
				directory += '&type=include'
			else if(el.className.includes('isfavorite'))
				directory += '&type=remove'

			let info = [directory, _ajaxFav]

			el.onclick = () => {
				_ajax.requisition(info)
			}
		})
	},

	removeFavorite: (id) => {
		document.getElementById('sfavid-' + id).remove()
		let favorites = document.getElementsByClassName('favorites')
		if(favorites.length == 0) {
			let superel = document.getElementById('accountpages')

			let divempty = document.createElement('div')
			divempty.className = 'empty'
			divempty.innerHTML = 'Nenhum produto está marcado.'

			superel.appendChild(divempty)
		}
	}
}

const _ajax = {
	requisition: (info) => {
		let directory = info[0]
		let _instance = info[1]

		if(_instance.condition(info)) {
			let xhttp = new XMLHttpRequest();
			xhttp.open('POST', directory, true)
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					let result = JSON.parse(this.responseText)
					_instance.execute(result)
				}
			}
			xhttp.send()
		}
	}
}

const _ajaxCart = {
	execute: (result) => {

		let valuetotal = 0;
		if(!document.getElementById('infototalcart')) {
			let tb = document.createElement('table')
			tb.id = 'infototalcart'
			tb.className = 'cart-total'

			let tr1 = document.createElement('tr')
			let tdt1 = document.createElement('td')
			let tdd1 = document.createElement('td')
			
			tr1.className = 'two-items-table'

			tdt1.innerHTML = 'Frete:'
			tdd1.innerHTML = 'R$ 15,00'

			tr1.appendChild(tdt1)
			tr1.appendChild(tdd1)


			let tr2 = document.createElement('tr')
			let tdt2 = document.createElement('td')
			let tdd2 = document.createElement('td')
			
			tr2.className = 'two-items-table'

			tdt2.innerHTML = 'Desconto:'
			tdd2.innerHTML = 'Nenhum'

			tr2.appendChild(tdt2)
			tr2.appendChild(tdd2)


			let tr3 = document.createElement('tr')
			let tdt3 = document.createElement('td')
			let tdd3 = document.createElement('td')
			
			tr3.className = 'two-items-table'

			tdt3.innerHTML = 'Total:'
			tdd3.innerHTML = 'R$ '

			let span = document.createElement('span')
			span.id = 'totalontable'

			valuetotal = _changes.correctValueRS(result.value, result.quantity, 15)

			
			span.innerHTML = valuetotal

			tdd3.appendChild(span)

			tr3.appendChild(tdt3)
			tr3.appendChild(tdd3)

			tb.appendChild(tr1)
			tb.appendChild(tr2)
			tb.appendChild(tr3)

			let superdiv = document.createElement('div')
			superdiv.id = 'products-cart'

			let cart = document.getElementById('cart')
			cart.innerHTML = ''
			cart.appendChild(superdiv)

			cart.appendChild(tb)

		} else {
			let totalontable = document.getElementById('totalontable')

			valuetotal = totalontable.innerHTML.replace(',', '.') * 1

			valuetotal += (result.value * 1) * (result.quantity * 1)

			valuetotal = _changes.correctValueRS(valuetotal, 1, 0)

			totalontable.innerHTML = valuetotal

		}

		document.getElementById('total-cart').innerHTML = valuetotal
		let superdiv = document.getElementById('products-cart')

		let tb = document.createElement('table')

		let tr = document.createElement('tr')
		tr.className = 'product-cart'

		let td1 = document.createElement('td')
		let img = document.createElement('img')
		img.src = `./img_produtos/${result.id}/index.jpg`
		img.height = '60px'

		td1.appendChild(img)


		let td2 = document.createElement('td')
		td2.innerHTML = result.name

		let td3 = document.createElement('td')
		td3.innerHTML = result.quantity + 'x'

		let td4 = document.createElement('td')
		valueproduct = _changes.correctValueRS(result.value, result.quantity, 0)
		td4.innerHTML = `R$ ${valueproduct}`


		let td5 = document.createElement('td')

		let btn5 = document.createElement('button')

		let index_ = document.getElementsByClassName('productsoncart').length

		btn5.id = `idproduct${index_}`


		let i5 = document.createElement('i')
		i5.className = 'fas fa-plus'
		i5.style.transform = 'rotateZ(45deg)'

		btn5.appendChild(i5)
		td5.appendChild(btn5)


		tr.appendChild(td1)
		tr.appendChild(td2)
		tr.appendChild(td3)
		tr.appendChild(td4)
		tr.appendChild(td5)

		tb.appendChild(tr)

		superdiv.appendChild(tb)

		let spanitems = document.getElementById('number-items-cart')

		spanitems.innerHTML = (spanitems.innerHTML * 1) + 1

	},
	condition: (info) => { return true }
}


const _ajaxFav = {
	execute: (result) => {
		if(result.info == 'authenticated') {
			if(window.location.href.includes('myaccount.php')) {
				_changes.removeFavorite(result.id)
			} else {
				_changes.class(['fid-' + result.id], 'isfavorite', 'notfavorite')
			}
			_changes.favorites()
		} else if(result.info == 'not-authenticated')
			window.location.href = './access_page.php'
	},
	condition: (info) => { return true }
}

_changes.products()
_changes.favorites()