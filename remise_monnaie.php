<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Remise Monnaie</title>
</head>
<body>

    <div class="flex">

    <form action="" method="POST">

        <label for="article">Entrez le prix de vos articles : </label>
        <input type="number" name="nombre" / autofocus>

        <input type="submit" name="nouvel_article" value="Entrez un Nouvel Article" />

    </form>

    <?php

        if (!isset($_SESSION["message"])) {

            $_SESSION["message"] = "";
            $_SESSION["i"] = 1;
            $_SESSION["total"] = 0;

            $_SESSION["remise"] = 0;
            $_SESSION["message_remise"] = '';

            $_SESSION["billet_10"] = 0;
            $_SESSION["billet_5"] = 0;
            $_SESSION["piece_1"] = 0;

        }

        if (isset($_POST["nouvel_article"])) {
            
            if ($_POST["nombre"] != 0) {

                $_SESSION["message"] .= "Article n°" . $_SESSION["i"] . " - " . $_POST["nombre"] . "€ <br />";
    
                $_SESSION["i"]++;
    
                $_SESSION["total"] += $_POST["nombre"];

            }

            if ($_POST["nombre"] == 0) {

                $_SESSION["message"] .= "Votre total du est : " . $_SESSION["total"] . "€";

                ?>

                    <form action="" method="POST">

                        <label for="payement">Entrez le montant que vous payez : </label>
                        <input type="number" name="payement" autfocus />

                        <input type="submit" name="valider_payement" value="Valider">

                    </form>

                    </div>

                <?php

            }

        }

        ?>

            </div>

        <?php

        if ($_SESSION["message"] != "") {
            
            echo $_SESSION["message"];
        
        }

        if (isset($_POST["valider_payement"])) {

            if (isset($_SESSION["message_remise"])) {

                $_SESSION["remise"] = $_POST["payement"] - $_SESSION["total"];

                $_SESSION["message_remise"] = " <br /><br /> Le montant à rendre est de : " . $_SESSION["remise"] . "€";

                if ( $_SESSION["message_remise"] != "") {

                    echo $_SESSION["message_remise"];
        
                }

                
            }

            while ($_SESSION["remise"] > 0) {
    
                if ($_SESSION["remise"] >= 10) {
        
                    $_SESSION["billet_10"]++;
                    $_SESSION["remise"] = $_SESSION["remise"] - 10;
        
                }
        
                if ($_SESSION["remise"] < 10 && $_SESSION["remise"] >= 5) {
        
                    $_SESSION["billet_5"]++;
                    $_SESSION["remise"] = $_SESSION["remise"] - 5;
        
                }
        
                if ($_SESSION["remise"] < 5 && $_SESSION["remise"] >= 1) {
        
                    $_SESSION["piece_1"]++;
                    $_SESSION["remise"] = $_SESSION["remise"] - 1;
        
                }
    
            }
    
            if ($_SESSION["remise"] == 0 ) {

                echo " <br /> Le montant à rendre est : " . $_SESSION["billet_10"] . " Billets de 10€, " . $_SESSION["billet_5"] . " Billets de 5€, " . $_SESSION["piece_1"] . " Pièces de 1€."; 

            }
    
        }
 
    ?>

    <br />
    <br />

    <a href="destroy_session.php">Vider les sessions</a>

</body>
</html>