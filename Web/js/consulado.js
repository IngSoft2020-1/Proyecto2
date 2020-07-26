$(document).ready(function()
{
    function obtener() {
        $row=0;
        $.ajax({
            url: 'task-consulado-3dias.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                console.log(tasks);
                let templado = '';
                tasks.forEach(task => {
                    $row++;
                    templado += `
                    <tr class="tr" id="${task.NumeroReservacion}" value="${$row}">
                        <td>${task.DiaSalida}</td>
                        <td>${task.CitaConsulado}</td>
                        <td>${task.Nombre}</td>
                        <td class="habitacion">-</td>
                    </tr>
                    `;
                });
                if ($row == 0) {
                    templado += `
                    <tr class="tr" id="0" value="">
                        <td>No hay citas al consulado en los próximos 3 días.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    `;
                };
                $('#tasks-consulado').html(templado);
            }
        });
    }
    obtener();

    var editar = $('#editar-costos');
    var save = $('#save');
    var cancel = $('#cancel');
    var input = $('.hab');

    editar.click(function(){
        Show_Hide(save, "unset");
        Show_Hide(cancel, "unset");
        Show_Hide(editar, "none");
        Habilitar_Desahabilitar(input, false, "pointer");
    });

    cancel.click(function(){
        Show_Hide(editar, "unset");
        Show_Hide(save, "none");
        Show_Hide(cancel, "none");
        Habilitar_Desahabilitar(input, "on", "pointer");
    });

    save.click(function(){
        Show_Hide(editar, "unset");
        Show_Hide(save, "none");
        Show_Hide(cancel, "none");
        Habilitar_Desahabilitar(input, "on", "pointer");
        $('#sure').show();       
        $('#sure').css("display", "flex");
    });

    function Show_Hide(elemento, display){
        elemento.css("display", display);
    }
    
    function Habilitar_Desahabilitar(elemento, disabled, cursor){
        elemento.prop("disabled", disabled).css("cursor", cursor);
    }
});