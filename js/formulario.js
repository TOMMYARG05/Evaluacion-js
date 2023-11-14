const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, 
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
	dni: /^\d{8,14}$/, 
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	
}


const campos = {
	usuario: false,
	nombre: false,
	dni: false,
	correo: false
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "dni":
			validarCampo(expresiones.dni, e.target, 'dni');
			validarDni2();
		break;
		case "dni2":
			validarDni2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarDni2 = () => {
	const inputDni1 = document.getElementById('dni');
	const inputDni2 = document.getElementById('dni2');

	if(inputDni1.value !== inputDni2.value){
		document.getElementById(`grupo__dni2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__dni2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__dni2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__dni2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__dni2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['dni'] = false;
	} else {
		document.getElementById(`grupo__dni2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__dni2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__dni2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__dni2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__dni2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['dni'] = true;
	}
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

inputs.forEach((input) => {
    input.addEventListener('keyup', validardni2);
    input.addEventListener('blur', validardni2);
});

formulario.addEventListener('submit', (e) => {
	const terminos = document.getElementById('terminos');
	if(campos.nombre && campos.dni2 && campos.correo && campos.nickname && terminos.checked ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});