<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 27/12/2015
 * Time: 03:22
 */

require_once "{$ROOT}{$DS}model{$DS}model.php";
class modelDocument extends Model
{

    private $idDocument;
    private $titre;
    private $an_parution;
    private $type;
    private $description;
    private $login;

    static $table = "document";
    static $primary = "idDocument";

    function __construct($idDocument=NULL, $titre=NULL, $an_parution =NULL, $type=NULL, $description
        =NULL, $login=NULL)
    {
        if(!is_null($idDocument) && !is_null($titre) && !is_null($an_parution) && is_null($type)
            && !is_null($description) &&!is_null($login)){
            $this->idDocument = $idDocument;
            $this->titre = $titre;
            $this->an_parution = $an_parution;
            $this->type = $type;
            $this->description = $description;
            $this->login=$login;
        }

    }


    public function getIdDocument()
    {
        return $this->idDocument;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getAnParution()
    {
        return $this->an_parution;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return null
     */
    public function getLogin()
    {
        return $this->login;
    }




}