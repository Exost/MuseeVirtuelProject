<div class="postionCom">
    <table class="layoutCom">
        <?php
        require ("{$ROOT}{$DS}model{$DS}modelCommentaire.php");
        /**
         * Created by PhpStorm.
         * User: enzo
         * Date: 29/12/15
         * Time: 15:56
         */
        foreach(modelCommentaire::comOnDoc($document->getIdDocument()) as $com){
            echo "<tr class='commentaire'>";
            echo "<b>{$com->getLoginMembre()}</b> a dit:<br/>";
            echo $com->getMessage();
            echo "</tr>";
        }
        ?>
    </table>
    <form method="post" action="">
        <input type="text" placeholder="commentaire"/><br/>
        <input type="submit" value="envoyer" class="button">
    </form>
</div>

