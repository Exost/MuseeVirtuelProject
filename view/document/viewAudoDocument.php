<audio controls="controls">
    <?php
    /**
     * Created by PhpStorm.
     * User: enzo
     * Date: 29/12/15
     * Time: 03:48
     */
    $logPosteur = $document->getLogin(); // login du membre qui a poster le document
    $path = "{$ROOT}{$DS}file{$DS}$logPosteur{$DS}";
    $musique='';
    foreach (scandir($pathImg) as $file_name){
        if($file_name !='.'& $file_name !='..'){
            $file_array = explode('.',$file_name);
            $extension = count($file_array)< - 1;
            $new_file_name = substr($file_name,0,strlen($file_array[$extension]));
            if($new_file_name == $document->getTitre()){
                $musique = $file_name;
            }

        }
    }

    $musiquePath = $path.''.$musique;
    ?>
    <source src="<?php echo $musiquePath; ?>"/>

    votre navigateur n'est pas compatible
</audio>
