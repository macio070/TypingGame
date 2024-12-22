<?php
    session_start();
    if(isset($_SESSION['answer'])){
        $answer = $_SESSION['answer'];
    }
?>
<!DOCTYPE html>
<html lang="pl" notranslate>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="./jQuery/jquery.validate.js"></script>
    <script src="./jQuery/messages_pl.js"></script>
    <script src="./script.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Typing Game</title>
</head>

<body>
    <?php
    
    // Filepath to settings.json
    $settingsFile = 'settings.json';

    // Read and decode the JSON file
    if (!file_exists($settingsFile)) {
        die("Nie znaleziono ustawień!");
    }
        $settings = json_decode(file_get_contents($settingsFile), true);


    $filePath = $settings["filePath"];
    function getWordsFromFile($filePath)
    {
        if (!file_exists($filePath)) {
            return "ERROR: Nie mozna odczytac pliku ze slowami";
        }

        $content = file_get_contents($filePath);

        $words = explode(";", $content);
        foreach ($words as $word) {
            strtolower(trim($word));
        }
        return $words;
    }

    $words = getWordsFromFile($filePath);

    function getRandomWord($words)
    {
        $rand = rand(0, count($words) - 1);
        global $settings;
        if($settings["visibleNumber"] === true){
            echo "Word no. $rand <br>";
        }
        $word = $words[$rand];
        return $word;
    }

    if(!isset($_SESSION['answer']) || $_SESSION['answer'] == 'dobrze'){
        $word = getRandomWord($words);
    }
    else if ($_SESSION['answer'] == 'zle'){
        $word = $_SESSION['word'];
    }
    echo "<p id='word'>$word</p>";
    ?>
    <button id="soundButton">ODTWÓRZ</button>
    <form autocomplete="off" id="formularz" method="post" action="inputCheck.php">
        <input type="hidden" name="random-word" id="random-word" value="<?php echo $word ?>">

        <input type="text" name="user-input" id="userInput" class="required" value="" autofocus><br>
        <button type="submit" id="input-check">Sprawdź</button>
    </form>
    <p id="test"></p>
    <?php
    //  if(isset($_POST["user-input"])){
    //     $user_input = $_POST['user-input']; // Capture the input
    //     $user_input = strtolower(trim($user_input));
    //     echo $user_input;
    //  }
    ?>
</body>

</html>