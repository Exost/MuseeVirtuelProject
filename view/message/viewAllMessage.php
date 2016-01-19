<?php // a revoir
if(!empty($allMessage) ) {
?>
<div id="formMessage" >
    <div class="information">

    </div>
        <fieldset class="allMessagesFieldset">
        <p>Tous vos message </p>
        <form action="supressionMessage.php" method="post" >
        <table class="tableMessage">
        <tr id="greenRow">  <th> </th> <th> de </th> <th> date </th>  <th> message </th> </tr>

<?php
        foreach( $allMessage as $message ){

            $mes=$message;
            $auteur = $mes->getAuteur();
            $texte  = $mes->getTexte();
            $id     = $mes->getIdMessage();
            $date   = $mes->getDateMessage();
            $etat   = $mes->getEtat();

        if($etat = 'NL'){ $style="<strong>"; $styleEnd="</strong>"; }
        else            { $style=""; $styleEnd="" ;}

            echo "<tr>";
            echo '<a class="message" href="index.php?controller=message&action=consulter&idMessage='.$id.'" >';
            echo "<td><input type='checkbox' value='{$mes->getIdMessage()}' onclick='return afficherBouton()' class='check'/></td>";
            echo '<td id="auteurMessageTab" >'.$style.$auteur.$styleEnd.'</a></td>';
            echo '<td id="dateMessageTab" >'.$style.$date.$styleEnd.'</a></td>';
            echo '<td id="texteMessageTab" >'.$style.$texte.$styleEnd.'</a></td>';
            echo '</a>';
            echo "<tr>";
        }




        echo '</table> <input type="submit" value="supprimer" id="suppression" class="button"/> </form> </fieldset></div>';
}
else{
?>

    <div style="padding: 3%">
        Vous n'avez actuellement aucun message ...
    </div>

<?php } ?>