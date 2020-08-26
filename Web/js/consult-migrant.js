$(document).ready(function() {
  //Usado en migrant.php

  /* Carga la lista de migrantes*/
  obtener();

  $("#mySelect").change(function() {
    obtener();
  });
  $("#mySelect2").change(function() {
    obtener();
  });

  //Funcion para declarar bordes de migrantes
  function Familia(color){
    if(color)
    {
      return 'style="border-left: 10px solid red;"';
    }
    else
    {
      return 'style="border-left: 10px solid blue;"';
    }
  };

  /*Funcion para imprimir las filas de los migrantes existentes*/
  var edit; // BOTON CLICK, SE DECLARA AFUERA DEBIDO QUE AQUI NO GENERO ERRORES
  var borrar;
  var claseIdentificador;

  var migrantes;//Esta variable se usa para saber cuantas filas exportar al PDF
  function obtener() {
    deshabilitar(true);
    $row = 0;
    $reser = 0;//Esta variable se utilizar para checar no. de reservacion entre migrantes
    migrantes = 0;
    $color = false;//Variable utilizada para alternar colores de familias

    $order = document.getElementById("mySelect").value;
    $time = document.getElementById("mySelect2").value;

    $.ajax({
      url: 'tasks-migrants.php',
      type: 'GET',
      data: {data1:$order,data2:$time},
      success: function (response) {
        let tasks = JSON.parse(response);
        console.log(tasks);
        let templado = '';
        tasks.forEach(task => {
          $row++;
          migrantes++;
          templado += `
          <tr class="tr" id="${task.IDVisi}" value="${$row}"`
          //Para colocar bordes de color a las familias
          if($order == 1 || $order == 2)//Solo funciona en ordenar por fecha
          {
            if($reser == task.IDReser)
            {
              /* Cuando es la misma familia */
              templado += `${Familia($color)}`
            }
            else if($reser == 0 && task.IDReser>0)
            {
              /* Agarra la primera familia */
              $reser=task.IDReser;
              templado += `${Familia($color)}`
            }
            else if($reser !=0 && task.IDReser>0 && task.IDReser != $reser)
            {
              /* Para cambios de familia */
              /* IF para alternar colores de familia */
              $reser=task.IDReser;
              if($color)
              {$color = false;}
              else
              {$color = true;}
              templado += `${Familia($color)}`
            }
          }
          templado +=`>
            <td class="td-show" style="display: none;"><input type="checkbox"></td>
            <td style="display: none;">${$row}</td>
            <td style="display: none;">${task.IDVisi}</td>
            <td style="display: none;">${task.IDReser}</td>
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
                <option value="ATG">Antigua y Barbuda</option>
                <option value="BHS">Bahamas</option>
                <option value="BLM">San Bartolome</option>
                <option value="BLZ">Belice</option>
                <option value="BOL">Bolivia</option>
                <option value="BRA">Brasil</option>
                <option value="BRB">Barbados</option>
                <option value="CHL">Chile</option>
                <option value="COL">Colombia</option>
                <option value="CRI">Costa Rica</option>
                <option value="CUB">Cuba</option>
                <option value="DMA">Dominica</option>
                <option value="ECU">Ecuador</option>
                <option value="GLP">Guadalupe</option>
                <option value="GRD">Granada</option>
                <option value="GTM">Guatemala</option>
                <option value="GUF">Guyana Francesa</option>
                <option value="HND">Honduras</option>
                <option value="HTI">Haití</option>
                <option value="JAM">Jamaica</option>
                <option value="KNA">San Cristobal y Nieves</option>
                <option value="LCA">Santa Lucia</option>
                <option value="MEX">Mexico</option>
                <option value="MTQ">Martinica</option>
                <option value="NIC">Nicaragua</option>
                <option value="PAN">Panama</option>
                <option value="PER">Peru</option>
                <option value="PRI">Puerto Rico</option>
                <option value="PRY">Paraguay</option>
                <option value="RDO">Republica Dominicana</option>
                <option value="SLV">El Salvador</option>
                <option value="SUR">Surinam</option>
                <option value="SXM">San Martin</option>
                <option value="TTO">Trinidad y Tobago</option>
                <option value="URY">Uruguay</option>
                <option value="VCT">San Vicente y las Granadinas</option>
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
    deshabilitar(false);
  }

  //Funcion para habilitar/deshabilitar los select
  function deshabilitar(bol){

      document.getElementById("mySelect").disabled = bol;
      document.getElementById("mySelect2").disabled = bol;
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

      /* OBJETO PERSONA PARA LA LISTA DE MIGRANTES EN LA TABLA */
      function Persona()
      {
        var fechall, nombre, nacimiento, horall, citaCo, nacionalidad, telefono;
      }
      /* DECLARAMOS ARREGLO */
      var contenidoT=[];

      /* FUNCION DEL BOTON IMPRIMIR PDF */
      $('.button-export').click( function() {
        while (contenidoT.length) {
          contenidoT.pop();
        }
        /* TOMA LOS DATOS ACTUALES DE LA TABLA */
        for (var per = 1; per <= migrantes; per++) {
          var x = document.getElementById("table-migrants").rows[per].cells;
          var migra = new Persona();
          migra.fechall = x[4].querySelector('input').value;
          migra.nombre = x[5].querySelector('input').value;
          migra.nacimiento = x[6].querySelector('input').value;
          migra.horall = x[7].querySelector('select').selectedOptions[0].text;
          migra.citaCo = x[8].querySelector('select').selectedOptions[0].text;
          migra.nacionalidad = x[9].querySelector('select').selectedOptions[0].text;
          migra.telefono = x[10].querySelector('input').value;
          /* LOS EMPUJA AL ARREGLO */
          contenidoT.push(migra);
        }
        console.log(contenidoT);
        json=JSON.stringify(contenidoT);
        /* LOS ENVIA A EL PHP DONDE SE GENERA EL PHP */
        $.ajax({
          type: "POST",
          url: "print-migrantes-pdf.php",
          data: {lista : json},
          success: function(){
            if(migrantes != 0)
            {window.open('Esperados.pdf');}
          }
        });
      });

    /* EVENTO PARA CARGAR MIGRANTES */
    $('#txtFile').change(function(){
      $('#enviarExcel').submit();
      $(this).val('');
    });

    $('#enviarExcel').on('submit', function(event){
      if($("#txtFile").val() == ''){
        /* Si no selecciona nada mensaje? */
      }
      else
      {
        event.preventDefault()
        $.ajax({
          url:"leer.php",
          method:"POST",
          data:new FormData(this),
          contentType:false,
          processData:false,
          success: function(){
            obtener();
          }
        });
      }
    });
    /* FIN EVENTO PARA CARGAR MIGRANTES */

      var valor = $("#select-export option:selected").text();
      $(document).on('change', '#select-export', function(event) {
          valor = $("#select-export option:selected").text();
        if(valor == "Personalizada"){
          $('#th-show').show();
          $('.td-show').show();
        }
        else{
          $('#th-show').hide();
          $('.td-show').hide();
        }
      });

});
