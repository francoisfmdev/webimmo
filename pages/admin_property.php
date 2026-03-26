<?php session_start(); 
require_once "../functions/properties.php";
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
<body class="bg-light">

<?php
if( isset($_SESSION["user_id"]) && $_SESSION["user_id"] !== "") :

    if(isset($_GET["id"]) && $_GET["id"] !== "" ): 
        $id = $_GET["id"];
        $property = get_one_property_by_id($id);
?>

<div class="container py-5">

    <div class=" shadow-lg border-0">
        
        <!-- Image -->
        <img src="../assets/images_properties/<?php echo $property["image"]; ?>" class="card-img-top" alt="Bien immobilier">

        <div class="">

            <!-- Nom -->
            <h2 class=" mb-4"><?php echo $property["name"] ?> </h2>

            <!-- Infos clés -->
            <div class="row text-center mb-4">

                <div class="col-md-4">
                    <img src="../assets/img/area.png"  class="icons" alt="icone de surface"/>
                    <p class="mt-2 mb-0"><strong>Surface</strong></p>
                    <p><?php echo $property["surface"]; ?> m²</p>
                </div>

                <div class="col-md-4">
                    <img src="../assets/img/room.png" class="icons" alt="icone nombre de pièce"/>
                    <p class="mt-2 mb-0"><strong>Pièces</strong></p>
                    <p> <?php echo $property["nbr_rooms"]; ?> </p>
                </div>

               

            </div>

            <!-- Description -->
            <div class="mb-4">
                <h4>Description</h4>
                <p>
                  <?php echo $property["description"]; ?>
                </p>
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