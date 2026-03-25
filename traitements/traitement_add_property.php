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

// Exemple: dossier public safe (idéalement hors webroot)
$uploadDir ='../assets/images_properties'; 



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1) Validation champs texte (exemple)

  if (isset($_POST["property_name"]) && $_POST["property_name"]  !== '' &&
      isset($_POST["nbr_room"]) && $_POST["nbr_room"]  !== '' &&
      isset($_POST["surface"]) && $_POST["surface"]  !== '' &&
      isset($_POST["description"]) && $_POST["description"]  !== '' 
     
    )
    {
      $name = trim($_POST['property_name'] ?? '');
      $nbr_room = trim($_POST['nbr_room'] ?? '');
      $surface = trim($_POST['surface'] ?? '');
      $description = trim($_POST['description'] ?? '');
      // 2) Validation fichier
      if (!isset($_FILES['picture']) || $_FILES['picture']['error'] !== UPLOAD_ERR_OK) {
        die('Upload image invalide');
      }
      $file = $_FILES['picture'];
      if ($file['size'] <= 0 || $file['size'] > MAX_UPLOAD_BYTES) {
        die('Taille image invalide');
      }
      // 3) Déterminer le MIME réel
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      $mime = $finfo->file($file['tmp_name']);
      
      if (!isset(ALLOWED_MIME[$mime])) {
        die('Format image non autorisé');
      }
      $ext = ALLOWED_MIME[$mime];
      
    }

  // 4) Générer un nom sûr 
  
  $filename = $_FILES['picture']['name'];
  $destination = $uploadDir . DIRECTORY_SEPARATOR . $filename;
 
 
  
  // 5) Déplacer le fichier (sécurisé)
  if (!move_uploaded_file($file['tmp_name'], $destination)) {
    die('Erreur déplacement image');
  }

  $ok =  add_properties_with_users($name,$nbr_room,$surface,$description,$filename,$_SESSION["user_id"]);
  if (!$ok) {
    // Rollback “manuel” du fichier si BDD échoue
    @unlink($destination);
    die('Erreur BDD');
  }
  
  header("location:/webimmo/pages/dashboard.php");
  


}
