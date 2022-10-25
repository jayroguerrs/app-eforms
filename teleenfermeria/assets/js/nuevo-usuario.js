"use strict";

document.addEventListener("DOMContentLoaded", function (e) {
  {
    const a = document.getElementById("formUsuario"),
      t = jQuery(a.querySelector(".select2")),
      s = FormValidation.formValidation(a, {
        fields: {
            nombres: {
                validators: {
                    notEmpty: { message: "Ingrese los nombres del usuario" }
                },
            },
            apellidos: {
                validators: {
                    notEmpty: { message: "Ingrese los apellidos del usuario" }
                },
            },      
            usuario: {
                validators: {
                    notEmpty: { message: "Ingrese los apellidos del usuario" }
                },
            },      
            correo: {
                validators: {
                    notEmpty: { message: "Por favor ingrese su correo" },
                    emailAddress: { message: "Por favor ingrese un correo válido" },
                },
            },      
            rol: {
                validators: {
                notEmpty: { message: "Seleccione un rol" }
                },
            },
            psw: {
                validators: {
                    notEmpty: { message: "Ingrese una contraseña" },
                    stringLength: {
                        min: 8,
                        message: "La contraseña debe tener 8 caracteres como mínimo",
                    },
                },
            },
            repeatpsw: {
                validators: {
                    notEmpty: { message: "Por favor ingrese una contraseña" },
                    identical: {
                      compare: function () {
                        return form.querySelector('[name="modalpsw"]')
                          .value;
                      },
                      message: "La contraseña no coincide con el anterior",
                    },
                    stringLength: {
                      min: 8,
                      message: "La contraseña debe tener mas de 8 dígitos",
                    },
                },
            },        
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: "",            
          }),          
          autoFocus: new FormValidation.plugins.AutoFocus(),
        },          
      });
      // Handle form submit
      a.querySelector('#enviar1').addEventListener('click', function (e) {
        e.preventDefault();
        // Validate form
        s.validate().then(function (status) {
          if (status == 'Valid') {  
            let datos = new FormData(a);
            fetch('includes/modelo-usuario.php',{
              method : 'POST',
              body : datos
            }).then(Response => Response.json())
            .then (datos => {
              if(datos.resultado == 'ok'){
                Swal.fire({
                  text: "Se guardaron los cambios exitosamente",
                  icon: "success",
                  buttonsStyling: false,
                  confirmButtonText: "Ok, gracias",
                  customClass: {
                      confirmButton: "btn btn-primary"
                  }
                }).then(function (result) {
                    if (result.isConfirmed) { 
                        form.reset();
                        //}
                      }
                      location.href = 'registros-usuarios';
                });
              }
            })
          }
        });
      });
      
    flatpickr(a.querySelector('[name="ingreso_alta"]'), {
      mode: 'range',
      maxDate: 'today',
      enableTime: !1,
      dateFormat: "d/m/Y",
      onChange: function () {
        s.revalidateField("ingreso_alta");
      },
    });
    flatpickr(a.querySelector('[name="inoutllamada"]'), {
      mode: 'range',
      maxDate: 'today',
      enableTime: true,
      dateFormat: "d/m/Y G:i:S K",
      onChange: function () {
        s.revalidateField("inoutllamada");
      },
    });

    $('.select2').select2();
    $('.select2').on("change.select2", function () {
      s.revalidateField(this.name);
    });
    $('.select2-icons').on("change.select2-icons", function () {
      s.revalidateField(this.name);
    });
    
    // custom template to render icons
    function renderIcons(option) {
      if (!option.id) {
        return option.text;
      }
      var $icon = "<i class='bx bxl-" + $(option.element).data("icon") + " me-2'></i>" + option.text;
      return $icon
    }

    // Init select2
    $(".select2-icons").wrap('<div class="position-relative"></div>').select2({
      templateResult: renderIcons,
      templateSelection: renderIcons,
      escapeMarkup: function(es) {
        return es;
      }
    });

  }
});

$("#chk_seguro").on('change', function(){
  if (this.checked){
    $('#comp_seguro').prop('disabled', false);
  } else{
    $('#comp_seguro').prop('disabled', true);
  }
}).trigger("change");

$('#ingreso_alta').on('change', function(){
  if (this.value.length == 10) {
    $(this).val($(this).val() + ' - ' + $(this).val());
  }
})