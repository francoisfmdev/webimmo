<?php
session_start();

require_once("../functions/properties.php");

// Config
const MAX_UPLOAD_BYTES = 6000000; // 6 MB
const ALLOWED_MIME = [
  'image/jpeg' => 'jpg',
  'image/png'  => 'png',
  'image/webp' => 'webp',
];

$uploadDir = '../assets/images_properties';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 1) Validation champs
  if (
    isset($_POST["name"]) && $_POST["name"] !== '' &&
    isset($_POST["nbr_room"]) && $_POST["nbr_rooms"] !== '' &&
    isset($_POST["surface"]) && $_POST["surface"] !== '' &&
    isset($_POST["description"]) && $_POST["description"] !== ''
  ) {

    $name = trim($_POST['name']);
    $nbr_room = trim($_POST['nbr_rooms']);
    $surface = trim($_POST['surface']);
    $description = trim($_POST['description']);

    // Image actuelle
    $currentImage = $_POST["current_image"] ?? null;
    $filename = $currentImage;

    // 2) Cas : nouvelle image uploadée
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {

      $file = $_FILES['picture'];

      // Taille
      if ($file['size'] <= 0 || $file['size'] > MAX_UPLOAD_BYTES) {
        die('Taille image invalide');
      }

      // MIME réel
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      $mime = $finfo->file($file['tmp_name']);

      if (!isset(ALLOWED_MIME[$mime])) {
        die('Format image non autorisé');
      }

      $ext = ALLOWED_MIME[$mime];

      // Nom sécurisé
      $filename = uniqid() . '.' . $ext;
      $destination = $uploadDir . DIRECTORY_SEPARATOR . $filename;

      // Upload
      if (!move_uploaded_file($file['tmp_name'], $destination)) {
        die('Erreur déplacement image');
      }

      // Supprimer ancienne image (si existe)
      if (!empty($currentImage) && file_exists($uploadDir . DIRECTORY_SEPARATOR . $currentImage)) {
        @unlink($uploadDir . DIRECTORY_SEPARATOR . $currentImage);
      }
    }

    // 3) Enregistrement BDD
    $ok = add_properties_with_users(
      $name,
      $nbr_room,
      $surface,
      $description,
      $filename,
      $_SESSION["user_id"]
    );

    if (!$ok) {
      // rollback si nouvelle image uploadée
      if ($filename !== $currentImage && file_exists($uploadDir . DIRECTORY_SEPARATOR . $filename)) {
        @unlink($uploadDir . DIRECTORY_SEPARATOR . $filename);
      }
      die('Erreur BDD');
    }

    header("Location: /webimmo/pages/dashboard.php");
    exit;
  }
}