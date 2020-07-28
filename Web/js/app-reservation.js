/*Aqui radican todos nuestros json.
  Permiten comunicar la pagina "delete.php" con otras paginas
  que solo contienen sentencias de php/mysqli, devolviendo los valores*/

$(document).ready(function()
{
    console.log('jQuery esta funcionando');
    obtener();

    // METODO DE BUSQUEDA PARA EDITAR
    $("#search-edit").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-edit tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // METODO DE BUSQUEDA PARA RESERVACION
    $("#search-res").on("keyup", function()
    {
        var value = $(this).val().toLowerCase();
        $("#table-res tbody input").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    /*Usado en _edit.php*/
    /*Funcion para imprimir las filas de los usuarios existentes*/
    function obtener() {
        $auxiliar = 0;
        $wea = 0;
        $row = 0;
        $DiasEsti = 0;
        $Estado = 0;
        $IDHabi = 0;
        $TipoHabi = 0;
        $.ajax({
            url: 'task-reser.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                console.log(tasks);
                if(tasks.length == 0){
                    let nulo = $('#null');
                    nulo.css("display", "unset");
                }
                else{
                    let templado = '';
                    tasks.forEach(task => {
                        $row++; // ROW COMIENZA EN 1
                        if($row == 1)
                        {
                            $wea = task.IDReservacion;
                            $auxiliar = $row; // AUXILIAR = 1
                            console.log("auxiliar "+$auxiliar);
                            templado += `
                            <tr id="${$row}" value="${$row}" class="${task.IDReservacion}">
                                <td><input disabled="on" type="text" value="${task.FechadeInicio}" class="fecha-llegada habilitar"></td>
                                <td class="td-name">
                                <div class="container-td">
                                    <div>
                                    <select class="habilitar" disabled style="cursor: default">
                                        <option value="${task.IDVisitante}">${task.Nombres}</option>
                            `
                            console.log("row "+$row);
                        }
                        else if($wea == task.IDReservacion && $row != 1)
                        {
                            $DiasEsti = task.Diasestimados;
                            $Estado = task.Estadoreservacion;
                            $IDHabi = task.IDHabitacion;
                            $TipoHabi = task.Tipodehabitacion;
                            templado += `
                                        <option value="${task.IDVisitante}">${task.Nombres}</option>
                            `
                        }
                        else if($wea != task.IDReservacion && $row != 1)
                        {
                            $wea = task.IDReservacion;
                            console.log("auxiliar de nuevo "+$auxiliar);
                            templado += `
                                    </select>
                                    </div>
                                    <div class="td-cont">
                                    <img src="img/trash.png" alt="" class="icon-tools">
                                    <img src="img/new.png" alt="" class="icon-tools">
                                    </div>
                                </div>
                                </td>
                                <td>
                                <select class="habilitar" disabled style="cursor: default">
                                    <option value="${$DiasEsti}">${$DiasEsti}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </td>
                                <td>
                                <select class="habilitar" disabled style="cursor: default">
                                    <option value="${$IDHabi}">${$TipoHabi}</option>
                                    <option value="I">Sencilla</option>
                                    <option value="D">Doble</option>
                                    <option value="T">Triple</option>
                                    <option value="O">Otra</option>
                                </select>
                                </td>
                                <td><input type="number" class="habilitar number" value="0" disabled style="cursor: default"></td>
                                <td><input type="number" class="habilitar number" value="0" disabled style="cursor: default"></td>
                                <td><p id="estado-1" class="parrafo">En espera</p></td>
                                <td class="td-right">
                                <div class="evento  evento-${$auxiliar}">
                                    <img src="img/points.png" class="icon icon-margin">
                                </div>
                                <div class="sub-menu sub-menu-${$auxiliar}">
                                    <input class="input-submenu btn-start" type="button" name="" value="Iniciar">
                                    <input class="input-submenu btn-edit" type="button" name="" value="Editar huespedes">
                                    <input style="display: none;" class="input-submenu btn-cancel" type="button" name="" value="Cancelar">
                                    <input class="input-submenu btn-delete" type="button" name="" value="Eliminar">
                                </div>
                                </td>
                            </tr>
                            <tr id="${$row}" value="${$row}" class="${task.IDReservacion}">
                                <td><input disabled="on" type="text" value="${task.FechadeInicio}" class="fecha-llegada habilitar"></td>
                                <td class="td-name">
                                <div class="container-td">
                                    <div>
                                    <select class="habilitar" disabled style="cursor: default">
                                        <option value="${task.IDVisitante}">${task.Nombres}</option>
                            `
                            $auxiliar = $row;
                        }
                    });
                    templado += `
                            </select>
                            </div>
                            <div class="td-cont">
                            <img src="img/trash.png" alt="" class="icon-tools">
                            <img src="img/new.png" alt="" class="icon-tools">
                            </div>
                        </div>
                        </td>
                        <td>
                        <select class="habilitar" disabled style="cursor: default">
                            <option value="${$DiasEsti}">${$DiasEsti}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        </td>
                        <td>
                        <select class="habilitar" disabled style="cursor: default">
                            <option value="${$IDHabi}">${$TipoHabi}</option>
                            <option value="I">Sencilla</option>
                            <option value="D">Doble</option>
                            <option value="T">Triple</option>
                            <option value="O">Otra</option>
                        </select>
                        </td>
                        <td><input type="number" class="habilitar number" value="0" disabled style="cursor: default"></td>
                        <td><input type="number" class="habilitar number" value="0" disabled style="cursor: default"></td>
                        <td><p id="estado-1" class="parrafo">En espera</p></td>
                        <td class="td-right">
                        <div class="evento  evento-${$auxiliar}">
                            <img src="img/points.png" class="icon icon-margin">
                        </div>
                        <div class="sub-menu sub-menu-${$auxiliar}">
                            <input class="input-submenu btn-start" type="button" name="" value="Iniciar">
                            <input class="input-submenu btn-edit" type="button" name="" value="Editar huespedes">
                            <input style="display: none;" class="input-submenu btn-cancel" type="button" name="" value="Cancelar">
                            <input class="input-submenu btn-delete" type="button" name="" value="Eliminar">
                        </div>
                        </td>
                    </tr>
                    `
                    $('#tasksReservacion').html(templado);
    
                    
                    Clases();
                }
                
            }
        });                
    }

    function Clases(){
        // EVENTOS PARA CAMBIAR EL COLOR DE FONDO DEL CONTENENDOR DE LOS TRES PUNTITOS
        $('.icon').hover(function(){
            var _this = this;
            $('#'+GetID(_this)+' .evento').css("background", "#32424c");
        });

        $('.icon').mouseout(function(){
            var _this = this;
            $('#'+GetID(_this)+' .evento').css("background", "none");
          });

          $('.icon').click(function(){
            var _this = this;
            var bool = true;
            submenu = $('.sub-menu-'+GetID(_this));
            console.log(submenu);
            for(var i = 0; i <= 10000; i++){
              if(GetID(_this) == i){}
              else{
                $('.sub-menu-'+i).hide();
              }
            }
            submenu.toggle();
            
          });

          // FUNCION PARA AL DAR CLICK EN INICIAR SE INICIE LA RESERVACION
            var btnStart = $('.btn-start');
            btnStart.click(function(){
                var _this = this;
                Estado(GetID(_this), 'En curso');
                Habilitar_Deshabilitar(GetID(_this), "on", "default");
            });

            var btnCancel = $('.btn-cancel');
            btnCancel.click(function(){
                var _this = this;
                Estado(GetID(_this), 'En espera');
                Habilitar_Deshabilitar(GetID(_this), false, "pointer");
            });

            var btnEdit = $('.btn-edit');
            btnEdit.click(function(){
                var _this = this;
                Habilitar_Deshabilitar(GetID(_this), false, "pointer");
                $('.sub-menu').hide();
            });
    }

        // FUNCIONES ***********************************************
    function GetID(_this){
        // OBTIENE EL TR
        var element = $(_this)[0].parentElement.parentElement.parentElement;
        // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
        var ID = $(element).attr('id');
        return ID;
    }

    function Habilitar_Deshabilitar(id, disabled, cursor){
        $('tbody #' + id + ' .habilitar').prop("disabled", disabled).css("cursor", cursor);
      }
    
      function Estado(id, status){
        var element = $('#estado-'+id);
        element.text(status);
        $('.sub-menu').hide();
        if(status ==  "En curso"){
          $('#'+id).css("border-left", "10px solid green");
          $('.sub-menu-'+id+' .btn-cancel').show();
          $('.sub-menu-'+id+' .btn-start').hide();
          $('.sub-menu-'+id+' .btn-edit').hide();

        }
        else if(status ==  "En espera"){
          // AQUI SE VA A MANDAR A LLAMAR CUANDO ESTE FINALIZADA
          // ESPERANDO RESPUESTA DE BACK
          $('#'+id).css("border-left", "10px solid yellow");
          $('.btn-cancel').hide();
          $('.btn-start').show();
          $('.btn-edit').show();
         
        }
      }
      // FIN FUNCIONES ***********************************************

    /*Elimina el usuario seleccionado*/
    $(document).on('click','.task-delete', function() {
        let element = $(this)[0].parentElement.parentElement;
        let ID = $(element).attr('task-id');
        $.post('task-delete-reser.php', {IDReser}, function(response) {
            console.log(response);
            obtener();           
        })
    });

    

    $("#mySelect").change(function() {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        var typeSelect = document.getElementById("mySelect").value;
        table = document.getElementById("table-res");
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
              var datos = x.split('-');
              fecha1=new Date(datos[2],datos[0] - 1, datos[1]);
              y = rows[i + 1].getElementsByTagName("input")[0].value;
              var datos = y.split('-');
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

});


