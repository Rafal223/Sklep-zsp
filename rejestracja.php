<html>
    <head>
    <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <?php
        $con = new mysqli("127.0.0.1","root","","skelp-zsp");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM users");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Rejestracja:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br>';
        if($_POST!=NULL)
        {
            if($_POST['login']!="" && $_POST['password']!="")
            {
                $sqlquery = "INSERT INTO `users` VALUES ('".count($cos)."', '".$_POST['login']."', '".$_POST['password']."', '0', '');";
                $con->query($sqlquery);
                header('location: index.php');
            }
        }
        echo '<a href="index.php">Logowanie</a><input type="submit"></center></div>';
        echo '</form>';
    ?>

    </body>
</html>