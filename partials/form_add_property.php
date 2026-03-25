<form method="POST" enctype="multipart/form-data" action="../traitements/traitement_add_property.php" class="card p-4 shadow-sm">

    <input type="hidden" value="<?php echo $_SESSION["user_id"]; ?>"/>

    <h4 class="mb-4 text-center">Ajouter un bien</h4>

    <div class="mb-3">
        <label for="property_name" class="form-label">Nom du bien</label>
        <input type="text" name="property_name" id="property_name" class="form-control" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nbr_room" class="form-label">Nombre de pièce</label>
            <input type="number" name="nbr_room" id="nbr_room" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="surface" class="form-label">Surface</label>
            <input type="number" name="surface" id="surface" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label for="picture" class="form-label">Image du bien</label>
        <input type="file" name="picture" id="picture" class="form-control" accept="image/jpeg,image/png,image/webp" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>

</form>