<?php

require_once(__DIR__ . "/../functions/tools.php");
?>
<header>
  <nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
    <div class="container">

      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center text-gold" href="/">
        <img src="/../assets/img/logo.png" alt="Logo MonSite" height="40" class="me-2">
        <span class="fw-bold">MonSite</span>
      </a>

      <!-- Toggle -->
      <button class="navbar-toggler border-gold" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center gap-3">

          <li class="nav-item">
            <a class="nav-link text-gold" href="/webimmo/">Accueil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-gold" href="/webimmo/pages/properties.php">Nos biens</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-gold" href="/webimmo/pages/contact.php">Nous contacter</a>
          </li>

          <?php if(check_connected_user()): ?>

            <li class="nav-item">
              <a class="btn btn-gold btn-sm ms-2" href="/webimmo//pages/dashboard.php">
                Gérer ses biens
              </a>
            </li>

          <?php else: ?>

            <li class="nav-item">
              <a class="btn btn-outline-gold btn-sm ms-2" href="/webimmo/pages/connexion.php">
                Se connecter
              </a>
            </li>

            <li class="nav-item">
              <a class="btn btn-gold btn-sm" href="/webimmo/pages/register.php">
                S’inscrire
              </a>
            </li>

          <?php endif; ?>

        </ul>
      </div>

    </div>
  </nav>
</header>