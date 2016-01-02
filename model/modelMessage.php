<?php

require_once "{$ROOT}{$DS}model{$DS}model.php";

class modelMessage extends Model{

	static $table   = "message";
	static $primary = "idmessage";

	private $idmessage;
	private $auteur;
	private $destinataire;
	private $texte ;
	private $etat;
	private $dateMessage;


	public function __construct($idmessage=NULL, $auteur=NULL, $texte=NULL, $destinataire=NULL, $etat=NULL, $dateMessage=NULL)
	{
		if( !is_null($idmessage) && !is_null($auteur) && !is_null($texte)
			&& !is_null($destinataire) && !is_null($etat) && !is_null($dateMessage) )
		{
			$this->idmessage 		= $idmessage ;
			$this->auteur 	 		= $auteur ;
			$this->texte 	 		= $texte ;
			$this->destinataire	 	= $destinataire ;
			$this->etat 			= $etat ;
			$this->dateMessage 		= $dateMessage ;
		}
	}


	public function getAuteur()			{return $this->auteur ;}
	public function getTexte()			{return $this->texte ;}
	public function getIdMessage()	  	{return $this->idmessage ;}
	public function getDestinataire()	{return $this->destinataire ;}
	public function getEtat() 			{return $this->etat ;}
	public function getDateMessage() 	{return $this->dateMessage ;}



	public static function getMessageRecueByIdMembre($id){
		$sql='SELECT * FROM '.static::$table.' WHERE destinataire=:id';

		try{
			$rep=Model::$pdo->prepare($sql);
			$rep->setFetchMode(PDO::FETCH_CLASS, 'message');
			$rep->bindParam(":id", $id);
			$rep->execute();
			return $rep->fetch();
		}
		catch(PDOException $e){ if(Conf::getDebug()) { echo $e->getMessage(); } die(); }
	}



	public function getLast(){}




}

?>
