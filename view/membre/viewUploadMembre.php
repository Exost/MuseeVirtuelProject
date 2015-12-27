
<form id="upload" method="post" action="index.php?controller=document&action=uploaded" enctype="multipart/form-data" onsubmit="return verifSubmit();">
    <fieldset>
        <legend>Upload :</legend> <p>

                <label for="titreF" class="label">Titre du document</label>
                <input type="text"  name="titreF"
                       id="titreF"  required/></Br>

            <label for="dateF" class="label"> Date de parution </label>
            <input type="number"  name="dateF"
                   id="dateF"  required/></Br>

                <label for="description" class="label">Description</label>
                <input type="text"  name="descriptionF"
                       id="descriptionF"  required/></Br>

                <label for="category" class="label"> Type de Fichier</label>
                <select  name="typeF" id="typeF">
                    <?php
                    foreach($tab_Type as $a)
                        echo "<option value='{$a->getType()}'>{$a->getType()}</option>";
                    ?>
                </select> </Br>


                <label for="upload" class="label"> Fichier</label>
                <input type="file" name="fichier"> </Br>

                <input type="submit" value="Upload" /> </p>
    </fieldset>
</form>
<script type="text/javascript">

