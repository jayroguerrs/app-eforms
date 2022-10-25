$(document).ready(function() {

    // Operaciones CRUD
    $('#guardar-registro').on('submit', function(e) {
        if ($(this).valid()){
            e.preventDefault();
            var datos = $(this).serializeArray();
            Swal.fire({
                title: '¿Está seguro(a)?',
                showClass: {
                    popup: 'animate__animated animate__wobble'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                text: "Sus cambios serán guardados",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00B2A9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, guárdalo!',
                cancelButtonText: 'No, cancélalo',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',            
                        data:  datos,
                        url: $(this).attr('action'),
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            if (data.respuesta == 'correcto') {
                                Swal.fire({
                                    title: '¡Registro Exitoso!',
                                    text: '¡Se agregó correctamente!',
                                    icon: 'success',
                                    confirmButtonColor: '#00B2A9',
                                    confirmButtonText: 'Todo, Ok!',
                                    showCancelButton: false,
                                    showCloseButton: false,
                                }).then((result) => {
                                    if(result.isConfirmed){                               
                                        self.parent.location.reload()           //Actualizar página desde un popup
                                    }
                                })
                            } else {
                                Swal.fire(
                                    'Error...',
                                    '¡Hubo un error al enviar su información!',
                                    'error'
                                )
                            }
                        }
                    }); 
                }
            })
        }
    });

    // Para el modelo 'PREGUNTAS'
    $('select#colaborador-select').on('change', function(e){
        e.preventDefault();
        //var optionSelected = $("option:selected", this);
        var valSelected = $(this).val();
        var textSelected   = $(this).text();
        $.ajax({
            type: "POST",
            data: {
                'cod': valSelected,
                'nombre': textSelected,
                'registro': 'autocompletar'
            },
            url: "modelo-index.php",
            dataType: 'json',               //Retorna en formato string
            success: function(data) {
                //console.log(data);
                if (data.respuesta == 'correcto') {
                    $("#desem").val(data.desemp);       //Se coloca el valor del desempeño
                    $("#sup").val(data.super);          //Se coloca el valor del supervisor
                } else {
                    $("#desem").val("");
                    $("#sup").val(""); 
                }
            }
        });
    });

    
});

function AbrirModal(valor){
    var st = valor.getAttribute('data')
    console.log(st);
    var cod = st.slice(0, 7);
    console.log(cod);
    var fecha = st.slice(8, st.length);
    console.log(fecha);
    $.ajax({
        url: 'modelo-index.php',
        type: 'post',
        dataType: 'json',
        data: {
            'registro': 'modal',
            'cod': cod,
            'fecha': fecha
        },
        success: function(data){ 
            // Add response in Modal body
            console.log(data);
            console.log(data.respuesta);
            $('.modal-body').html(data.rhtml);
            $("#myModal").modal();
        }
        });
}