<form method="POST" enctype="multipart/form-data" action="../traitements/traitement_edit_property.php" class="card p-4 shadow-sm">

    <input type="hidden" value="<?php echo $_SESSION["user_id"]; ?>"/>

    <h4 class="mb-4 text-center">Modifier un bien </h4>

    <div class="mb-3">
        <label for="property_name" class="form-label">Nom du bien</label>
        <input type="text" name="property_name" id="property_name" class="form-control" value="<?php echo $property["name"]; ?>" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nbr_room" class="form-label">Nombre de pièce</label>
            <input type="number" name="nbr_room" id="nbr_rooms" class="form-control" value="<?php echo $property["nbr_rooms"]; ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="surface" class="form-label">Surface</label>
            <input type="number" name="surface" id="surface" class="form-control"  value="<?php echo $property["surface"]; ?>" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4">
            <?php echo $property["description"]; ?>
        </textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Image actuelle</label><br>
        <input type="hidden" name="current_image" value="<?php echo $property["image"]; ?>">
        <img src="../assets/images_properties/<?php echo $property["image"]; ?>" alt="image" style="max-width:150px;">
    </div>

    <div class="mb-3">
        <label for="picture" class="form-label">Nouvelle image (Optionnelle)</label>
        <input type="file" name="picture" id="picture" class="form-control" accept="image/jpeg,image/png,image/webp">
    </div>
    
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>

</form>