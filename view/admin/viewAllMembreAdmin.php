<div id="gestiionMembre">
    <div class="messages">

    </div>
    <form method="post" action="index.php?controller=admin&action=changerEtat">
        <table id="liste_membre">
            <tr>
                <th>login</th>
                <th>rang</th>
                <th>etat</th>
            </tr>
            <?php
            /**
             * Created by PhpStorm.
             * User: enzo
             * Date: 09/01/16
             * Time: 14:40
             */
            foreach($allMembre as $membre){
                if($membre->getRang() !='admin'){
                    echo '<tr>';
                    echo "<td><a href=''>{$membre->getLogin()}</a></td>";
                    echo "<td><a>{$membre->getRang()}</a></td>";
                    echo "<td><select class='etatMembre'>
                        <option value='{$membre->getEtat()}'>{$membre->getEtat()}</option>
                        ";
                    if($membre->getEtat() !='bloque'){
                        echo"<option value='bloque'>bloqué</option>";
                    }
                    if($membre->getEtat() !='actif'){
                        echo "<option value='actif'>actif</option>";
                    }
                    echo "<input class='loginMembre' value='{$membre->getLogin()}' style='display: none'/>";
                    // permet de recupérer une valeur
                    echo"</select></td>";
                    echo '</tr>';

                }

            }?>
        </table>
        <input type="submit" id="actionChangementEtat" style="display: none" class="button" value="modifier"/>
    </form>

</div>
