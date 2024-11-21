document.addEventListener('DOMContentLoaded', function () {
    $( "#inputBusqueda" ).autocomplete({
        source: function( request, response ) {
          $.ajax( {
            url: url = base_url + 'archivos/busqueda',
            dataType: "json",
            data: {
              term: request.term
            },
            success: function( data ) {
              response( data );
            }
          } );
        },
        minLength: 2,
        select: function( event, ui ) {
          window.open(ui.item.ruta);
        }
      } );
})

// Here goes your custom javascript
function alertaPerzonalizada(type, mensaje) {
    Swal.fire({
        position: 'top-end',
        icon: type,
        title: mensaje,
        showConfirmButton: false,
        timer: 1500
    })
}

function eliminarRegistro(title, text, accion, url, table) {
    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: accion
    }).then((result) => {
        if (result.isConfirmed) {
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertaPerzonalizada(res.tipo, res.mensaje);
                    if (res.tipo == 'success') {
                        if (table != null) {
                            table.ajax.reload();
                        } else {
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    }

                }

            };

        }
    })
}