<nav>
    <table style="width:100%;height: 2.7em ;margin:auto;">
        <tr>
            <td>
                <ul >
                    <li id="firstLeft">
                        <a href="index.php"> Acceuil </a>
                    </li>
                    <li>
                        <a href="index.php?controller=visiteur&action=inscription"> Inscription </a> <!-- Afficher les 5 derniers modèles ajoutés -->
                    </li>
                    <li>
                        <a href="index.php?controller=visiteur&action=connexion"> Connexion </a>
                    <li></li>



            <td>
                <?php
                require ("{$ROOT}{$DS}view{$DS}searchBar.php"); //SearchBar
                ?>
            </td>

            <td>
                <ul>
                    <li class="liNavBar">
                        <a href="index.php?controller=visiteur&action=inscription"> S'inscrire </a>
                    </li>
                    <li  class="liNavBar" id ="Login">
                        <a href="index.php?controller=visiteur&action=connexion"> Se Connecter</a>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
</nav>