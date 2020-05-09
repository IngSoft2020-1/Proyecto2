
$(document).ready(function(){
  // A ESTA CLASE SE LE METERAN LOS CAMPOS
  var identificador = $('.container-msg');

  // INSERTA EN EL IDENTIFICADOR TODOS LOS ELEMENTOS ANEXADOS EN EL APEND
  // EN UN RECORRIDO EN LA FUNCION, REGRESA EL VALOR CORRESPONDIENTE
  // EVITA QUE SE DUPLIQUEN VALORES
  function CreateMsg(){
    identificador.append(
      function(i){
        return `
        <div class='triangulo'></div>
        <div class='rectangulo'>
          <div class='container-top'>
            <img src='img/alert.png' class='img-msg'>
            <p class='title-msg-2'></p>
          </div>
          <div class='container-bottom'>
            <p class='title-content-msg-2'></p>
          </div>
        </div>
        `;
    });

    // SE CAPTURA LA CLASE DEL ELEMENTO CREADO
    var title = $('.title-msg-2'); // AQUI SE IMPRIME
    var title2 = $('.title-msg'); // DE AQUI SE OBTIENE

    // SE IMPRIME EL VALOR OBENIDO EN EL TITULO
    title2.text(
      function(i, text){
        return (title[i].append(text));
      });

    var msg = $('.title-content-msg-2'); // AQUI SE IMPRIME
    var msg2 = $('.title-content-msg'); // DE AQUI SE OBTIENE

    // SE IMPRIME EL VALOR OBENIDO EN EL MENSAJE
    msg2.text(
      function(i, text){
        return (msg[i].append(text));
      });

  }

  CreateMsg();
});
