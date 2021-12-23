<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <script src="./index.js"></script>
    <title>Remise Personnel</title>
</head>
<body>

    <form action="" method="POST">

        <label for="ancienete">Entrez vos Années d'Ancienetée : </label>
        <input type="number" name="ancienete" />

        <input type="submit" name="valider" value="Valider">

    </form>

    <?php

        if(isset($_POST["ancienete"])) {

            if ($_POST["ancienete"] <= 1) {
    
                $message = "Vous n'avez pas le droit à la Remise.";
    
                echo $message;
    
            }
    
            else {

                ?>
    
                    <form action="" method="POST" onclick="display_categorie_form()">
    
                        <h2>Choisissez votre Service :</h2>

                        <input type="hidden" name='ancienete' value='<?= $_POST["ancienete"] ?>' />
                        
                        <label for="ventes">Ventes</label>
                        <input type="radio" name="service" id="ventes" value="ventes" />
    
                        <label for="achats">Achats</label>
                        <input type="radio" name="service" id="achats" value="achats" />
    
                        <label for="magasin">Magasin</label>
                        <input type="radio" name="service" id="magasin" value="magasin" />
    
                        <label for="administratif">Administratif</label>
                        <input type="radio" name="service" id="administratif" value="administratif" />
    
                        <div class="hidden" id="form_categorie" onclick='display_valider_button()'>
                            
                            <h2>Choisissez votre Categorie :</h2>
                            
                            <label for="chef_de_rayon">Chef de Rayon</label>
                            <input type="radio" name="categorie" id="chef_de_rayon" value="chef_de_rayon" />
                            
                            <label for="employe">Employé</label>
                            <input type="radio" name="categorie" id="employe" value="employe" />

                        </div>

                        <div class="hidden" id="valider_button">

                            <br />

                            <label for="prix">Entrez le Prix de votre Article</label>
                            <input type="number" name="prix" />

                            <br />
                            <br />

                            <input type="submit" name="valider_calcul" value="Valider le Formulaire">

                        </div>

                    </form>

                <?php
    
            }

            
        }
        
        if (isset($_POST["valider_calcul"])) {

            // echo '<br /> Vous êtes un ' . $_POST["categorie"] . ' dans le service ' . $_POST["service"] . ' avec ' . $_POST["ancienete"] . ' années d&apos;ancientée.';

            if($_POST["service"] == "ventes") {

                if($_POST["categorie"] == "chef_de_rayon") {

                    $remise = $_POST["prix"] - ($_POST["prix"] * 0.03);
                    
                    echo '<br /> Votre article avec réduction est à : ' . $remise . '€';

                }

                else {

                    $remise = $_POST["prix"] - ($_POST["prix"] * 0.05);
                    
                    echo '<br /> Votre article avec réduction est à : ' . $remise . '€';

                }

            }

            else {

                if($_POST["categorie"] == "chef_de_rayon") {
                    
                    echo '<br /> Vos n&apos;avec pas de réduction.';

                }

                else {

                    $remise = $_POST["prix"] - ($_POST["prix"] * 0.03);
                    
                    echo '<br /> Votre article avec réduction est à : ' . $remise . '€';

                }

            }

        }

    ?>

    <br />

    <a href="index.php">Retourner à la page principale</a>
    
</body>
</html>