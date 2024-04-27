<?php
	include '../config.php';
	include_once '../Model/film.php';
	class FilmC {
		function afficherfilms(){
			$sql="SELECT * FROM film";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerfilm($idf){
			$sql="DELETE FROM film WHERE idf=:idf";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idf', $idf);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterfilm($film){
			$sql="INSERT INTO film (NumAdherent, Nom, Prenom, Adresse, Email, DateInscription) 
			VALUES (:NumAdherent,:Nom,:Prenom, :Adresse,:Email, :DateInscription)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'NumAdherent' => $adherent->getNumadherent(),
					'Nom' => $adherent->getNom(),
					'Prenom' => $adherent->getPrenom(),
					'Adresse' => $adherent->getAdresse(),
					'Email' => $adherent->getEmail(),
					'DateInscription' => $adherent->getDateinscription()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereradherent($NumAdherent){
			$sql="SELECT * from adherent where NumAdherent=$NumAdherent";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieradherent($adherent, $numadherent){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE adherent SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						Adresse= :Adresse, 
						Email= :Email, 
						DateInscription= :DateInscription
					WHERE NumAdherent= :NumAdherent'
				);
				$query->execute([
					'Nom' => $adherent->getNom(),
					'Prenom' => $adherent->getPrenom(),
					'Adresse' => $adherent->getAdresse(),
					'Email' => $adherent->getEmail(),
					'DateInscription' => $adherent->getDateinscription(),
					'NumAdherent' => $numadherent
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>