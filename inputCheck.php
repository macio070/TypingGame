<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    </head>
    <body>
    <?php
    $url = "http://" . $_SERVER['SERVER_NAME'] . "/TypingGame";
    header("Refresh: 1; URL=$url");
    $word = $_POST["random-word"];
    $user_input = $_POST["user-input"];
    $user_input = strtolower(trim($user_input));
    if($user_input == $word){
        echo "DOBRZE";
    }
    else echo "ZLE";

?>
        <form action="index.php" method="post">
            <button type="submit" autofocus>JESZCZE RAZ</button>
        </form>
    </body>
</html>