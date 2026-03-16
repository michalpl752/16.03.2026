 <!-- 
‒ Zawartość sekcji lewej:
‒ Nagłówek trzeciego stopnia o treści: „Top 5 gier w tym miesiącu”
‒ Lista punktowana (nieuporządkowana) wypełniona przez skrypt 1
‒ Zawartość sekcji środkowej: Efekt działania skryptu 2
‒ Zawartość stopki:
‒ Formularz wysyłający dane do tego samego pliku metodą bezpieczną
‒ Formularz zawiera pole edycyjne i przycisk o treści „Pokaż opis”
‒ Efekt działania skryptu 3
-->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <nav>
        <h1>Ranking gier komputerowych</h1>
</nav>
</header>
<main>
<section id="left">
    <h3> Top 5 gier w tym miesiącu </h3>
    <?php
    //skrypt 1 
    ?>
    <h3>Nasz sklep</h3> 
    <a href="http://sklep.gry.pl">Tu kupisz gry</a>
    <h3>Strone wykonał</h3>  
    <p>000000000000</p>
</section>
<section id="mid">
    <?php
    //skrypt 2 
    ?>
</section>
<section id="right">
    <h3>Dodaj nową grę</h3> 
    <form method="POST" action="#">
        <label for="nazwa">nazwa</label>
        <input type="text" name="nazwa">
        <label for="opis">opis</label>
        <input type="text" name="opis">
        <label for="cena">cena</label>
        <input type="number" name="cena">
        <label for="zdjecie">zdjecie</label>
        <input type="text" name="zdjecie">
        <input type="submit">
</form>
</section>
</main>
<footer>
        <form method="POST" action="#">
        <input type="text">
        <input type="button" value="Pokaż opis">
</form>
</footer>
</body>
</html>