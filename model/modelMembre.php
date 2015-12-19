<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 17/12/15
 * Time: 16:17
 */
require('model.php');
class modelMembre extends Model
{
    private $login;
    private $nom;
    private $prenom;
    private $sexe;
    private $adresse_mail;
    private $etat;
    private $rang;
    private $code_Act;

    private  static $primary ='login';
    static $table = "membre" ;

    /**
     * modelMembre constructor.
     * @param $login
     * @param $nom
     * @param $prenom
     * @param $sexe
     * @param $adresse_mail
     * @param $etat
     * @param $rang
     * @param $code_Act
     */
    public function __construct($login=NULL, $nom=NULL, $prenom=NULL, $sexe=NULL, $adresse_mail=NULL, $etat=NULL,
                                $rang=NULL, $code_Act=NULL)
    {
        if(!is_null($login)&& !is_null($nom)&& !is_null($prenom)&& !is_null($sexe)
        && !is_null($adresse_mail) && !is_null($etat) && !is_null($rang)){
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->adresse_mail = $adresse_mail;
            $this->etat = $etat;
            $this->rang = $rang;
            $this->code_Act = $code_Act;
        }

    }

    /**
     * @return string
     */
    public static function getPrimary()
    {
        return self::$primary;
    }

    /**
     * @return mixed
     */
    public function getCodeAct()
    {
        return $this->code_Act;
    }

    /**
     * @return mixed
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * @return mixed
     */
    public function getAdresseMail()
    {
        return $this->adresse_mail;
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
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }


    static function  validAccount($key){
        $sql ="UPDATE membre
                SET etat='actif'
                WHERE login =:log";
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->bindParam(":log", $key);
            $req_prep->execute();
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            }die();
        }
    }

    private static function sendMail ($login,$mail,$code){

        // Génération aléatoire d'une clé



        // Insertion de la clé dans la base de données (à adapter en INSERT si besoin)

        // Préparation du mail contenant le lien d'activation
        $destinataire = $mail;
        $sujet = "Activer votre compte" ;
        $entete = "From: Sneaker.com ";

        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = 'Bienvenue sur VotreSite,

        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.

        index.php?controller=user&action=activation&idUsr='.urlencode($id).'&code='.urlencode($code).'


        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';


        return (mail($destinataire, $sujet, $message, $entete));

        //...
        // Fermeture de la connexion
        //...
        // Votre code
        //...
    }

    /**
     * @param $tab
     * @param $id
     * @param $mail
     * @param $code
     * @return bool
     * inscription membre
     */
    static function createMembre($tab,$id,$mail, $code){
        $res = false;
        if(self::sendMail($id,$mail,$code)){
            modelUser::insert($tab);
            $res = true;
        }
        return $res;
    }


}