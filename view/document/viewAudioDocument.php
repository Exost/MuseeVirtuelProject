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
    <source src="<?php echo $musiquePath[1]; ?>"/>
    votre navigateur n'est pas compatible
</audio>
<?php
    require ("{$ROOT}{$DS}view{$DS}commentaire.php");
?>

