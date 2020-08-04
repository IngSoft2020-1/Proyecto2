/*Aqui radican todos nuestros json.
  Permiten comunicar la pagina "delete.php" con otras paginas
  que solo contienen sentencias de php/mysqli, devolviendo los valores*/

$(document).ready(function () {
  obtener();

  // METODO DE BUSQUEDA PARA EDITAR
  $("#search-edit").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#table-edit tbody tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  // METODO DE BUSQUEDA PARA RESERVACION
  $("#search-res").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#table-res tbody input").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
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
      url: "task-reser.php",
      type: "GET",
      success: function (response) {
        let tasks = JSON.parse(response);
        if (tasks.length == 0) {
          let nulo = $("#null");
          nulo.css("display", "unset");
        } else {
          let templado = "";
          tasks.forEach((task) => {
            $row++; // ROW COMIENZA EN 1
            if ($row == 1) {
              $wea = task.IDReservacion;
              $auxiliar = $row; // AUXILIAR = 1
              console.log("auxiliar " + $auxiliar);
              templado += `
                            <tr id="${$row}" value="${$row}" class="${task.IDReservacion}">
                                <td><input disabled="on" type="text" value="${task.FechadeInicio}" class="fecha-llegada habilitar"></td>
                                <td class="td-name">
                                <div class="container-td">
                                    <div>
                                    <select class="habilitar select-name habilitado" style="cursor: default">
                                        <option value="${task.IDVisitante}">${task.Nombres}</option>
                            `;
              console.log("row " + $row);
            } else if ($wea == task.IDReservacion && $row != 1) {
              $DiasEsti = task.Diasestimados;
              $Estado = task.Estadoreservacion;
              $IDHabi = task.IDHabitacion;
              $TipoHabi = task.Tipodehabitacion;
              templado += `
                                        <option value="${task.IDVisitante}">${task.Nombres}</option>
                            `;
            } else if ($wea != task.IDReservacion && $row != 1) {
              $wea = task.IDReservacion;
              templado += `
                                    </select>
                                    </div>
                                    <div class="td-cont">
                                    <img src="img/trash.png" alt="" class="icon-tools del-${$auxiliar} del" style="display: none;">
                                    <img src="img/new.png" alt="" class="icon-tools add-${$auxiliar} add" style="display: none;">
                                    </div>
                                </div>
                                </td>
                                <td>
                                <select class="habilitar habilitado" style="cursor: default">
                                    <option value="${$DiasEsti}">${$DiasEsti}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </td>
                                <td>
                                <select class="habilitar habilitado"" style="cursor: default">
                                    <option value="${$IDHabi}">${$TipoHabi}</option>
                                    <option value="I">Sencilla</option>
                                    <option value="D">Doble</option>
                                    <option value="T">Triple</option>
                                    <option value="O">Otra</option>
                                </select>
                                </td>
                                <td><input type="number" class="habilitar number habilitado" value="0" style="cursor: default"></td>
                                <td><input type="number" class="habilitar number habilitado" value="0" style="cursor: default"></td>
                                <td><p id="estado-${$auxiliar}" class="parrafo">En espera</p></td>
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
                                    <select class="habilitar select-name habilitado" style="cursor: default">
                                        <option value="${task.IDVisitante}">${task.Nombres}</option>
                            `;
              $auxiliar = $row;
            }
          });
          templado += `
                            </select>
                            </div>
                            <div class="td-cont">
                            <img src="img/trash.png" alt="" class="icon-tools del-${$auxiliar} del" style="display: none;">
                            <img src="img/new.png" alt="" class="icon-tools add-${$auxiliar} add" style="display: none;">
                            </div>
                        </div>
                        </td>
                        <td>
                        <select class="habilitar habilitado" style="cursor: default">
                            <option value="${$DiasEsti}">${$DiasEsti}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        </td>
                        <td>
                        <select class="habilitar habilitado" style="cursor: default">
                            <option value="${$IDHabi}">${$TipoHabi}</option>
                            <option value="I">Sencilla</option>
                            <option value="D">Doble</option>
                            <option value="T">Triple</option>
                            <option value="O">Otra</option>
                        </select>
                        </td>
                        <td><input type="number" class="habilitar number habilitado" value="0" style="cursor: default"></td>
                        <td><input type="number" class="habilitar number habilitado" value="0" style="cursor: default"></td>
                        <td><p id="estado-${$auxiliar}" class="parrafo">En espera</p></td>
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
                    `;
          $("#tasksReservacion").html(templado);

          Clases();
        }
      },
    });
  }

  function Clases() {
    // EVENTOS PARA CAMBIAR EL COLOR DE FONDO DEL CONTENENDOR DE LOS TRES PUNTITOS
    $(".icon").hover(function () {
      var _this = this;
      $("#" + GetID(_this) + " .evento").css("background", "#32424c");
    });

    $(".icon").mouseout(function () {
      var _this = this;
      $("#" + GetID(_this) + " .evento").css("background", "none");
    });

    $(".icon").click(function () {
      var _this = this;
      var bool = true;
      submenu = $(".sub-menu-" + GetID(_this));
      for (var i = 0; i <= 10000; i++) {
        if (GetID(_this) == i) {
        } else {
          $(".sub-menu-" + i).hide("slow");
        }
      }
      submenu.toggle();
    });

    // FUNCION PARA AL DAR CLICK EN INICIAR SE INICIE LA RESERVACION
    var btnStart = $(".btn-start");
    btnStart.click(function () {
      var _this = this;
      Estado(GetID(_this), "En curso");
      Habilitar_Deshabilitar(GetID(_this), "on", "default");
      $(".del-" + GetID(_this)).hide("slow");
      $(".add-" + GetID(_this)).hide("slow");

      // IMPORTANTE: LEER
      //
      //
      //
      // AQUI SE REALIZARA EL UPDATE A LA BD CON EL VALOR DE RESERVACION EN CURSO
      //
      //
      //
      //
    });

    var btnCancel = $(".btn-cancel");
    btnCancel.click(function () {
      var _this = this;
      Estado(GetID(_this), "En espera");
      $(".habilitado").prop("disabled", false);
      // IMPORTANTE: LEER
      //
      //
      //
      // AQUI SE REALIZARA EL UPDATE A LA BD CON EL VALOR DE RESERVACION EN ESPERA
      //
      //
      //
      //
    });

    var btnEdit = $(".btn-edit");
    btnEdit.click(function () {
      var _this = this;
      var textoEdit = $(".sub-menu-" + GetID(_this) + " .btn-edit").val();
      if (textoEdit == "Editar huespedes") {
        // Habilitar_Deshabilitar(GetID(_this), false, "pointer");
        $(".habilitado").prop("disabled", false);
        $(".sub-menu").hide("slow");
        $(".del-" + GetID(_this)).show("slow");
        $(".add-" + GetID(_this)).show("slow");
        $(".sub-menu-" + GetID(_this) + " .btn-edit").val("Guardar edición");
        $(".sub-menu-" + GetID(_this) + " .btn-start").hide("slow");
      } else {
        $(".del-" + GetID(_this)).hide("slow");
        $(".add-" + GetID(_this)).hide("slow");
        $(".sub-menu").hide("slow");
        $(".sub-menu-" + GetID(_this) + " .btn-edit").val("Editar huespedes");
        // Habilitar_Deshabilitar(GetID(_this), "on", "default");
        $(".habilitado").prop("disabled", false);
        $(".sub-menu-" + GetID(_this) + " .btn-start").show("slow");
        // IMPORTANTE: LEER
        //
        //
        //
        // AQUI SE GUARDAARAN LOS DATOS EDITADOS, ES CUANDO EL USUARIO DA CLICK EN EDITAR HUESPED
        //
        //
        //
        //
      }
    });

    var btnDelete = $(".btn-delete");
    btnDelete.click(function () {
      $("#deletePop").show("slow");
      $("#deletePop").css("display", "flex");
      $(".title-box-delete").html(
        "¿Estas seguro que deseas eliminar la reservación?"
      );
      $(".sub-menu").hide("slow");
    });

    var confirmDelete = $(".btn-confirm-delete");
    confirmDelete.click(function () {
      alert("Elminado");
      // IMPORTANTE: LEER
      //
      //
      //
      // AQUI SE REALIZARA LA ELIMINACION DE LA RESERVACION
      //
      //
      //
      //
    });

    var cancelDelete = $("#btn-cancel-delete");
    cancelDelete.click(function () {
      $(".box-delete").hide("slow");
    });

    var deleteMigrant = $(".del");
    var ID_2;
    deleteMigrant.click(function () {
      var element = $(this)[0].parentElement.parentElement.parentElement
        .parentElement;
      // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
      ID_2 = $(element).attr("id");
      // SE MANDA A LLAMAR EL POPUP CON BOTON ACEPTAR CANCELAR
      var userName = $("#" + ID_2 + " .select-name option:selected").text();

      $("#success").show("slow");
      $("#success").css("display", "flex");
      $(".title-box").text("¿Estas seguro que desea eliminar a " + userName);
    });

    var ID_3;
    var addMigrant_icon = $(".add");
    addMigrant_icon.click(function () {
      $(".caja-migrantes").show("slow").css("display", "flex");
      var element = $(this)[0].parentElement.parentElement.parentElement
        .parentElement;
      // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
      ID_3 = $(element).attr("id");
    });

    var cancelPop = $("#btn-cancel-pop");
    cancelPop.click(function () {
      $(".box").hide("slow");
    });

    var confirmPop = $(".btn-confirm");
    confirmPop.click(function () {
      // IMPORTANTE: LEER
      //
      //
      // AQUI SE REALIZARA LA ELIMINACION DEL USUARIO SELECCIONADO DESDE EL COMBO
      // DESCOMENTAR LA SIGUIENTE LINEA DE CODIGO UNA VEZ ANEXADO CODIGO DE BACK PARA ELIMINAR
      // $('.box').hide();
      //
      //
    });

    var addMigrant = $(".btn-add-migrant");
    addMigrant.click(function () {
      // OBTIENE EL TR
      var element = $(this)[0].parentElement.parentElement;
      // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
      var ID = $(element).attr("id");
      //   SE CAPTURA EL NOMBRE DEL USUARIO
      var nameMig = $("#" + ID + " .name-mig").text();
      $("#" + ID_3 + " .select-name").prepend(
        "<option value='' selected>" + nameMig + "</option>"
      );
      $(".caja-migrantes").hide();
    });

    var cancelMigrant = $("#btn-cancel-migrant");
    cancelMigrant.click(function () {
      $(".caja-migrantes").hide("slow");
    });
  }

  // FUNCIONES ***********************************************
  function GetID(_this) {
    // OBTIENE EL TR
    var element = $(_this)[0].parentElement.parentElement.parentElement;
    // OBTIENE EL VALOR DEL ID, ES UN VALOR NUMERICO
    var ID = $(element).attr("id");
    return ID;
  }

  function Habilitar_Deshabilitar(id, disabled, cursor) {
    $("tbody #" + id + " .habilitar")
      .prop("disabled", disabled)
      .css("cursor", cursor);
  }

  function Estado(id, status) {
    var element = $("#estado-" + id);
    element.text(status);
    $(".sub-menu").hide("slow");
    if (status == "En curso") {
      $("#" + id).css("border-left", "10px solid green");
      $(".sub-menu-" + id + " .btn-cancel").show("slow");
      $(".sub-menu-" + id + " .btn-start").hide("slow");
      $(".sub-menu-" + id + " .btn-edit").hide("slow");
    } else if (status == "En espera") {
      // AQUI SE VA A MANDAR A LLAMAR CUANDO ESTE FINALIZADA
      // ESPERANDO RESPUESTA DE BACK
      $("#" + id).css("border-left", "10px solid yellow");
      $(".btn-cancel").hide("slow");
      $(".btn-start").show("slow");
      $(".btn-edit").show("slow");
    }
  }
  // FIN FUNCIONES ***********************************************

  /*Elimina el usuario seleccionado*/
  $(document).on("click", ".task-delete", function () {
    let element = $(this)[0].parentElement.parentElement;
    let ID = $(element).attr("task-id");
    $.post("task-delete-reser.php", { IDReser }, function (response) {
      console.log(response);
      obtener();
    });
  });

  $("#mySelect").change(function () {
    var table,
      rows,
      switching,
      i,
      x,
      y,
      shouldSwitch,
      dir,
      switchcount = 0;
    var typeSelect = document.getElementById("mySelect").value;
    table = document.getElementById("table-res");
    switching = true;
    if (typeSelect == "3" || typeSelect == "4") {
      if (typeSelect == "3") {
        //Set the sorting direction to ascending:
        dir = "asc";
      } else if (typeSelect == "4") {
        dir = "desc";
      }

      /*Make a loop that will continue until
          no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
            first, which contains table headers):*/
        for (i = 1; i < rows.length - 1; i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
              one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[2];
          y = rows[i + 1].getElementsByTagName("TD")[2];
          /*check if the two rows should switch place,
              based on the direction, asc or desc:*/
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
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
          switchcount++;
        } else {
          /*If no switching has been done AND the direction is "asc",
              set the direction to "desc" and run the while loop again.*/
        }
      }
    } else if (typeSelect == "1" || typeSelect == "2") {
      if (typeSelect == "1") {
        //Set the sorting direction to ascending:
        dir = "asc";
      } else if (typeSelect == "2") {
        dir = "desc";
      }

      /*Make a loop that will continue until
          no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
            first, which contains table headers):*/
        for (i = 1; i < rows.length - 1; i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
              one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("input")[0].value;
          var datos = x.split("-");
          fecha1 = new Date(datos[2], datos[0] - 1, datos[1]);
          y = rows[i + 1].getElementsByTagName("input")[0].value;
          var datos = y.split("-");
          fecha2 = new Date(datos[2], datos[0] - 1, datos[1]);

          /*check if the two rows should switch place,
              based on the direction, asc or desc:*/
          if (dir == "asc") {
            if (fecha1 > fecha2) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (fecha1 < fecha2) {
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
          switchcount++;
        } else {
          /*If no switching has been done AND the direction is "asc",
              set the direction to "desc" and run the while loop again.*/
        }
      }
    }
  });
});
