<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 26/12/15
 * Time: 14:25
 */
require_once ('model.php');
class modelRequetes extends Model
{
    private $id;
    private $sujet;
    private $texte;
    private $etat;
    private $login;

    static $table = "requetes";
    static $primary = "id";

    /**
     * modelRequetes constructor.
     * @param $id
     * @param $sujet
     * @param $texte
     * @param $etat
     * @param $login
     */
    public function __construct($id=NULL, $sujet=NULL, $texte=NULL, $etat=NULL, $login=NULL)
    {
        if(!is_null($id)&& !is_null($sujet) && !is_null($texte)&& !is_null($etat) && !is_null($login)){
            $this->id = $id;
            $this->sujet = $sujet;
            $this->texte = $texte;
            $this->etat = $etat;
            $this->login = $login;
        }

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
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }


}