
<div id="formRequetes" >
    <div class="messages">

    </div>
    <form action="" method="post" >
        <table>
            <tr id="greenRow">
                <th> </th>
                <th>sujet</th>
                <th> de </th>
                <th>texte</th>
            </tr>
            <?php
            foreach($allRequetes as $requetes){
                echo "<tr>";
                echo "<td><input type='checkbox' value='{$requetes->getId()}'
                        onclick='return afficherBouton()'/></td>";
                echo "<td>{$requetes->getSujet()}</td>";
                echo "<td><a href='index.php?controller=admin&action=voirMembre'>{$requetes->getLogin()}</a></td>";
                echo "<td style='width: 50%'>{$requetes->getTexte()}</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" value="supprimer" id="suppression"/>
    </form>

</div>

