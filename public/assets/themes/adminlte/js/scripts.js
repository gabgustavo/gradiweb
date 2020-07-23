var maindomain = $('meta[name="domain"]').attr('content');
$(document).ready(function () {
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  var configTable = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

  };

  var configCalendar = {
    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Cerrar',
    labelMonthNext: 'Siguiente mes',
    labelMonthPrev: 'Mes anterior',
    labelMonthSelect: 'Seleccione un mes',
    labelYearSelect: 'Seleccione un año',
    firstDay: 1,
    format: 'dddd, dd !de mmmm !de yyyy',
    formatSubmit: 'dd/mm/yyyy',
    selectYears: true,
    selectMonths: true,
    min: true,
    max: 30,
    onStart: function () {
      var date = new Date();
      this.set('select', [date.getFullYear(), date.getMonth(), date.getDate()]);
    }
  };

  //<eliminar registros>
  $(document).on('click', ".btn-delete-info", function(e){
    e.preventDefault();

    var link = ($(this).attr('data-href')) ? $(this).attr('data-href') : $(this).attr('href');
    var request = ($(this).attr('data-request')) ?  $(this).attr('data-request') : 'default';

    swal.fire({
      title: '¿Esta seguro de que desea eliminar este registro?',
      text: "El proceso sera irreversible!",
      type: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#dc3545',
      dangerMode: true,
    })
      .then(function(result){
        if (result.value) {
          if (request == 'ajax') {
            $.ajax({
              url: link,
              dataType: 'json',
              method: 'POST'
            })
              .done(function (data) {
                if (!data.response) {
                  Swal.fire("Registro no eliminado", "Intentelo nuevamente", "error");
                } else {
                  location.reload(true);
                }
              })
              .fail(function (error) {
                swal.fire("¡Error!", "Intentelo nuevamente", "error");
              })
          } else {
            window.location.href = link;
          }
        }
      });

  })
  //</eliminar registros>


  //<tabla usuarios>
  if($('.tablaUsuarios').length) {
    $('.tablaUsuarios').DataTable({
      "deferRender": true,
      "retrieve": true,
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: usuariosAjaxUri,
        type: 'get'
      },
      "columns": [
        {"data": "foto"},
        {"data": "nombres"},
        {"data": "email"},
        {"data": "telefono"},
        {"data": "estado"},
        {"data": "aciones"}
      ],
      "language": configTable
    });
  }
  //</tabla usuarios>
  //<listar los correos>
  if($('.tablaemail').length) {
    $('.tablaemail').DataTable({
      "deferRender": true,
      "retrieve": true,
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: emailAjaxUri,
        type: 'get'
      },
      "columns": [
        {"data": "username"},
        {"data": "active"},
        {"data": "authenticate"},
        {"data": "smtp_secure"},
        {"data": "host"},
        {"data": "port"},
        {"data": "updated_at"},
        {"data": "aciones"}
      ],
      "language": configTable
    });
  }
  //</listar los correos>

  //<listar tipo de documentos>
  if($('.tablaTipoDocumento').length) {
    $('.tablaTipoDocumento').DataTable({
      "deferRender": true,
      "retrieve": true,
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: tpdocumentosAjaxUri,
        type: 'get'
      },
      "columns": [
        {"data": "tipo_documento"},
        {"data": "aciones"}
      ],
      "language": configTable
    });
  }
  //</listar tipo de documentos>




});//</jquery>



function feches(selector, formato)
{
  if (typeof formato == 'undefined') formato = 'YYYY-MM-DD HH:mm:ss';

  $(selector).daterangepicker({
    timePicker: true,
    timePicker24Hour: true,
    timePickerSeconds: true,
    singleDatePicker: true,
    //showDropdowns: true,
    showCustomRangeLabel: false,
    language: 'es',
    minYear: new Date().getFullYear() - 1,
    maxYear: parseInt(moment().format('YYYY'),10),
    //startDate: new Date(),
    locale: {
      format: formato,
      applyLabel: 'Aplicar',
      cancelLabel: 'Cancelar',
      "daysOfWeek": [
        "Do",
        "Lun",
        "Mar",
        "Mié",
        "Juv",
        "Vie",
        "Sáb"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ]
      //cancelLabel: 'Clear'
    },
    //minYear: 2019,
  });
}




