<?php
    include_once '../Model/film.php';
    include_once '../Controller/FilmC.php';

    $error = "";

    // create film
    $film = null;

    // create an instance of the controller
    $FilmC = new FilmC();
    if (
        isset($_POST["nom"]) &&
		
        isset($_POST["titre"]) &&
        isset($_POST["score"]) &&
        isset($_POST["nbre_votants"]) &&
        isset($_POST["date_sortie"])
    ) {
        if (
            !empty($_POST["nom"]) &&
            !empty($_POST["titre"]) &&
            !empty($_POST["score"]) &&
            !empty($_POST["nbre_votants"]) &&
            !empty($_POST["date_sortie"])
        ) {
            $film = new Film(
                
                $_POST['nom'] &&
                $_POST["titre"]) &&
                $_POST["score"] &&
                $_POST["nbre_votants"] &&
                $_POST["date_sortie"]
            ;
            $FilmC->ajouterfilm($film);
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
        <button><a href="afficherListefilm.php">Retour à la liste des film</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idf">identifiant film:
                        </label>
                    </td>
                    <td><input type="integer" name="idf" id="idf" >
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">nom film:
                        </label>
                    </td>
                    <td><input type="text" name="titre" id="titre" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="score">score:
                        </label>
                    </td>
                    <td>
                        <input type="integer" name="score" id="score">
                    </td>
                    <td>
                        <label for="nbre_votants">nbre_votants:
                        </label>
                    </td>
                    <td>
                        <input type="integer" name="nbre_votants" id="nbre_votants">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date_sortie">Date de sortie:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_sortie" id="date_sortie" >
                    </td>
                </tr>   
				<tr>
                    
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>