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
        $("#table-res tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    /*Usado en _edit.php*/
    /*Funcion para imprimir las filas de los usuarios existentes*/
    function obtener() {
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
                console.log('Wea funcionando');
                let tasks = JSON.parse(response);
                console.log(tasks);
                let templado = '';
                tasks.forEach(task => {
                    $row++;
                    if($row == 1)
                    {
                        $wea = task.IDReservacion;
                        templado += `
                        <tr id="${$row}" value="${$row}" class="${task.IDReservacion}">
                            <td><input disabled="on" type="text" value="${task.FechadeInicio}" class="fecha-llegada habilitar"></td>
                            <td class="td-name">
                            <div class="container-td">
                                <div>
                                <select class="habilitar">
                                    <option value="${task.IDVisitante}">${task.Nombres}</option>
                        `
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
                        templado += `
                                </select>
                                </div>
                                <div class="td-cont">
                                <img src="img/trash.png" alt="" class="icon">
                                <img src="img/new.png" alt="" class="icon">
                                </div>
                            </div>
                            </td>
                            <td>
                            <select class="habilitar">
                                <option value="${$DiasEsti}">${$DiasEsti}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            </td>
                            <td>
                            <select class="habilitar">
                                <option value="${$IDHabi}">${$TipoHabi}</option>
                                <option value="I">Sencilla</option>
                                <option value="D">Doble</option>
                                <option value="T">Triple</option>
                                <option value="O">Otra</option>
                            </select>
                            </td>
                            <td><input type="number" class="habilitar number" value="0"></td>
                            <td><input type="number" class="habilitar number" value="0"></td>
                            <td><p id="estado-1" class="parrafo">En espera</p></td>
                            <td class="td-right">
                            <div class="evento  evento-1">
                                <img src="img/points.png" class="icon">
                            </div>
                            <div class="sub-menu sub-menu-1">
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
                                <select class="habilitar">
                                    <option value="${task.IDVisitante}">${task.Nombres}</option>
                        `
                    }
                });
                templado += `
                        </select>
                        </div>
                        <div class="td-cont">
                        <img src="img/trash.png" alt="" class="icon">
                        <img src="img/new.png" alt="" class="icon">
                        </div>
                    </div>
                    </td>
                    <td>
                    <select class="habilitar">
                        <option value="${$DiasEsti}">${$DiasEsti}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </td>
                    <td>
                    <select class="habilitar">
                        <option value="${$IDHabi}">${$TipoHabi}</option>
                        <option value="I">Sencilla</option>
                        <option value="D">Doble</option>
                        <option value="T">Triple</option>
                        <option value="O">Otra</option>
                    </select>
                    </td>
                    <td><input type="number" class="habilitar number" value="0"></td>
                    <td><input type="number" class="habilitar number" value="0"></td>
                    <td><p id="estado-1" class="parrafo">En espera</p></td>
                    <td class="td-right">
                    <div class="evento  evento-1">
                        <img src="img/points.png" class="icon">
                    </div>
                    <div class="sub-menu sub-menu-1">
                        <input class="input-submenu btn-start" type="button" name="" value="Iniciar">
                        <input class="input-submenu btn-edit" type="button" name="" value="Editar huespedes">
                        <input style="display: none;" class="input-submenu btn-cancel" type="button" name="" value="Cancelar">
                        <input class="input-submenu btn-delete" type="button" name="" value="Eliminar">
                    </div>
                    </td>
                </tr>
                `
                $('#tasksReservacion').html(templado);
            }
        });
    }

    /*Elimina el usuario seleccionado*/
    $(document).on('click','.task-delete', function() {
        let element = $(this)[0].parentElement.parentElement;
        let ID = $(element).attr('task-id');
        $.post('task-delete-reser.php', {IDReser}, function(response) {
            console.log(response);
            obtener();
        })
    });
});