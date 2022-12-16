<html>
    <head>
    <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <center>
    <?php
    session_start();
    $con = new mysqli("127.0.0.1","root","","skelp-zsp");
    echo '<form method="POST">';
    $res = $con->query("SELECT * FROM users");
    $cos = $res->fetch_all();

    $res1 = $con->query("SELECT * FROM offerts");
    $cos1 = $res1->fetch_all();

    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["login"].'<h1>'.$cos1[$_GET["id"]][1].': </h1><br>Wlasciciel: '.$cos[$cos1[$_GET["id"]][3]][1].' <br>Opis: '.$cos1[$_GET["id"]][2].'<br>';

    echo '<a href="strona.php?page=1">Wróć</a><input type="submit" name="Dodaj" value="Dodaj do koszyka"></center>';
    if($_POST!=null)
    {
        $sqlquery = "INSERT INTO `orders` VALUES ('".$_SESSION["id"]."', '0', '".$_GET["id"]."','".$cos1[$_GET["id"]][3]."');";
        //INSERT INTO `orders` (`users_id`, `users_orders_id`, `offerts_id`, `offerts_users_id`) VALUES ('0', '0', '2', '1');
        $con->query($sqlquery);
        echo 'Dodano do koszyka';
    }
    echo '</form></div>';
    ?>
        </center>
    </body>
</html>