<?php
    $word = $_POST["random-word"];
    $user_input = $_POST["user-input"];

    $user_input = strtolower(trim($user_input));

    if($user_input == $word){
        echo "DOBRZE";
    }
    else echo "ZLE";

?>

<html>
    <head></head>
    <body>
        <form action="index.php" method="post">
            <button type="submit" autofocus>JESZCZE RAZ</button>
        </form>
    </body>
</html>