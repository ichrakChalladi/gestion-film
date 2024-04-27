<?php
	include '../Controller/FilmC.php';
	$filmC=new FilmC();
	
	$filmC->supprimerfilm($_GET["idf"]);
	
	header('Location:afficherListefilm.php');
?>