<?php
require_once "database/connection.php";

function addUser($username, $password, $email, $birthyear){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$username, $hashedpassword, $email, $birthyear];
    $sql = "INSERT INTO user (username, userpassword, email, birthyear) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($username, $password){
    $pdo = connectDB();
    $sql = "SELECT * FROM user WHERE username=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$username]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    if(gettype($user) != "boolean"){

        $hashedpassword = $user["userpassword"];

        if($hashedpassword && password_verify($password, $hashedpassword))
            return $user;
        else 
        return false;
    }
    else{
        echo "Kirjautumistiedot ovat väärin";
        return false;
    }
}

function getUserByUsername($username){
    $pdo = connectDB();
    $sql = "SELECT username FROM user WHERE username=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$username]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function getEmail($email){
    $pdo = connectDB();
    $sql = "SELECT username FROM user WHERE email=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$email]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    return $user;

}
