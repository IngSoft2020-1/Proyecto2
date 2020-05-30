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



    $("#mySelect").change(function() {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        var typeSelect = document.getElementById("mySelect").value;
        table = document.getElementById("table-migrants");
        switching = true;
        if(typeSelect == "1" || typeSelect == "3")
        {
            //Set the sorting direction to ascending:
            dir = "asc"; 
        }
        else if(typeSelect == "2" || typeSelect == "4")
        {
            dir = "desc";
        }
        
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) 
        {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[1];
                y = rows[i + 1].getElementsByTagName("TD")[1];
                /*check if the two rows should switch place,
                based on the direction, asc or desc:*/
                if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
                } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;      
            } 
            else {
                /*If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again.*/
            }
        }
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
                        <td>
                          <a href="" class="button edit">Editar</a>
                        </td>
                        <td>
                          <a href="" class="button task-delete delete">Eliminar</a>
                        </td>
                    </tr>
                    `
                });
                $('#tasks-migrants').html(templado);
            }
        });
    }
});
