<html>
    <head>
        <style>
        .d1
        {
            background: grey;
            height: 800px;
            border: 5px solid black;
            border-radius: 50px;
            font-size: 20px;
            text-align: center;
        }
        input
        {
            background: lightgrey;
        }
        button
        {
            background: lightgrey;
        }
        .srodek
        {
            margin: 15px 15px 15px 15px;
            text-align: left;
        }
        .blok
        {
            background: lightgrey;
            border: 5px solid black;
            border-radius: 20px;
            margin: 10px 0 0 0;
        }
        </style>
    </head>
    <body>
        <center><div class="d1">
    <?php
        session_start();
        echo 'Zalogowany jako: '.$_SESSION["login"].'';

        echo '<a href="index.php"><button>Wyloguj</button></a>';
        echo '<a href="dodawanie.php"><button>Wystaw</button></a>';

        $con = new mysqli("127.0.0.1","root","","skelp-zsp");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM offerts");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM users");
        $cos1 = $res1->fetch_all();

        echo '<div class="srodek">';

        $id=0;
        $nastepny = $con->query("SELECT * FROM offerts WHERE id>$id order by id ASC");
        $nast = $nastepny->fetch_all();

        for($i=0; $i<count($nast);$i++)
        {
            echo '<div class="blok">item: '.$cos[$i][1].', Sprzedający: '.$cos1[$cos[$i][3]][1].'<br>opis: '.$cos[$i][2].' </div>';
        }


        echo '<br><input type="submit" name="strona" value="Poprzednie"> <input type="submit" name="strona" value="Nastepne">';
        echo '</div></form>';
        print_r($_POST);
    ?>
        </div></center>
    </body>
</html>