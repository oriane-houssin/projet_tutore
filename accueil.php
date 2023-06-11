<?php
session_start();
require_once('connection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/accueil.css">
    <title>Accueil</title>
</head>
<body>
    
    <?php  include 'templates/header.php'; ?>
    <div class="corps">
        <img class="logo-square" src="media/logo-name-square.png" alt="logo et titre">
        <h1>salle de sport sur <br> mesure & clés en <br> main</h1>
    </div>
    <div class="trait"></div>
    <?php echo "Bienvenue, ", $_SESSION['nom'], $_SESSION['prenom']; ?>

</body>
</html>