<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 17/12/15
 * Time: 16:17
 */
include_once('model.php');
class modelMembre extends Model
{
    static $primary ='login';
    static $table = "membre" ;
    private $login;
    private $nom;
    private $prenom;
    private $sexe;
    private $adresse_mail;
    private $mot_de_passe;
    private $etat;
    private $rang;
    private $code_Act;

    /**
     * modelMembre constructor.
     * @param $login
     * @param $nom
     * @param $prenom
     * @param $sexe
     * @param $adresse_mail
     * @param $mot_de_passe
     * @param $etat
     * @param $rang
     * @param $code_Act
     */
    public function __construct($login=NULL, $nom=NULL, $prenom=NULL, $sexe=NULL, $adresse_mail=NULL,
                                $mot_de_passe=NULL,$etat=NULL, $rang=NULL, $code_Act=NULL)
    {
        if(!is_null($login)&& !is_null($nom)&& !is_null($prenom)&& !is_null($sexe)
        && !is_null($adresse_mail) &&!is_null($mot_de_passe) && !is_null($etat) && !is_null($rang)){
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->adresse_mail = $adresse_mail;
            $this->mot_de_passe = $mot_de_passe;
            $this->etat = $etat;
            $this->rang = $rang;
            $this->code_Act = $code_Act;

        }

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

    /**
     * @param $tab
     * @param $id
     * @param $mail
     * @param $code
     * @return bool
     * inscription membre
     */
    static function createMembre($tab,$login,$mail, $code){
        $res = false;
        if(self::sendMail($login,$mail,$code)){
            self::insert($tab);
            $res = true;
        }
        return $res;
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

        index.php?controller=user&action=activation&idUsr='.urlencode($login).'&code='.urlencode($code).'


        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';


        return (mail($destinataire, $sujet, $message, $entete));

        //...
        // Fermeture de la connexion
        //...
        // Votre code
        //...
    }

    static function getNbrMessagesNL(){
        $sql='SELECT * FROM message WHERE destinataire="'.$_SESSION["login"].'" AND etat="nl"';

        try{
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute();

            $count=0;
            foreach ($req_prep as $message){
                $count=$count+1;
            }
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo "une erreur est survenue"; // affiche un message d'erreur
            }
            return -1;
            die();
        }
        return $count;
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

    /**
     * @return null
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    function nouveauMDP(){ // change le mot de passe et l'envoi par mail
        $nouvMdp = uniqid($this->login); // génère un mot de passe préfixé par le login
        $sql ='UPDATE membre
                SET mot_de_passe = :newMod
                WHERE login = :log';
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $array =  array(':newMod'=> sha1($nouvMdp),
                                ':log'=> $this->login);

            $req_prep->execute($array);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo "une erreur est survenue"; // affiche un message d'erreur
            }
            return -1;
            die();
        }
        $message="{$this->login} votre mot de passe vient d'être mis a jour, ne le divulguez a personne
        vous êtes le seul à en être informé

        mot de passe: $nouvMdp
        connectez-vous au site et pensez a le modifier";
        return(mail($this->adresse_mail,'nouveau mot de passe',$message,'de ArtKabyle.org'));
    }




//________________________________________________________________________________________
// Gestion des membres en ligne

    public function estEnLigne(){
        $login = $this->login;

        $sqlCount =' SELECT * from cpt_connectes where login="'.$login.'"' ;

        try{
            $req_prep= Model::$pdo->prepare($sqlCount);
            $req_prep->execute();
            $compteur=0;
            foreach ($req_prep as $key ) { $compteur++; }
            if( $compteur != NULL )   { return 1; }
            else                      { return 0; }

        }catch(PDOException $e) { if ( Conf::getDebug() ) { echo "une erreur est survenue"; }
            return -1;
            die();
        }
    }


    static function getNbMembreConnecte() {
        $sqlCount='SELECT * from cpt_connectes ';

        try{
            $req_prep= Model::$pdo->prepare($sqlCount);
            $req_prep->execute();

            $compteur = 0;

            foreach ($req_prep as $key ) { $compteur++; }

        }catch(PDOException $e){ if (Conf::getDebug()) { echo "une erreur est survenue"; }
            return -1;
            die();
        }
        return $compteur;
    }



    static function insertMembreEnLigne(){

        $login=$_SESSION['login'];
        $sqlCount =' SELECT count(login) from cpt_connectes where login="'.$login.'"' ;
        $sqlInsert=' INSERT into cpt_connectes values ("'.$login.'") ';

        try{
            $req_prep= Model::$pdo->prepare($sqlCount);
            $req_prep->execute();

            if($req_prep != NULL){

                try{
                    Model::$pdo->query($sqlInsert);


                }catch(PDOException $e){ if ( Conf::getDebug() ) { echo "une erreur est survenue"; }
                    return -1;
                    die();
                }

            }else{
                echo "vous etes déjâ deconnecté ... ";
            }

        }catch(PDOException $e){ if (Conf::getDebug()) { echo "une erreur est survenue"; }
            return -1;
            die();
        }
    }

    static function deleteMembreEnLigne(){

        $login=$_SESSION['login'];
        $sql='DELETE from cpt_connectes where login="'.$login.'"' ;

        try{
            Model::$pdo->query($sql);


        }catch(PDOException $e){ if ( Conf::getDebug() ) { echo "une erreur est survenue"; }
            return -1;
            die();
        }
    }




}