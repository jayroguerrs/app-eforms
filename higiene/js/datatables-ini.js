// Call the dataTables jQuery plugin
$(document).ready(function() {

  $('#dataTable').DataTable( {
    destroy: true,
    responsive: true,
    "language": {      
      "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
    }
    },
    ajax: {
      type: "POST",
      data: {
        'registro': 'llenar-tabla',
        'anio':  $('#select-anio').val(),
        'mes': $('#select-mes').val(),
        'st': $('#select-estado').val()
      },
      url: "modelo-index.php",
      datatype: "json"
    },
              
    stateSave: true,
    columns: [                
        { data: 'SS',
          render: function (data) {
            if (data=='EVALUADO'){
              return  '<div class="mb-2 mr-2 badge badge-pill badge-success">EVALUADO</div>';
            } else {
              return  '<div class="mb-2 mr-2 badge badge-pill badge-danger">PENDIENTE</div>';
            }
          }
        },
        { data: 'Código'},
        { data: 'Nombres'},    
        { data: 'Desempeño'},                
        { data: 'Área'},
        { data: 'Turno'},
        { data: 'Fecha'},
        { data: 'Año',
          visible: false},
        { data: 'Mes',
          visible: false},
        { data: 'Especial',
          orderable: false,
          render: function (data) {                
            if(data == null){
              return  '<a class="btn btn-info btn-circle btn-sm disabled"  href="#" style="margin-right: 0.3rem"><i class="fas fa-eye"></i></a>'+                        
                      '<a href="editar-personal.php?id='+ data +'" class="btn btn-warning btn-circle btn-sm" style="margin-right: 0.3rem"><i class="fas fa-pencil-alt"></i></a>'+
                      '<a href="#" class="btn btn-danger btn-circle btn-sm borrar-registro disabled" style="margin-right: 0.3rem"><i class="fas fa-trash"></i></a>';
            } else {
              return  '<a onclick="AbrirModal(this)" data="'+ data +'" class="btn btn-info btn-circle btn-sm modal-colaborador" style="margin-right: 0.3rem"><i class="fas fa-eye"></i></a>'+
                      '<a href="editar-personal.php?id='+ data +'" class="btn btn-warning btn-circle btn-sm" style="margin-right: 0.3rem"><i class="fas fa-pencil-alt"></i></a>'+
                      '<a href="#" data-id=' + data + ' data-tipo="admin" type="button" class="btn btn-danger btn-circle btn-sm borrar-registro" style="margin-right: 0.3rem"><i class="fas fa-trash"></i></a>';
            }
          }
        }
    ],
       
    order: [[2, 'asc']],             
    
  });

  // Tabla para la lista de administradores
  $('#filtros').on('click', function(e){
    e.preventDefault();
    $('#dataTable').DataTable( {
      destroy: true,
      responsive: true,      
      ajax: {
        type: "POST",
        data: {
          'registro': 'llenar-tabla',
          'anio':  $('#select-anio').val(),
          'mes': $('#select-mes').val(),
          'st': $('#select-estado').val()
        },
        url: "modelo-index.php",
        datatype: "json"
      },
                
      stateSave: true,
      columns: [                
          { data: 'SS',
            render: function (data) {
              if (data=='EVALUADO'){
                return  '<div class="mb-2 mr-2 badge badge-pill badge-success">EVALUADO</div>';
              } else {
                return  '<div class="mb-2 mr-2 badge badge-pill badge-danger">PENDIENTE</div>';
              }
            }
          },
          { data: 'Código'},
          { data: 'Nombres'},    
          { data: 'Desempeño'},                
          { data: 'Área'},
          { data: 'Turno'},
          { data: 'Fecha'},
          { data: 'Año',
            visible: false},
          { data: 'Mes',
            visible: false},
          { data: 'Especial',
            orderable: false,
            render: function (data) {                
              if(data == null){
                return  '<a class="btn btn-info btn-circle btn-sm disabled"  href="#" style="margin-right: 0.3rem"><i class="fas fa-eye"></i></a>'+                        
                        '<a href="editar-personal.php?id='+ data +'" class="btn btn-warning btn-circle btn-sm" style="margin-right: 0.3rem"><i class="fas fa-pencil-alt"></i></a>'+
                        '<a href="#" class="btn btn-danger btn-circle btn-sm borrar-registro disabled" style="margin-right: 0.3rem"><i class="fas fa-trash"></i></a>';
              } else {
                return  '<a onclick="AbrirModal(this)" data="'+ data +'" class="btn btn-info btn-circle btn-sm modal-colaborador" style="margin-right: 0.3rem"><i class="fas fa-eye"></i></a>'+
                        '<a href="editar-personal.php?id='+ data +'" class="btn btn-warning btn-circle btn-sm" style="margin-right: 0.3rem"><i class="fas fa-pencil-alt"></i></a>'+
                        '<a href="#" data-id=' + data + ' data-tipo="admin" type="button" class="btn btn-danger btn-circle btn-sm borrar-registro" style="margin-right: 0.3rem"><i class="fas fa-trash"></i></a>';
              }
            }
          }
      ],
        
      order: [[2, 'asc']],
    });
})
  

  // Tabla para la lista de personal
  $('#dataTable2').DataTable( {
    destroy: true,        

    "language": {
      searchPanes: {
        title: {
            _: 'Filtros Seleccionados - %d',
            0: 'No hay filtros seleccionados'
        },    
      },
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    ajax: {
      type: "POST",
      data:{
        registro: 'llenar-tabla'
      },
      url: "modelo-personal.php",
      datatype: "json"
    },
    searchPanes: {
      i18n: {
        emptyMessage: "<i><b>VACÍO</b></i>"
      },
      dtOpts: {
        select: {
          style: 'multi'
        }
      },
    },
    dom: 'Pl<B<ft>ip>',
    stateSave: true,
    columns: [ 
        {        
          orderable: false,
          data: null,
          defaultContent: '<a class="btn btn-info btn-circle btn-sm">' +
                              '<i class="fas fa-info-circle"></i></a>'
        },       
        { data: 'cod'},
        { data: 'dni',
          visible: false},
        { data: 'name'},
        { data: 'email',
          visible: false},
        { data: 'performance'},        
        { data: 'status',
          render: function (data, type, row) {
            let color;
            if (row.status == 'INACTIVO') {
              //$('#id_' + row.cod).css({'color': 'red', 'font-weight': 'bold'});
              color = 'red';
            } else if (row.status == 'NUEVO') {
              //$('#id_' + row.cod).css({'color': 'green', 'font-weight': 'bold'});
              color = 'orange';
            } else {
              color = 'green';
            }   
            return  '<span style="color:' + color + '; font-weight: bold">' + row.status + '</span>';
          }
        },
        { data: 'ef_super'},
        { data: 'cod',
          render: function (data) {
            return '<a href="editar-personal.php?id='+ data +'" class="btn btn-warning btn-circle btn-sm" style="margin-right: 0.5rem"><i class="fas fa-pencil-alt"></i></a>'+
                   '<a href="#" data-id=' + data + ' data-tipo="admin" type="button" class="btn btn-danger btn-circle btn-sm borrar-registro" style="margin-right: 0.5rem"><i class="fas fa-trash"></i></a>';
          }
        }
    ],
       
    order: [[3, 'asc']],
       
    columnDefs: [{
      searchPanes: {
        show: true
      },
      targets: [5, 6, 7]
    }],


    rowId: function(a) {
      return 'id_' + a.cod;
    },
            
    buttons: [
      {
          extend: 'excelHtml5',
          text: '<i class="fa fa-file-excel"> Exportar Excel (*xlsx)</i>',
          title: 'EForms - Lista colaboradores',
          filename: 'EForms_Lista_Colaboradores',
          exportOptions: {
            columns:[1,2,3,4,5,6,7]
          },
          customize: function( xlsx ) {
              var sheet = xlsx.xl.worksheets['sheet1.xml'];
              $('row:first c', sheet).attr( 's', '42' );
          }
      },
      {
        extend: 'pdf',
        text: '<i class="fa fa-file-pdf"> Exportar PDF (*pdf)</i>',
        title: 'EForms - Lista colaboradores',
        filename: 'EForms_Lista_Colaboradores',
        orientation: 'landscape',
        exportOptions: {
          columns:[1,2,3,4,5,6,7]
        }      
    }
    ]
    
  });

  // Tabla para los controles CRUD
  $('#dataTable3').DataTable( {
    destroy: true,        
    "language": {
      searchPanes: {
        title: {
            _: 'Filtros Seleccionados - %d',
            0: 'No hay filtros seleccionados'
        },    
      },
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    
    scrollX: true,
    scrollCollapse: true,
    paging:false,
    searching: true,
    stateSave: true
    
  });
  

  // Add event listener for opening and closing details
  $('#dataTable2 tbody').on('click', 'a.btn-info', function () {
    var tr = $(this).parents('tr');
    var row = $('#dataTable2').DataTable().row( tr );
    console.log(row);
    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        $(this).toggleClass('btn-danger');
    }
    else {
        // Open this row
        row.child( format(row.data()) ).show();
        $(this).toggleClass('btn-danger');
    }
  });

  function format ( d ) {
    // `d` is the original data object for the row
    return '<table class="table table-borderless" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td style="width:30%" >Correo Electrónico:</td>'+
            '<td>'+d.email+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Nacionalidad:</td>'+
            '<td>'+d.nationality+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Ocupación:</td>'+
            '<td>'+d.jobtitle+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>DNI / Carné de Extranjería:</td>'+
            '<td>'+d.dni+'</td>'+
        '</tr>'+
    '</table>';
  }

});


  

