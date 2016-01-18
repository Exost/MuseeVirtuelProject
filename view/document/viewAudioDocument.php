<div class="espaceDocument">
    <?php

    // Gestion compteur de visite
    $idDocument = $document->getIdDocument();
    if(file_exists($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_document_'.$idDocument.'.txt'))
    {
        // On ouvre le compteur
        $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_document_'.$idDocument.'.txt', 'r+');
        $compte = fgets($compteur_f); //On recupere la valeur de la premiere ligne
    }else{

        $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_document_'.$idDocument.'.txt', 'a+');
        $compte = 0;
    }
    $compte++;
    fseek($compteur_f, 0);          // on replace le curseur
    fputs($compteur_f, $compte);    // On entre les valeurs du compteur
    fclose($compteur_f);


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
    $absolutePath= $path.''.$docPath;
    $musiquePath = explode('MuseeVirtuelProject/',$absolutePath);
    /*
     * voir viewPdfDocument explication
     */

    ?>



    <audio controls="controls" id="lecteur">

        <source src="<?php echo $musiquePath[1]; ?>"/>
        votre navigateur n'est pas compatible
    </audio>
    <div>
        <fieldset> Cette page a été visité <?php echo $compte ?> fois ! </fieldset>
    </div>




    <?php
    require ("{$ROOT}{$DS}view{$DS}commentaire.php");
    ?>
</div>


