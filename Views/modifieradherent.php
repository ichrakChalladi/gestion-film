<?php
    include_once '../Model/Adherent.php';
    include_once '../Controller/AdherentC.php';

    $error = "";

    // create adherent
    $adherent = null;

    // create an instance of the controller
    $adherentC = new AdherentC();
    if (
        isset($_POST["numadherent"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["adresse"]) && 
        isset($_POST["email"]) && 
        isset($_POST["dateins"])
    ) {
        if (
            !empty($_POST["numadherent"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["adresse"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["dateins"])
        ) {
            $adherent = new Adherent(
                $_POST['numadherent'],
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['adresse'],
                $_POST['email'],
                $_POST['dateins']
            );
            $adherentC->modifieradherent($adherent, $_POST["numadherent"]);
            header('Location:afficherListeAdherents.php');
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
        <button><a href="afficherListeAdherents.php">Retour à la liste des adherents</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['NumAdherent'])){
				$adherent = $adherentC->recupereradherent($_POST['NumAdherent']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="numadherent">Numéro Adherent:
                        </label>
                    </td>
                    <td><input type="text" name="numadherent" id="numadherent" value="<?php echo $adherent['NumAdherent']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $adherent['Nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $adherent['Prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" value="<?php echo $adherent['Adresse']; ?>" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $adherent['Email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date d'inscription:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateins" id="dateins" value="<?php echo $adherent['DateInscription']; ?>">
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