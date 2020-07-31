function changeClass(id, class_change) {
	document.getElementById(id).className = class_change
}

function initialConfig() {
	// -\- Para a visualização de acordo com a inteção do usuario -/-
	if(document.getElementById('t-action')) {
		let t_action = document.getElementById('t-action').innerHTML
		document.getElementById('t-action').remove()

		let el = document.getElementById('content-forms')
		if(t_action === 'register') {
			el.className = 'open_r'
		} else if(t_action === 'login') {
			el.className = 'open_l'
		}
	} else {
		document.getElementById('content-forms').className = 'open_r'
	}


	// -\- Para tratativa de erros -/-

	if(document.getElementById('r_ie').value != '') {
		changeClass('r_ie', 'invalid-input')
	}

	if(document.getElementById('login-info').innerHTML != '') {
		let text = document.getElementById('login-info').innerHTML
		if(text.includes('Email')) {
			changeClass('l_ie', 'invalid-input')
		} else if(text.includes('Senha incorreta.')) {
			changeClass('l_ip', 'invalid-input')
		}
	}
}

let button_r = document.getElementById('button-r')
let button_l = document.getElementById('button-l')
let button_login = document.getElementById('button-login')
let button_register = document.getElementById('button-register')
const login_elements = ['l_ie', 'l_ip']
const register_elements = ['r_n', 'r_ie', 'r_iec', 'r_ip', 'r_ipc']

button_r.onclick = () => {
	changeClass('content-forms', 'open_r')
	let information = document.getElementById('login-info')
	information.innerHTML = ''
	login_elements.forEach((id) => {
		let el = document.getElementById(id)
		el.className = ''
		el.value = ''
	})
}

button_l.onclick = () => {
	changeClass('content-forms', 'open_l')
	let information = document.getElementById('register-info')
	information.innerHTML = ''
	register_elements.forEach((id) => {
		let el = document.getElementById(id)
		el.className = ''
		el.value = ''
	})
}

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

button_register.onclick = () => {
	let submit_dates = true
	let email, pass

	let information = document.getElementById('register-info')
	information.innerHTML = ''

	register_elements.forEach((id) => {
		let el = document.getElementById(id)
		el.className = ''
		if(el.value == '') {
			information.innerHTML = '* Todos os campos devem ser preenchidos.'
			el.className = 'invalid-input'
			submit_dates = false
		}
	})

	if(submit_dates) {
		register_elements.forEach((id, i) => {
			let el = document.getElementById(id)
			let error = false
			let not_match = false
			let text_error

			// verifica se não está vazio primeiro
			if(el.value != '') {
				// verifica se o id possui 'e'
				if(id.includes('e')) {
					// aqui possui uma logica que funciona pela ordem de execução do forEach
					if(!(el.value.includes('@')) || el.value.includes(' ')) {
						error = true
						text_error = 'Email está incorreto.'
					} else if(email == undefined) {
						email = el.value
					} else if(email !== el.value) {
						error = true
						not_match = true
						text_error = 'Endereços de email não coincidem.'
					}
				}

				// se id não possuir 'e' verifica se o id possui 'p'
			 	if(id.includes('p')) {
				// aqui possui uma logica que funciona pela ordem de execução do forEach
					if(el.value.includes(' ')) {
						error = true
						text_error = 'Senha está incorreta.'
					} else if(pass == undefined) {
						pass = el.value
					} else if(pass !== el.value) {
						error = true
						not_match = true
						text_error = 'Senhas não coincidem.'
					}
				}
			}

			if(error) {
				if(not_match)
				   document.getElementById(register_elements[i - 1]).className = 'invalid-input'
				el.className = 'invalid-input'
				submit_dates = false

				information.innerHTML += `* ${text_error} <br>`
			} else
				el.className = ''
		})

		if(submit_dates) {
			document.formregister.submit()
		}
	}
}

button_login.onclick = () => {

	let submit_dates = true
	let information = document.getElementById('login-info')
	information.innerHTML = ''

	login_elements.forEach((id) => {
		let el = document.getElementById(id)
		if(el.value == '') {
			submit_dates = false
			el.className = 'invalid-input'
			information.innerHTML = '* Todos os campos devem ser preenchidos.'
		}
	})

	if(submit_dates) {
		login_elements.forEach((id) => {
			let el = document.getElementById(id)
			let error = false
			let text_error 

			if(el.value == '') {
				error = true
				el.className = 'invalid-input'
				text_error = '* Todos os campos devem ser preenchidos.'
			} else if( id.includes('e') && (!(el.value.includes('@')) || el.value.includes(' ')) ) {
				error = true
				text_error = 'Email está incorreto.'
			} else if(id.includes('p' ) && el.value.includes(' ')) {
				error = true
				text_error = 'Senha está incorreta.'
			}

			if(error) {
				el.className = 'invalid-input'
				submit_dates = false

				information.innerHTML += `* ${text_error} <br>`
			}
		})

		if(submit_dates) {
			document.formlogin.submit()
		}
	}
}

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

register_elements.forEach((id) => {
	let el = document.getElementById(id)
	el.onfocus = () => {
		if(el.className == 'invalid-input') {
			el.className = ''
		}
	}
})

login_elements.forEach((id) => {
	let el = document.getElementById(id)
	el.onfocus = () => {
		if(el.className == 'invalid-input') {
			el.className = ''
		}
	}
})