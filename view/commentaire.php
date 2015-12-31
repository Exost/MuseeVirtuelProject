<?php // ne s'affiche que si l'utilisateur est connecté
require_once ("{$ROOT}{$DS}model{$DS}modelCommentaire.php");
    if(isset($_SESSION['login'])){ ?>
        <div class="postionCom">
            <div class="error"></div>
            <table class="layoutCom">
                <?php

                /**
                 * Created by PhpStorm.
                 * User: enzo
                 * Date: 29/12/15
                 * Time: 15:56
                 */
                foreach(modelCommentaire::comOnDoc($document->getIdDocument()) as $com){
                    echo "<tr class='tableCom'><td class='commentaire'>";
                    if($_SESSION['login'] == $com->getLoginMembre() ||
                            $_SESSION['rang']=='admin'){
                        echo "<a href='
                                index.php?controller=commentaire&action=supprimer&idCom={$com->getIdCom()}'>
                                <img src='ressources{$DS}img{$DS}suppression.png'
                                    style='width: 15px'/>
                               </a>";
                        echo "<b><u>{$com->getLoginMembre()}</u></b> a dit:<br/>";
                        echo $com->getMessage();
                    }else{
                        echo "<b><u>{$com->getLoginMembre()}</u></b> a dit:<br/>";
                        echo $com->getMessage();
                    }
                }
                echo "</td></tr>";
                echo "<tr id='resultatAjax'></tr>";
                ?>
            </table>
            <form method="post" action="actionCommentaire.php">
                <input name="login" value="<?php echo $_SESSION['login']; ?>"
                       style="display: none"/>
                <input name="idDoc" value="<?php echo $document->getIdDocument(); ?>"
                    style="display: none"/>
                <textarea name="message" class="textCom">
                    commentaire
                </textarea>
                <br/>
                <input type="submit" value="envoyer" class="button">
                <img src="ressources/img/loaders/commentaire.gif" alt="loader" id="loader"
                    style="display: none;"/>
            </form>
        </div>
<?php

    }
?>


