<?php
    include_once '../Model/categorie.php';
    include_once '../Controller/CategorieC.php';

    $error = "";

    // create categorie
    $categorie = null;

    // create an instance of the controller
    $categorieC = new CategorieC();
    if (
        isset($_POST["idc"]) &&
        isset($_POST["nomc"])
		
    ) {
        if (
            !empty($_POST["idc"]) &&
            !empty($_POST["nomc"]) 
        ) {
            $categorie = new Categorie(
            $_POST['idc'],
            $_POST['nomc'] 
        );
            $categorieC->ajoutercategorie($categorie);
            header('Location:afficherListecategorie.php');
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
        <button><a href="afficherListecategorie.php">Retour à la liste des categories</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
            <tr>
                    <td>
                        <label for="idc">identifiant film:
                        </label>
                    </td>
                    <td><input type="integer" name="idc" id="idc" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomc">nom categorie:
                        </label>
                    </td>
                    <td><input type="text" name="nomc" id="nomc" maxlength="20"></td>
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