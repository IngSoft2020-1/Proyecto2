$(document).ready(function() {
    console.log('jQuery esta funcionando');
    obtener();

    $('select').on('change', function() {
        sortAllBy(this.value);
    });

    function sortAllBy(field) {
        var rows = $('table tbody tr').toArray();
        switch (field) {
            case 'Fecha de llegada asc':
                rows = llegadaASC(rows, 'td.fecha-llegada', true);
                break;
            case 'Nombre asc':
                rows = nombreASC(rows, 'td.nombre', true);
                break;
            default:
                console.error('Undefined sort field ' + field);
            break;
      }
      
      for (var i = 0; i < rows.length; i++) {
          $('table-migrants tbody').append(rows[i]);
      }
    }

    // METODO DE BUSQUEDA PARA MIGRANTES
  $("#search-migrants").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table-migrants tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

    /*Usado en migrant.php*/
    /*Funcion para imprimir las filas de los migrantes existentes*/
    function obtener() {
        $row=0;
        $.ajax({
            url: 'tasks-migrants.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                console.log(tasks);
                let templado = '';
                tasks.forEach(task => {
                    $row++;
                    templado += `
                    <tr class="tr" task-id="${task.IDVisi}>
                        <td style="display: none;">${$row}</td>
                        <td class='fecha-llegada'>${task.FechaLlegada}</td>
                        <td class='nombre'>${task.Nombre}</td>
                        <td class="min-width">${task.FechaNacimiento}</td>
                        <td class="min-width">${task.HoraLlegada}</td>
                        <td class="cita">${task.CitaConsulado}</td>
                        <td>${task.Pais}</td>
                        <td>${task.Telefono}</td>
                        <td class="container-menu menu">
                            <div class="options menu-${$row}">
                                <div class="option">
                                    <p class="text-menu edit-1">Editar</p>
                                </div>
                                <div class="option">
                                    <p class="text-menu">Eliminar</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    `
                });
                $('#tasks-migrants').html(templado);
            }
        });
    }
});