const _changes = {
	class: (ids, new_class, old_class) => {
		for(let i = 0; i < ids.length; i++) {
			let el = document.getElementById(ids[i])
			if(el.className.includes(old_class))
				el.className = el.className.replace(old_class, new_class)
			else 
				el.className = el.className.replace(new_class, old_class)
		}
	},
	products: () => {
		let addcart = document.getElementsByClassName('addcart')
		let idproducts = Array();

		for(let i = 0; i < addcart.length; i++) {
			idproducts.push(addcart[i].id)
		}

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
		/*
		<table>
			<tr class="product-cart">
				<td><img src="./img_produtos/<?= $item->id?>/index.jpg" height="60"alt=""></td>
				<td><?= $item->nome_curto ?></td>
				<td><?= $_SESSION['cart'][$i]['qtt'] ?>x</td>

				<? $valueproduct = $item->valor * $_SESSION['cart'][$i]['qtt'] ?>
				<td>R$ <?= correctValueRS($valueproduct) ?></td>
				<td>
					<button id="iproduct<?= $i ?>">
						<i class="fas fa-plus" style="transform: rotateZ(45deg)"></i>
					</button>
				</td>
			</tr>
		</table>
		*/

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

_changes.products()