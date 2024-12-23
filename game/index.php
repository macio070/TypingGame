<?php
    session_start();
    if(isset($_SESSION['answer'])){
        $answer = $_SESSION['answer'];
    }
//     $db = new SQLite3('sessions.db');
// // Generate a session ID
// if (!isset($_COOKIE['session_id'])) {
//     //setcookie('session_id', uniqid('session_', false));
//     $sessionID = $_SESSION['session_id'];
//     $start_time = date('Y-m-d H:i:s');
//     $db->exec("INSERT INTO session (uniqid, creation_date) VALUES ('$sessionID', '$start_time')");
// }
// echo $_SESSION['session_id'];
?>
<!DOCTYPE html>
<html lang="pl" notranslate>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="../script/jQuery/jquery.validate.js"></script>
    <script src="../script/jQuery/messages_pl.js"></script>
    <script src="../script/script.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Typing Game</title>
</head>

<body>
    <div class="keyboardControls">
        <p>Naciśnij <code>,</code> aby odsłuchać</p>
        <p>Naciśnij <code>.</code> aby wybrać pole tekstowe</p>
    </div>
    
        
<main>
    <?php
    
    // Filepath to settings.json
    $settingsFile = '../settings.json';

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
    //echo $words;

    function getRandomWord($words)
    {
        $rand = rand(0, count($words) - 1);
        global $settings;
        $word = $words[$rand];
        $rand++;
        if($settings["visibleNumber"] === true){
            echo "Word no. $rand <br>";
        }
        return $word;
    }

    if(!isset($_SESSION['answer']) || $_SESSION['answer'] == 'dobrze'){
        $word = getRandomWord($words);
    }
    else if ($_SESSION['answer'] == 'zle'){
        $word = $_SESSION['word'];
    }
    
    if(!$settings['visibleWord']){
        echo "<p id='word' hidden>$word</p>";
    }
    else{
        echo "<p id='word'>$word</p>";
    }
    ?>
    <button id="soundButton">ODTWÓRZ</button>
    <form autocomplete="off" id="formularz" method="post" action="inputCheck.php">
        <input type="hidden" name="random-word" id="random-word" value="<?php echo $word ?>">

        <input type="text" name="user-input" id="userInput" class="required" value="">
        <button type="submit" id="input-check">Sprawdź</button>
    </form>
    </main>
    <form action="../menu.php" method="post" class="settings">
    <button type="submit">ustawienia</button>
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