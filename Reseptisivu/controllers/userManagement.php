<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';

function registerController(){
    if(isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['birthyear'])){
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);

        // Käytetään email sanitointia
        $email = cleanUpInputEmail($_POST['email']);

        $birthyear = cleanUpInput($_POST['birthyear']);


        // Tarkistaa, onko käyttäjänimi jo käytössä
        $usernameCandidate = getUserByUsername($username);

        // Tarkistaa, onko sähköposti jo käytössä
        $emailCandidate = getEmail($email);

        // Haetaan muuttujaan usernameCandidaten tyyppi,
        // jos Array, sama nimi on jo käytössä.
        // Jos taas boolean, nimi ei ole käytössä
        $type = gettype($usernameCandidate);

        // Haetaan muuttujaan emailCandidaten tyyppi,
        // jos Array, sama osoite on jo käytössä.
        // Jos taas boolean, osoite ei ole käytössä
        $typeEmail = gettype($emailCandidate);


        // Tarkistaa, onko käyttäjä 15-vuotias tai yli
        $currentyear = date("Y");
        $age = $currentyear - $birthyear;

        if($age >= 15 && $type == "boolean" && $typeEmail == "boolean"){

            try {
                addUser($username, $password, $email, $birthyear);
                header("Location: /login"); 
            } catch (PDOException $e){
                echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
            }
        }
        else{
            echo "Olet liian nuori (alle 15) tai käyttäjänimesi tai sähköposti on jo käytössä";
        }
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['username'], $_POST['password'])){
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);
  
        $result = login($username, $password);
        if($result){
            $_SESSION['username'] = $result['username'];
            $_SESSION['userid'] = $result['userID'];
            $_SESSION['session_id'] = session_id();

            // Lisätään email ja syntymävuosi sessioon
            $_SESSION['email'] = $result['email'];
            $_SESSION['birthyear'] = $result['birthyear'];

            header("Location: /"); 
        } else {
            require "views/login.view.php";
        }
    } else {
        require "views/login.view.php";
    }
}

function logoutController(){
    session_unset(); //poistaa kaikki muuttujat
    session_destroy();
    setcookie(session_name(),'',0,'/'); //poistaa evästeen selaimesta
    session_regenerate_id(true);
    header("Location: /login"); // forward eli uudelleenohjaus
    die();
}

function viewUserController(){
    require "views/user.view.php";
}