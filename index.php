<?php

session_start();
require_once('connection.php');

if(!isset($_SESSION['email'])){
    header('Location:connexion.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php echo "Bienvenue, ", $_SESSION['nom'], " ", $_SESSION['prenom']; ?>
</body>
</html>
