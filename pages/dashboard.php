<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <?php
     
    if( isset($_SESSION["user_id"]) && $_SESSION["user_id"] !== ""){
        require_once "../partials/dashboard_admin.php";
        require_once "../partials/dashboard_agent.php";
    }
    else {
        header("Location: /webimmo/pages/connexion.php");
    }

    ?>
</body>
</html>