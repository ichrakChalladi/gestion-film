<?php
	include '../Controller/CategorieC.php';
	$categorieC=new CategorieC();
	$listeCats=$categorieC->affichercategorie(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajoutercategorie.php">Ajouter une categorie</a></button>
		<center><h1>Liste des categories</h1></center>
		<table border="1" align="center">
			<tr>
				
				<th>Nom</th>
			
			</tr>
			<?php
				foreach($listeCats as $categorie){
			?>
			<tr>
				
				<td><?php echo $categorie['nomc']; ?></td>
                <td>
					<form method="POST" action="modifiercategorie.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $categorie['idc']; ?> name="idc">
					</form>
				</td>
				<td>
					<a href="supprimercategorie.php?idc=<?php echo $categorie['idc']; ?>">Supprimer</a>
				</td>
			
			
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
