<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 28/12/15
 * Time: 14:30
 */
require_once "{$ROOT}{$DS}model{$DS}modelDocument.php";
class recherche
{

    public static function rechercheDocument($search){
        $resultatRecherche = array(
            "parMembre"=>self::documentParMembre($search),
            "parType"=>self::documentParType($search),
            "parTitre"=>self::documentParTitre($search),
            "parDate"=>self::documentParDate($search)
        );

        return $resultatRecherche;
    }





    public static function rechercheMembre($loginMembre){
        $sql ="SELECT *
                FROM membre
                WHERE login = :log
                  AND rang != 'admin'"; // on peut voir tout le monde sauf l'admin
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        $req_prep->execute(array(':log'=>'%'.$loginMembre.'%'));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelMembre');
        return $req_prep->fetchAll();
    }





    /*            PRIVATE    */



    private static function documentParDate($date){
        $sql ='SELECT * FROM
                    document
                     WHERE an_parution =:date';
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        $req_prep->execute(array(':date'=>'%'.$date.'%'));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelDocument');
        return $req_prep->fetchAll();
    }


    private static function documentParMembre($membre){
        $sql ='SELECT * FROM
                    document
                     WHERE login like :membre';
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        $req_prep->execute(array(':membre'=>'%'.$membre.'%'));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelDocument');
        return $req_prep->fetchAll();
    }

    private static function documentParType($type){
        $sql ='SELECT * FROM
                    document
                     WHERE type like :param';
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        $req_prep->execute(array(':param'=>'%'.$type.'%'));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelDocument');
        return $req_prep->fetchAll();

    }


    private static function documentParTitre($title){
        $sql ='SELECT * FROM
                    document
                     WHERE titre like :param';
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        $req_prep->execute(array(':param'=>'%'.$title.'%'));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelDocument');
        return $req_prep->fetchAll();
    }

}