$(document).ready(function(){
  var count = 0;
  $("#table-migrants tbody .tr").on("click", function(event){
     var id= $(this).find("td:first-child").html();
     var identificador = "";
     var identificador2 = ""

     for(var i = 1; i <= id; i++){
       identificador = ".menu" + "-" + i;
       identificador2 = ".menu" + "-" + (i+1);

       if(id == i){
         if (count == 0) {
           $(identificador).show();
           count++;
         }
         else if(count == 1){
           $(identificador).hide();
           count--;
         }

          $(identificador2).hide();
       }
       else{
         $(identificador).hide();
       }
     }


 });



});
