<!DOCTYPE html>
<html>
<?php

require('head.php');
?>
<body>
<nav>
    <a href="index.php?controller=membre&action=exit"><img src="ressources/img/exit.png" style="width: 50px"/></a>
</nav>

<?php
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
?>

</body>

<?php

?>
</html>
