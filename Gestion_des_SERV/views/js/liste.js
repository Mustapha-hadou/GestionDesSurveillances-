$(document).ready(function(){
    //===========================afficher formulaire dans meme page=======
    $("#locale").click(function(){
        
        $.get("Ajouter_local.php",function(data){
            $("#formulaire").html(data);
        });
    });
  



});

