const btnUpload = document.querySelector('#btnUpload');
const btnNuevaCarpeta = document.querySelector("#btnNuevaCarpeta");
const myModal = new bootstrap.Modal(document.querySelector("#modalFile"));

const myModal1 = new bootstrap.Modal(document.querySelector("#modalCarpeta"));
const frmCarpeta = document.querySelector('#frmCaperta');

const btnSubirArchivo = document.querySelector('#btnSubirArchivo');
const file = document.querySelector('#file');

const myModal2 = new bootstrap.Modal(document.querySelector("#modalCompartir"));
const id_carpeta = document.querySelector('#id_carpeta');

const carpetas = document.querySelectorAll('.carpetas');
const btnSubir = document.querySelector('#btnSubir');

//ver archivos
const btnVer = document.querySelector('#btnVer');

//compartir archivos entre usuarios
const compartir = document.querySelectorAll('.compartir');
const myModalUser = new bootstrap.Modal(document.querySelector("#modalUsuarios"));
const frmCompartir = document.querySelector('#frmCompartir');
const usuarios = document.querySelector('#usuarios');

const btnCompartir = document.querySelector('#btnCompartir');
const container_archivos = document.querySelector('#container-archivos');
const btnVerDetalle = document.querySelector('#btnVerDetalle');
const content_acordeon = document.querySelector('#accordionFlushExample');

///ELIMINAR ARHCIVO RECIENTE
const eliminar = document.querySelectorAll('.eliminar');

const modalArchivos = new bootstrap.Modal(document.querySelector("#modalArchivos"));

document.addEventListener('DOMContentLoaded', function () {
    btnUpload.addEventListener('click', function () {
        myModal.show();
    })

    btnNuevaCarpeta.addEventListener('click', function () {
        myModal.hide();
        myModal1.show();
    })

    frmCarpeta.addEventListener("submit", function (e) {
        e.preventDefault();
        if (frmCarpeta.nombre.value == "") {
            alertaPerzonalizada("error", "El nombre de la carpeta es requerido");
        } else {
          const data = new FormData(frmCarpeta);
          const http = new XMLHttpRequest();
          const url = base_url + "admin/crearCarpeta";
          http.open("POST", url, true);
          http.send(data);
          http.onreadystatechange = function () {
            if (this.readyState == 4) {
              if (this.status == 200) {
                try {
                  const res = JSON.parse(this.responseText);
                  alertaPerzonalizada(res.tipo, res.mensaje);
                  if (res.tipo === "success") {
                    setTimeout(() => {
                      window.location.reload();
                    }, 1500);
                  }
                } catch (e) {
                    alertaPerzonalizada(
                    "error",
                    "Respuesta inválida del servidor: " + this.responseText
                  );
                }
              } else {
                alertaPerzonalizada(
                  "error",
                  "Error en la solicitud: " + this.statusText
                );
              }
            }
          };
        }
      })

    //subir archivos
    btnSubirArchivo.addEventListener('click', function () {
        myModal.hide();
        modalArchivos.show();
    })

    carpetas.forEach(carpeta => {
        carpeta.addEventListener('click', function (e) {
            id_carpeta.value = e.target.id;
            myModal2.show();
        })
    });

    btnSubir.addEventListener('click', function () {
        myModal2.hide();
        modalArchivos.show();
    })

    btnVer.addEventListener('click', function () {
        window.location = base_url + 'admin/ver/' + id_carpeta.value;
    })

    $(".js-states").select2({
        theme: 'bootstrap-5',
        placeholder: 'Buscar y agregar usuarios',
        maximumSelectionLength: 5,
        minimumInputLength: 2,
        dropdownParent: $('#modalUsuarios'),
        ajax: {
            url: base_url + 'archivos/getUsuarios',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
    });

    //agregar click al enlace compartir
    compartir.forEach(enlace => {
        enlace.addEventListener('click', function (e) {
            compartirArchivo(e.target.id);
        })
    });

    frmCompartir.addEventListener('submit', function (e) {
        e.preventDefault();
        if (usuarios.value == '') {
            alertaPerzonalizada('warning', 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            const data = new FormData(frmCompartir);
            const http = new XMLHttpRequest();
            const url = base_url + 'archivos/compartir';
            http.open("POST", url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertaPerzonalizada(res.tipo, res.mensaje);
                    if (res.tipo == 'success') {
                        $('.js-states').val(null).trigger('change');
                        myModalUser.hide();
                    }
                }

            };
        }
    })

    //COMPRATIR ARHCIVOS POR CARPETA
    btnCompartir.addEventListener('click', function () {
        verArchivos();
    })


    //VER DETALLE COMPARTIDO
    btnVerDetalle.addEventListener('click', function () {
        window.location = base_url + 'admin/verdetalle/' + id_carpeta.value;
    })

    // ELIMINAR ARCHIVO RECIENTE
    eliminar.forEach(enlace => {
        enlace.addEventListener('click', function (e) {
            let id = e.target.getAttribute('data-id');
            const url = base_url + 'archivos/eliminar/' + id;
            eliminarRegistro('ESTA SEGURO DE ELIMINAR', 'EL ARCHIVO SE ELIMINARÁ DE FORMA PERMANENTE EN 30 DIAS', 'SI ELIMINAR', url, null)
        })
    });
})

//iniciar dropzone

Dropzone.options.uploadForm = {
    dictDefaultMessage: 'ARRASTAR Y SOLTAR ARCHIVOS',
    dictRemoveFile: 'ELIMINAR',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 10,
    maxFiles: 10,
    addRemoveLinks: true,
  
    // The setting up of the dropzone
    init: function() {
      var myDropzone = this;
  
      // First change the button to actually tell Dropzone to process the queue.
      document.querySelector("#btnProcesar").addEventListener("click", function(e) {
        // Make sure that the form isn't actually being sent.
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
      });
      this.on("successmultiple", function(files, response) {
        setTimeout(() => {
            window.location.reload();
        }, 1500);
      });
    }
   
  }

//fin dropzone

function compartirArchivo(id) {
    const http = new XMLHttpRequest();
    const url = base_url + 'archivos/buscarCarperta/' + id;
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            console.log(this.responseText);
            id_carpeta.value = res.id_carpeta;
            content_acordeon.classList.add('d-none');
            container_archivos.innerHTML = `<input type="hidden" value="${res.id}" name="archivos[]">`;
            myModalUser.show();
        }
    };

}

function verArchivos() {
    const http = new XMLHttpRequest();
    const url = base_url + 'archivos/verArchivos/' + id_carpeta.value;
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            if (res.length > 0) {
                content_acordeon.classList.remove('d-none');
                res.forEach(archivo => {
                    html += `<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="${archivo.id}" name="archivos[]" id="flexCheckDefault_${archivo.id}">
                        <label class="form-check-label" for="flexCheckDefault_${archivo.id}">
                            ${archivo.nombre}
                        </label>
                    </div>`;
                });
                // cargarDetalle(id_carpeta.value);
            } else {
                html = `<div class="alert alert-custom alert-indicator-right indicator-warning" role="alert">
                    <div class="alert-content">
                        <span class="alert-title">Cuidado!</span>
                        <span class="alert-text">Carpeta vacia</span>
                    </div>
                </div>`;
            }
            container_archivos.innerHTML = html;
            myModal2.hide();
            myModalUser.show();
        }
    };
}