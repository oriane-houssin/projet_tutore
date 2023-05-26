<?php
session_start();

require_once('connection.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['email']) AND !empty($_POST['password'])){

        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        $selectUser = $bdd->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
        $selectUser->execute(array($email, $password));

        if($selectUser->rowCount() > 0){

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $selectUser->fetch()['id'];
            $_SESSION['nom'] = $selectUser->fetch()['nom'];
            echo "Bienvenue, ",$_SESSION['nom'] ;
        }else{
            echo "Adresse mail ou mot de passe incorrecte";
        }
    }else{
        echo "Veuiller remplir les champs présents";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    
    <form action="" method="POST">
        <input type="text" name="email" required="required" autocomplete="off">
        <input type="password" name="password" required="required" autocomplete="off">
        <input type="submit" name="submit">

    </form>

</body>
</html>