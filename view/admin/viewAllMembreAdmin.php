
<form>
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
                echo "<td><select>
                        <option value='{$membre->getEtat()}'>{$membre->getEtat()}</option>;
                    </select></td>";
                echo '</tr>';

            }

        }?>
    </table>

</form>
