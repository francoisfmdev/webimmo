<?php
require_once 'database.php';

function add_properties_with_users($name,$nbr_room,$surface,$desc,$image,$session_id){

$pdo = getPDO();
$sql = "INSERT INTO properties (name, nbr_rooms, surface, description,image,user_id,created_at)
          VALUES (:name, :nbr_rooms, :surface,:description,:image,:use_id, NOW())";

  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([
    ':name' => $name,
    ':nbr_rooms'=>$nbr_room,
    ':surface'=>$surface,
    ':description' => $desc,
    ':image'=> $image,
    'user_id' =>$session_id ]);
  
    return $ok;
  
}

function update_properties_with_users($id,$name,$nbr_room,$surface,$desc,$image){

$pdo = getPDO();
$sql = "UPDATE properties
SET name = :name, nbr_rooms = :nbr_rooms, surface = :surface, description = :description, image =:image, created_at = NOW()
WHERE id = :id";

  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([
    ":id"=>$id,
    ':name' => $name,
    ':nbr_rooms'=>$nbr_room,
    ':surface'=>$surface,
    ':description' => $desc,
    ':image'=> $image ]);
  
    return $ok;
  
}

function delete_property_by_id($id,$user_id){
  $pdo = getPDO(); 
  $sql = "DELETE FROM properties WHERE :id = id AND :user_id = user_id  ";
  $stmt = $pdo->prepare($sql);
  $ok =  $stmt->execute([
    ":id"=>$id,
    ":user_id"=>$user_id
  ]);

  return $ok;


}


function get_properties_about_user($session_id){
  $pdo = getPDO();  

  $sql = "SELECT p.id, p.name, p.nbr_rooms, p.surface, p.description, p.image, p.user_id FROM properties as p INNER JOIN users as u ON u.id = p.user_id WHERE u.id = :id" ;
  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([":id"=>$session_id]);
  if($ok){
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  return $results;

}

function get_one_property_by_id($id){
  $pdo =  getPDO();
  $sql = "SELECT * FROM properties WHERE  id = :id";
  $stmt = $pdo->prepare($sql);
  $ok = $stmt->execute([":id"=>$id]);
  if($ok){
    $property = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  return $property;
}