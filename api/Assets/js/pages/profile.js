const frmProfile = document.querySelector('#frmProfile');
const correo = document.querySelector('#correo');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');

const frmPass = document.querySelector('#frmPass');
const clave_actual = document.querySelector('#clave_actual');
const clave_nueva = document.querySelector('#clave_nueva');
const clave_confirmar = document.querySelector('#clave_confirmar');
document.addEventListener('DOMContentLoaded', function () {
    frmPass.addEventListener('submit', function (e) {
        e.preventDefault();
        if (clave_actual.value == '' || clave_nueva.value == '' || clave_confirmar.value == '') {
            alertaPerzonalizada('warning', 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            if (clave_nueva.value != clave_confirmar.value) {
                alertaPerzonalizada('warning', 'LAS CONTRASEÑAS NO COINCIDEN');
            } else {
                const data = new FormData(frmPass);
                const http = new XMLHttpRequest();
                const url = base_url + 'usuarios/cambiarPass';
                http.open("POST", url, true);
                http.send(data);
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const res = JSON.parse(this.responseText);
                        alertaPerzonalizada(res.tipo, res.mensaje);
                        if (res.tipo == 'success') {
                            setTimeout(() => {
                                window.location = base_url + 'usuarios/salir';
                            }, 1500);
                        }
                    }

                };
            }

        }
    })

    frmProfile.addEventListener('submit', function (e) {
        e.preventDefault();

        // Validación del correo
        //const correoRegex = /^[^\s@]+@minerva\.pe$/;
        //if (!correoRegex.test(correo.value)) {
        //    alertaPerzonalizada('warning', 'Ingrese un correo válido del dominio minerva.pe.');
        //    return;
        //}

        // Validación del nombre (solo letras)
        const nombreRegex = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;
        if (!nombreRegex.test(nombre.value)) {
            alertaPerzonalizada('warning', 'El nombre solo debe contener letras y espacios.');
            return;
        }

        // Validación del apellido (solo letras)
        if (!nombreRegex.test(apellido.value)) {
            alertaPerzonalizada('warning', 'El apellido solo debe contener letras y espacios.');
            return;
        }

        // Validación del teléfono (exactamente 9 dígitos y sin letras)
        const telefonoRegex = /^\d{9}$/;
        if (!telefonoRegex.test(telefono.value)) {
            alertaPerzonalizada('warning', 'El teléfono debe contener exactamente 9 dígitos y no debe contener letras.');
            return;
        }

        if (correo.value == '' || nombre.value == '' || apellido.value == '' || telefono.value == '' || direccion.value == '') {
            alertaPerzonalizada('warning', 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            const data = new FormData(frmProfile);
            const http = new XMLHttpRequest();
            const url = base_url + 'usuarios/cambiarProfile';
            http.open("POST", url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertaPerzonalizada(res.tipo, res.mensaje);
                }

            };

        }
    })
})