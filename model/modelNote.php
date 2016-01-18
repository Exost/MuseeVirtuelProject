<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 18/01/16
 * Time: 00:24
 */
include_once ('model.php');
class modelNote extends Model
{
    static $table = 'note';
    static $primary ='id';
    private $id;
    private $idDocument;
    private $note;
    private $loginMembre;

    /**
     * modelNote constructor.
     * @param $id
     * @param $idDocument
     * @param $note
     * @param $loginMembre
     */
    public function __construct($id=NULL, $idDocument=NULL, $note=NULL, $loginMembre=NULL)
    {
        if(!is_null($id) &&!is_null($idDocument) &&!is_null($note)
            &&!is_null($loginMembre)){
            $this->id = $id;
            $this->idDocument = $idDocument;
            $this->note = $note;
            $this->loginMembre = $loginMembre;
        }

    }

    public static function noteByMembre ($login,$document){
        $sql ='SELECT *
                FROM note
                WHERE loginMembre =:log AND
                      idDocument =:doc';
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $value= array(":log"=>$login,
                            ":doc"=>$document);
            $req_prep->execute($value);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelNote' );
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        return $req_prep->fetchAll();
    }

    static function noteDocument ($id){
        $sql = 'SELECT AVG (note)
                FROM note
                WHERE idDocument =:id';
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->bindParam(":id",$id);
            $req_prep->execute();
        }catch (PDOException $e){

        }
        return $req_prep->fetch();

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return mixed
     */
    public function getLoginMembre()
    {
        return $this->loginMembre;
    }

}