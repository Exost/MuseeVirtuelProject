<fieldset class="allMessagesFieldset">

<div>
</div>

<?php require_once "{$ROOT}{$DS}model{$DS}modelMessage.php";
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 00:38
 */

if($allMessage == NULL){ echo '<p> Vous n\'avez aucun message </p>'; }
else
{
    echo 'Tous vos message'
    foreach( $allMessage as $message ){

        $mes=$message;
        $auteur = $mes->getAuteur();
        $texte  = $mes->getTexte();
        $id     = $mes->getIdMessage();
        $date   = $mes->getDate();

        echo '<a class="message" href="index.php?controller=membre&action=consulter&idMessage="{$id}.><fieldset>'.$date.$auteur.'</fieldset></a></br></br>';

    }

}
?>

</fieldset>