$(window).ready(function(){
  var email = $('#txt-email');
  var btn_start = $('#button-start');

  btn_start.click(function(){
    localStorage.setItem('email', email.val());
  });

  email.prepend(localStorage.getItem('email'));
});
