<html>
    <head>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <center><div class="d1">
    <?php
        session_start();
        echo 'Zalogowany jako: '.$_SESSION["login"].'<h3>Twój koszyk</h3>';

        echo '<a href="index.php">Wyloguj</a>';
        echo '<a href="strona.php?page=1">Strona Główna</a>';
        echo '<a href="twoje.php?page=1">Twoje oferty</a>';
        echo '<a href="dodawanie.php">Wystaw</a>';

        $con = new mysqli("127.0.0.1","root","","skelp-zsp");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM offerts");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM users");
        $cos1 = $res1->fetch_all();

        $ord = $con->query("SELECT * FROM orders");
        $orders = $ord->fetch_all();

        echo '<div class="srodek">';

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM offerts LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos22);$i++)
        {
            for($y = 0; $y<count($orders);$y++)
            {
                if($cos22[$i][3]==$orders[$y][3] && $cos22[$i][0]==$orders[$y][2] && $_SESSION["id"]==$orders[$y][0])
                {
                    echo '<div class="blok">item: '.$cos22[$i][1].', Sprzedający: '.$cos1[$cos22[$i][3]][1].'<br>opis: '.$cos22[$i][2].'<input type="submit" value="'.$i.'" name="usun"><a href="szczegol.php?id='.$i.'">Szczegóły</a> </div>';
                }
            }
        }

        if($_POST!=null)
        {
            print_r($_POST);
            $sqlquery = "DELETE FROM orders WHERE `orders`.`users_id` = ".$_SESSION["id"]." AND `orders`.`users_orders_id` = 0 AND `orders`.`offerts_id` = ".$_POST["usun"]." AND `orders`.`offerts_users_id` = ".$cos22[$_POST["usun"]][3]."";
            $con->query($sqlquery);
            header('location: koszyk.php?page=1');
        }
        echo '<br>';
        $ile = (count($cos22)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a class="dwa" href="koszyk.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';
    ?>
        </div></center>
    </body>
</html>