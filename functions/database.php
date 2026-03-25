<?php 


function getPDO() { 
    try{
        $db =  new PDO('mysql:host=localhost;dbname=webimmo', "root", "");
        return $db;
    }
    catch(PDOException $err){
        var_dump($err);
        throw $err;

    }
    
}


function debugPDO(PDO $db){
    var_dump($db);
}