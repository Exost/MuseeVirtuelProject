<!DOCTYPE html>
<html>
<?php

require ("head.php");
require ("header.php");

?>
<body>
<?php
require("navs/navVisiteur.php");



/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 14/10/15
 * Time: 21:10
 */
// Si $controleur='voiture' et $view='All',
// alors $filepath=".../view/voiture/"
//       $filename="viewAllVoiture.php";
// et on charge '.../view/voiture/viewAllVoiture.php'
$filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}";
$filename = "view".ucfirst($view) . ucfirst($controller) . '.php';
require "{$filepath}{$filename}";

require("footer.php") ;
?>


</body>

<?php

?>
</html>
