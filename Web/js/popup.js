$(document).ready(function(){
  // A ESTA CLASE SE LE METERAN LOS CAMPOS
  var identificador = $('.box');

  // INSERTA EN EL IDENTIFICADOR TODOS LOS ELEMENTOS ANEXADOS EN EL APEND
  // EN UN RECORRIDO EN LA FUNCION, REGRESA EL VALOR CORRESPONDIENTE
  // EVITA QUE SE DUPLIQUEN VALORES
  function CreateMsg(){
    identificador.append(
      function(i){
        return `
        <p class="title-box-2"></p>
        <button class="btn-confirm">Aceptar</button>
        `;
    });

    // SE CAPTURA LA CLASE DEL ELEMENTO CREADO
    var title = $('.title-box-2'); // AQUI SE IMPRIME
    var title2 = $('.title-box'); // DE AQUI SE OBTIENE

    // SE IMPRIME EL VALOR OBENIDO EN EL TITULO
    title2.text(
      function(i, text){
        return (title[i].append(text));
      });
  }

  CreateMsg();

});
