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
?>
<div class="espaceDocument">
    <div id="typeTexte">
        <?php
        /**
         * Created by PhpStorm.
         * User: enzo
         * Date: 29/12/15
         * Time: 15:14
         */
        $fichierText =$path.''.$docPath;


        $monfichier = fopen($fichierText, 'r+');

        // 2 : on lit la première ligne du fichier
        $ligne = fgets($monfichier);

        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);

        echo $ligne;
        ?>
    </div>
    <?php
    require ("{$ROOT}{$DS}view{$DS}commentaire.php");
    ?>

</div>
