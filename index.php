<html>
    <head>
    <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <?php
        session_start();
        $con = new mysqli("127.0.0.1","root","","skelp-zsp");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM users");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Logowanie:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br><input type="submit">';
        if($_POST!=NULL)
        {
            for($i=0;$i<count($cos);$i++)
            {
                if($_POST['login']==$cos[$i][1] && $_POST['password']==$cos[$i][2])
                {
                    $_SESSION["login"] = $_POST['login'];
                    $_SESSION["id"] = $i;
                    echo 'udalo sie zalogowac';
                    header("Location: strona.php?page=1");
                }
            }
        }
        echo '<a href="rejestracja.php">Rejestracja</a></center></div>';
        echo '</form>';
    ?>

    </body>
</html>