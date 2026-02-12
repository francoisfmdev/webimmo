<?php 

if($_SESSION["role"] === "agent"): ?>

<p> Bienvenue <?php echo $_SESSION["username"] ; ?> !  </p>
<div>
<p>Mes annonces :</p>
</div>
<div>

</div>

<?php endif;   ?> 