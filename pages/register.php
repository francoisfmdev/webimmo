<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="bg-dark d-flex flex-column min-vh-100">

<?php require_once "../partials/header.php"; ?>

<div class="container d-flex justify-content-center align-items-center flex-grow-1">

    <div class="card login-card p-4 shadow-lg">

        <h2 class="text-center text-gold mb-4">Inscription</h2>

        <form method="POST" action="../traitements/traitement_register.php">

            <div class="mb-3">
                <label for="mail" class="form-label text-gold">Adresse mail</label>
                <input type="email" class="form-control input-dark" name="mail" id="mail" required>
            </div>

            <div class="mb-3">
                <label for="user" class="form-label text-gold">Nom d'utilisateur</label>
                <input type="text" class="form-control input-dark" name="user" id="user" required>
            </div>

            <div class="mb-4">
                <label for="mdp" class="form-label text-gold">Mot de passe</label>
                <input type="password" class="form-control input-dark" name="mdp" id="mdp" required>
            </div>

            <button type="submit" class="btn btn-gold w-100">
                S’inscrire
            </button>

        </form>

        <p class="text-center mt-3 text-gold">
            Déjà un compte ? 
            <a href="/pages/login.php" class="text-gold">Se connecter</a>
        </p>

    </div>

</div>

</body>
</html>