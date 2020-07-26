$(document).ready(function(){
    $('.title-box').html("¿Estas seguro que desea salir? Se perderan los datos");

    $('.btn-confirm').click(function(){
        location.href = "edit.php";
    });

    $('.btn-confirm').addClass('click');

    $('.click').click(function(){
        
    });

    $('#btn-cancel-2').click(function(){
        $('.box').hide();
    });
});