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
            echo "<td><a href='index.php?controller=document&action=consulter&idDocument=$id'>$titre</a></td>";
            if(isset($_SESSION['rang'])&& $_SESSION['rang']=='admin'){
                echo "<td> <input type='submit' value='supprimer' class='button'/> </td>";
            }
            echo "</tr>";

        } ?>
    </table>
</form>

