<?php require "partials/head.php"; 
?>
<div class = "recipes">

<div class='recipe'>
        <h3>Nimi: <?=$recipe["name"] ?></h3>
        <p>Päivämäärä: <?=$recipe["dateAdded"]?></p>
        <p>Kategoria: <?=$recipe["category"]?></p>
        <p>Ainesosat: <?=$recipe["ingredients"]?></p>
        <p>Ohje: <?=$recipe["instructions"]?></p>

        <?php
        $id = $recipe['recipeID'];
        if(isLoggedIn()):
            $recipeid = 'deleteRecipe' . $id; ?>
            <a id=<?=$recipeid ?> onClick='confirmDelete(<?=$id?>)' href='/delete_recipe?id=<?=$id?>'>Poista</a> | 
            <a href='/update_recipe?id=<?=$id?>'>Muokkaa</a>
        <?php endif;
        ?>
        </div>

</div>

<?php require "partials/footer.php"; ?>