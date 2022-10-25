"use strict";

document.addEventListener("DOMContentLoaded", function (e) {
  {
    const a = document.getElementById("formHospitalizacion"),
      t = jQuery(a.querySelector(".select2")),
      s = FormValidation.formValidation(a, {
        fields: {
          hc: {
            validators: {
              notEmpty: { message: "Ingrese la historia clínica" },
              stringLength: {
                min: 7,
                max: 7,
                message:
                  "La historia clínica debe tener 7 dígitos"
              },
            },
          },
          nombres: {
            validators: {
              notEmpty: { message: "Ingrese los nombres del paciente" }
            },
          },
          apellidos: {
            validators: {
              notEmpty: { message: "Ingrese los apellidos del paciente" }
            },
          },
          edad: {
            validators: {
              notEmpty: { message: "Ingrese la edad del paciente" }
            },
          },
          ingreso_alta: {
            validators: {
              notEmpty: { message: "Ingrese la fecha de ingreso y alta" }
            },
          },
          servicio: {
            validators: {
               notEmpty: { message: "Seleccione un servicio" }
            },
          },
          hab: {
            validators: {
              notEmpty: { message: "Ingrese la habitación" }      
            },
          },
          comp_seguro: {
            validators: {
              promise: {
                promise: function (input) {
                  return new Promise(function (resolve, reject){
                    if (document.getElementById("chk_seguro").checked == true && input.value == '') {
                      resolve({
                        valid: false,
                        message: "Debe seleccionar una compañia de seguro"
                      });
                    } else {
                      resolve({
                        valid: true
                      });
                    }
                  });
                }
              }
            }
          },
          dx: {
            validators: {
              notEmpty: { message: "Ingrese el diagnóstico médico" }
            },
          },
          estado: {
            validators: { notEmpty: { message: "Seleccione el estado de llamada" }
           },
          },
          inoutllamada: {
            validators: { 
              notEmpty: { message: "Seleccione hora de inicio y fin de llamada" },
              stringLength: {
                min: 27,              
                message:
                  "Debe seleccionar tambien una hora de fin"
              },
            },
          },
          conformidad: {
            validators: {
              notEmpty: { message: "Seleccione la conformidad de atención" }
            },
          },
          clasificacion: {
            validators: {
              notEmpty: { message: "Seleccione la clasificación" }
            },
          },
          accion: {
            validators: {
              notEmpty: { message: "Seleccione una accion" }
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
      document.querySelector('#enviar1').addEventListener('click', function (e) {
        e.preventDefault();
        // Validate form
        s.validate().then(function (status) {
          if (status == 'Valid') {  
            let datos = new FormData(a);
            fetch('includes/modelo-aplicaciones.php',{
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
                      location.href = '';
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