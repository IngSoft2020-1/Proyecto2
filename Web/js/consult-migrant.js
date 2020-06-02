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
        if(typeSelect == "3" || typeSelect == "4")
        {
            if(typeSelect == "3")
            {
                //Set the sorting direction to ascending:
                dir = "asc";
            }
            else if(typeSelect == "4")
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
                    if (dir == "asc")
                    {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        }
                    }
                    else if (dir == "desc")
                    {
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
        }
        else if(typeSelect == "1" || typeSelect == "2")
        {
            if(typeSelect == "1")
            {
                //Set the sorting direction to ascending:
                dir = "asc";
            }
            else if(typeSelect == "2")
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
                    x = Date.parse(rows[i].getElementsByTagName("TD")[0]);
                    y = Date.parse(rows[i + 1].getElementsByTagName("TD")[0]);

                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir == "asc")
                    {
                        if (x > y) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        }
                    }
                    else if (dir == "desc")
                    {
                        if (x < y) {
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
                    <tr class="tr" task-id="${task.IDVisi}">
                        <td>${$row}</td>
                        <td class='fecha-llegada'><input disabled="on" type="text" value="${task.FechaLlegada}" class="datepicker habilitar"></td>
                        <td class='nombre'><input type="text" value="${task.Nombre}" disabled="on" class="habilitar"></td>
                        <td class="min-width"><input disabled="on" type="text" value="${task.FechaNacimiento}" class="datepicker habilitar"></td>
                        <td class="min-width"><input disabled="on" type="text" class="timepicker habilitar" value="${task.HoraLlegada}"></td>
                        <td class="cita"><input disabled="on" type="text" class="timepicker habilitar" value="${task.CitaConsulado}"></td>
                        <td>
                          <select disabled="on" class="habilitar">
                            <option value="" selected>${task.Pais}</option>
                            <option value="">Argentina</option>
                            <option value="">San Bartolome</option>
                            <option value="">Bolivia</option>
                            <option value="">Brasil</option>
                            <option value="">Chile</option>
                            <option value="">Colombia</option>
                            <option value="">Cota Rica</option>
                            <option value="">Cuba</option>
                            <option value="">Ecuador></option>
                            <option value="">Guadalupe</option>
                            <option value="">Guatemala</option>
                            <option value="">Guyana Francesa</option>
                            <option value="">Mexico</option>
                            <option value="">Martinica</option>
                            <option value="">Nicaragua</option>
                            <option value="">Panama</option>
                            <option value="">Peru</option>
                            <option value="">Puerto Rico</option>
                            <option value="">Paraguay</option>
                            <option value="">Republica Dominicana</option>
                            <option value="">El Salvador</option>
                            <option value="">San Martin</option>
                            <option value="">Uruguay</option>
                            <option value="">Venezuela</option>
                          </select>
                        </td>
                        <td><input disabled="on" type="text" value="${task.Telefono}" class="txt-tel habilitar"></td>
                        <td>
                          <button class="button edit">Editar</button>
                        </td>
                        <td>
                          <button class="button task-delete delete">Eliminar</button>
                        </td>
                    </tr>
                    `;
                });
                $('#tasks-migrants').html(templado);
                // METODO PARA QUE EL INPUT DE TIPO DATAPICKER SEA UN CALENDARIO AL DAR CLICK
                $( ".datepicker" ).datepicker();
                // METODO DE MASCARA DE ENTRADA PARA QUE EL INPUT TEL SEA SOLO NUMERICO Y AUTOSERAPACION
                $('.txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder
                $('.timepicker').wickedpicker();
            }
        });
    }

    // EVENTO CLICK DEL BOTON EDITAR
    $('.edit').click(function(){
      alert("2");
    });

});
