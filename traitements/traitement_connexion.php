<?php
session_start(); 
require_once "../functions/database.php";
require_once "../functions/users.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(
        isset($_POST['mail']) && $_POST['mail'] !== '' &&
        isset($_POST['mdp']) && $_POST['mdp'] !== ''  )
    {

    

    $u = ["mail"=>$_POST["mail"],
            "mdp"=>$_POST['mdp']
            ];

        connexion($u);    
    }
    else{
       header("Location: /webimmo/"); 
    }

}
else{
    header("Location: /webimmo/");
}