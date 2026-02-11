<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST"  action="../traitements/traitement_register.php">
        <div>
            <label for="mail">Adresse mail :</label>
            <input type="text" name="mail" id="mail" />
        </div>
       <div>
            <label for="user">Nom d'utilisateur :</label>
            <input type="text" name="user" id="user" />
        </div>
        <div>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" />
        </div>
        <button>S'inscrire</button>
    </form>
</body>
</html>