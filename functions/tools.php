<?php
function check_connected_user(){
    if(!empty($_SESSION['id']) && isset($_SESSION["id"])  ){
        return true;
    }
    return false;
}
