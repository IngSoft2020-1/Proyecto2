$(document).ready(function() {
  console.log('jQuery esta funcionando');
  obtener();

<<<<<<< HEAD
  /*Usado en migrant.php*/
  /*Funcion para imprimir las filas de los migrantes existentes*/
  var edit; // BOTON CLICK, SE DECLARA AFUERA DEBIDO QUE AQUI NO GENERO ERRORES
  var borrar;
  var claseIdentificador;
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
                  <tr class="tr" id="${task.IDVisi}" value="${$row}">
                      <td style="display: none;">${$row}</td>
                      <td class='fecha-llegada'>
                        <input disabled="on" type="text" value="${task.FechaLlegada}" class="datepicker fecha-llegada habilitar llegada${$row} ${$row}">
                      </td>
                      <td class='nombre'>
                        <input type="text" value="${task.Nombre}" disabled="on" class="habilitar ignorar nom${$row} ${$row}">
                      </td>
                      <td class="min-width">
                        <input disabled="on" type="text" value="${task.FechaNacimiento}" class="datepicker fecha-llegada habilitar fn${$row} ${$row}">
                      </td>
                      <td class="min-width">
                        <select id="busqueda_hora" disabled="on" class="habilitar fecha-llegada hl${$row} ${$row}">
                          <option value="${task.HoraLlegada}" selected>${task.HoraLlegada}</option>
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
                        <select id="busqueda_hora" disabled="on" class="habilitar cc${$row} ${$row}">
                          <option value="${task.CitaConsulado}" selected>${task.CitaConsulado}</option>
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
                        <select disabled="on" class="habilitar ignorar pais${$row} ${$row}">
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
                        <input disabled="on" type="text" value="${task.Telefono}" class="txt-tel habilitar telefono${$row} ${$row}">
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
=======
>>>>>>> 0b28904fc4b9dc5a46e3105eea9a74ea19b87fe5





        claseIdentificador = $(this).parent('td').prev().children('span').attr('class');
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
          $.post('update-migrants.php', {ID,fechal,nomb,fechan,horal,citac,naci,tele}, function() {
            console.log("Chingadera funcionando.");
            obtener();
          });
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
        ID = $(element).attr('id');
        var nombre = $('#'+ID + ' .nombre input').val();
        
        if($('.delete'+claseIdentificador).text() == "Eliminar"){
          $('.title-box').html("¿Estas seguro que quieres eliminar a <strong>"+nombre+"</strong> de la lista? Esta operación es irreversible");
          $('.box').css("height", "auto").css("padding", "20px");
          $('.box').show('slow');
          $('.box').css("display", "flex");
        }
        else if($('.delete'+claseIdentificador).text() == "Cancelar"){
          Habilitar_Deshabilitar($('.'+claseIdentificador), "false", "default");
          Modificar_Boton($('#'+claseIdentificador), "Editar", "transparent");
          Modificar_Boton($('.delete'+claseIdentificador), "Eliminar", "#EC6D4A");
        }
      });

      $('.btn-cancel').click(function(){
        $('.box').hide('slow');
      });

      $('.btn-confirm').click(function(){
        // ***********************************************************************
        // AQUI VA EL CODIGO PARA ELIMINAR
        // ***********************************************************************
        $.post('update-migrants.php', {ID}, function() {
          console.log("Chingadera funcionando.");
          obtener();
        });
      });
});
