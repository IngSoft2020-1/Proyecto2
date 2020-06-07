$(document).ready(function(){
  // FECHA
  var date = $('#date');
  var hour = $('#hour');
  var objDate = new Date();
  var week = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
  var month = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  var day = objDate.getDate();
  var year = objDate.getFullYear();
  date.html(week[objDate.getDay()] + " " + day + " de " + month[objDate.getMonth()] + " del " + year);


  function startTime() {
      var today = new Date();
      var hr = today.getHours();
      var min = today.getMinutes();
      ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
      hr = (hr == 0) ? 12 : hr;
      hr = (hr > 12) ? hr - 12 : hr;
      //Add a zero in front of numbers<10
      hr = checkTime(hr);
      min = checkTime(min);
      hour.html(hr + " : " + min + " " + ap);
      var time = setTimeout(function(){ startTime() }, 500);
  }
  function checkTime(i) {
      if (i < 10) {
          i = "0" + i;
      }
      return i;
  }
  startTime();
  // FIN
});
