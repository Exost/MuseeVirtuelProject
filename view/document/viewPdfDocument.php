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
<?php
require ("{$ROOT}{$DS}view{$DS}commentaire.php");
?>
