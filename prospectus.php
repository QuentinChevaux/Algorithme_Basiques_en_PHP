<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prospectus</title>
</head>
<body>

    <form action="" method="POST">

        <h2>Région :</h2>

        <label for="Nord">Nord</label>
        <input type="radio" name="region" value="Nord" />
        <label for="Sud">Sud</label>
        <input type="radio" name="region" value="Sud">

            <br />

        <h2>Etat Civil :</h2>

        <label for="Marié">Marié</label>
        <input type="radio" name="etat_civil" value="Marié" />
        <label for="Célibataire">Célibataire</label>
        <input type="radio" name="etat_civil" value="Célibataire">

            <br />
            <br />

        <label for="age">Age :</label>
        <input type="number" name="age" />

            <br />
            <br />

        <label for="nombre_commande">Nombre de Commandes Passées :</label>
        <input type="number" name="nombre_commande" />

            <br />
            <br />

        <input type="submit" name="valider" value="Valider" />

    </form>

    <?php

        if (isset($_POST["valider"])) {

            if ($_POST["region"] == "Sud" && $_POST["etat_civil"] == "Marié" && $_POST["age"] < 30 
                && $_POST["nombre_commande"] >= 2) {

                  echo '<br />Vous allez recevoir le Prospectus.<br />';  

            }

            else {

                echo '<br />Allez bien vous faire foutre.<br />';

            }

        }

    ?>

    <br />

    <a href="index.php">Retourner à la page principale</a>
    
</body>
</html>