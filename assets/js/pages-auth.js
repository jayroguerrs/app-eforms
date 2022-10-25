"use strict";
const formAuthentication = document.querySelector("#frm");
document.addEventListener("DOMContentLoaded", function (e) {
  {
    formAuthentication &&
      FormValidation.formValidation(formAuthentication, {
        fields: {
          username: {
            validators: {
              notEmpty: { message: "Por favor ingrese un usuario" },
              stringLength: {
                min: 4,
                message: "El usuario debe tener mas de 4 dígitos",
              },
            },
          },
          email: {
            validators: {
              notEmpty: { message: "Por favor ingrese un correo electrónico" },
              emailAddress: { message: "Por favor ingrese un correo válido" },
            },
          },
          "email-username": {
            validators: {
              notEmpty: { message: "Please enter email / username" },
              stringLength: {
                min: 6,
                message: "Username must be more than 6 characters",
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
              notEmpty: { message: "Please confirm password" },
              identical: {
                compare: function () {
                  return formAuthentication.querySelector('[name="password"]')
                    .value;
                },
                message: "The password and its confirm are not the same",
              },
              stringLength: {
                min: 6,
                message: "Password must be more than 6 characters",
              },
            },
          },
          terms: {
            validators: {
              notEmpty: { message: "Please agree terms & conditions" },
            },
          },
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: "",
            rowSelector: ".mb-3",
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus(),
        },
        init: (e) => {
          e.on("plugins.message.placed", function (e) {
            e.element.parentElement.classList.contains("input-group") &&
              e.element.parentElement.insertAdjacentElement(
                "afterend",
                e.messageElement
              );
          });
        },
      });
    const t = document.querySelectorAll(".numeral-mask");
    return void (
      t.length &&
      t.forEach((e) => {
        new Cleave(e, { numeral: !0 });
      })
    );
  }
});
