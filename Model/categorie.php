<?php
	class Categorie{
		private $idc=null;
		private $nomc=null;
		private $password=null;
		function __construct($idc,$nomc){
			$this->idc=$idc;
			$this->nomc=$nomc;
			
		}

		function getIdc(){
			return $this->idc;
		}
		function getNomc(){
			return $this->nomc;
		}
		
		function setNomc(string $nomc){
			$this->nomc=$nomc;
		}
		
		
	}


?>