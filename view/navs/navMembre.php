


<nav>
    <table>
        <tr>
            <td id="blocEnseigne">
                <a href="index.php">
                    <img src='ressources/img/berbere.png' alt='icone'>
                </a>
                <a href="index.php?controller=membre&action=upload" id="uploadF"> Uploader une Oeuvre </a>
            </td>
            <td>
                <?php
                require ("{$ROOT}{$DS}view{$DS}searchBar.php"); //SearchBar
                ?>
            </td>

            <td>
                <ul>
                    <li id="firstRightNavMembre">
                        <a href="index.php?controller=membre&action=profil"> Mon Profil </a>
                        <ul class="dropdown">
                            <li> <a href="index.php?controller=membre&action=profil">Voir mon Profil</a> </li>
                            <li> <a href="index.php?controller=membre&action=modifier">Modifier mon Poril</a> </li>
                            <li> <a href="index.php?controller=membre&action=document">Mes Documents</a> </li>
                            <li> <a href="index.php?controller=membre&action=message">Messagerie</a> </li>
                            <li> <a href="index.php?controller=membre&action=readAll">Membres</a> </li>
                       </ul>
                    </li>

                    <li  class="liNavBar" id ="Login">
                        <a href="index.php?controller=membre&action=exit" id="deco"> Se Déconnecter </a>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
</nav>

