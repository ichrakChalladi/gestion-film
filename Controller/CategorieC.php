<?php
	include '../config.php';
	include_once '../Model/categorie.php';
	class CategorieC {
		 function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercategorie($idc){
			$sql="DELETE FROM categorie WHERE idc=:idc";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idc', $idc);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (nomc)
			VALUES (:nomc)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([

					'nomc' => $categorie->getNomc(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercategorie($idc){
			$sql="SELECT * from categorie where idc=$idc";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categorie, $idc){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						nomc= :nomc, 
						
					WHERE idc= :idc'
				);
				$query->execute([
					'nomc' => $categorie->getnomc(),
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>