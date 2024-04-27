<?php
    include_once '../Model/film.php';
    include_once '../Controller/FilmC.php';

    $error = "";

    // create film
    $film = null;

    // create an instance of the controller
    $filmC = newFilmC();
    if (
        isset($_POST["idf"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["titre"]) &&
		isset($_POST["score"]) && 
        isset($_POST["nbre_votants"]) && 
        isset($_POST["date_sortie"])
    ) {
        if (
            !empty($_POST["idf"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["titre"]) && 
			!empty($_POST["score"]) && 
            !empty($_POST["nbre_votants"]) && 
            !empty($_POST["date_sortie"])
        ) {
            $film = new Film(
                $_POST['idf'],
				$_POST['nom'],
                $_POST['titre'], 
				$_POST['score'],
                $_POST['nbre_votants'],
                $_POST['date_sortie']
            );
            $filmC->modifierfilm($film, $_POST["idf"]);
            header('Location:afficherListefilm.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListefilm.php">Retour à la liste des films</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idf'])){
				$film = $filmC->recupererfilm($_POST['idf']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idf">identifiant film:
                        </label>
                    </td>
                    <td><input type="integer" name="idf" id="idf" value="<?php echo $film['idf']; ?> "></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $film['Nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">titre:
                        </label>
                    </td>
                    <td><input type="text" name="titre" id="titre" value="<?php echo $film['titre']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="score">score:
                        </label>
                    </td>
                    <td>
                        <input type="integer" name="score" value="<?php echo $film['film']; ?>" id="score">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nbre_votants">nombre votants:
                        </label>
                    </td>
                    <td>
                        <input type="integerl" name="nbre_votants" id="nbre_votants" value="<?php echo $film['nbre_votants']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date de sortie:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_sortie" id="date_sortie" value="<?php echo $film['Date_sortie']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>
