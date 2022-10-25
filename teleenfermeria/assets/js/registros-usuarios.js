"use strict";
$(function () {  
  var z = $(".select2");
  var e, s, a, t, r
  a = $(".datatables-users"),
  t = $(".select2"),
  r = "app-user-view-account.html"
  var f = document.getElementById("editUserForm")

  s = FormValidation.formValidation(f, {
    fields: {      
        modalnombres: {
            validators: {
                notEmpty: { message: "Ingrese los nombres del usuario" }
            },
        },
        modalapellidos: {
            validators: {
                notEmpty: { message: "Ingrese los apellidos del usuario" }
            },
        },      
        modalusuario: {
            validators: {
                notEmpty: { message: "Ingrese los apellidos del usuario" }
            },
        },      
        modalcorreo: {
            validators: {
                notEmpty: { message: "Por favor ingrese su correo" },
                emailAddress: { message: "Por favor ingrese un correo válido" },
            },
        },      
        modalrol: {
            validators: {
            notEmpty: { message: "Seleccione un rol" }
            },
        },
        modalpsw: {
            validators: {
                notEmpty: { message: "Ingrese una contraseña" },
                stringLength: {
                    min: 8,
                    message: "La contraseña debe tener 8 caracteres como mínimo",
                },
            },
        },
        modalrepeatpsw: {
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
  document.querySelector('#guardar').addEventListener('click', function (e) {
    e.preventDefault();
    // Validate form
    s.validate().then(function (status) {
      if (status == 'Valid') {  
        let datos = new FormData(f);
        fetch('includes/modelo-usuario.php',{
          method : 'POST',
          body : datos
        }).then(Response => Response.json())
        .then (datos => {
          if(datos.resultado == 'ok'){
            $('#editUser').modal('toggle');
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
                  var table = $('#tabla').DataTable();
                  $('#editUserForm').trigger("reset");
                  table.ajax.reload();                  
                  }                  
            });
          }
        })
      }
    });
  });


  z.length &&
  z.each(function () {
    var z = $(this);
    z.wrap('<div class="position-relative"></div>').select2({        
      dropdownParent: z.parent(),
    });
  });

  $('.select2').on("change.select2", function () {
    s.revalidateField(this.name);
  });

  CargarTabla(e, a, t, r);

  
  
})

function CapPalabras(oracion){

  const palabras = oracion.split(" ");
  
  for (let i = 0; i < palabras.length; i++) {
      palabras[i] = palabras[i][0].toUpperCase() + palabras[i].substr(1);
  }
  return palabras.join(" ");  

}

function CargarTabla(e, a, t, r){
  
  var table = $('#tabla').DataTable(); 
  table.destroy();
  $(".rol").empty();  
  a.length &&
    (e = a.DataTable({
      destroy :true,
      scrollX: true,
      
      ajax: {
        type: "POST",
        data:{
          'registro': 'tbregllamadas'
        },
        url:  'includes/modelo-usuario.php',
        dataType: 'json',
      },
      
      columns: [
        { 
          data: "id",
          visible: false
        },                      //0        
        { data: "nombres" },    //1
        { data: "usuario" },    //2
        { 
          data: "correo",
          visible: false 
        },                      //3
        { data: "rol" },        //4
        { 
          data: "nombcomp",
          visible: false
        },                      //5
        { 
          data: "nomb",
          visible: false
        },                      //6
        { 
          data: "apell",
          visible: false
        },                      //7
        { data: "fecha"},       //8
        { data: "" }            //9
      ],
      columnDefs: [
        {
          targets: 1,
          responsivePriority: 4,
          render: function (e, a, t, s) {            
            var n = t.nombres,
              l = t.correo,
              o = t.img;
            return (
              '<div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">' +
              (o
                ? '<img src="' +
                  o + 
                  '" alt="Avatar" class="rounded-circle">'
                : '<span class="avatar-initial rounded-circle bg-label-' +
                  [
                    "success",
                    "danger",
                    "warning",
                    "info",
                    "dark",
                    "primary",
                    "secondary",
                  ][Math.floor(6 * Math.random())] +
                  '">' + 
                  (o = (
                    ((o = (n = t.nombres).match(/\b\w/g) || []).shift() ||
                      "") + (o.pop() || "")
                  ).toUpperCase()) +
                  "</span>") +
              '</div></div><div class="d-flex flex-column"><a href="' +
              r +
              '" class="text-body text-truncate text-capitalize"><span class="fw-semibold text-lowercase text-capitalize">' +
              n +
              '</span></a><small class="text-muted">' +
              l + 
              "</small></div></div>"
            );
          },
        },
        
        {
          targets: -1,
          title: "Acciones",
          searchable: !1,
          orderable: !1,
          render: function (e, a, t, s) {
            var model = JSON.stringify(t);   
            return (
              '<div class="d-inline-block">' +
                '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                  '<i class="bx bx-dots-vertical-rounded"></i>' +
                '</button>'+
                '<div class="dropdown-menu dropdown-menu-end">'+
                  '<a href="javascript:;" class="dropdown-item" >Ver</a>'+
                  "<a href='javascript:AbrirModalEditar(" + model + ");' class='dropdown-item'>Editar</a>"+
                  '<div class="dropdown-divider"></div>'+
                  '<a href="javascript:;" class="dropdown-item text-danger delete-record">Eliminar</a>'+
                '</div>'+
              '</div>'+
            '</div>'
            );
          },
        },
      ],
      order: [[2, "asc"]],
      dom: '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      language: {                    
        searchPlaceholder: "Buscar..",
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
        infoFiltered: "(Filtrado de _MAX_ total entradas)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ Entradas",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "Sin resultados encontrados",
        paginate: {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      buttons: [
        {
          extend: "collection",
          className: "btn btn-label-secondary dropdown-toggle mx-3",
          text: '<i class="bx bx-upload me-2"></i>Exportar',
          buttons: [
            {
              extend: "print",
              text: '<i class="bx bx-printer me-2" ></i>Imprimir',
              className: "dropdown-item",
              exportOptions: { columns: [4, 5, 6, 7] },
            },
            {
              extend: "csv",
              bom: "true",
              text: '<i class="bx bx-file me-2" ></i>Csv',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1] },
            },
            {
              extend: "excel",
              text: '<i class="bx bx-file me-2" ></i>Excel',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1] },
            },
            {
              extend: "pdf",
              text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
              className: "dropdown-item",
              exportOptions: { columns: [4, 5] },
            },
            {
              extend: "copy",
              text: '<i class="bx bx-copy me-2" ></i>Copiar',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1] },
            },
          ],
        },
        {
          text: '<i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-lg-inline-block">Agregar Usuario</span>',
          className: "add-new btn btn-primary",
          action: function ( e, dt, node, config ) {
            location.href = 'nueva-llamada';
          },
        },
      ],        
      initComplete: function () {
        this.api()
          .columns(4)   //Rol
          .every(function () {
            var a = this,
              t = $(
                '<select id="rol" class="form-select text-capitalize">' +
                  '<option value=""> Selecione un rol </option>' +
                '</select>'
              )
                .appendTo(".rol")
                .on("change", function () {
                  var e = $.fn.dataTable.util.escapeRegex($(this).val());
                  a.search(e ? "^" + e + "$" : "", !0, !1).draw();
                });
            a.data()
              .unique()
              .sort()
              .each(function (e, a) {
                t.append('<option value="' + e + '">' + e + "</option>");
              });
          });
      },
    }))

    $(".datatables-users tbody").on("click", ".delete-record", function () {
      e.row($(this).parents("tr")).remove().draw();
    });
    
}

function AbrirModalEditar(model) {
  $('#uploadedAvatar').attr("src", model.img);;
  $('input[name="modalid"]').val(model.id);
  $('input[name="modalnombres"]').val(model.nomb);
  $('input[name="modalapellidos"]').val(model.apell);
  $('input[name="modalusuario"]').val(model.usuario);
  $('input[name="modalcorreo"]').val(model.correo);
  $('#modalrol').val(model.rol).trigger('change.select2');  
  $("#editUser").modal("show");
}

