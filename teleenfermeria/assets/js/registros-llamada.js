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
      edithc: {
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
      editnomb: {
        validators: {
          notEmpty: { message: "Ingrese los nombres del paciente" },
          regexp: {
            regexp: "^(^\S|\S$)",
            message: 'The value is not a valid email address',
          },
        },
      },
      editapell: {
        validators: {
          notEmpty: { message: "Ingrese los apellidos del paciente" }
        },
      },
      editedad: {
        validators: {
          notEmpty: { message: "Ingrese la edad del paciente" }
        },
      },
      editfecinout: {
        validators: {
          notEmpty: { message: "Ingrese la fecha de ingreso y alta" }
        },
      },
      editservicio: {
        validators: {
           notEmpty: { message: "Seleccione un servicio" }
        },
      },
      edithab: {
        validators: {
          notEmpty: { message: "Ingrese la habitación" }      
        },
      },
      editcomp: {
        validators: {
          promise: {
            promise: function (input) {
              return new Promise(function (resolve, reject){
                if (document.getElementById("editseguro").checked == true && input.value == '') {
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
      editdx: {
        validators: {
          notEmpty: { message: "Ingrese el diagnóstico médico" }
        },
      },
      editestado: {
        validators: { notEmpty: { message: "Seleccione el estado de llamada" }
       },
      },
      editinoutllamada: {
        validators: { 
          notEmpty: { message: "Seleccione hora de inicio y fin de llamada" },
          stringLength: {
            min: 27,              
            message:
              "Debe seleccionar tambien una hora de fin"
          },
        },
      },
      editconformidad: {
        validators: {
          notEmpty: { message: "Seleccione la conformidad de atención" }
        },
      },
      editclasificacion: {
        validators: {
          notEmpty: { message: "Seleccione la clasificación" }
        },
      },
      editaccion: {
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
      transformer: new FormValidation.plugins.Transformer({
        fullName: {
          notEmpty: function (field, element, validator) {
            // Get the field value
            const value = element.value;

            // Remove the spaces from beginning and ending
            return value.trim();
          },
        },
      }),
    },          
  });
  // Handle form submit
  document.querySelector('#guardar').addEventListener('click', function (e) {
    e.preventDefault();
    // Validate form
    s.validate().then(function (status) {
      if (status == 'Valid') {  
        let datos = new FormData(f);
        fetch('includes/modelo-aplicaciones.php',{
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
  
  flatpickr(f.querySelector('[name="editfecinout"]'), {
    mode: 'range',
    maxDate: 'today',
    enableTime: !1,
    dateFormat: "d/m/Y",
    onChange: function () {
      s.revalidateField("editfecinout");
      f.querySelector('[name="editfecinout"]').focus();
    },
  });
  flatpickr(f.querySelector('[name="editinoutllamada"]'), {
    mode: 'range',
    maxDate: 'today',
    enableTime: true,
    dateFormat: "d/m/Y G:i:S K",
    onChange: function () {
      s.revalidateField("editinoutllamada");
      f.querySelector('[name="editinoutllamada"]').focus();
    },
  });  

  CargarTabla(e, a, t, r, $('input[name="fechaini"]').val(), $('input[name="fechafin"]').val());

  var fp = flatpickr($('input[name="ingreso_alta"]'), {
    mode: 'range',
    maxDate: 'today',
    enableTime: !1,
    dateFormat: "d/m/Y",
    defaultDate: [$('input[name="fechaini"]').val(), $('input[name="fechafin"]').val()],
    onOpen: function (dateSelected, dateStr, dateObj) {
      var x = document.getElementById("spinnercarga");
      x.style.display = "";
    },
    onChange: function (dateSelected, dateStr, dateObj) {
      fp.set('minDate',dateObj.selectedDates[0])
      if (dateObj.selectedDates[0].fp_incr(62) < new Date().fp_incr(-62) ) {
        fp.set('maxDate',dateObj.selectedDates[0].fp_incr(62));
      }
    },
    onClose: function (dateSelected, dateStr, dateObj) {
      if ($('input[name="ingreso_alta"]').val()!='') {
        var fechaini = $('input[name="ingreso_alta"]').val().slice(0,10);
        var fechafin = $('input[name="ingreso_alta"]').val().slice(13,23);
        CargarTabla(e, a, t, r, fechaini, fechafin);
        var x = document.getElementById("spinnercarga");
        x.style.display = "none";
      }
    }
  });

  $('button[name="clear"]').on('click', function(){ 
    flatpickr($('input[name="ingreso_alta"]')).destroy();
    
    var fp = flatpickr($('input[name="ingreso_alta"]'), {
      mode: 'range',      
      maxDate: 'today',
      enableTime: !1,
      dateFormat: "d/m/Y", 
      defaultDate: [$('input[name="fechaini"]').val(), $('input[name="fechafin"]').val()],
      onOpen: function (dateSelected, dateStr, dateObj) {
        var x = document.getElementById("spinnercarga");
        x.style.display = "";
      },
      onChange: function (dateSelected, dateStr, dateObj) {
        fp.set('minDate',dateObj.selectedDates[0])
        if (dateObj.selectedDates[0].fp_incr(62) < new Date().fp_incr(-62) ) {
          fp.set('maxDate',dateObj.selectedDates[0].fp_incr(62))          
        }
      },
      onClose: function (dateSelected, dateStr, dateObj) {
        if ($('input[name="ingreso_alta"]').val()!='') {        
          var fechaini = $('input[name="ingreso_alta"]').val().slice(0,10);
          var fechafin = $('input[name="ingreso_alta"]').val().slice(13,23);
          CargarTabla(e, a, t, r, fechaini, fechafin);
        }
        var x = document.getElementById("spinnercarga");
        x.style.display = "none";
      }
    });
  })
  
})

function CapPalabras(oracion){

  const palabras = oracion.split(" ");
  
  for (let i = 0; i < palabras.length; i++) {
      palabras[i] = palabras[i][0].toUpperCase() + palabras[i].substr(1);
  }
  return palabras.join(" ");  

}

$('#ingreso_alta').on('change', function(){
  if (this.value.length == 10) {
    $(this).val($(this).val() + ' - ' + $(this).val());
  }      
})

function CargarTabla(e, a, t, r, fechaini, fechafin){
  
  var table = $('#tabla').DataTable(); 
  table.destroy();
  $(".conf").empty();
  $(".res").empty();
  $(".estado").empty();
  a.length &&
    (e = a.DataTable({
      destroy :true,
      scrollX: true,
      
      ajax: {
        type: "POST",
        data:{
          'registro': 'tbregllamadas',
          'horainicio':  fechaini,
          'horafin': fechafin
        },
        url:  'includes/modelo-aplicaciones.php',
        dataType: 'json',
      },
      
      columns: [
        { 
          data: "id",
          visible: false
          },                   //0
        { 
          data: "hc",
          visible: false  
        },                    //1
        { data: "nombres" },  //2
        { data: "conf" },     //3
        { data: "res" },      //4
        { data: "horain" },   //5
        { data: "estado" },   //6
        { 
          data: "edad",
          visible: false
        },                    //7
        { 
          data: "ingreso",
          visible: false
        },                    //8
        { 
          data: "alta",
          visible: false
        },                    //9
        { 
          data: "nombcomp",
          visible: false
        },                    //10
        { 
          data: "dx",
          visible: false
        },                    //11
        { 
          data: "horafin",
          visible: false
        },                    //12
        { 
          data: "clasificacion",
          visible: false
        },                    //13
        { 
          data: "accion",
          visible: false
        },                    //14
        { 
          data: "obs",
          visible: false
        },                    //15
        { 
          data: "nomb",
          visible: false
        },                    //16
        { 
          data: "apell",
          visible: false
        },                    //17
        { data: "" },         //18
      ],
      columnDefs: [
        {
          targets: 2,
          responsivePriority: 4,
          render: function (e, a, t, s) {            
            var n = t.nombres,
              l = t.edad,
              o = "";
            return (
              '<div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">' +
              (o
                ? '<img src="' +
                  assetsPath +
                  "/img/avatars/" +
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
              l + ' años ' +
              "</small></div></div>"
            );
          },
        },
        {
          targets: 3,
          render: function (e, a, t, s) {
            t = t.conf;
            return (
              "<span class='text-truncate d-flex align-items-center'>" +
              {
                'Conforme':
                  '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>',
                'No conforme':
                  '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="bx bx-cog bx-xs"></i></span>',
                'No evaluable':
                  '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>',
                'No opina':
                  '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="bx bx-edit bx-xs"></i></span>'
              }[t] +
              t +
              "</span>"
            );
          },
        },
        {
          targets: 4,
          render: function (e, a, t, s) {
            return '<span class="fw-semibold">' +  CapPalabras(t.res) + '</span>';
          },
        },
        {
          targets: [5, 12],
          render: $.fn.dataTable.render.moment( 'YYYY-MM-DD HH:mm:ss', 'DD/MM/YYYY hh:mm:ss A' )
        },
        {
          targets: [8, 9],
          render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD/MM/YYYY' )
        },
        {
          targets: 6,
          render: function (e, a, t, s) {
            t = t.estado;
            return (
              {
                'CONTESTADA':
                  '<span class="badge bg-label-success">Contestada</span>',
                'NO CONTESTADA':
                  '<span class="badge bg-label-secondary">No Contestada</span>',
                'NÚMERO INCORRECTO':
                  '<span class="badge bg-label-warning">Número Incorrecto</span>',
                'SIN NÚMERO':
                  '<span class="badge bg-label-info">Sin Número</span>',
              }[t]
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
                  '<a href="javascript:EliminarRegistro(' + t.id + ');" class="dropdown-item text-danger delete-record">Eliminar</a>'+
                '</div>'+
              '</div>'+
            '</div>'
            );
          },
        },
      ],
      order: [[5, "desc"]],
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
              exportOptions: { columns: [0, 1, 16, 17, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15] },
            },
            {
              extend: "excel",
              text: '<i class="bx bx-file me-2" ></i>Excel',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 16, 17, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15] },
            },
            {
              extend: "pdf",
              text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
              className: "dropdown-item",
              exportOptions: { columns: [4, 5, 6, 7] },
            },
            {
              extend: "copy",
              text: '<i class="bx bx-copy me-2" ></i>Copiar',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 16, 17, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15] },
            },
          ],
        },
        {
          text: '<i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-lg-inline-block">Agregar llamada</span>',
          className: "add-new btn btn-primary",
          action: function ( e, dt, node, config ) {
            location.href = 'nueva-llamada';
          },
        },
      ],        
      initComplete: function () {
        this.api()
          .columns(3)   //Conformidad
          .every(function () {
            var a = this,
              t = $(
                '<select id="conf" class="form-select text-capitalize">' +
                  '<option value=""> Selecione conformidad </option>' +
                '</select>'
              )
                .appendTo(".conf")
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
          }),
          this.api()
            .columns(4)     //responsable
            .every(function () {
              var a = this,
                t = $(
                  '<select id="res" class="form-select text-capitalize">' + 
                    '<option value=""> Seleccion responsable </option>' + 
                  '</select>'
                )
                  .appendTo(".res")
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
            }),
          this.api()
            .columns(6)       //Estado
            .every(function () {
              var a = this,
                t = $(
                  '<select id="estado" class="form-select text-capitalize">' + 
                    '<option value=""> Seleccione un estado </option>' + 
                  '</select>'
                )
                  .appendTo(".estado")
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
    
    var x = document.getElementById("spinnercarga");
    x.style.display = "none";
    Indicadores();
}

function Indicadores(){
  let datos = new FormData();
  
  datos.append('usuario', document.querySelector('[name="nombreusuario"]').value);
  datos.append('rol', document.querySelector('[name="rolusuario"]').value);
  datos.append('fechaini', document.querySelector('input[name="ingreso_alta"]').value.slice(0,10));
  datos.append('fechafin', document.querySelector('input[name="ingreso_alta"]').value.slice(13,23));
  datos.append('registro', 'indicadores');

  fetch('includes/modelo-aplicaciones.php',{
    method : 'POST',
    body : datos
  }).then(Response => Response.json())
  .then (datos => {  
    document.querySelector('#lblllamadas').innerHTML = (datos.data[0].llamadas);
    document.querySelector('#lblcontestadas').innerHTML = (datos.data[0].contestadas);
    document.querySelector('#lblporccontestadas').innerHTML = "(" + (Number(datos.data[0].contestadas) / Number(datos.data[0].llamadas) * 100).toFixed(1) + "%)";
    document.querySelector('#lblconformes').innerHTML = (datos.data[0].conformes);
    document.querySelector('#lblporcconformes').innerHTML = "(" + (Number(datos.data[0].conformes) / Number(datos.data[0].contestadas) * 100).toFixed(1) + "%)";
    document.querySelector('#lblnoconformes').innerHTML = (datos.data[0].noconformes);
    document.querySelector('#lblporcnoconformes').innerHTML = "(" + (Number(datos.data[0].noconformes) / Number(datos.data[0].contestadas) * 100).toFixed(1) + "%)";
  })
}

function AbrirModalEditar(model) {
  $('input[name="editid"]').val(model.id);
  $('input[name="edithc"]').val(model.hc);
  $('input[name="editnomb"]').val(model.nomb);
  $('input[name="editapell"]').val(model.apell);
  $('input[name="editedad"]').val(model.edad);
  $('input[name="editfecinout"]').val(model.ingreso + ' - ' + model.alta);
  $('#editservicio').val(model.servicio).trigger('change.select2');  
  $('input[name="edithab"]').val(model.hab);
  $('#editcomp').val(model.nombcomp).trigger('change.select2');
  if ($('#editcomp').val()=='') {
    $('input[name="editseguro"]').prop("checked", false);
  } else {
    $('input[name="editseguro"]').prop("checked", true);
  }
  $('input[name="editdx"]').val(model.dx);
  $('#editestado').val(model.estado).trigger('change.select2');
  $('input[name="editinoutllamada"]').val(model.horain + ' - ' + model.horafin);
  if (model.conf==null){
    $('#editconformidad').val(model.conf).trigger('change.select2');
  } else {
    $('#editconformidad').val(model.conf.toUpperCase()).trigger('change.select2');
  }
  if (model.accion==null){
    $('#editaccion').val(model.accion).trigger('change.select2');
  } else {
    $('#editaccion').val(model.accion.toUpperCase()).trigger('change.select2');
  }
  if (model.clasificacion==null){
    $('#editclasificacion').val(model.clasificacion).trigger('change.select2');
  } else {
    $('#editclasificacion').val(model.clasificacion.toUpperCase()).trigger('change.select2');
  }
  $('textarea[name="editobs"]').val(model.obs);
  $("#editUser").modal("show");
}

function EliminarRegistro(id){
  Swal.fire({
    text: "¿Está seguro que desea eliminar el registro?",
    icon: "warning",        
    confirmButtonText: "Si, eliminar",
    showCancelButton: true,
    customClass: {
        confirmButton: "btn btn-primary me-1",
        cancelButton: 'btn btn-danger ms-1'
    },
    buttonsStyling: false
  }).then(function (result) {
      if (result.isConfirmed) {              
        var table = $('#tabla').DataTable();
        let datos = new FormData();
        datos.append('id', id);
        datos.append('registro', 'eliminarreg');
        fetch('includes/modelo-aplicaciones.php',{
          method : 'POST',
          body : datos
        }).then(Response => Response.json())
        .then (datos => {
          if(datos.resultado == 'ok'){            
            table.ajax.reload();
          }
        });
      }
  });
}