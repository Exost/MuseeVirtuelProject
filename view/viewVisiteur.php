<!DOCTYPE html>
<html>
<?php

require ("head.php");
//require ("header.php");

?>
<body>

<div id="wrap">
        <div id="divHeader">
        <?php
        require("navs/navVisiteur.php");
        ?>
        </div>

        <div id="divMain">
        <?php

        $filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}";
        $filename = "view".ucfirst($view) . ucfirst($controller) . '.php';
        require "{$filepath}{$filename}";
        ?>
        </div>



        <?php
        require("Footer.php");
        ?>
</div>

</body>

<?php

?>
</html>
