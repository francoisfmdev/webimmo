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
       require_once "../partials/form_edit_property.php";
?>


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