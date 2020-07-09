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
});