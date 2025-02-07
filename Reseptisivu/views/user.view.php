<?php require "partials/head.php"; ?>

<h2 class="centered">Omat tiedot</h2>

<div class = "recipes">

    <div class='recipe'>
        <h3>Nimi:</h3>
        <p><?php echo $_SESSION["username"];?></p><br>
        <h3>Sähköposti:</h3>
        <p><?php echo $_SESSION["email"];?></p><br>
        <h3>Syntymävuosi:</h3>
        <p><?php echo $_SESSION["birthyear"];?></p><br>
    </div>
</div>

<?php require "partials/footer.php"; ?>