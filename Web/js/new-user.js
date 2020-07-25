$(document).ready(function(){
  $('#txt-tel').mask('000-000-0000', {placeholder: '000-000-0000'}); //placeholder
  var txt = $('.textbox');
  var msg = $('.container-msg');
  var i = 0;

  $(txt).click(function(){
    // $(msg).css("display", "none");
    if(i == 0)
    {
      $(msg).toggle(function(){
        $(this).hide();
      });
      i++;
    }
    else if(i == 1){}
  });



  $('.button-cancel').click(function(){
    // ACTUALIZAR VENTANA PADRE DENTRO DE UN IFRAME
    $('#sure').show();
    $('#sure').css("display", "flex");
  });

  var success = localStorage.getItem('success');

  if(success == '1'){
    $('#success').css("display", "flex");
    $('#success').show('slow');
  }


  $('.btn-confirm').click(function(){
    localStorage.setItem('success', 0);
    $('.box').hide('slow');
  });


  var UserExist = localStorage.getItem('UserExist');

  if(UserExist == '1'){
    $('#UserExist').css("display", "flex");
    $('#UserExist').show('slow');
  }


  $('.btn-confirm').click(function(){
    localStorage.setItem('UserExist', 0);
    $('.box').hide('slow');
  });



});
