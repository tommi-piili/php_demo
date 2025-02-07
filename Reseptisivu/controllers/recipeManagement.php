<?php
require_once "database/models/recipe.php";
require_once 'libraries/cleaners.php';

function viewRecipesController(){
    $allrecipes = null;
    if (isset($_POST['section'])) {
        $section = cleanUpInput($_POST['section']);
        $allrecipes = getSectionRecipes($section);
    }
    else {
        $allrecipes = getAllRecipes();
        
    }
    require "views/recipes.view.php";    
}

function viewRecipeByIdController(){

    $recipe = null;
    if (isset($_GET['id'])) {
        $recipeID = cleanUpInput($_GET["id"]);
        $recipe = getRecipeById($recipeID);
    }
    else {
        echo "Virhe reseptiä haettaessa.";
        
    }
    require "views/recipe.view.php";    
}

function addRecipeController(){
        if(isset($_POST['recipetitle'], $_POST['category'], $_POST['ingredients'], $_POST['instructions'])){
        $recipetitle = cleanUpInput($_POST['recipetitle']);
        $category = cleanUpInput($_POST['category']);
        $ingredients = cleanUpInput($_POST['ingredients']);
        $instructions = cleanUpInput($_POST['instructions']);
        $date = date("y-m-d"); 
        addRecipe($recipetitle, $category, $ingredients, $instructions, $date); 
        header("Location: /");    
    } else {
        require "views/newRecipe.view.php";
    }
}

function editRecipeController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $recipe = getRecipeById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe reseptiä haettaessa: " . $e->getMessage();
    }
    
    if($recipe){
        $id = $recipe['recipeID'];
        $date = $recipe['dateAdded'];
        $category = $recipe['category'];
        $name = $recipe['name'];
        $ingredients = $recipe['ingredients'];
        $instructions = $recipe['instructions'];
    
        require "views/updateRecipe.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updateRecipeController(){
        if(isset($_POST['recipeID'], $_POST['recipetitle'], $_POST['category'], $_POST['ingredients'], $_POST['instructions'])){

        $id = cleanUpInput($_POST['recipeID']);
        $name = cleanUpInput($_POST['recipetitle']);
        $date = date("y-m-d");
        $category = cleanUpInput($_POST['category']);
        $ingredients = cleanUpInput($_POST['ingredients']);
        $instructions = cleanUpInput($_POST['instructions']); 

        try{
            updateRecipe($id, $name, $date, $category, $ingredients, $instructions);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe reseptiä päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deleteRecipeController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteRecipe($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe reseptiä poistettaessa: " . $e->getMessage();
    }

    $allrecipes = getAllRecipes();

    header("Location: /");
    exit;
}

function viewCategoriesController(){
    require "views/categories.view.php";
}

function viewContactController(){
    require "views/contacts.view.php";
}





