"use strict";
!(function () {
    const a = document.querySelector("#formChangePassword"),
    s = FormValidation.formValidation(a, {
        fields: {
            newPassword: {
                validators: {
                    notEmpty: { message: "Por favor ingrese una contraseña" },
                    stringLength: {
                        min: 8,
                        message: "La contraseña debe tener 8 caracteres como mínimo",
                    },
                },
            },
            confirmPassword: {
                validators: {
                notEmpty: { message: "Por favor confirmar la contraseña" },
                identical: {
                    compare: function () {
                    return a.querySelector('[name="newPassword"]').value;
                    },
                    message: "La contraseña y la confirmación no son idénticas",
                },
                stringLength: {
                    min: 8,
                    message: "La contraseña debe tener 8 caracteres como mínimo",
                },
                },
            },
        },
        plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: "",
            rowSelector: ".form-password-toggle",
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        },    
        init: (a) => {
            a.on("plugins.message.placed", function (a) {
                a.element.parentElement.classList.contains("input-group") &&
                a.element.parentElement.insertAdjacentElement(
                    "afterend",
                    a.messageElement
                );
            });
        },
    });

    // Handle form submit
    document.querySelector('#cambiarpsw').addEventListener('click', function (e) {
        e.preventDefault();
        // Validate form        
        s.validate().then(function (status) {
          if (status == 'Valid') {  
            let datos = new FormData(a);
            console.log(datos.get("id"));
            fetch('includes/modelo-usuario.php',{
                method : 'POST',
                body : datos
            }).then(Response => Response.json())
            .then (datos => {
                console.log(datos.resultado);
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
                            a.reset();
                            //}
                        }
                        location.href = 'perfil';
                    });
                }
            })
          }
        });
    });

    const ma = document.querySelector("#editUserForm"),
    ms = FormValidation.formValidation(ma, {
        fields: {
            modalnombres: {
                validators: {
                    notEmpty: { message: "Por favor ingrese sus nombres" },
                    regexp: {
                        regexp: /[^0-9]+$/,
                        message: "Los nombres contienen caracteres inválidos",
                    },
                },
            },
            modalapellidos: {
                validators: {
                    notEmpty: { message: "Por favor ingrese sus apellidos" },
                    regexp: {
                        regexp: /[^0-9]+$/,
                        message: "Los nombres contienen caracteres inválidos",
                    },
                },
            },
            modalusuario: {
                validators: {
                    notEmpty: { message: "Por favor ingrese un nombre de usuario" },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message:
                            "El nombre de usuario debe tener mas de 6 y menos de 30 caracteres",
                    },
                    regexp: {
                    regexp: /^[a-zA-Z0-9]+$/,
                    message:
                        "El nombre de usuario contienen caracteres inválidos",
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: "",
            rowSelector: ".col-12",
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            autoFocus: new FormValidation.plugins.AutoFocus(),
        },
    });

    // Handle form submit
    document.querySelector('#modalguardar').addEventListener('click', function (e) {
        e.preventDefault();
        // Validate form
        ms.validate().then(function (status) {
          if (status == 'Valid') {  
            let datos = new FormData(ma);
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
                        ma.reset();
                        //}
                      }
                      location.href = 'perfil';
                });
              }
            })
          }
        });
    });
    
    let e = document.getElementById("uploadedAvatar");
    const l = document.querySelector(".account-file-input"),
      c = document.querySelector(".account-image-reset");
    if (e) {
      const r = e.src;
      (l.onchange = () => {
        l.files[0] && (e.src = window.URL.createObjectURL(l.files[0]));
      }),
        (c.onclick = () => {
          (l.value = ""), (e.src = r);
        });
    }
})();

