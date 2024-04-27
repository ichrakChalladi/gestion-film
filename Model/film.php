<?php
	class film{
		private $idf=null;
		private $nom=null;
		private $titre=null;
		private $score=null;
		private $nbre_votants=null;
		private $date_sortie;
		
		private $password=null;
		function __construct($idf, $nom, $titre, $score, $nbre_votants, $date_sortie){
			$this->idf=$idf;
			$this->nom=$nom;
			$this->titre=$titre;
			$this->score=$score;
			$this->nbre_votants=$nbre_votants;
			$this->date_sortie=$date_sortie;
		}
	
		function getidf(){
			return $this->idf;
		}
		function getNom(){
			return $this->nom;
		}
		function gettitre(){
			return $this->titre;
		}
		function getscore(){
			return $this->score;
		}
		function getnbre_votants(){
			return $this->nbre_votants;
		}
		function getDate_sortie(){
			return $this->date_sortie;
		}
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function settitre(string $titre){
			$this->titre=$titre;
		}
		function setscore(int $scorer){
			$this->score=$score;
		}
		function setnbre_votants(int $nbre_votants){
			$this->nbre_votants=$nbre_votants;
		}
		function setdate_sortie(string $date_sortie){
			$this->date_sortie=$date_sortie;
		}
		
	}


?>