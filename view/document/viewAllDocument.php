<div id="allDoc">
    <form method="post" action="index.php?controller=admin&action=suppressionDoc">
        <table>
            <?php require_once ("{$ROOT}{$DS}model{$DS}modelDocument.php");
            /**
             * Created by PhpStorm.
             * User: enzo
             * Date: 29/12/15
             * Time: 02:49
             */
            foreach(modelDocument::getAll() as $document){;

                echo "<tr>";
                $titre = $document->getTitre();
                $id = $document->getIdDocument();
                $type  = $document->getType();
                echo "<td></td>";
                echo "<td><img src='ressources/img/document/$type.png' alt='iconde $type' style='width: 30px'/>
                <a href='index.php?controller=document&action=consulter&idDocument=$id'>$titre</a></td>";
                if(isset($_SESSION['rang'])&& $_SESSION['rang']=='admin'){
                    echo "<td> <input type='submit' value='supprimer' class='button'/> </td>";
                }
                echo "</tr>";

            } ?>
        </table>
    </form>
</div>
<?php
    if(isset($_SESSION["login"])){?>
        <a href='index.php?controller=membre&action=upload' >
                nouveau documents
        </a>
<?php
    }
?>


