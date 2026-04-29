<?php
session_start(); 
require_once "../functions/database.php";
require_once "../functions/messages.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(
        isset($_POST['email']) && $_POST['email'] !== '' &&
        isset($_POST["property_id"])  && $_POST["property_id"] !== '' &&
        isset($_POST["identite"]) && $_POST["identite"] !== "" &&
        isset($_POST["message"]) && $_POST["message"] !== ""  )
    {

    

    $message = ["email"=>$_POST["email"],
                "property_id"=>$_POST['property_id'],
                "identite"=>$_POST["identite"],
                "message"=>$_POST["message"]
            ];

            
        add_message($message);    
    }
    else{
       header("Location: /webimmo/"); 
    }

}
else{
    header("Location: /webimmo/");
}