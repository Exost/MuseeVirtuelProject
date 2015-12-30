<div class="pdf">

</div>
<?php
require_once("{$ROOT}{$DS}extensions{$DS}fpdf{$DS}fpdf.php");
require_once("{$ROOT}{$DS}extensions{$DS}fpdi{$DS}fpdi.php");


$pdfPath= $path.''.$docPath;
$fichier = explode('MuseeVirtuelProject/',$pdfPath);
echo $pdfPath;


?>
<embed src="<?php echo $fichier[1] ?>" width="70%" height="800px">
</embed>
<?php
require ("{$ROOT}{$DS}view{$DS}commentaire.php");
?>
