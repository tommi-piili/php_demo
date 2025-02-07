<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää resepti</h2>
<div class="inputarea">
<form  action="/update_recipe" method="post">
    <label for="recipetitle">Reseptin nimi:</label>
    <input id="recipetitle" type="text" name="recipetitle" maxlength=50 value="<?=$name?>">

    <label for="category">Reseptin tyyppi:</label>
    <select id="category" name="category">
        <option value="alkuruoka">Alkuruoka</option>    
        <option value="pääruoka">Pääruoka</option>
        <option value="jälkiruoka">Jälkiruoka</option>
    </select><br>

    <label for="ingredients">Ainesosat:</label>
    <textarea id="ingredients" name="ingredients" rows="5" cols="30" value="<?=$ingredients?>"></textarea>

    <label for="instructions">Ohje:</label>
    <textarea id="instructions" name="instructions" rows="5" cols="30" value="<?=$instructions?>"></textarea>

    <input type="hidden" id="recipeID" name="recipeID" value=<?=$id?>>

    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>