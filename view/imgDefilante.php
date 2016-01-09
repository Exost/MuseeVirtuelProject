<section id="slideshow">
    <div class="container">
        <div class="c_slider"></div>
        <div class="slider">
            <?php
            $pathImg ="{$ROOT}{$DS}ressources{$DS}img{$DS}slide";
            //scandir renvoi une array avec tout les nom des fichier d'un repertoire
            foreach (scandir($pathImg) as $f){
                if($f !='.'& $f !='..'){
                    $img=$f; ?>

                    <figure>
                        <img src=<?php echo "ressources/img/slide/$img" ?> class="imageSlide"/>
                    </figure>
                    <?php
                }
            }
            ?>

        </div>
    </div>
    <span id="time"></span>
</section>