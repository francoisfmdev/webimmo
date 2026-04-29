<?php
require_once 'database.php';

function get_messages_about_properties_of_user($session_id){

$pdo = getPDO();

$req = "SELECT * FROM messages as m
INNER JOIN properties  as p 
ON m.property_id   = p.id  
WHERE p.user_id = :session_id";

$stmt = $pdo->prepare($req);
$stmt->execute([
    ":session_id"=> $session_id
]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result){
        return $result;
    }else{
        return [];
    }

}


function add_message($message){
    
    $pdo = getPDO();
    $req = "INSERT INTO messages (mail,identite,message,property_id,send_at) 
    VALUES (:mail,:identite,:message,:property_id,NOW())";

    $m = [
        "mail"=>$message["email"],
        "identite"=>$message["identite"],
        "message"=>$message["message"],
        "property_id"=>$message["property_id"]
    ];
    
    var_dump($m);
    $stmt = $pdo->prepare($req);

    $success =  $stmt->execute($m);
    var_dump($success);
    var_dump($stmt->errorInfo());
    var_dump($stmt->errorCode());

}