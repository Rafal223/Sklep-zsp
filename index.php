<html>
    <head>
        <style>
        .d1
        {
            background: grey;
            height: 500px;
            width: 500px;
            border: 50%;
            outline: 5px black solid;
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
    <?php
        $con = new mysqli("127.0.0.1","root","","sklep-zsp");
        

        echo '<div class="d1"><h1>Rejestracja:</h1><br> Nazwa Użytkownika: <input><br> Haslo: <input><br><input type="submit">';
        echo '<button action="/logowanie.php">Logowanie</button></div>'
    ?>

    </body>
</html>