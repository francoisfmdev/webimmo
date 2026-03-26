<?php if($_SESSION["role"] === "agent"): 
require_once "../functions/properties.php";

$result = get_properties_about_user($_SESSION["user_id"]);
?>

<p>Bienvenue <?php echo $_SESSION["username"]; ?> !</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <?php require_once "../partials/form_add_property.php"; ?>
        </div>
    </div>
</div>

<?php if(empty($result)): ?>
    <p>Vous ne gérez absolument aucune propriété !</p>
<?php else: ?>

<div class="container">
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
                        <a href="/webimmo/pages/admin_property.php?id=<?php echo $property["id"]; ?>" class="btn btn-primary">Voir</a>
                        <form  method="POST" action="../traitements/traitement_delete_property.php">
                            <input  class="form-controls" type="hidden" name="id" value="<?php echo $property['id']?>">
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>
<?php endif; ?>