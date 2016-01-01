




$().ready(function(){
   $("#requete form").submit(function(){

       var action = $(this).attr('action');
       var sujet = $('#sujet').val();
       var text = $('#texte').val();

       $(".messages").slideUp('1000', function(){
           $('input[value="envoyer"]').hide().after('<img src="ressources/img/loaders/loader.gif" class="loader"/>');
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
    result = false;
    var checkBox = document.getElementsByClassName('check');
    for(i=0;i<checkBox.length;i++){
        if(checkBox[i].checked){
            result=true;
            break;
        }
    }
    var div = document.getElementById('suppression').style;
    if(result){ // si une case est coché  alors on affiche le bouton supprimer
        div.display ='block'; // on affiche le bouton
    }else{
        div.display ='none';
    }


}



function afficherCacherCom(id) // a modifier pour cacher certain commentaire
{
    if(document.getElementById(id).style.visibility=="hidden")
    {
        document.getElementById(id).style.visibility="visible";
        document.getElementById('bouton_'+id).innerHTML='Cacher le texte';
    }
    else
    {
        document.getElementById(id).style.visibility="hidden";
        document.getElementById('bouton_'+id).innerHTML='Afficher le texte';
    }
    return true;
}
/////////////////////////////////////////////////////////////////////////
//                              commentaire // ///
$().ready(function(){
    $('.postionCom form').submit(function(){

        loader =$(this).find('img[id="loader"]').show();


        action = $(this).attr('action');
        message =$(this).find("textarea[name='message']").val();
        idDoc =$(this).find("input[name='idDoc']").val();
        login = $(this).find("input[name='login']").val();
       // alert(idDoc);
        $.post(
          action,{
                message: message,
                idDocument: idDoc
            },
            function(data){
                loader.hide();
                if(!data.match('ok')){
                    $(".error").empty().append(data);
                }else{
                    $('#resultatAjax').hide().append("<td class='commentaire'><b><u>"+
                    login+"</u></b> a dit:<br/>"+message+"</td>").slideDown();

                }
            }
        );
        return false;
    });

});


// pour la suppression de requetes
$().ready(function(){
    $("#formRequetes form").submit(function(){
        var action = $(this).attr('action');
        var checkBox = [];
        $('input:checked').each(function(){
            checkBox.push($(this).val());
        });
        $.post(
            action,{
                resultatCheckBox:checkBox
            },function(data){
                $('input:checked').each(function(){
                    $(this).parent().parent().remove(); // on supprime de l'affichage
                });

            }

        );


        return false;
    });
});

