var dataTable;
$(document).ready(function () {
  dataTable = $("#table-blog").DataTable({
    ordering: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: " _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
      },
    }
  });

  getTable(dataTable);

});

function getTable(dataTable) {

  $.ajax({
    url: 'config/global/get-global.php',
    method: 'POST',
    data: {
      action: 'get_all_blog'
    },
    dataType: 'json',
    success: function (data) {

      // Clear DataTable before adding new rows
      dataTable.clear();

      // Iterate over the data and add rows to the table
      $.each(data, function (index, result) {

        var fechaFormateada = new Date(result.date_create);
        var dia = fechaFormateada.getDate().toString().padStart(2, '0');
        var mes = (fechaFormateada.getMonth() + 1).toString().padStart(2, '0');
        var año = fechaFormateada.getFullYear();
        var fechaCreacion = dia + '/' + mes + '/' + año;

         var estadoBtn = '';
        if (result.state === 'active') { 
          estadoBtn = '<button type="button" style="cursor: auto;" class="btn btn-sm btn-success">active</button>';
        } else if (result.state === 'inactive') {
          estadoBtn = '<button type="button" style="cursor: auto;" class="btn btn-sm btn-danger">inactive</button>';
        }

        var newRow = '<tr>' +
          '<td class="align-middle text-center">' + result.id + '</td>' +
          '<td class="align-middle text-center">' + result.title + '</td>' +
          '<td class="align-middle text-center">' + result.description + '</td>' +
          '<td class="align-middle text-center">' + fechaCreacion + '</td>' +
          '<td class="align-middle text-center">' + estadoBtn + '</td>' +
          '<td class="align-middle">' +
          '<div class="d-flex justify-content-center align-items-center gap-1">' +
          '<a href="edit-blog?id=' + result.id + '" class="btn btn-sm btn-warning"><i class="bx bxs-edit"></i></a>' +
          '<a href="config/global/delete-blog.php?id=' + result.id + '" class="btn btn-sm btn-danger delete"><i class="bx bx-trash"></i></a>' +
          '</div>' +
          '</td>' +
          '</tr>';
        dataTable.row.add($(newRow)).draw(false);
      });
    }
  });
}
$(document).on('click', '.delete', function (e) {
    e.preventDefault(); // Previene redirección inmediata

    const url = $(this).attr('href');

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
});
