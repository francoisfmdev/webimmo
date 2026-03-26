<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Flaticon UIcons -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">

    <title>Bien immobilier</title>
</head>
<body class="bg-light">

<?php
if( isset($_SESSION["user_id"]) && $_SESSION["user_id"] !== "") :

    if(isset($_GET["id"]) && $_GET["id"] !== "" ): 
        $id = $_GET["id"];
        // $property = get_one_property_by_id($id);
?>

<div class="container py-5">

    <div class="card shadow-lg border-0">
        
        <!-- Image -->
        <img src="https://via.placeholder.com/1200x500" class="card-img-top" alt="Bien immobilier">

        <div class="card-body">

            <!-- Nom -->
            <h2 class="card-title mb-4">Villa moderne avec piscine</h2>

            <!-- Infos clés -->
            <div class="row text-center mb-4">

                <div class="col-md-4">
                    <i class="fi fi-sr-ruler-combined fs-2 text-primary"></i>
                    <p class="mt-2 mb-0"><strong>Surface</strong></p>
                    <p>150 m²</p>
                </div>

                <div class="col-md-4">
                    <i class="fi fi-sr-bed fs-2 text-primary"></i>
                    <p class="mt-2 mb-0"><strong>Chambres</strong></p>
                    <p>3</p>
                </div>

                <div class="col-md-4">
                    <i class="fi fi-sr-bath fs-2 text-primary"></i>
                    <p class="mt-2 mb-0"><strong>Salles de bain</strong></p>
                    <p>2</p>
                </div>

            </div>

            <!-- Description -->
            <div class="mb-4">
                <h4>Description</h4>
                <p>
                    Superbe villa moderne située dans un quartier calme.
                    Elle dispose d’un grand séjour lumineux, d’une cuisine équipée,
                    de plusieurs chambres et d’une piscine extérieure.
                    Idéal pour une famille ou investissement locatif.
                </p>
            </div>

            <!-- Bouton -->
            <div class="text-end">
                <a href="#" class="btn btn-primary">
                    <i class="fi fi-sr-envelope"></i> Contacter
                </a>
            </div>

        </div>
    </div>

</div>

<?php
    else:  
        header("Location: /webimmo/pages/dashboard.php"); 
    endif;   
else: 
    header("Location: /webimmo/pages/connexion.php");
endif;
?>

</body>
</html>