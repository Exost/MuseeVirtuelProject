<audio controls="controls">
    <?php
    /**
     * Created by PhpStorm.
     * User: enzo
     * Date: 29/12/15
     * Time: 03:48
     */


    $musiquePath = $path.''.$docPath;
    ?>
    <source src="<?php echo $musiquePath; ?>"/>
    votre navigateur n'est pas compatible
</audio>
<?php
    require ("{$ROOT}{$DS}view{$DS}commentaire.php");
?>

