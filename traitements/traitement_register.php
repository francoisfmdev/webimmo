<?php
session_start(); 
require_once "../functions/database.php";
require_once "../functions/users.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(
        isset($_POST['mail']) && $_POST['mail'] !== '' &&
        isset($_POST['user']) && $_POST['user'] !== '' &&
        isset($_POST['mdp']) && $_POST['mdp'] !== ''  )
    {

    echo "ok";

    $u = ["mail"=>$_POST["mail"],
            "user"=>$_POST['user'],
            "mdp"=>$_POST['mdp']
            ];

        register($u);    
    }
    else{
       header("Location: /webimmo/"); 
    }

}
else{
    header("Location: /webimmo/");
}