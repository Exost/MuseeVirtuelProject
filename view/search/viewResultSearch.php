<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 30/11/15
 * Time: 22:42
 */
if(!empty($array)) {
    // s'il y a au moins un resultat à la recherche
    ?>
    <div class="table">
    <?php
    if (!empty($array['modeles'])) {
        foreach ($array['modeles'] as $a) {
            $idMod = $a->getIdMod();
            $model = modelModele::select($idMod);
            $nameModel = $model->getNameMod();
            $idModSansEspace = str_replace(' ', '_', $nameModel); // permet d'enlever les espace pour retrouver le nom des img
            ?>
            <div>
                <a href=<?php echo "index.php?action=read&idMod={$idMod}"; ?>>
                    <img src=<?php echo "ressources{$DS}img{$DS}modele{$DS}{$idModSansEspace}.jpg"; ?>
                         alt=<?php echo "{$idModSansEspace}"; ?>
                        ></a>

                <p>
                    <i>by <a href=<?php echo "index.php?controller=brand&action=read&idBrand={$a->getNameBrand()}"; ?>
                            > <?php echo "{$a->getNameBrand()}"; ?>
                        </a></i>
                </p>
            </div>
            <?php
        }

    }
    if (!empty($array['brands'])) {
        foreach ($array['brands'] as $b) {
            $id = $b->getIdBrand();
            ?>
            <div>
                <a href=<?php echo "index.php?controller=brand&action=read&idBrand={$id}"; ?>
                    >
                    <img src=<?php echo "ressources{$DS}img{$DS}brand{$DS}{$id}.jpg"; ?>
                         alt=<?php echo "{$b->getIdBrand()}"; ?>
                        >
                </a>
            </div>


            <?php
        }
    }
    if (!empty($array['category'])) {
        foreach ($array['category'] as $b) {
            $id = $b->getNameCat();
            ?>
            <div>
                <a href=<?php echo "index.php?controller=brand&action=read&idBrand={$id}"; ?>
                    >
                    <img src=<?php echo "ressources{$DS}img{$DS}category{$DS}{$id}.jpg"; ?>
                         alt=<?php echo "{$id}"; ?>
                        >
                </a>
            </div>

            <?php
        }


        ?>

        </div>
        <?php
    }
} ?>