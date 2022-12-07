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

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM offerts LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos22);$i++)
        {
            echo '<div class="blok">item: '.$cos[$i][1].', Sprzedający: '.$cos1[$cos[$i][3]][1].'<br>opis: '.$cos[$i][2].' </div>';
        }

        $ile = (count($cos)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a href="strona.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';
    ?>
        </div></center>
    </body>
</html>