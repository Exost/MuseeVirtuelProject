<?php

require_once "{$ROOT}{$DS}model{$DS}model.php";

class Message {

	static $table   = "message";
	static $primary = "idmessage";

	private $idMessage;
	private $auteur; 
	private $destinataire;
	private $texte ; 
	private $etat;
	private $date;


function __construct($idMessage=NULL; $auteur=NULL; $texte=NULL; $destinataire=NULL; $etat=NULL, $date=NULL)
{
	$this->idMessage 	= $idMessage;
	$this->auteur 	 	= $auteur ;
	$this->texte 	 	= $texte ;
	$this->destinataire 	= $destinataire;
	$this->etat 		= $etat;
	$this->date 		= $date;
}


public function getAuteur()		{return $this->auteur ;}
public function getTexte()		{return $this->texte ;}
public function getIdMessage()	  	{return $this->idmessage ;}
public function getDestinataire()	{return $this->destinataire ;}
public function getEtat() 		{return $this->etat ;}
public function getDate() 		{return $this->date ;}



public function getLast(){}


}

?>
