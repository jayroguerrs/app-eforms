"use strict";

var LogInGeneral = function () {
  var submitButton;
  var validator;
  var form;

  var handleForm = function(e) {
      validator = FormValidation.formValidation(form, {
          fields: {
            username: {
              validators: {
                notEmpty: { message: "Por favor ingrese un usuario" },
                stringLength: {
                  min: 5,
                  message: "El usuario debe tener mas de 4 dígitos",
                },
              },
            },
            email: {
              validators: {
                notEmpty: { message: "Por favor ingrese su correo" },
                emailAddress: { message: "Por favor ingrese un correo válido" },
              },
            },
            "email-username": {
              validators: {
                notEmpty: { message: "Por favor ingrese su usuario o correo" },
                stringLength: {
                  min: 6,
                  message: "El usuario debe tener 6 caracteres como mínimo",
                },
              },
            },
            password: {
              validators: {
                notEmpty: { message: "Por favor ingrese una contraseña" },
                stringLength: {
                  min: 4,
                  message: "La contraseña debe tener mas de 4 dígitos",
                },
              },
            },
            "confirm-password": {
              validators: {
                notEmpty: { message: "Por favor ingrese una contraseña" },
                identical: {
                  compare: function () {
                    return form.querySelector('[name="password"]')
                      .value;
                  },
                  message: "La contraseña no coincide con el anterior",
                },
                stringLength: {
                  min: 6,
                  message: "La contraseña debe tener mas de 6 dígitos",
                },
              },
            },
          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
              eleValidClass: "",
              rowSelector: ".mb-3",
            }),
          },                
      });
      // Handle form submit
      document.querySelector('#ingresar').addEventListener('click', function (e) {
      e.preventDefault();
      // Validate form
      validator.validate().then(function (status) {
        if (status == 'Valid') {         
          // Para el envío de correo que espere unos segundos...
          var str = '<button id="ingresar" class="btn btn-primary w-100 carga" disabled><span class="spinner-border me-2" role="status" aria-hidden="true"></span>Loading...</button>';
          var Obj = document.getElementsByClassName('carga')[0];
          Obj.outerHTML=str;
          //
          let username = document.getElementById('username');
          let confirm_password;
          if(document.getElementById('registro').value=='login'){
            confirm_password = document.getElementsByClassName('confirm-password')[0];
          } else {
            confirm_password = document.getElementById('confirm-password');
          }
          let password = document.getElementById('password');          
          let registro = document.getElementById('registro');
          let email = document.getElementById('email');
          let iduser = document.getElementById('iduser');
          // Iniciar datos de FormData
          let datos = new FormData();
          // Agregar valores al formData
          datos.append("username", username.value);
          datos.append("password", password.value);        
          datos.append("confirm-password", confirm_password.value);  
          datos.append("registro", registro.value);
          datos.append("email", email.value);
          datos.append("iduser", iduser.value);
          fetch('includes/modelo-authentication.php',{
            method : 'POST',
            body : datos
          }).then(Response => Response.json())
          .then (datos => {
            // Para el caso del LOGIN
            if(datos.resultado == 'loginok'){
              Swal.fire({
                text: "Bienvenido(a): " + datos.usuario,
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, gracias",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
              }).then(function (result) {
                  if (result.isConfirmed) { 
                      form.querySelector('[name="username"]').value= "";
                      form.querySelector('[name="password"]').value= "";
                      //}
                    }
                    location.href = '';
              });
            } else if(datos.resultado == 'loginx'){
              Swal.fire({
                text: "El usuario o contraseña son incorrectos",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, gracias",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
              })
            // Para el caso del RESTABLECIMIENTO DE CONTRASEÑA
            } else if(datos.resultado == 'restablecerok'){
              Swal.fire({
                text: "Se ha enviado el correo exitosamente",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, gracias",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
              }).then(function (result) {
                  if (result.isConfirmed) { 
                      form.querySelector('[name="email"]').value= "";                          
                  }
                  location.href = 'login';
              });
              //Para el envío de correo que espere unos segundos...
              var str = '<button id="ingresar" class="btn btn-primary w-100 carga">Restablecer contraseña</button>';      
              var Obj = document.getElementsByClassName('carga')[0];
              Obj.outerHTML=str;
            } else if(datos.resultado == 'nuevopassok'){
              Swal.fire({
                text: "Se ha modificado la contraseña exitosamente",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, gracias",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
              }).then(function (result) {
                  if (result.isConfirmed) { 
                    form.querySelector('[name="password"]').value= "";
                    form.querySelector('[name="confirm-password"]').value= "";
                  }
              });    
            }
          })
          // Enable button
        }
      });      
      //
    });
  }
  // Public functions
  return {
    // Initialization
    init: function() {
        form = document.querySelector("#frm");
        submitButton = document.querySelector('#ingresar');        
        handleForm();
    }
  };
}();
// On document ready
document.addEventListener("DOMContentLoaded", function() {
  LogInGeneral.init();
});