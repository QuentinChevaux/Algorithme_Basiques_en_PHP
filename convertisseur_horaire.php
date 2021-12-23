<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur Horaire</title>
</head>
<body>

   <form action="" method="POST">

        <label for="nombre">Entrez un nombre en Secondes : </label>
        <input type="number" name="nombre" placeholder="Entrez un Nombre" autfocus />

        <input type="submit" name="valider" value="Convertir en Format Horaire">

   </form> 

   <?php

        $message = '';
        $heure = 0;
        $minute = 0;
        $seconde = 0;

        if ( isset($_POST["valider"])) {

            $heure = floor( $_POST["nombre"] / 3600);
            $_POST["nombre"] = $_POST["nombre"] % 3600;

            $minute = floor( $_POST["nombre"] / 60);
            $_POST["nombre"] = $_POST["nombre"] % 60;

            $seconde = $_POST["nombre"];

            $message = 'Votre valeur convertie en format horaire est égale à : ' . $heure . "h " . $minute . " minutes " . $seconde . " secondes.";

        }

        if ($message != "") {
            
            echo $message;
            
        }

   ?>

   <br />
   
   <a href="index.php">Retour à la page principale</a>
    
</body>
</html>