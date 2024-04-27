<?php
	include '../Controller/CategorieC.php';
	$categorieC=new CategorieC();
	
	$categorieC->supprimercategorie($_GET["idc"]);
	
	header('Location:afficherListecategorie.php');
?>