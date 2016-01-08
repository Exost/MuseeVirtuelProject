<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 26/12/2015
 * Time: 15:42
 */

include_once 'model.php';
class modelType extends Model
{
    static $table = "type";
    static $primary = "nomType";
    private $nomType;

    public function __construct($nom = NULL)
    {
        if (!is_null($nom)) {
            $this->name_Cat = $nom;
        }

    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->nomType;
    }
}
