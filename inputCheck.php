<?php
session_start();
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inputCheck.css">
    </head>
    <body>
    <?php
    $url = "http://" . $_SERVER['SERVER_NAME'] . "/TypingGame";
    header("Refresh: 1; URL=$url");
    $word = $_POST["random-word"];
    $user_input = $_POST["user-input"];
    $user_input = strtolower(trim($user_input));
    if($user_input == $word){
        $_SESSION['answer'] = "dobrze";
        echo '<p id=word class="dobrze">DOBRZE</p>';
    }
    else {
        $_SESSION['answer'] = "zle";
        $_SESSION['word'] = $word;
        echo '<p id=word class="zle">ŹLE</p>';
    }
    echo "<br>";

?>
        <form action="index.php" method="post">
            <button type="submit" id="restart" autofocus>JESZCZE RAZ</button>
        </form>
    </body>
</html>