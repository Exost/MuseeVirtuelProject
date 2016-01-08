<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 28/12/15
 * Time: 19:28
 */
include_once "{$ROOT}{$DS}model{$DS}model.php";
class modelSujet extends Model
{
    static $table ='sujet';
    static $primary ='nomSujet';
    private $nomSujet;

    /**
     * modelSujet constructor.
     * @param $nomSujet
     */
    public function __construct($nomSujet=NULL)
    {
        if(!is_null($nomSujet)){
            $this->nomSujet = $nomSujet;
        }

    }

    /**
     * @return mixed
     */
    public function getNomSujet()
    {
        return $this->nomSujet;
    }



}