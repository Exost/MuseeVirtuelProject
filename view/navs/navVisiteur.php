<nav>
    <table>
        <tr>
            <td id="blocEnseigne">
                <a href="index.php">
                    <img src='ressources/img/berbere.png' alt='icone'>
                </a>
                <h1 id="nomDuSite"> Musée Virtuel Berbère </h1>
            </td>
            <td>
                <?php
                require ("{$ROOT}{$DS}view{$DS}searchBar.php"); //SearchBar
                ?>
            </td>

            <td>
                <ul>
                    <li class="liNavBar" id="firstRight">
                        <a href="index.php?controller=visiteur&action=inscription"> S'inscrire </a>
                    </li>
                    <li  class="liNavBar" id ="Login">
                        <a href="index.php?controller=visiteur&action=connexion">  Se Connecter</a>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
</nav>



