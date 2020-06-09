$(document).ready(function() {
    console.log('jQuery esta funcionando');
    obtener();

    // METODO DE BUSQUEDA PARA MIGRANTES
  // $("#search-migrants").on("keyup", function() {
  //   var value = $(this).val().toLowerCase();
  //   $("#table-migrants tbody tr").filter(function() {
  //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  //   });
  // });



    // $("#mySelect").change(function() {
    //     var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    //     var typeSelect = document.getElementById("mySelect").value;
    //     table = document.getElementById("table-migrants");
    //     switching = true;
    //     if(typeSelect == "3" || typeSelect == "4")
    //     {
    //         if(typeSelect == "3")
    //         {
    //             //Set the sorting direction to ascending:
    //             dir = "asc";
    //         }
    //         else if(typeSelect == "4")
    //         {
    //             dir = "desc";
    //         }
    //
    //         /*Make a loop that will continue until
    //         no switching has been done:*/
    //         while (switching)
    //         {
    //             //start by saying: no switching is done:
    //             switching = false;
    //             rows = table.rows;
    //             /*Loop through all table rows (except the
    //             first, which contains table headers):*/
    //             for (i = 1; i < (rows.length - 1); i++) {
    //                 //start by saying there should be no switching:
    //                 shouldSwitch = false;
    //                 /*Get the two elements you want to compare,
    //                 one from current row and one from the next:*/
    //                 x = rows[i].getElementsByTagName("TD")[1];
    //                 y = rows[i + 1].getElementsByTagName("TD")[1];
    //                 /*check if the two rows should switch place,
    //                 based on the direction, asc or desc:*/
    //                 if (dir == "asc")
    //                 {
    //                     if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
    //                         //if so, mark as a switch and break the loop:
    //                         shouldSwitch= true;
    //                         break;
    //                     }
    //                 }
    //                 else if (dir == "desc")
    //                 {
    //                     if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
    //                         //if so, mark as a switch and break the loop:
    //                         shouldSwitch = true;
    //                         break;
    //                     }
    //                 }
    //             }
    //             if (shouldSwitch) {
    //                 /*If a switch has been marked, make the switch
    //                 and mark that a switch has been done:*/
    //                 rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //                 switching = true;
    //                 //Each time a switch is done, increase this count by 1:
    //                 switchcount ++;
    //             }
    //             else {
    //                 /*If no switching has been done AND the direction is "asc",
    //                 set the direction to "desc" and run the while loop again.*/
    //             }
    //         }
    //     }
    //     else if(typeSelect == "1" || typeSelect == "2")
    //     {
    //         if(typeSelect == "1")
    //         {
    //             //Set the sorting direction to ascending:
    //             dir = "asc";
    //         }
    //         else if(typeSelect == "2")
    //         {
    //             dir = "desc";
    //         }
    //
    //         /*Make a loop that will continue until
    //         no switching has been done:*/
    //         while (switching)
    //         {
    //             //start by saying: no switching is done:
    //             switching = false;
    //             rows = table.rows;
    //             /*Loop through all table rows (except the
    //             first, which contains table headers):*/
    //             for (i = 1; i < (rows.length - 1); i++) {
    //                 //start by saying there should be no switching:
    //                 shouldSwitch = false;
    //                 /*Get the two elements you want to compare,
    //                 one from current row and one from the next:*/
    //                 x = Date.parse(rows[i].getElementsByTagName("TD")[0]);
    //                 y = Date.parse(rows[i + 1].getElementsByTagName("TD")[0]);
    //
    //                 /*check if the two rows should switch place,
    //                 based on the direction, asc or desc:*/
    //                 if (dir == "asc")
    //                 {
    //                     if (x > y) {
    //                         //if so, mark as a switch and break the loop:
    //                         shouldSwitch= true;
    //                         break;
    //                     }
    //                 }
    //                 else if (dir == "desc")
    //                 {
    //                     if (x < y) {
    //                         //if so, mark as a switch and break the loop:
    //                         shouldSwitch = true;
    //                         break;
    //                     }
    //                 }
    //             }
    //             if (shouldSwitch) {
    //                 /*If a switch has been marked, make the switch
    //                 and mark that a switch has been done:*/
    //                 rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //                 switching = true;
    //                 //Each time a switch is done, increase this count by 1:
    //                 switchcount ++;
    //             }
    //             else {
    //                 /*If no switching has been done AND the direction is "asc",
    //                 set the direction to "desc" and run the while loop again.*/
    //             }
    //         }
    //     }
    // });


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
                    templado += `
                    <tr class="tr" id="${task.IDVisi}">
                        <td style="display: none;">${$row}</td>
                        <td class='fecha-llegada'>
                          <input disabled="on" type="text" value="${task.FechaLlegada}" class="datepicker fecha-llegada habilitar ${$row}">
                        </td>
                        <td class='nombre'>
                          <input type="text" value="${task.Nombre}" disabled="on" class="habilitar ignorar ${$row}">
                        </td>
                        <td class="min-width">
                          <input disabled="on" type="text" value="${task.FechaNacimiento}" class="datepicker fecha-llegada habilitar ${$row}">
                        </td>
                        <td class="min-width">
                          <select id="busqueda_hora" disabled="on" class="habilitar fecha-llegada ${$row}">
                            <option value="" selected>${task.HoraLlegada}</option>
                            <option value="12:00 AM">12:00 AM</option>
                            <option value="12:15 AM">12:15 AM</option>
                            <option value="12:30 AM">12:30 AM</option>
                            <option value="12:45 AM">12:45 AM</option>
                            <option value="01:00 AM">01:00 AM</option>
                            <option value="01:15 AM">01:15 AM</option>
                            <option value="01:30 AM">01:30 AM</option>
                            <option value="01:45 AM">01:45 AM</option>
                            <option value="02:00 AM">02:00 AM</option>
                            <option value="02:15 AM">02:15 AM</option>
                            <option value="02:30 AM">02:30 AM</option>
                            <option value="02:45 AM">02:45 AM</option>
                            <option value="03:00 AM">03:00 AM</option>
                            <option value="03:15 AM">03:15 AM</option>
                            <option value="03:30 AM">03:30 AM</option>
                            <option value="03:45 AM">03:45 AM</option>
                            <option value="04:00 AM">04:00 AM</option>
                            <option value="04:15 AM">04:15 AM</option>
                            <option value="04:30 AM">04:30 AM</option>
                            <option value="04:45 AM">04:45 AM</option>
                            <option value="05:00 AM">05:00 AM</option>
                            <option value="05:15 AM">05:15 AM</option>
                            <option value="05:30 AM">05:30 AM</option>
                            <option value="05:45 AM">05:45 AM</option>
                            <option value="06:00 AM">06:00 AM</option>
                            <option value="06:15 AM">06:15 AM</option>
                            <option value="06:30 AM">06:30 AM</option>
                            <option value="06:45 AM">06:45 AM</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:15 AM">07:15 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="07:45 AM">07:45 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:15 AM">08:15 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="08:45 AM">08:45 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:15 AM">09:15 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="09:45 AM">09:45 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:15 AM">10:15 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="10:45 AM">10:45 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:15 AM">11:15 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="11:45 AM">11:45 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:15 PM">12:15 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="12:45 PM">12:45 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:15 PM">01:15 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="01:45 PM">01:45 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:15 PM">02:15 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="02:45 PM">02:45 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:15 PM">03:15 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="03:45 PM">03:45 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:15 PM">04:15 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="04:45 PM">04:45 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:15 PM">05:15 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="05:45 PM">05:45 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:15 PM">06:15 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="06:45 PM">06:45 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:15 PM">07:15 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="07:45 PM">07:45 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:15 PM">08:15 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="08:45 PM">08:45 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:15 PM">09:15 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="09:45 PM">09:45 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:15 PM">10:15 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="10:45 PM">10:45 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:15 PM">11:15 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                            <option value="11:45 PM">11:45 PM</option>
                            </select>
                        </td>
                        <td class="cita">
                          <select id="busqueda_hora" disabled="on" class="habilitar ${$row}">
                            <option value="" selected>${task.CitaConsulado}</option>
                            <option value="12:00 AM">12:00 AM</option>
                            <option value="12:15 AM">12:15 AM</option>
                            <option value="12:30 AM">12:30 AM</option>
                            <option value="12:45 AM">12:45 AM</option>
                            <option value="01:00 AM">01:00 AM</option>
                            <option value="01:15 AM">01:15 AM</option>
                            <option value="01:30 AM">01:30 AM</option>
                            <option value="01:45 AM">01:45 AM</option>
                            <option value="02:00 AM">02:00 AM</option>
                            <option value="02:15 AM">02:15 AM</option>
                            <option value="02:30 AM">02:30 AM</option>
                            <option value="02:45 AM">02:45 AM</option>
                            <option value="03:00 AM">03:00 AM</option>
                            <option value="03:15 AM">03:15 AM</option>
                            <option value="03:30 AM">03:30 AM</option>
                            <option value="03:45 AM">03:45 AM</option>
                            <option value="04:00 AM">04:00 AM</option>
                            <option value="04:15 AM">04:15 AM</option>
                            <option value="04:30 AM">04:30 AM</option>
                            <option value="04:45 AM">04:45 AM</option>
                            <option value="05:00 AM">05:00 AM</option>
                            <option value="05:15 AM">05:15 AM</option>
                            <option value="05:30 AM">05:30 AM</option>
                            <option value="05:45 AM">05:45 AM</option>
                            <option value="06:00 AM">06:00 AM</option>
                            <option value="06:15 AM">06:15 AM</option>
                            <option value="06:30 AM">06:30 AM</option>
                            <option value="06:45 AM">06:45 AM</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:15 AM">07:15 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="07:45 AM">07:45 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:15 AM">08:15 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="08:45 AM">08:45 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:15 AM">09:15 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="09:45 AM">09:45 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:15 AM">10:15 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="10:45 AM">10:45 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:15 AM">11:15 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="11:45 AM">11:45 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:15 PM">12:15 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="12:45 PM">12:45 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:15 PM">01:15 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="01:45 PM">01:45 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:15 PM">02:15 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="02:45 PM">02:45 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:15 PM">03:15 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="03:45 PM">03:45 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:15 PM">04:15 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="04:45 PM">04:45 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:15 PM">05:15 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="05:45 PM">05:45 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:15 PM">06:15 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="06:45 PM">06:45 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:15 PM">07:15 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="07:45 PM">07:45 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:15 PM">08:15 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="08:45 PM">08:45 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:15 PM">09:15 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="09:45 PM">09:45 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:15 PM">10:15 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="10:45 PM">10:45 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:15 PM">11:15 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                            <option value="11:45 PM">11:45 PM</option>
                            </select>
                        </td>
                        <td>
                          <select disabled="on" class="habilitar ignorar pais ${$row}">
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
                    `;
                });
                $('#tasks-migrants').html(templado);
                // METODO PARA QUE EL INPUT DE TIPO DATAPICKER SEA UN CALENDARIO AL DAR CLICK
                $( ".datepicker" ).datepicker();
            }
        });
    }
    //*************************************************************
        // NOTA: LEER.
        /* EN LA LINEA 232 SE AGREGO UN SPAN Y SE HACE INVISIBLE, ESTE
        SE UTILIZA PARA OBTENER SU CLASE, EL CUAL ES UNA CLASE NUMERICA
        ESTO SIRVE PARA DETECTAR EXACTAMENTE DONDE SE DIO CLICK EN EL
        BOTON EDITAR.
        */
        //*************************************************************

        // METODO DE MASCARA DE ENTRADA PARA QUE EL INPUT TEL SEA SOLO NUMERICO Y AUTOSERAPACION
        $('.txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder
        $('.timepicker').wickedpicker();
        // EVENTO CLICK DE BOTON EDITAR, SOLO AQUI FUNCIONA
        edit = $('.edit');
        let count = 0;
        $(document).on('click', '.edit', function(){
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

        // EVENTO CLICK AL BOTON ELIMINAR CANCELAR
        $(document).on("click", ".task-delete", function(){
          var element = $(this)[0].parentElement.parentElement;
          var ID = $(element).attr('id');
          var nombre = $('#'+ID + ' .nombre input').val();
          $('.title-box').html("¿Estas seguro que quieres eliminar a <strong>"+nombre+"</strong> de la lista? Esta operación es irreversible");
          $('.box').css("height", "auto").css("padding", "20px");
          $('.box').show('slow');
          $('.box').css("display", "flex");
        });

        $('.btn-cancel').click(function(){
          $('.box').hide('slow');
        });

        $('.btn-confirm').click(function(){
          // ***********************************************************************
          // ***********************************************************************
          // ***********************************************************************
          // AQUI VA EL CODIGO PARA ELIMINAR
          // ***********************************************************************
          // ***********************************************************************
          // ***********************************************************************
        });
});
