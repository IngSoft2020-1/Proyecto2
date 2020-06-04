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
    var edit; // BOTON CLICK, SE DECLARA AFUERA DEBIDO QUE AQUI NO GENERO ERRORES
    var borrar;
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
                    $('#table-migrants tbody').append(`
                    <tr class="tr" id="${task.IDVisi}">
                        <td>${$row}</td>
                        <td class='fecha-llegada'>
                          <input disabled="on" type="text" value="${task.FechaLlegada}" class="datepicker habilitar ${$row}">
                        </td>
                        <td class='nombre'>
                          <input type="text" value="${task.Nombre}" disabled="on" class="habilitar ignorar ${$row}">
                        </td>
                        <td class="min-width">
                          <input disabled="on" type="text" value="${task.FechaNacimiento}" class="datepicker habilitar ${$row}">
                        </td>
                        <td class="min-width">
                          <input disabled="on" type="text" class="timepicker habilitar ${$row}" value="${task.HoraLlegada}">
                        </td>
                        <td class="cita">
                          <input disabled="on" type="text" class="timepicker habilitar ${$row}" value="${task.CitaConsulado}">
                        </td>
                        <td>
                          <select disabled="on" class="habilitar ignorar ${$row}">
                            <option selected>${task.Pais}</option>
                            <option>Argentina</option>
                            <option>San Bartolome</option>
                            <option>Bolivia</option>
                            <option>Brasil</option>
                            <option>Chile</option>
                            <option>Colombia</option>
                            <option>Cota Rica</option>
                            <option>Cuba</option>
                            <option>Ecuador></option>
                            <option>Guadalupe</option>
                            <option>Guatemala</option>
                            <option>Guyana Francesa</option>
                            <option>Mexico</option>
                            <option>Martinica</option>
                            <option>Nicaragua</option>
                            <option>Panama</option>
                            <option>Peru</option>
                            <option>Puerto Rico</option>
                            <option>Paraguay</option>
                            <option>Republica Dominicana</option>
                            <option>El Salvador</option>
                            <option>San Martin</option>
                            <option>Uruguay</option>
                            <option>Venezuela</option>
                          </select>
                        </td>
                        <td>
                          <input disabled="on" type="text" value="${task.Telefono}" class="txt-tel habilitar ${$row}">
                          <span class="${$row}" style="display: none;"/>
                        </td>
                        <td>

                          <button class="button edit" id="${$row}">Editar</button>
                        </td>
                        <td>
                          <button class="button task-delete delete delete${$row}">Eliminar</button>
                        </td>
                    </tr>
                    `);
                });
                //*************************************************************
                // NOTA: LEER.
                /* EN LA LINEA 232 SE AGREGO UN SPAN Y SE HACE INVISIBLE, ESTE
                SE UTILIZA PARA OBTENER SU CLASE, EL CUAL ES UNA CLASE NUMERICA
                ESTO SIRVE PARA DETECTAR EXACTAMENTE DONDE SE DIO CLICK EN EL
                BOTON EDITAR.
                */
                //*************************************************************
                // $('#tasks-migrants').html(templado);
                // METODO PARA QUE EL INPUT DE TIPO DATAPICKER SEA UN CALENDARIO AL DAR CLICK
                $( ".datepicker" ).datepicker();
                // METODO DE MASCARA DE ENTRADA PARA QUE EL INPUT TEL SEA SOLO NUMERICO Y AUTOSERAPACION
                $('.txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder
                $('.timepicker').wickedpicker();
                // EVENTO CLICK DE BOTON EDITAR, SOLO AQUI FUNCIONA
                edit = $('.edit');
                let count = 0;
                edit.click(function(){
                  // OBTIENE LA CLASE, OBTIENE UN NUMERO.
                  // LOS ELEMENTOS CREADOS EN AJAX TIENEN UNA CLASE CON UN NUMERO
                  // PARA CUANDO SE DE CLICK EN EL BOTON EDITAR SE HABLITEN SOLAMENTE ESA FILA
                  // Y NO TODA LA TABLA
                  var claseIdentificador = $(this).parent('td').prev().children('span').attr('class');
                  borrar = $('.delete'+claseIdentificador); // OBTIENE EL RENGLON EXACTO DEL BOTON ELIMINAR
                  // DETECTA EL PRIMER CLICK
                  if($('#'+claseIdentificador).text() == "Editar"){
                    // 1.- ELEMENTO DE LA CLASE- 2.- DISABLED. 3.- TIPO DE CURSOR
                    Habilitar_Deshabilitar($('.'+claseIdentificador), false, "pointer");
                    // 1.- ELEMENTO. 2.- TEXTO DEL BOTON. 3.- COLOR
                    Modificar_Boton($('#'+claseIdentificador), "Guardar", "#EC6D4A");
                    Modificar_Boton($('.delete'+claseIdentificador), "Cancelar", "transparent");
                  }
                  // DETECTA EL SEGUNDO CLICK
                  else if($('#'+claseIdentificador).text() == "Guardar"){
                    Habilitar_Deshabilitar($('.'+claseIdentificador), "on", "default");
                    Modificar_Boton($('#'+claseIdentificador), "Editar", "transparent");
                    Modificar_Boton($('.delete'+claseIdentificador), "Eliminar", "#EC6D4A");
                  }
                });

                function Habilitar_Deshabilitar(elemento, disabled, cursor){
                  elemento.prop("disabled", disabled).css("cursor", cursor);
                }

                function Modificar_Boton(elemento, texto, color){
                  elemento.text(texto);
                  elemento.css("background", color);
                }
            }
        });
    }


    $('.task-delete').click(function(){
      alert("2");
      console.log($('.delete'+claseIdentificador).text());
      // DETECTA EL PRIMER CLICK
      if($('.delete'+claseIdentificador).text() == "Eliminar"){
        //*******************************************************
        //*******************************************************
        // AQUI VA CODIGO PARA ELIMINAR EL REGISTRO
        //*******************************************************
        //*******************************************************
      }
      // DETECTA EL SEGUNDO CLICK
      else if($('.task-delete').text() == "Cancelar"){
        Habilitar_Deshabilitar($('.'+claseIdentificador), "on", "default");
        Modificar_Boton($('#'+claseIdentificador), "Editar", "transparent");
        Modificar_Boton($('.delete'+claseIdentificador), "Eliminar", "#EC6D4A");
      }
    });
});
