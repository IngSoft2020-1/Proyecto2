$(document).ready(function(){
  $('body').append(`<select id='hora'></select>`);
  var select = $("#hora");
  for(var i = 1; i <= 12; i++){
    select.append(`
        <option class="hora">${i}:</option>
      `);
      for (j = 0; j <= 60; j+15) {
        $('.hora').text(`${j}`);
      }
  }

});
