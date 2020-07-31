function initialConfig() {
	if(document.getElementById('v_ie')) {
		let v_ie = document.getElementById('v_ie')
		if(v_ie.value != '') {
			v_ie.className = 'invalid-input'
		}
	}

	if(document.getElementById('v_ic')) {
		if(document.getElementById('verify-info').innerHTML.includes('Código'))
			document.getElementById('v_ic').className = 'invalid-input'
	}
}

let information = document.getElementById('verify-info')

if(document.getElementById('button-verify-email')) {
	
	let button_ve = document.getElementById('button-verify-email')
	let el = document.getElementById('v_ie')

	button_ve.onclick = () => {
		submit_dates = true
		text_error = ''

		if(el.value == '') {
			submit_dates = false
			text_error = '* Campo deve ser preenchido.'
		} else if(!(el.value.includes('@')) || el.value.includes(' ')) {
			submit_dates = false
			text_error = '* Email está incorreto.'
		}

		if(submit_dates) {
			document.formverifyemail.submit()
		} else {
			el.className = 'invalid-input'
			information.innerHTML = text_error
		}
	}

	el.onfocus = () => {
		el.className = ''
	}
}

if(document.getElementById('button-verify-code')) {

	let button_vc = document.getElementById('button-verify-code')
	let el = document.getElementById('v_ic')

	button_vc.onclick = () => {
		submit_dates = true
		text_error = ''

		if(el.value == '') {
			submit_dates = false
			text_error = '* Campo deve ser preenchido.'
		} else if(el.value.includes(' ')) {
			submit_dates = false
			text_error = '* Código está incorreto.'
		}

		if(submit_dates) {
			document.formverifycode.submit()
		} else {
			el.className = 'invalid-input'
			information.innerHTML = text_error
		}
	}

	el.onfocus = () => {
		el.className = ''
	}

}

if(document.getElementById('button-new-pass')) {
	let button_np = document.getElementById('button-new-pass')
	const new_pass_elements = ['v_ipn', 'v_ipc']

	button_np.onclick = () => {
		let submit_dates = true
		let pass, text_error
		let not_match = false
		information.innerHTML = ''

		new_pass_elements.forEach((id) => {
			let el = document.getElementById(id)
			el.className = ''
			if(el.value == '') {
				text_error = 'Todos os campos devem ser preenchidos.'
				el.className = 'invalid-input'
				submit_dates = false
			}
		})

		if(submit_dates) {
			new_pass_elements.forEach((id, i) => {
				let el = document.getElementById(id)
				let error = false

				if(el.value.includes(' ')) {
					error = true
					text_error = 'Senha está incorreta.'
				} else if(pass == undefined) {
					pass = el.value
				} else if(pass !== el.value) {
					not_match = true
					text_error = 'Senhas não coincidem.'
				}

				if(error) {
					submit_dates = false
					el.className = 'invalid-input';
					information.innerHTML += `* ${text_error}<br>`
				} else if(not_match) {
					submit_dates = false
					document.getElementById(new_pass_elements[i - 1]).className = 'invalid-input'
					el.className = 'invalid-input'
					information.innerHTML += `* ${text_error}<br>`
				}

			})

			if(submit_dates) {
				document.formnewpass.submit()
			} 
		} else {
			information.innerHTML = `* ${text_error}<br>`
		}
	}

	new_pass_elements.forEach((id) => {
		let el = document.getElementById(id)
		el.onfocus = () => {
			el.className = ''
		}
	})
}