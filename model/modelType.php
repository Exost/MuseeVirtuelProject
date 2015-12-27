<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 26/12/2015
 * Time: 15:42
 */

class modelType extends Model
{
    private $nomType;

    static $table = "type";
    static $primary = "nomType";

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->nomType;
    }


    public function __construct($nom = NULL)
    {
        if (!is_null($nom)) {
            $this->name_Cat = $nom;
        }

    }
}
