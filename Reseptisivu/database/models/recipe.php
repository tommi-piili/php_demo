<?php
require_once "database/connection.php";


function getAllRecipes(){
    $pdo =connectDB();
    $sql = "SELECT * FROM recipe";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addRecipe($recipetitle, $category, $ingredients, $instructions, $date){
    $pdo =connectDB();
    $data = [$recipetitle, $category, $ingredients, $instructions, $date];
    $sql = "INSERT INTO recipe (name, category, ingredients, instructions, dateAdded) VALUES(?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getRecipeById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM recipe WHERE recipeID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deleteRecipe($id){
    $pdo = connectDB();
    $sql = "DELETE FROM recipe WHERE recipeID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updateRecipe($id, $name, $date, $category, $ingredients, $instructions){
    $pdo = connectDB();
    $data = [$name, $date, $category, $ingredients, $instructions, $id];
    $sql = "UPDATE recipe SET name = ?, dateAdded = ?, category = ?, ingredients = ?, instructions = ? WHERE recipeID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function getSectionRecipes($section){
    $pdo =connectDB();
    $sql = "SELECT * FROM recipe WHERE category = ?";
    $stm=$pdo->prepare($sql);
    $stm->execute(array($section));
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
} 