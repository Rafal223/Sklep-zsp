<html>
    <head>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <center><div class="d1">
    <?php
        session_start();
        echo 'Zalogowany jako: '.$_SESSION["login"].'<h3>Agatka.pl</h3>';

        echo '<a href="index.php">Wyloguj</a>';
        echo '<a href="twoje.php?page=1">Twoje oferty</a>';
        echo '<a href="koszyk.php?page=1">Koszyk</a>';
        echo '<a href="dodawanie.php">Wystaw</a>';

        $con = new mysqli("127.0.0.1","root","","skelp-zsp");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM offerts");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM users");
        $cos1 = $res1->fetch_all();

        echo '<div class="srodek">';

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM offerts LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos22);$i++)
        {
            echo '<div class="blok">item: '.$cos22[$i][1].', Sprzedający: '.$cos1[$cos22[$i][3]][1].'<br>opis: '.$cos22[$i][2].'<a href="szczegol.php?id='.$i.'">Szczegóły</a> </div>';
        }
        echo '<br>';
        $ile = (count($cos)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a class="dwa" href="strona.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';
    ?>
        </div></center>
    </body>
</html>