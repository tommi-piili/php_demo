<?php

function cleanDump($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function cleanUpInput($userinput){
    $input = trim($userinput);
    $cleaninput = filter_var($input,FILTER_SANITIZE_STRING);
    return $cleaninput;
}

// Sähköpostin sanitointi
function cleanUpInputEmail($userinput){
    $input = trim($userinput);
    $cleaninput = filter_var($input,FILTER_SANITIZE_EMAIL);
    return $cleaninput;
}

function cleanUpOutput($useroutput){
    $output = trim($useroutput);
    $cleanoutput = htmlspecialchars($output);
    return $cleanoutput;
}


