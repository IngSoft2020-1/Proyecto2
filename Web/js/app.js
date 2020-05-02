/*Aqui radican todos nuestros json.
  Permiten comunicar la pagina "delete.php" con otras paginas
  que solo contienen sentencias de php/mysqli, devolviendo los valores*/

$(document).ready(function() {
    console.log('jQuery esta funcionando');
    obtener();

    /*No implementado*/
    /*En caso de hacer una busqueda de usuario por textbox*/
    $('#buscar').keyup(function(e) {
        if ($('#buscar').val()) {
            let search = $('#buscar').val();
            $.ajax({
                url: 'task-search.php',
                type: 'POST',
                data: { search },
                success: function(response) {
                    let tasks = JSON.parse(response);
                    console.log(tasks);
                    let templado = '';
                    tasks.forEach(task => {
                        templado += `
                        <tr>
                            <td class="task-id">${task.control}</td>
                            <td>${task.nombre} ${task.apellidop} ${task.apellidom}</td>
                            <td>${task.correo}</td>
                            <td>${task.telefono}</td>
                            <td><a href="#" class="button edit">Editar</a></td>
                            <td><a href="#" class="button task-delete delete">Eliminar</a></td>
                        </tr>
                        `
                    });
                    $('#tasks').html(templado);
                    alert(templado);
                }
            })
        }
        else{
            obtener();
        }
    });

    /*Usado en _edit.php*/
    /*Funcion para imprimir las filas de los usuarios existentes*/
    function obtener() {
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                console.log(tasks);
                let templado = '';
                tasks.forEach(task => {
                    templado += `
                    <tr task-id="${task.ID}">
                        <td>${task.Nombre} ${task.Apellidos}</td>
                        <td>${task.Correo}</td>
                        <td>${task.Telefono}</td>
                        <td>${task.TipoUsuario}</td>
                        <td><a href="_edit.php?var=${task.ID}" class="button edit">Editar</a></td>
                        <td><a href="#" class="button task-delete delete">Eliminar</a></td>
                    </tr>
                    `
                });
                $('#tasks').html(templado);
            }
        });
    }

    /*Elimina el usuario seleccionado*/
    $(document).on('click','.task-delete', function() {
        let element = $(this)[0].parentElement.parentElement;
        let ID = $(element).attr('task-id');
        $.post('task-delete.php', {ID}, function(response) {
            console.log(response);
            obtener();
        })
    })
});
