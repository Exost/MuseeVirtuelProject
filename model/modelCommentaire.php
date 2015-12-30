<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 30/12/15
 * Time: 02:38
 */
require_once ("{$ROOT}{$DS}model{$DS}model.php");
class modelCommentaire extends Model
{
    private $idCom;
    private $loginMembre;
    private $idDocument;
    private $message;


    static $table = "commentaire";
    static $primary = "idCom";
    /**
     * modelCommentaire constructor.
     * @param $idCom
     * @param $loginMembre
     * @param $idDocument
     * @param $message
     */
    public function __construct($idCom=NULL, $loginMembre=NULL, $idDocument=NULL, $message=NULL)
    {
        if(!is_null($idCom) && !is_null($loginMembre) && !is_null($idDocument) && !is_null($message)){
            $this->idCom = $idCom;
            $this->loginMembre = $loginMembre;
            $this->idDocument = $idDocument;
            $this->message = $message;
        }

    }

    /**
     * @param $idDoc
     * @return mixed
     * renvoi tout les commentaire sur un document
     */
    public static function comOnDoc($idDoc){
        $sql = 'SELECT *
                FROM commentaire
                WHERE idDocument =:id';
        try{
            $req_prep =  Model::$pdo->prepare($sql);
            $req_prep->bindParam(':id',$idDoc);
            $req_prep->execute();
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelCommentaire' );
        }catch (PDOException $e){
            if(Conf::getDebug())
                echo $e->getMessage(); // affiche un message d'erreur
            else
                echo "une erreur est survenue <a href='index.php> retour à la page d\'accueil</a>";
            die();
        }
        return $req_prep->fetchAll();
    }

    /**
     * @return mixed
     */
    public function getIdCom()
    {
        return $this->idCom;
    }

    /**
     * @return mixed
     */
    public function getLoginMembre()
    {
        return $this->loginMembre;
    }

    /**
     * @return mixed
     */
    public function getIdDocument()
    {
        return $this->idDocument;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }



}