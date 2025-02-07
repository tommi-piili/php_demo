<!DOCTYPE html>
<html lang="fi">
<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<script>
    function confirmDelete(id) {
        const answer = confirm("Poistetaanko resepti?");
        if(!answer){
            document.getElementById('deleteRecipe' + id).href = '/';
        }
        return answer;
    }
    function pdfAlert() {
        const answer = confirm("PDF-tiedoston luonti onnistui!");
        if(!answer){
            document.href = '/';
        }
        return answer;
    }
</script>
    <header>
        <h1>Reseptit</h1>
    </header>
<nav>
    <ul class="navbar">
        <li class="navbutton"><a href="/">Kaikki reseptit</a></li>
        <li class="navbutton"><a href="/categories">Kategoriat</a></li>
        <?php if(!isLoggedIn()): ?>
           <li class="navbutton"><a href="/login">Login</a></li> 
           <li class="navbutton"><a href="/register">Rekisteröidy</a></li>
        <?php else: ?>
            <li class="navbutton"><a href="/user">Omat tiedot</a></li>
           <li class="navbutton"><a href="/add_recipe">Lisää resepti</a></li>
           <li class="navbutton"><a href="/logout">Kirjaudu ulos</a></li>
        <?php endif ?>

    </ul>
</nav>