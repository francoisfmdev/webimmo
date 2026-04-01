<?php session_start(); 
require_once "../functions/properties.php";
$result = get_all_properties();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Flaticon UIcons -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Bien immobilier</title>
</head>
<body>
<?php require_once "../partials/header.php"; ?>

    <?php if(empty($result)): ?>
    <p>Vous ne gérez absolument aucune propriété !</p>
<?php else: ?>


<div class="container">
    <div class="row mt-4 mb-4">
        <h1 class="text-center">Liste des biens </h1>

    </div>
    <div class="row">
        <?php  // var_dump($result); ?>
        <?php foreach($result as $property): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="../assets/images_properties/<?php echo $property["image"]; ?>" class="card-img-top" alt="<?php $property["name"]; ?>">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo  htmlspecialchars($property["name"]); ?></h5>
                        <p class="card-text"><?php echo  htmlspecialchars($property["description"]); ?></p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Surface : <?php echo  htmlspecialchars($property["surface"]); ?></li>
                        <li class="list-group-item">nombre de pièce : <?php echo  htmlspecialchars($property["nbr_rooms"]); ?></li>
                    </ul>

                    <div class="card-body">
                        <a href="/webimmo/pages/single_property.php?id=<?php echo $property["id"]; ?>" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>  
    <?php endif; ?>
</body>
</html>