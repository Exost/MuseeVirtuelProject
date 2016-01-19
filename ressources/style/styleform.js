




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
                        $("#requete form").slideUp(); // si l'envoie a fonctionné
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
        var allCheckBox = [];
        $("input[type='checkbox']").each(function(){
            allCheckBox.push($(this).val());
        });
        var boxChecked= [];
        $('input:checked').each(function(){
            boxChecked.push($(this).val());
        });
        $.post(
            action,{
                resultatCheckBox:boxChecked
            },function(data){
                if(allCheckBox.length == boxChecked.length){
                    $("form[action='suppressionRequete.php']").remove();
                    $("div[class='information']").append("il n'y a actuellement aucune requete");
                    // $("input[id='suppression']").remove();
                }else{
                    $('input:checked').each(function(){
                        $(this).parent().parent().remove(); // on supprime de l'affichage

                    });
                }


            }

        );


        return false;
    });
});

// pour la suppression de messages
$().ready(function(){
    $("#formMessage form").submit(function(){
        var action = $(this).attr('action');
        var allCheckBox = [];
        $("input[type='checkbox']").each(function(){
            allCheckBox.push($(this).val());
        });
        var boxChecked= [];
        $('input:checked').each(function(){
            boxChecked.push($(this).val());
        });
        $.post(
            action,{
                resultatCheckBox:boxChecked
            },function(data){
                if(allCheckBox.length == boxChecked.length){
                    $("form[action='suppressionMessage.php']").remove();
                    $("div[class='information']").append("vous n'avez aucun message");
                    // $("input[id='suppression']").remove();
                }else{
                    $('input:checked').each(function(){
                        $(this).parent().parent().remove(); // on supprime de l'affichage

                    });
                }


            }

        );


        return false;
    });
});

//////// SUR UPLOAD FICHIER
$().ready(function () {

    $('input[type="file"]').on('change', function() {
        var fichier = this.files[0];

        divInformation = $("#etatUpload");
        divInformation.hide();

        if(fichier.type != 'image/png' && fichier.type !='image/gif'
            && fichier.type != 'image/jpg' && fichier.type !='application/pdf'
            && fichier.type !="audio/mpeg" && fichier.type !=""){ // tout les fichier pris en charge
            alert('fichier non pris en charge ');
            $('input[value="Upload"]').hide();
            divInformation.empty().append("fichier non pris en charge ").hide();
            divInformation.fadeIn('slow');

            // suppression
        }else if(fichier.size > 15000000  ){
            alert("la fichier trop important");
            $('input[value="Upload"]').hide();
        }else{
            $('input[value="Upload"]').show();
        }

    });


});


//  sur la messagerie
$().ready(function(){
    $("#messagerie form").submit(function(){
        var envoyeur = $("input[name='envoyeur']").val();
        var destinataire =$("input[name='destinataire']").val();
        var texte = $(this).find("textarea").val();

        var action= $(this).attr('action');
        $("#informationMessage").slideUp('1000', function(){
            $('input[value="envoyer"]').hide().after('<img src="ressources/img/loaders/loader.gif" class="loader"/>');
            $.post(
                action,{
                    envoyeur: envoyeur,
                    destinataire: destinataire,
                    message: texte
                },function(data){
                    $("#informationMessage").html(data);// on ajoute le message
                    $("#informationMessage").slideDown('slow');
                    if(data == "message envoyé"){
                        $('#messagerie form').slideUp();
                    }
                }
            );
        });

        return false;
    });

});



// sur liste membre
$().ready(function(){
   $(".etatMembre").on('change', function () {
       $('#actionChangementEtat').show();
   });
});

$().ready(function(){
    $(".rangMembre").on('change', function () {
        $('#actionChangementEtat').show();
    });
});


$().ready(function(){
    $("#gestionMembre form").submit(function(){
        var action= $(this).attr('action');
        etatMembre =[];
        loginMembre =[];
        rangMembre =[];
        $("select[class='etatMembre']").each(function(){
            etatMembre.push($(this).val());
        });
        $("input[class='loginMembre']").each(function(){
           loginMembre.push($(this).val());
        });
        $("select[class='rangMembre']").each(function(){
            rangMembre.push($(this).val());
        });

        $(".messages").slideUp('1000', function(){
            $.post(action,{
                    etats:etatMembre,
                    logins:loginMembre,
                    rangs:rangMembre
                },function(data){
                    if(data != 'ok'){
                        $(".messages").html(data);
                    }else{
                        $(".messages").html("tous les changement ont été effectué avec succès");
                        $(".messages").slideDown('slow');
                    }

                }
            );
        });





       return false;
    });
});


state = true;
function afficherNote(){
    if(state){
        rate = $("#rating");
        rate.slideDown();
        state=false;
    }else{
        rate.slideUp('1000');
        state=true;
    }

    return false;
}


$().ready(function(){
    $(".noteEtoile").each(function(){
        $(this).on("click",function(){
            var reg = new RegExp("#");
            var tableau = this.href.split(reg);
            nbEtoile =tableau[1];
            idDocument = tableau[2];


            $.post("index.php?controller=document&action=notation",{
                    note:nbEtoile,
                    idDocument:idDocument
            },
                function(data){
                    if(data == 'ok'){
                       $("#rating").hide();
                        $("a[href='#']").hide();
                    }
                }
            );
            return false;
        })
    });
});