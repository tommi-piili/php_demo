<?php require "partials/head.php"; ?>

<h2 class="centered">Reseptit</h2>

<div class = "recipes">

<form method="post">
<label for="section">Valitse kategoria:</label>
    <select id="section" name="section">
        <option value="alkuruoka">Alkuruoka</option>
        <option value="pääruoka">Pääruoka</option>
        <option value="jälkiruoka">Jälkiruoka</option>
    </select>
    <input id="submitbutton" type="submit" value="Valitse">
</form>

<?php
    foreach($allrecipes as $recipe): ?>
        <div class='recipe'>
        <h3>Nimi: <?=$recipe["name"] ?></h3>
        <p>Päivämäärä: <?=$recipe["dateAdded"]?></p>
        <p>Kategoria: <?=$recipe["category"]?></p>
        <p>Ainesosat: <?=$recipe["ingredients"]?></p>
        <p>Ohje: <?=$recipe["instructions"]?></p>
        <?php

        $id = $recipe['recipeID'];?>
        <a href='/view_recipe?id=<?=$id?>'>Katso lisää</a>

        <?php

        ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>