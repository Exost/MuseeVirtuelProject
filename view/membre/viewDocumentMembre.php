<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 01/01/2016
 * Time: 00:18
 */

if(!empty($allDocumentByLogin) ) {

?>

<div>

    <fieldset>
    <p>Toutes vos oeuvres <p>
    </fieldset>


<?php
echo "<fieldset>";
foreach($allDocumentByLogin as $document) {
echo "<ul>";
echo "<li>Titre : ".$document->getTitre()."</li>";
echo "<li>Parue en ".$document->getAnParution()."</li>";
echo "<li>".$document->getType()."</li>";
echo "<li>Description : ".$document->getDescription()."</li>";
echo "<li>Un post de : ".$document->getLogin()."</li>";
echo "</ul>";

    }
echo "</fieldset>";
}else{
?>
    <div style="padding: 3%">
        Vous n'avez actuellement aucun document en ligne ...
        <a href="index.php?controller=membre&action=upload" > Mettez-en un dès maintenant </a>
    </div>




<?php } ?>

</div>
