<?php

session_start();

require_once('connection.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['type']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['societe'])){

        $type = htmlspecialchars($_POST['type']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $societe = htmlspecialchars($_POST['societe']);

        $insertUser = $bdd->prepare('INSERT INTO user(type, nom, prenom, email, password, societe)VALUES(?, ?, ?, ?, ?, ?)');
        $insertUser->execute(array($type, $nom, $prenom, $email, $password, $societe));

        $selectUser = $bdd->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
        $selectUser->execute(array($email, $password));

        if($selectUser->rowcount()>0){

            $_SESSION['id'] = $selectUser->fetch()['id'];
            $_SESSION['type'] = $type;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['societe'] = $societe;

        }

        echo "Bienvenue, ",$_SESSION['prenom'];

        

    }else{
        echo "Veuillez remplir tous les champs";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="" method="post">

        <div class="form-group">
            <label for="type-select">Choisissez votre type d'user</label>

            <select name="type" id="type-select" required="required">
                <option value="">--Choisissez--</option>
                <option value="admin">Administrateur</option>
                <option value="client">Client</option>
                <option value="tech">Technicien</option>
            </select>
        </div>

        <div class="form-group2">
            <label for="labelNom">Nom</label>
            <input type="text" class="form-control" id="nom" required="required" name="nom" autocomplete="off" placeholder="Entrez votre nom">
        </div>

        <div class="form-group3">
            <label for="labelPrenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" required="required" name="prenom" autocomplete="off" placeholder="Entrez votre prénom">
        </div>

        <div class="form-group3">
            <label for="labelMail">Adresse mail</label>
            <input type="email" class="form-control" id="email" required="required" name="email" autocomplete="off" placeholder="Entrez votre adresse mail">
        </div>

        <div class="form-group4">
            <label for="labelMdp">Mot de Passe</label>   
            <input type="password" class="form-control" id="password" required="required" name="password" autocomplete="off" placeholder="Entrez un mot de passe">
        </div>

        <div class="form-group5">
            <label for="labelSociete">Société</label>
            <input type="text" class="form-control" id="societe" required="required" name="societe" autocomplete="off" placeholder="Entrez le nom de votre société">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
        <a href="connexion.php">Se connecter</a>

    </form>
</body>
</html>