<?php 
session_start(); 
require_once "../functions/properties.php";



if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['id']) && !empty($_POST['id'])  ){
        
        var_dump($_POST['user']);
        var_dump($_POST['id']);
       
        $ok = delete_property_by_id($_POST["id"], $_SESSION["user_id"]);

        header("location:/webimmo/pages/dashboard.php");
      
    }else{
       header("location:/webimmo/pages/dashboard.php"); 
    }

}else{
    header("location:/webimmo/pages/dashboard.php");
}
