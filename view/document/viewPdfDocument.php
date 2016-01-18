<?php
$idDocument = $document->getIdDocument();

if(file_exists($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_document_'.$idDocument.'.txt'))
{
    // On ouvre le compteur
    $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_document_'.$idDocument.'.txt', 'r+');
    $compte = fgets($compteur_f); //On recupere la valeur de la premiere ligne

}else{

    $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_document_'.$idDocument.'.txt', 'w+');
    $compte = 0;
}

$compte++;
fseek($compteur_f, 0);          // on replace le curseur
fputs($compteur_f, $compte);    // On entre les valeurs du compteur
fclose($compteur_f);

?>



<div class="pdf">

</div>

<?php
$logPosteur = $document->getLogin(); // login du membre qui a poster le document
$path = "{$ROOT}{$DS}file{$DS}$logPosteur{$DS}";
$docPath='';
foreach (scandir($path) as $file_name){
    if($file_name !='.'& $file_name !='..'){
        $file_array = explode('.',$file_name);
        $extension = count($file_array)< - 1;
        $new_file_name = substr($file_name,0,strlen($file_array[$extension]));
        if($new_file_name == $document->getTitre()){
            $docPath = $file_name;
        }

    }
}


$pdfPath= $path.''.$docPath;
$fichier = explode('MuseeVirtuelProject/',$pdfPath);
/*
 * suite à une erreur survenue je ne sais pas pourquoi mais il ne trouvais pas le fichier avec toute
 * le chemin il m"a fallut le rogner pour ne prendre que la partie file/membre/nom_oeuvre
*/
?>
<embed src="<?php echo $fichier[1] ?>" width="70%" height="800px">
</embed>

<div > <fieldset> Cette page a été visitée <?php echo $compte ?> fois ! </fieldset> </div>
<?php
$note =round(modelNote::noteDocument($document->getIdDocument())[0]);
for($i=0; $i<$note; $i++){
    echo "<span style='color: green;font-size: 3.5em'>★</span>";
}
for($j=0; $j<5-$note; $j++){
    echo "<span style='color: red; font-size: 3.5em'>☆</span>";
}
echo "<br/>";
require ("{$ROOT}{$DS}view{$DS}commentaire.php");
?>
