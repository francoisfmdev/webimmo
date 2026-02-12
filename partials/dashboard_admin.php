<?php 

if($_SESSION["role"] === "admin"): ?>

<p> Bienvenue <?php echo $_SESSION["username"] ; ?> !  </p>

<?php endif;   ?> 