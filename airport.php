<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header class="naglowek1">
        <h2>Odloty z lotniska</h2>
    </header>
    <header class="naglowek2">
        <img height="150" src="zad6.png" alt="logotyp">
    </header>
    <main>
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <!-- SKYRPT 1 -->
            <?php 
                $link = new mysqli('localhost', 'root', '', 'DATABASE_NAME');
                $zapytanie = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC";
                $wynik = $link->query($zapytanie);
                while($row = $wynik->fetch_row()){
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
    <footer class="stopka1">
        <a href="kw1.jpg">Pobierz obraz</a>
    </footer>
    <footer class="stopka2">
        <!-- SKYRPT 2 -->
        <?php 
            if(!isset($_COOKIE['wejscie'])){
                setcookie('wejscie', 'wejscie', time() + (60*60*1));
                echo "<p><i>Dzień dobry! Spradź regulamin naszej strony</i></p>";
            } else {
                echo "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
            }
            $link->close();
        ?>
    </footer>
    <footer class="stopka3">
        Autor: PESEL
    </footer>
</body>
</html>