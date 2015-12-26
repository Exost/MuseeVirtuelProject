
<form id="myForm" method="post" action="index.php?controller=visiteur&action=inscrit" onsubmit="return verifSubmit();">
    <fieldset>
        <legend>Upload :</legend> <p>

                <label for="name" class="label">Nom du fichier</label>
                <input type="text"  name="name"
                       id="name"  required/></Br>

                <label for="description" class="label">Description</label>
                <input type="text"  name="descriptionF"
                       id="descriptionF"  required/></Br>

                <label for="category" class="label"> Type de Fichier</label>
                <select  name="typeF" id="typeF">
                    <?php
                    foreach($tab_Type as $a)
                        echo "<option value='{$a->getNameType()}'>{$a->getNameType()}</option>";
                    ?>

                <input type="submit" value="Creation" /> </p>
    </fieldset>
</form>
<script type="text/javascript">