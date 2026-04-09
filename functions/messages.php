<?php
require_once 'database.php';

function get_messages_about_properties_of_user($session_id){

$pdo = getPDO();

$req = "SELECT * FROM messages as m
INNER JOIN properties  as p 
ON m.property_id   = p.id  
WHERE p.user_id = :session_id";


}