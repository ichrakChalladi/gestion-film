<?php
	include '../Controller/FilmC.php';
	$FilmC=new FilmC();
	$listeFilms=$FilmC->afficherfilms(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterfilm.php">Ajouter un film</a></button>
		<center><h1>Liste des films</h1></center>
		<table border="1" align="center">
			<tr>
                
				<th>Nom</th>
				<th>score</th>
				<th>titre</th>
				<th>nbre_votants</th>
				<th>Date-sortie</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeFilms as $film){
			?>
			<tr>
				
				<td><?php echo $film['Nom']; ?></td>
				<td><?php echo $film['titre']; ?></td>
				<td><?php echo $film['score']; ?></td>
				<td><?php echo $film['nbre_votants']; ?></td>
				<td><?php echo $film['Date_sortie']; ?></td>
				<td>
					<form method="POST" action="modifierfilm.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $film['idf']; ?> name="idf">
					</form>
				</td>
				<td>
					<a href="supprimerfilm.php?idf=<?php echo $film['idf']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
