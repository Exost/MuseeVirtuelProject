<nav>
    <table style="width:100%;height: 2.7em ;margin:auto;">
        <tr>
            <td>
                <ul >
                    <li id="firstLeft">
                        <a href="index.php?controller=admin&action=requete"> requetes membres</a>
                    </li>




                    <td>
                        <?php
                        require ("{$ROOT}{$DS}view{$DS}searchBar.php"); //SearchBar
                        ?>
                    </td>

                    <td>
                        <ul>
                            <li  class="liNavBar" id ="Login">
                                <a href="index.php?controller=membre&action=exit"> Se Déconnecter </a>
                            </li>
                        </ul>
                    </td>
        </tr>
    </table>
</nav>