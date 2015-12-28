
$().ready(function(){
   $("#requete form").submit(function(){

       var action = $(this).attr('action');
       var sujet = $('#sujet').val();
       var text = $('#texte').val();

       $(".messages").slideUp('1000', function(){
           $('input[value="envoyer"]').hide().after('<img src="ressources/img/loader.gif" class="loader"/>');
           $.post(action,{
               sujet:sujet,
               texte:text
           },function(data){
                   $(".messages").html(data);
                   $(".messages").slideDown('slow');
                   $(".loader").fadeOut(); // on cache le loader
                   $('input[value="envoyer"]').fadeIn('slow');

                   if(data.match('succès') != null){
                       $("#requete form").slideUp();
                   }

               }
           );
       });



       return false;
   });

});


function afficherBouton(){
    var div = document.getElementById('suppression').style;
    div.display ='block'; // on affiche le bouton
}


$().ready(function(){
    $("#formRequetes form").submit(function(){

        // a finir



        return false;
    });

});



/*$(document).ready(function(){
   $("#connexion form").submit(function(){

       var resultat = true;
       var action = $(this).attr('action');
       var login = $("#login").val();
       var mdp = $("#mdp").val(); // valeur du mot de passe

       $.ajax({
          url           : action,
           type         : 'post',
           timeout      : 3000,
           data         : $(this).serialize(),
           dataType     : 'json',
           beforeSend   : function(){ // avant l'envoi
               $('input[value="connexion"]').hide().after('<img src="ressources/img/loader.gif" class="loader"/>');
               // on cache le bouton et on affiche le loader
           },
           success  : function(data){
               $(".messages").html('yolo swag');
           },
           error    : function(){
               $(".messages").html("une erreur s'est produite");
                resultat.value = false;

           }

       });
        return resultat;// le formulaire ne sera pas soumis
   });
});


$(".messages").slideUp('800', function(){
    $('input[value="connexion"]').hide().after('<img src="ressources/img/loader.gif" class="loader"/>');
    // on cache le bouton et on affiche le loader
    $.post(action,{
            login: login,
            mdp: mdp
        },function(data){
            $(".messages").html(data);
            // on modifie la div message
            $(".messages").slideDown('slow');
            $(".loader").fadeOut(); // on cache le loader
            $('input[value="connexion"]').fadeIn('slow');
        }
    );
});*/