document.body.onload = () => {

	/* PARTE QUESTION */ 

	if(document.getElementById('bsquestion')) {
		let el = document.getElementById('bsquestion')
		el.onclick = () => {
			let textarea1 = document.getElementById('b1')
			if(textarea1.value != '')
				document.formquestion.submit()
		}
	}

	let btns_question = ['fcquestion', 'cfquestion']

	btns_question.forEach((id) => {
		if(document.getElementById(id)) {
			let el = document.getElementById(id)
			el.onclick = () => _changes.class(['sfcquestion', 'sfquestion'], 'open', 'close')
		}
	})

	let answerbtns = document.getElementsByClassName('answerbtns')
	let answerbtnsid = Array()


	if(answerbtns.length > 0) {
		for(let i = 0; i < answerbtns.length; i++) {
			answerbtnsid.push(answerbtns[i].id)
		}

		answerbtnsid.forEach((id, i) => {
			let btn = document.getElementById(id)
			btn.onclick = () => _changes.class(['f'+id, 's'+id], 'open', 'close')
			let btnclose = document.getElementById('bc'+id)
			btnclose.onclick = () => _changes.class(['f'+id, 's'+id], 'open', 'close')

			document.getElementById('sendanswer'+i).onclick = () => {
				let elform = document.getElementById('taanswer'+i)
				if(elform.value != '') {
					document.getElementById('formannswer'+i).submit()
				}
			}
		})
	}

	/* PARTE REVIEW */

	if(document.getElementById('bsreview')) {
		let el = document.getElementById('bsreview')
		el.onclick = () => {
			let input1 = document.getElementById('ia1')
			let textarea = document.getElementById('ta1')
			if(textarea.value != '' && input1 != '')
				document.formreview.submit()
		}
	}

	let btns_reviews = ['fcreview', 'cfreview']

	btns_reviews.forEach((id) => {
		if(document.getElementById(id)) {
			let el = document.getElementById(id)
			el.onclick = () => _changes.class(['sfcreview', 'sfreview'], 'open', 'close')
		}
	})

	if(document.getElementById('button-star-review')) {
		let btn_sr = document.getElementById('button-star-review')

		btn_sr.onclick = (event) => {
			let valuereview = Math.round((50 * event.offsetX) / btn_sr.offsetWidth)
			valuereview /= 10
			valuereview += ''

			if(!valuereview.includes('.'))
				valuereview += '.0'

			let viewstarsnewreview = document.getElementById('viewstarsnewreview')
			viewstarsnewreview.innerHTML = ''

			let firstvalue = valuereview.charAt(0) * 1
			let mediumvalue = valuereview.charAt(2) * 1
			let lastvalue = 4 - firstvalue

			



			let inotfilled = document.createElement('i')
			inotfilled.className = 'far fa-star not-filled'

			
			for(let i = 1; i <= firstvalue; i++) {
				let ifilled = document.createElement('i')
				ifilled.className = 'fas fa-star filled'
				viewstarsnewreview.appendChild(ifilled)
			}

			if(mediumvalue < 3 && firstvalue < 3) {
				let inotfilled = document.createElement('i')
				inotfilled.className = 'far fa-star not-filled'
				viewstarsnewreview.appendChild(inotfilled)
			} else if(mediumvalue >= 3) {
				let superspanel = document.createElement('span')
				let i1 = document.createElement('i')
				i1.className = 'fas fa-star-half filled'

				let i2 = document.createElement('i')
				i2.className = 'far fa-star-half not-filled medium'

				superspanel.appendChild(i1)
				superspanel.appendChild(i2)

				viewstarsnewreview.appendChild(superspanel)
			}

			for(let i = 1; i <= lastvalue; i++) {
				let inotfilled = document.createElement('i')
				inotfilled.className = 'far fa-star not-filled'
				viewstarsnewreview.appendChild(inotfilled)
			}

			document.getElementById('valueviewreview').innerHTML = valuereview.replace('.', ',')
			document.getElementById('reviewnote').value = valuereview
		}
	}

}