<?php
	include '../Controller/AdherentC.php';
	$adherentC=new AdherentC();
	$listeAdherents=$adherentC->afficheradherents(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterAdherent.php">Ajouter un Adherent</a></button>
		<center><h1>Liste des adherents</h1></center>
		<table border="1" align="center">
			<tr>
				<th>NumAdherent</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Email</th>
				<th>DateInscription</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeAdherents as $adherent){
			?>
			<tr>
				<td><?php echo $adherent['NumAdherent']; ?></td>
				<td><?php echo $adherent['Nom']; ?></td>
				<td><?php echo $adherent['Prenom']; ?></td>
				<td><?php echo $adherent['Adresse']; ?></td>
				<td><?php echo $adherent['Email']; ?></td>
				<td><?php echo $adherent['DateInscription']; ?></td>
				<td>
					<form method="POST" action="modifieradherent.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $adherent['NumAdherent']; ?> name="NumAdherent">
					</form>
				</td>
				<td>
					<a href="supprimeradherent.php?NumAdherent=<?php echo $adherent['NumAdherent']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
