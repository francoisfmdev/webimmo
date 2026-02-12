<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST"  action="../traitements/traitement_connexion.php">
        <div>
            <label for="mail">Adresse mail :</label>
            <input type="text" name="mail" id="mail" required />
        </div>

        <div>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" required />
        </div>
        <button>Se connecter</button>
    </form>
</body>
</html>