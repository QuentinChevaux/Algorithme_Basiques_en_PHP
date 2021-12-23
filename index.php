<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method='POST'>

        <label for="nombre">Saisir un nombre : </label>
        <input type="number" name="nombre" autofocus>

        <input type="submit" name="valider" value="Valider" />

    </form>

        <br />

    <a href="convertisseur_horaire.php">Convertisseur Horaire</a>

        <br />

    <a href="remise_monnaie.php">Calculateur de Remise de Monnaie</a>

        <br />

    <a href="remise_personnel.php">Calculateur Remise Personnel</a>

        <br />

    <a href="prospectus.php">Prospectus</a>

        <br />

    <a href="destroy_session.php">Vider les Sessions</a>

        <br />
        <br />

    <?php

        $message = '';

        if (isset($_POST["valider"])) {

            if (!isset($_SESSION["i"])) {

                $_SESSION["i"] = 0;
                $_SESSION["plus_grand"] = 1;
                $_SESSION["plus_petit"] = 1000;
                $_SESSION["num_plus_grand"] = 0;
                $_SESSION["num_plus_petit"] = 0;

            }
            
            $_SESSION["i"]++;

            if ($_POST["nombre"] > 1 || $_POST["nombre"] < 1000) {

                if ( $_POST["nombre"] != 0) {

                    if ( $_SESSION["plus_grand"] < $_POST["nombre"]) {
    
                        $_SESSION["plus_grand"] = $_POST["nombre"];
    
                        $_SESSION["num_plus_grand"] = $_SESSION["i"];
    
                    }
    
                    if ( $_SESSION["plus_petit"] > $_POST["nombre"]) {
    
                        $_SESSION["plus_petit"] = $_POST["nombre"];
    
                        $_SESSION["num_plus_petit"] = $_SESSION["i"];
    
                    }
    
                }

                if ( $_POST["nombre"] == 0) {
    
                    $message = "Le Nombre le plus grand est  : " . $_SESSION["plus_grand"] . " à la " . $_SESSION["num_plus_grand"] . "ème place" . "<br />";
                    $message .= "Le Nombre le plus petit est : " . $_SESSION["plus_petit"] . " à la " . $_SESSION["num_plus_petit"] . "ème place" .  ""; 
    
                    unset($_SESSION["i"]);                        
                    unset($_SESSION["plus_grand"]);
                    unset($_SESSION["plus_petit"]);
    
                }

            }  

            else {

                $message = 'Veuillez Saisir un Nombre Compris entre 1 et 1000';

            }

            
        }
        
        if ($message != "") {
            
            echo $message;
            
        }

    ?>

</body>
</html>