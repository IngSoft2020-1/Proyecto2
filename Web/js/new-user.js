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

  

});
