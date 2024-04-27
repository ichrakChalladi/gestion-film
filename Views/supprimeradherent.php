<?php
	include '../Controller/AdherentC.php';
	$adherentC=new AdherentC();
	$adherentC->supprimeradherent($_GET["NumAdherent"]);
	var_dump($adherentC);
	//header('Location:afficherListeAdherents.php');
?>