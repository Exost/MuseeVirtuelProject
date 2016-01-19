


<nav>
    <table>
        <tr>
            <td id="blocEnseigne">
                <a href="index.php">
                    <img src='ressources/img/berbere.png' alt='icone'>
                </a>
                <li>
                    <a href="index.php?controller=document&action=readAll" id="uploadF"> Oeuvres </a>
                        <ul class="dropdown">
                            <li> <a href="index.php?controller=membre&action=upload" id="uploadF"> Uploader une Oeuvre </a> </li>
                            <li> <a href="index.php?controller=document&action=readall"> Documents en ligne </a> </li>
                        </ul>
                </li>
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
                                <li> <a href="index.php?controller=membre&action=modifier">Modifier mon Profil</a> </li>
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

