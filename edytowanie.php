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
    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["login"].'<h1>Edytuj:</h1><br> Nazwa Itemu: <input name="name" value="'.$cos1[$_GET["id"]][1].'"><br> Opis: <input name="description" value="'.$cos1[$_GET["id"]][2].'"><br><input type="submit">';
    if($_POST!=NULL)
    {
        print_r($_POST);
        if($_POST["name"]!="" && $_POST["description"]!="")
        {
            $sqlquery = "UPDATE `offerts` SET `id` = '".$_GET["id"]."', `name` = '".$_POST["name"]."', `description` = '".$_POST["description"]."', `users_id` = '".$_SESSION["id"]."' WHERE `offerts`.`id` = '".$_GET["id"]."' AND `offerts`.`users_id` = '".$_SESSION["id"]."';";
            $con->query($sqlquery);
            header('location: strona.php?page=1');
        }
    }
    echo '</form>';

    echo '<a href="strona.php?page=1">Wróć</a></center></div>';
    ?>
        </div></center>
    </body>
</html>