<!DOCTYPE html>
<html>
<?php

require ("head.php");
require("navs/navMembre.php");
?>
<body>

<?php
//require ('membre/menuMembre.php');

// Si $controleur='voiture' et $view='All',
// alors $filepath=".../view/voiture/"
//       $filename="viewAllVoiture.php";
// et on charge '.../view/voiture/viewAllVoiture.php'
$filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}";
$filename = "view".ucfirst($view) . ucfirst($controller) . '.php';
require "{$filepath}{$filename}";

require("Footer.php");

?>
</body>

<?php

?>
</html>
