<?php
function hashPassword($password){
    $password = trim($password);
    $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
    return $hashedpassword;
}

function isLoggedIn(){
    if(isset($_SESSION['username'], $_SESSION['userid']) && ($_SESSION['session_id'] == session_id())){
        return true;
    } else {
        return false;
    }
}