<div>
<?php require_once ("{$ROOT}{$DS}model{$DS}modelDocument.php");
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 29/12/15
 * Time: 02:49
 */
foreach(modelDocument::getAll() as $document){;
    $titre = $document->getTitre();
    $id = $document->getIdDocument();
    echo "<a href='index.php?controller=document&action=consulter&idDocument=$id'>$titre</a>";
    echo "<br/>";

} ?>
</div>
