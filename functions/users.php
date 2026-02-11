<?php


function register($user){

$hash = password_hash($user["mdp"],PASSWORD_DEFAULT);

$pdo = getPDO();
$sql ="INSERT INTO users (username,mail,role,password) VALUES(?,?,?,?)";
$pstmt = $pdo->prepare($sql);
$trueUser = [$user["user"],$user["mail"],"user",$hash ];

$result =  $pstmt->execute($trueUser);


if ($pstmt->rowCount() === 1) {
    echo "1 utilisateur ajouté";
    $_SESSION[$trueUser[0]];
}else{
    echo "ajout impossible";
}





}