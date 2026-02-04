<?php 


function getPDO():PDO { 
    try{
        $db =  new PDO('mysql:host=localhost;dbname=webimmo', "root", "");
        return $db;
    }
    catch(PDOException $err){
        throw $err;
    }
    
}


function debugPDO(PDO $db){
    var_dump($db);
}