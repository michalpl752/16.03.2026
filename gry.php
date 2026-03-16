
<?php
$conn = mysqli_connect("localhost", "root", "", "gry");


if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}
?>


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
                $sql1 = "SELECT gry.nazwa, gry.punkty FROM gry ORDER BY gry.punkty DESC LIMIT 5; ";
                $query = mysqli_query($conn, $sql1);
                while ($row = mysqli_fetch_array($query)) {
                    echo "<ul>";
                    echo "<li>" . $row["nazwa"] . " <p> " . $row["punkty"] ."</p>".  "</li>";
                    echo "</ul>";
                }
            ?>
            <h3>Nasz sklep</h3> 
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Strone wykonał</h3>  
            <p>000000000000</p>
    </section>
    <div id="mid">
        <?php
        $sql2 = "SELECT gry.id , gry.nazwa, gry.zdjecie FROM gry;";
        $query = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_array($query)) {
            echo "<img src='" . $row["zdjecie"] . " ' alt='" . $row["nazwa"] . " '" . "title='" . $row["id"] . " '";    
        }
        ?>
    </div>  
    <section id="right">
        <h3>Dodaj nową grę</h3> 
                    <form method="POST" action="#">
                        <label for="nazwa">nazwa</label>
                        <input type="text" name="nazwa" required>
                        <label for="opis">opis</label>
                        <input type="text" name="opis" required>
                        <label for="cena">cena</label>
                        <input type="number" name="cena" required>
                        <label for="zdjecie">zdjecie</label>
                        <input type="text" name="zdjecie" required>
                        <input type="submit">
                </form>
                <?php
// ‒ Jeżeli wypełniono pole nazwa, skrypt wysyła do bazy zmodyfikowane zapytanie 4 w ten sposób,
// że wstawione są wartości pobrane z formularza, a liczba punktów wynosi 0
// ‒ Na końcu jest zamykane połączenie z serwerem.
if(isset($_POST["nazwa"])) {
    $nazwa =  $_POST["nazwa"];
    $opis = $_POST["opis"];
    $cena = $_POST["cena"];
    $zdjecie = $_POST["zdjecie"];
     $sql4 = "INSERT INTO `gry`( `nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('$nazwa','$opis',0,$cena,'$zdjecie');";
        $query = mysqli_query($conn, $sql4);

}
?>
    </section>
</main>
<footer>
        <form method="POST" action="#">
        <input type="number" name="num_id">
        <input type="submit" value="Pokaż opis">
</form>
        <?php
// − Jeżeli wpisano id do pola edycyjnego, skrypt wysyła do bazy danych zapytanie 2 zmodyfikowane
// tak, że wybierany jest wiersz o id podanym w polu edycyjnym
// − Zwrócony zapytaniem wiersz jest wyświetlany pod formularzem według wzoru:
// ‒ W nagłówku drugiego stopnia: „<nazwa>, <punkty> punktów, <cena> zł”, gdzie nawiasy
// <> oznaczają wartość pobraną z bazy danych
// ‒ Opis w paragrafie 
if(isset($_POST["num_id"])) {
    $id = $_POST["num_id"];
     $sql3 = "SELECT gry.nazwa, gry.punkty, gry.cena, gry.opis FROM gry WHERE gry.id = $id; ";
        $query = mysqli_query($conn, $sql3);
        while ($row = mysqli_fetch_array($query)) {
            echo "<h2> " . $row["nazwa"] . " ". $row["punkty"] . " ". $row["cena"] . " zł".  "</h2>";
            echo "<p>" . $row["opis"] . "</p>";
        }
}
    ?>
</footer>
</body>
</html>
<?php
mysqli_close($conn);
?>