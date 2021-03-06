$(document).ready(function() {

  console.log('jQuery esta funcionando');
  obtener();

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
        for (i = 1; i < (rows.length - 1); i++)
        {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[2];
          y = rows[i + 1].getElementsByTagName("TD")[2];
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
        for (i = 1; i < (rows.length - 1); i++)
        {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("input")[0].value;
          var datos = x.split('/');
          fecha1=new Date(datos[2],datos[0] - 1, datos[1]);
          y = rows[i + 1].getElementsByTagName("input")[0].value;
          var datos = y.split('/');
          fecha2=new Date(datos[2],datos[0] - 1, datos[1]);

          /*check if the two rows should switch place,
          based on the direction, asc or desc:*/
          if (dir == "asc")
          {
            if (fecha1 > fecha2) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
            }
          }
          else if (dir == "desc")
          {
            if (fecha1 < fecha2) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
          }
        }

        if (shouldSwitch)
        {
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

  time='0';
  $("#mySelect2").change(function() {
    typeSelect = document.getElementById("mySelect2").value;

    $row=0;
    migrantes=0;
    $.ajax({
        url: 'tasks-migrants-meses.php',
        type: 'GET',
        data: {data:time},
        success: function (response) {
            let tasks = JSON.parse(response);
            console.log(tasks);
            let templado = '';
            tasks.forEach(task => {
                $row++;
                migrantes++;
                templado += `
                <tr class="tr" id="${task.IDVisi}" value="${$row}">
                    <td style="display: none;">${$row}</td>
                    <td class='fecha-llegada'>
                      <input disabled="on" type="text" value="${task.FechaLlegada}" class="datepicker fecha-llegada habilitar llegada${$row} ${task.IDVisi}">
                    </td>
                    <td class='nombre'>
                      <input type="text" value="${task.Nombre}" disabled="on" class="habilitar ignorar nom${$row} ${task.IDVisi}">
                    </td>
                    <td class="min-width">
                      <input disabled="on" type="text" value="${task.FechaNacimiento}" class="datepicker fecha-llegada habilitar fn${$row} ${task.IDVisi}">
                    </td>
                    <td class="min-width">
                      <select id="busqueda_hora" disabled="on" class="habilitar fecha-llegada hl${$row} ${task.IDVisi}">
                        <option value="${task.HoraLlegada2}" selected>${task.HoraLlegada}</option>
                        <option value="00:00:00">00:00 AM</option>
                        <option value="00:15:00">00:15 AM</option>
                        <option value="00:30:00">00:30 AM</option>
                        <option value="00:45:00">00:45 AM</option>
                        <option value="01:00:00">01:00 AM</option>
                        <option value="01:15:00">01:15 AM</option>
                        <option value="01:30:00">01:30 AM</option>
                        <option value="01:45:00">01:45 AM</option>
                        <option value="02:00:00">02:00 AM</option>
                        <option value="02:15:00">02:15 AM</option>
                        <option value="02:30:00">02:30 AM</option>
                        <option value="02:45:00">02:45 AM</option>
                        <option value="03:00:00">03:00 AM</option>
                        <option value="03:15:00">03:15 AM</option>
                        <option value="03:30:00">03:30 AM</option>
                        <option value="03:45:00">03:45 AM</option>
                        <option value="04:00:00">04:00 AM</option>
                        <option value="04:15:00">04:15 AM</option>
                        <option value="04:30:00">04:30 AM</option>
                        <option value="04:45:00">04:45 AM</option>
                        <option value="05:00:00">05:00 AM</option>
                        <option value="05:15:00">05:15 AM</option>
                        <option value="05:30:00">05:30 AM</option>
                        <option value="05:45:00">05:45 AM</option>
                        <option value="06:00:00">06:00 AM</option>
                        <option value="06:15:00">06:15 AM</option>
                        <option value="06:30:00">06:30 AM</option>
                        <option value="06:45:00">06:45 AM</option>
                        <option value="07:00:00">07:00 AM</option>
                        <option value="07:15:00">07:15 AM</option>
                        <option value="07:30:00">07:30 AM</option>
                        <option value="07:45:00">07:45 AM</option>
                        <option value="08:00:00">08:00 AM</option>
                        <option value="08:15:00">08:15 AM</option>
                        <option value="08:30:00">08:30 AM</option>
                        <option value="08:45:00">08:45 AM</option>
                        <option value="09:00:00">09:00 AM</option>
                        <option value="09:15:00">09:15 AM</option>
                        <option value="09:30:00">09:30 AM</option>
                        <option value="09:45:00">09:45 AM</option>
                        <option value="10:00:00">10:00 AM</option>
                        <option value="10:15:00">10:15 AM</option>
                        <option value="10:30:00">10:30 AM</option>
                        <option value="10:45:00">10:45 AM</option>
                        <option value="11:00:00">11:00 AM</option>
                        <option value="11:15:00">11:15 AM</option>
                        <option value="11:30:00">11:30 AM</option>
                        <option value="11:45:00">11:45 AM</option>
                        <option value="12:00:00">12:00 PM</option>
                        <option value="12:15:00">12:15 PM</option>
                        <option value="12:30:00">12:30 PM</option>
                        <option value="12:45:00">12:45 PM</option>
                        <option value="13:00:00">13:00 PM</option>
                        <option value="13:15:00">13:15 PM</option>
                        <option value="13:30:00">13:30 PM</option>
                        <option value="13:45:00">13:45 PM</option>
                        <option value="14:00:00">14:00 PM</option>
                        <option value="14:15:00">14:15 PM</option>
                        <option value="14:30:00">14:30 PM</option>
                        <option value="14:45:00">14:45 PM</option>
                        <option value="15:00:00">15:00 PM</option>
                        <option value="15:15:00">15:15 PM</option>
                        <option value="15:30:00">15:30 PM</option>
                        <option value="15:45:00">15:45 PM</option>
                        <option value="16:00:00">16:00 PM</option>
                        <option value="16:15:00">16:15 PM</option>
                        <option value="16:30:00">16:30 PM</option>
                        <option value="16:45:00">16:45 PM</option>
                        <option value="17:00:00">17:00 PM</option>
                        <option value="17:15:00">17:15 PM</option>
                        <option value="17:30:00">17:30 PM</option>
                        <option value="17:45:00">17:45 PM</option>
                        <option value="18:00:00">18:00 PM</option>
                        <option value="18:15:00">18:15 PM</option>
                        <option value="18:30:00">18:30 PM</option>
                        <option value="18:45:00">18:45 PM</option>
                        <option value="19:00:00">19:00 PM</option>
                        <option value="19:15:00">19:15 PM</option>
                        <option value="19:30:00">19:30 PM</option>
                        <option value="19:45:00">19:45 PM</option>
                        <option value="20:00:00">20:00 PM</option>
                        <option value="20:15:00">20:15 PM</option>
                        <option value="20:30:00">20:30 PM</option>
                        <option value="20:45:00">20:45 PM</option>
                        <option value="21:00:00">21:00 PM</option>
                        <option value="21:15:00">21:15 PM</option>
                        <option value="21:30:00">21:30 PM</option>
                        <option value="21:45:00">21:45 PM</option>
                        <option value="22:00:00">22:00 PM</option>
                        <option value="22:15:00">22:15 PM</option>
                        <option value="22:30:00">22:30 PM</option>
                        <option value="22:45:00">22:45 PM</option>
                        <option value="23:00:00">23:00 PM</option>
                        <option value="23:15:00">23:15 PM</option>
                        <option value="23:30:00">23:30 PM</option>
                        <option value="23:45:00">23:45 PM</option>
                        </select>
                    </td>
                    <td class="cita">
                      <select id="busqueda_hora" disabled="on" class="habilitar cc${$row} ${task.IDVisi}">
                        <option value="${task.CitaConsulado2}" selected>${task.CitaConsulado}</option>
                        <option value="00:00:00">00:00 AM</option>
                        <option value="00:15:00">00:15 AM</option>
                        <option value="00:30:00">00:30 AM</option>
                        <option value="00:45:00">00:45 AM</option>
                        <option value="01:00:00">01:00 AM</option>
                        <option value="01:15:00">01:15 AM</option>
                        <option value="01:30:00">01:30 AM</option>
                        <option value="01:45:00">01:45 AM</option>
                        <option value="02:00:00">02:00 AM</option>
                        <option value="02:15:00">02:15 AM</option>
                        <option value="02:30:00">02:30 AM</option>
                        <option value="02:45:00">02:45 AM</option>
                        <option value="03:00:00">03:00 AM</option>
                        <option value="03:15:00">03:15 AM</option>
                        <option value="03:30:00">03:30 AM</option>
                        <option value="03:45:00">03:45 AM</option>
                        <option value="04:00:00">04:00 AM</option>
                        <option value="04:15:00">04:15 AM</option>
                        <option value="04:30:00">04:30 AM</option>
                        <option value="04:45:00">04:45 AM</option>
                        <option value="05:00:00">05:00 AM</option>
                        <option value="05:15:00">05:15 AM</option>
                        <option value="05:30:00">05:30 AM</option>
                        <option value="05:45:00">05:45 AM</option>
                        <option value="06:00:00">06:00 AM</option>
                        <option value="06:15:00">06:15 AM</option>
                        <option value="06:30:00">06:30 AM</option>
                        <option value="06:45:00">06:45 AM</option>
                        <option value="07:00:00">07:00 AM</option>
                        <option value="07:15:00">07:15 AM</option>
                        <option value="07:30:00">07:30 AM</option>
                        <option value="07:45:00">07:45 AM</option>
                        <option value="08:00:00">08:00 AM</option>
                        <option value="08:15:00">08:15 AM</option>
                        <option value="08:30:00">08:30 AM</option>
                        <option value="08:45:00">08:45 AM</option>
                        <option value="09:00:00">09:00 AM</option>
                        <option value="09:15:00">09:15 AM</option>
                        <option value="09:30:00">09:30 AM</option>
                        <option value="09:45:00">09:45 AM</option>
                        <option value="10:00:00">10:00 AM</option>
                        <option value="10:15:00">10:15 AM</option>
                        <option value="10:30:00">10:30 AM</option>
                        <option value="10:45:00">10:45 AM</option>
                        <option value="11:00:00">11:00 AM</option>
                        <option value="11:15:00">11:15 AM</option>
                        <option value="11:30:00">11:30 AM</option>
                        <option value="11:45:00">11:45 AM</option>
                        <option value="12:00:00">12:00 PM</option>
                        <option value="12:15:00">12:15 PM</option>
                        <option value="12:30:00">12:30 PM</option>
                        <option value="12:45:00">12:45 PM</option>
                        <option value="13:00:00">13:00 PM</option>
                        <option value="13:15:00">13:15 PM</option>
                        <option value="13:30:00">13:30 PM</option>
                        <option value="13:45:00">13:45 PM</option>
                        <option value="14:00:00">14:00 PM</option>
                        <option value="14:15:00">14:15 PM</option>
                        <option value="14:30:00">14:30 PM</option>
                        <option value="14:45:00">14:45 PM</option>
                        <option value="15:00:00">15:00 PM</option>
                        <option value="15:15:00">15:15 PM</option>
                        <option value="15:30:00">15:30 PM</option>
                        <option value="15:45:00">15:45 PM</option>
                        <option value="16:00:00">16:00 PM</option>
                        <option value="16:15:00">16:15 PM</option>
                        <option value="16:30:00">16:30 PM</option>
                        <option value="16:45:00">16:45 PM</option>
                        <option value="17:00:00">17:00 PM</option>
                        <option value="17:15:00">17:15 PM</option>
                        <option value="17:30:00">17:30 PM</option>
                        <option value="17:45:00">17:45 PM</option>
                        <option value="18:00:00">18:00 PM</option>
                        <option value="18:15:00">18:15 PM</option>
                        <option value="18:30:00">18:30 PM</option>
                        <option value="18:45:00">18:45 PM</option>
                        <option value="19:00:00">19:00 PM</option>
                        <option value="19:15:00">19:15 PM</option>
                        <option value="19:30:00">19:30 PM</option>
                        <option value="19:45:00">19:45 PM</option>
                        <option value="20:00:00">20:00 PM</option>
                        <option value="20:15:00">20:15 PM</option>
                        <option value="20:30:00">20:30 PM</option>
                        <option value="20:45:00">20:45 PM</option>
                        <option value="21:00:00">21:00 PM</option>
                        <option value="21:15:00">21:15 PM</option>
                        <option value="21:30:00">21:30 PM</option>
                        <option value="21:45:00">21:45 PM</option>
                        <option value="22:00:00">22:00 PM</option>
                        <option value="22:15:00">22:15 PM</option>
                        <option value="22:30:00">22:30 PM</option>
                        <option value="22:45:00">22:45 PM</option>
                        <option value="23:00:00">23:00 PM</option>
                        <option value="23:15:00">23:15 PM</option>
                        <option value="23:30:00">23:30 PM</option>
                        <option value="23:45:00">23:45 PM</option>
                        </select>
                    </td>
                    <td>
                      <select disabled="on" class="habilitar ignorar pais${$row} ${task.IDVisi}">
                        <option value="${task.IDPais}" selected>${task.Pais}</option>
                        <option value="ARG">Argentina</option>
                        <option value="BLM">San Bartolome</option>
                        <option value="BOL">Bolivia</option>
                        <option value="BRA">Brasil</option>
                        <option value="CHL">Chile</option>
                        <option value="COL">Colombia</option>
                        <option value="CRI">Cota Rica</option>
                        <option value="CUB">Cuba</option>
                        <option value="ECU">Ecuador</option>
                        <option value="GLP">Guadalupe</option>
                        <option value="GTM">Guatemala</option>
                        <option value="GUF">Guyana Francesa</option>
                        <option value="Mex">Mexico</option>
                        <option value="MTQ">Martinica</option>
                        <option value="NIC">Nicaragua</option>
                        <option value="PAN">Panama</option>
                        <option value="PER">Peru</option>
                        <option value="PRI">Puerto Rico</option>
                        <option value="PRY">Paraguay</option>
                        <option value="RDO">Republica Dominicana</option>
                        <option value="SLV">El Salvador</option>
                        <option value="SXM">San Martin</option>
                        <option value="URY">Uruguay</option>
                        <option value="VEN">Venezuela</option>
                      </select>
                    </td>
                    <td>
                      <input disabled="on" type="text" value="${task.Telefono}" class="txt-tel habilitar telefono${$row} ${task.IDVisi}">
                      <span class="${$row}" style="display: none;"/>
                    </td>
                    <td>
                      <button class="button edit" id="e${task.IDVisi}">Editar</button>
                    </td>
                    <td>
                      <button class="button task-delete delete delete${task.IDVisi}">Eliminar</button>
                    </td>
                </tr>
                `;
            });
            $('#tasks-migrants').html(templado);
            // METODO PARA QUE EL INPUT DE TIPO DATAPICKER SEA UN CALENDARIO AL DAR CLICK
            $( ".datepicker" ).datepicker();
        }
    });
  });

  /*Usado en migrant.php*/
  /*Funcion para imprimir las filas de los migrantes existentes*/
  var edit; // BOTON CLICK, SE DECLARA AFUERA DEBIDO QUE AQUI NO GENERO ERRORES
  var borrar;
  var claseIdentificador;
  var migrantes;
  function obtener() {
    $row=0;
    migrantes=0;
    $.ajax({
        url: 'tasks-migrants.php',
        type: 'GET',
        success: function (response) {
            let tasks = JSON.parse(response);
            console.log(tasks);
            let templado = '';
            tasks.forEach(task => {
                $row++;
                migrantes++;
                templado += `
                <tr class="tr" id="${task.IDVisi}" value="${$row}">
                    <td><input type="checkbox"></td>
                    <td style="display: none;">${$row}</td>
                    <td class='fecha-llegada'>
                      <input disabled="on" type="text" value="${task.FechaLlegada}" class="datepicker fecha-llegada habilitar llegada${$row} ${task.IDVisi}">
                    </td>
                    <td class='nombre'>
                      <input type="text" value="${task.Nombre}" disabled="on" class="habilitar ignorar nom${$row} ${task.IDVisi}">
                    </td>
                    <td class="min-width">
                      <input disabled="on" type="text" value="${task.FechaNacimiento}" class="datepicker fecha-llegada habilitar fn${$row} ${task.IDVisi}">
                    </td>
                    <td class="min-width">
                      <select id="busqueda_hora" disabled="on" class="habilitar fecha-llegada hl${$row} ${task.IDVisi}">
                        <option value="${task.HoraLlegada2}" selected>${task.HoraLlegada}</option>
                        <option value="00:00:00">00:00 AM</option>
                        <option value="00:15:00">00:15 AM</option>
                        <option value="00:30:00">00:30 AM</option>
                        <option value="00:45:00">00:45 AM</option>
                        <option value="01:00:00">01:00 AM</option>
                        <option value="01:15:00">01:15 AM</option>
                        <option value="01:30:00">01:30 AM</option>
                        <option value="01:45:00">01:45 AM</option>
                        <option value="02:00:00">02:00 AM</option>
                        <option value="02:15:00">02:15 AM</option>
                        <option value="02:30:00">02:30 AM</option>
                        <option value="02:45:00">02:45 AM</option>
                        <option value="03:00:00">03:00 AM</option>
                        <option value="03:15:00">03:15 AM</option>
                        <option value="03:30:00">03:30 AM</option>
                        <option value="03:45:00">03:45 AM</option>
                        <option value="04:00:00">04:00 AM</option>
                        <option value="04:15:00">04:15 AM</option>
                        <option value="04:30:00">04:30 AM</option>
                        <option value="04:45:00">04:45 AM</option>
                        <option value="05:00:00">05:00 AM</option>
                        <option value="05:15:00">05:15 AM</option>
                        <option value="05:30:00">05:30 AM</option>
                        <option value="05:45:00">05:45 AM</option>
                        <option value="06:00:00">06:00 AM</option>
                        <option value="06:15:00">06:15 AM</option>
                        <option value="06:30:00">06:30 AM</option>
                        <option value="06:45:00">06:45 AM</option>
                        <option value="07:00:00">07:00 AM</option>
                        <option value="07:15:00">07:15 AM</option>
                        <option value="07:30:00">07:30 AM</option>
                        <option value="07:45:00">07:45 AM</option>
                        <option value="08:00:00">08:00 AM</option>
                        <option value="08:15:00">08:15 AM</option>
                        <option value="08:30:00">08:30 AM</option>
                        <option value="08:45:00">08:45 AM</option>
                        <option value="09:00:00">09:00 AM</option>
                        <option value="09:15:00">09:15 AM</option>
                        <option value="09:30:00">09:30 AM</option>
                        <option value="09:45:00">09:45 AM</option>
                        <option value="10:00:00">10:00 AM</option>
                        <option value="10:15:00">10:15 AM</option>
                        <option value="10:30:00">10:30 AM</option>
                        <option value="10:45:00">10:45 AM</option>
                        <option value="11:00:00">11:00 AM</option>
                        <option value="11:15:00">11:15 AM</option>
                        <option value="11:30:00">11:30 AM</option>
                        <option value="11:45:00">11:45 AM</option>
                        <option value="12:00:00">12:00 PM</option>
                        <option value="12:15:00">12:15 PM</option>
                        <option value="12:30:00">12:30 PM</option>
                        <option value="12:45:00">12:45 PM</option>
                        <option value="13:00:00">13:00 PM</option>
                        <option value="13:15:00">13:15 PM</option>
                        <option value="13:30:00">13:30 PM</option>
                        <option value="13:45:00">13:45 PM</option>
                        <option value="14:00:00">14:00 PM</option>
                        <option value="14:15:00">14:15 PM</option>
                        <option value="14:30:00">14:30 PM</option>
                        <option value="14:45:00">14:45 PM</option>
                        <option value="15:00:00">15:00 PM</option>
                        <option value="15:15:00">15:15 PM</option>
                        <option value="15:30:00">15:30 PM</option>
                        <option value="15:45:00">15:45 PM</option>
                        <option value="16:00:00">16:00 PM</option>
                        <option value="16:15:00">16:15 PM</option>
                        <option value="16:30:00">16:30 PM</option>
                        <option value="16:45:00">16:45 PM</option>
                        <option value="17:00:00">17:00 PM</option>
                        <option value="17:15:00">17:15 PM</option>
                        <option value="17:30:00">17:30 PM</option>
                        <option value="17:45:00">17:45 PM</option>
                        <option value="18:00:00">18:00 PM</option>
                        <option value="18:15:00">18:15 PM</option>
                        <option value="18:30:00">18:30 PM</option>
                        <option value="18:45:00">18:45 PM</option>
                        <option value="19:00:00">19:00 PM</option>
                        <option value="19:15:00">19:15 PM</option>
                        <option value="19:30:00">19:30 PM</option>
                        <option value="19:45:00">19:45 PM</option>
                        <option value="20:00:00">20:00 PM</option>
                        <option value="20:15:00">20:15 PM</option>
                        <option value="20:30:00">20:30 PM</option>
                        <option value="20:45:00">20:45 PM</option>
                        <option value="21:00:00">21:00 PM</option>
                        <option value="21:15:00">21:15 PM</option>
                        <option value="21:30:00">21:30 PM</option>
                        <option value="21:45:00">21:45 PM</option>
                        <option value="22:00:00">22:00 PM</option>
                        <option value="22:15:00">22:15 PM</option>
                        <option value="22:30:00">22:30 PM</option>
                        <option value="22:45:00">22:45 PM</option>
                        <option value="23:00:00">23:00 PM</option>
                        <option value="23:15:00">23:15 PM</option>
                        <option value="23:30:00">23:30 PM</option>
                        <option value="23:45:00">23:45 PM</option>
                        </select>
                    </td>
                    <td class="cita">
                      <select id="busqueda_hora" disabled="on" class="habilitar cc${$row} ${task.IDVisi}">
                        <option value="${task.CitaConsulado2}" selected>${task.CitaConsulado}</option>
                        <option value="00:00:00">00:00 AM</option>
                        <option value="00:15:00">00:15 AM</option>
                        <option value="00:30:00">00:30 AM</option>
                        <option value="00:45:00">00:45 AM</option>
                        <option value="01:00:00">01:00 AM</option>
                        <option value="01:15:00">01:15 AM</option>
                        <option value="01:30:00">01:30 AM</option>
                        <option value="01:45:00">01:45 AM</option>
                        <option value="02:00:00">02:00 AM</option>
                        <option value="02:15:00">02:15 AM</option>
                        <option value="02:30:00">02:30 AM</option>
                        <option value="02:45:00">02:45 AM</option>
                        <option value="03:00:00">03:00 AM</option>
                        <option value="03:15:00">03:15 AM</option>
                        <option value="03:30:00">03:30 AM</option>
                        <option value="03:45:00">03:45 AM</option>
                        <option value="04:00:00">04:00 AM</option>
                        <option value="04:15:00">04:15 AM</option>
                        <option value="04:30:00">04:30 AM</option>
                        <option value="04:45:00">04:45 AM</option>
                        <option value="05:00:00">05:00 AM</option>
                        <option value="05:15:00">05:15 AM</option>
                        <option value="05:30:00">05:30 AM</option>
                        <option value="05:45:00">05:45 AM</option>
                        <option value="06:00:00">06:00 AM</option>
                        <option value="06:15:00">06:15 AM</option>
                        <option value="06:30:00">06:30 AM</option>
                        <option value="06:45:00">06:45 AM</option>
                        <option value="07:00:00">07:00 AM</option>
                        <option value="07:15:00">07:15 AM</option>
                        <option value="07:30:00">07:30 AM</option>
                        <option value="07:45:00">07:45 AM</option>
                        <option value="08:00:00">08:00 AM</option>
                        <option value="08:15:00">08:15 AM</option>
                        <option value="08:30:00">08:30 AM</option>
                        <option value="08:45:00">08:45 AM</option>
                        <option value="09:00:00">09:00 AM</option>
                        <option value="09:15:00">09:15 AM</option>
                        <option value="09:30:00">09:30 AM</option>
                        <option value="09:45:00">09:45 AM</option>
                        <option value="10:00:00">10:00 AM</option>
                        <option value="10:15:00">10:15 AM</option>
                        <option value="10:30:00">10:30 AM</option>
                        <option value="10:45:00">10:45 AM</option>
                        <option value="11:00:00">11:00 AM</option>
                        <option value="11:15:00">11:15 AM</option>
                        <option value="11:30:00">11:30 AM</option>
                        <option value="11:45:00">11:45 AM</option>
                        <option value="12:00:00">12:00 PM</option>
                        <option value="12:15:00">12:15 PM</option>
                        <option value="12:30:00">12:30 PM</option>
                        <option value="12:45:00">12:45 PM</option>
                        <option value="13:00:00">13:00 PM</option>
                        <option value="13:15:00">13:15 PM</option>
                        <option value="13:30:00">13:30 PM</option>
                        <option value="13:45:00">13:45 PM</option>
                        <option value="14:00:00">14:00 PM</option>
                        <option value="14:15:00">14:15 PM</option>
                        <option value="14:30:00">14:30 PM</option>
                        <option value="14:45:00">14:45 PM</option>
                        <option value="15:00:00">15:00 PM</option>
                        <option value="15:15:00">15:15 PM</option>
                        <option value="15:30:00">15:30 PM</option>
                        <option value="15:45:00">15:45 PM</option>
                        <option value="16:00:00">16:00 PM</option>
                        <option value="16:15:00">16:15 PM</option>
                        <option value="16:30:00">16:30 PM</option>
                        <option value="16:45:00">16:45 PM</option>
                        <option value="17:00:00">17:00 PM</option>
                        <option value="17:15:00">17:15 PM</option>
                        <option value="17:30:00">17:30 PM</option>
                        <option value="17:45:00">17:45 PM</option>
                        <option value="18:00:00">18:00 PM</option>
                        <option value="18:15:00">18:15 PM</option>
                        <option value="18:30:00">18:30 PM</option>
                        <option value="18:45:00">18:45 PM</option>
                        <option value="19:00:00">19:00 PM</option>
                        <option value="19:15:00">19:15 PM</option>
                        <option value="19:30:00">19:30 PM</option>
                        <option value="19:45:00">19:45 PM</option>
                        <option value="20:00:00">20:00 PM</option>
                        <option value="20:15:00">20:15 PM</option>
                        <option value="20:30:00">20:30 PM</option>
                        <option value="20:45:00">20:45 PM</option>
                        <option value="21:00:00">21:00 PM</option>
                        <option value="21:15:00">21:15 PM</option>
                        <option value="21:30:00">21:30 PM</option>
                        <option value="21:45:00">21:45 PM</option>
                        <option value="22:00:00">22:00 PM</option>
                        <option value="22:15:00">22:15 PM</option>
                        <option value="22:30:00">22:30 PM</option>
                        <option value="22:45:00">22:45 PM</option>
                        <option value="23:00:00">23:00 PM</option>
                        <option value="23:15:00">23:15 PM</option>
                        <option value="23:30:00">23:30 PM</option>
                        <option value="23:45:00">23:45 PM</option>
                        </select>
                    </td>
                    <td>
                      <select disabled="on" class="habilitar ignorar pais${$row} ${task.IDVisi}">
                        <option value="${task.IDPais}" selected>${task.Pais}</option>
                        <option value="ARG">Argentina</option>
                        <option value="BLM">San Bartolome</option>
                        <option value="BOL">Bolivia</option>
                        <option value="BRA">Brasil</option>
                        <option value="CHL">Chile</option>
                        <option value="COL">Colombia</option>
                        <option value="CRI">Cota Rica</option>
                        <option value="CUB">Cuba</option>
                        <option value="ECU">Ecuador</option>
                        <option value="GLP">Guadalupe</option>
                        <option value="GTM">Guatemala</option>
                        <option value="GUF">Guyana Francesa</option>
                        <option value="Mex">Mexico</option>
                        <option value="MTQ">Martinica</option>
                        <option value="NIC">Nicaragua</option>
                        <option value="PAN">Panama</option>
                        <option value="PER">Peru</option>
                        <option value="PRI">Puerto Rico</option>
                        <option value="PRY">Paraguay</option>
                        <option value="RDO">Republica Dominicana</option>
                        <option value="SLV">El Salvador</option>
                        <option value="SXM">San Martin</option>
                        <option value="URY">Uruguay</option>
                        <option value="VEN">Venezuela</option>
                      </select>
                    </td>
                    <td>
                      <input disabled="on" type="text" value="${task.Telefono}" class="txt-tel habilitar telefono${$row} ${task.IDVisi}">
                      <span class="${$row}" style="display: none;"/>
                    </td>
                    <td>
                      <button class="button edit" id="e${task.IDVisi}">Editar</button>
                    </td>
                    <td>
                      <button class="button task-delete delete delete${task.IDVisi}">Eliminar</button>
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
      var ID, fechal, nomb, fechan, horal, citac, naci, tele, shit;
      $(document).on('click', '.edit', function(){
        // OBTIENE LA CLASE, OBTIENE UN NUMERO.
        // LOS ELEMENTOS CREADOS EN AJAX TIENEN UNA CLASE CON UN NUMERO
        // PARA CUANDO SE DE CLICK EN EL BOTON EDITAR SE HABLITEN SOLAMENTE ESA FILA
        // Y NO TODA LA TABLA
        var element = $(this)[0].parentElement.parentElement;
        ID = $(element).attr('id');
        shit = $(element).attr('value');
        fechal = $(".llegada" + shit).val();
        nomb = $(".nom" + shit).val();
        fechan = $(".fn" + shit).val();
        horal = $(".hl" + shit).val();
        citac = $(".cc" + shit).val();
        naci = $(".pais" + shit).val();
        tele = $(".telefono" + shit).val();
        console.log(ID,fechal,nomb,fechan,horal,citac,naci,tele,shit);
        claseIdentificador = $(this).parent('td').prev().children('span').attr('class');
        borrar = $('.delete'+claseIdentificador); // OBTIENE EL RENGLON EXACTO DEL BOTON ELIMINAR
        // DETECTA EL PRIMER CLICK
        if($('#e'+ID).text() == "Editar"){
          // 1.- ELEMENTO DE LA CLASE- 2.- DISABLED. 3.- TIPO DE CURSOR
          Habilitar_Deshabilitar($('.'+ID), false, "pointer");
          // 1.- ELEMENTO. 2.- TEXTO DEL BOTON. 3.- COLOR
          Modificar_Boton($('#e'+ID), "Guardar", "#EC6D4A");
          Modificar_Boton($('.delete'+ID), "Cancelar", "transparent");
        }
        // DETECTA EL SEGUNDO CLICK
        else if($('#e'+ID).text() == "Guardar"){
          $.post('update-migrants.php', {ID,fechal,nomb,fechan,horal,citac,naci,tele}, function(response) {
            console.log("Chingadera funcionando.");
            // console.log(response);
            obtener();
          });
          Habilitar_Deshabilitar($('.'+ID), "on", "default");
          Modificar_Boton($('#e'+ID), "Editar", "transparent");
          Modificar_Boton($('.delete'+ID), "Eliminar", "#EC6D4A");
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
        ID = $(element).attr('id');
        var nombre = $('#'+ID + ' .nombre input').val();

        if($('.delete'+ID).text() == "Eliminar"){
          $('.title-box').html("¿Estas seguro que quieres eliminar a <strong>"+nombre+"</strong> de la lista? Esta operación es irreversible");
          $('.box').css("height", "auto").css("padding", "20px");
          $('.box').show('slow');
          $('.box').css("display", "flex");
        }
        else if($('.delete'+ID).text() == "Cancelar"){
          Habilitar_Deshabilitar($('.'+ID), "false", "default");
          Modificar_Boton($('#e'+ID), "Editar", "transparent");
          Modificar_Boton($('.delete'+ID), "Eliminar", "#EC6D4A");
        }
      });

      $('.btn-cancel').click(function(){
        $('.box').hide('slow');
      });

      $('.btn-confirm').click(function(){
        // ***********************************************************************
        // AQUI VA EL CODIGO PARA ELIMINAR
        // ***********************************************************************
        $.post('delete-migrant.php', {ID}, function() {
          console.log("Chingadera funcionando.");
          obtener();
        });
        $('#success').hide('slow');
      });

      function Persona()
      {
        var fechall, nombre, nacimiento, horall, citaCo, nacionalidad, telefono;
      }

      var contenidoT=[];
      $('.button-export').click( function() {

        for (var per = 1; per <= migrantes; per++) {
          var migra = new Persona();
          migra.fechall = $(".llegada" + per).val();
          migra.nombre = $(".nom" + per).val();
          migra.nacimiento = $(".fn" + per).val();
          migra.horall = $(".hl" + per).val();
          migra.citaCo = $(".cc" + per).val();
          migra.nacionalidad = $(".pais" + per).val();
          migra.telefono = $(".telefono" + per).val();
          
          contenidoT.push(migra);
        }
        console.log(contenidoT);
        var json = JSON.stringify(contenidoT);
        
        $.post('print-migrantes-pdf.php', {json}, function() {
          console.log("Enviado1");
        });
        
        $.ajax({
          type: "POST",
          url: "print-migrantes-pdf.php",
          data: {data : json}, 
          success: function(){
            console.log("Enviado2");
          }
        });
      });  

      // $(document).on("change", '#select-export', function(){
      //   var combo = $('#select.export');
      //   var select = $(combo).find('option:selected').text()
      //   console.log(select);
      // });
});
