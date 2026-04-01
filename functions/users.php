<?php


function register($user){

    $hash = password_hash($user["mdp"],PASSWORD_DEFAULT);

    $pdo = getPDO();
    $sql ="INSERT INTO users (username,mail,role,password) VALUES(:username,:mail,:role,:password)";
    $pstmt = $pdo->prepare($sql);
    $trueUser = ["username"=>$user["user"],"mail"=>$user["mail"],"role"=>"agent","password"=>$hash ];

    $result =  $pstmt->execute($trueUser);


    if ($pstmt->rowCount() === 1) {
        echo "1 utilisateur ajouté";
        $id = $pdo->lastInsertId();
        $_SESSION["username"] = $trueUser["username"];
        $_SESSION["user_id"] = $id;
        $_SESSION["role"] = $trueUser["role"];
        $_SESSION["mail"] = $trueUser["mail"];
        header("Location: /webimmo/pages/dashboard.php");


    }else{
        echo "ajout impossible";
    }

}

function connexion($user){

    $pdo = getPDO();
    $sql ="SELECT * FROM users WHERE mail = ?";
    $pstmt = $pdo->prepare($sql);
    $u = [$user["mail"]];

    if ($pstmt->execute($u)) {
        $user_base = $pstmt->fetch(PDO::FETCH_ASSOC);
        $isSame = password_verify($user["mdp"],$user_base["password"]);
        if($isSame === true){
            $_SESSION["username"] = $user_base["username"];
            $_SESSION["mail"] = $user_base["mail"];
            $_SESSION["role"] = $user_base["role"];
            $_SESSION["user_id"] = $user_base["id"];
            header("Location: /webimmo/pages/dashboard.php");
        }
    } else {
        print_r($pstmt->errorInfo());
    }

}




function deconnexion(){

session_destroy();
header("Location: /webimmo/pages/connexion.php");
}