<html>
    <head>
        <style>
        .d1
        {
            background: grey;
            height: 800px;
            width: 500px;
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
        </style>
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
    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["login"].'<h1>Wystaw:</h1><br> Nazwa Itemu: <input name="name" value=""><br> Opis: <input name="description" value=""><br><input type="submit">';
    if($_POST!=NULL)
    {
        if($_POST["name"]!="" && $_POST["description"!=""])
        $sqlquery = "INSERT INTO `offerts` VALUES ('".count($cos1)."', '".$_POST['name']."', '".$_POST['description']."','".$_SESSION["id"]."');";
        $con->query($sqlquery);
        header('location: strona.php?page=1');
    }
    echo '</form>';

    echo '<a href="strona.php?page=1"><button>Wróć</button></a></center></div>';
    ?>
        </div></center>
    </body>
</html>