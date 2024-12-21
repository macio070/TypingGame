<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Game</title>
</head>

<body>
    <?php
    $filePath = '100_words.txt';

    function getWordsFromFile($filePath) {
        if (!file_exists($filePath)) {
            return "ERROR: Nie mozna odczytac pliku ze slowami";
        }
    
        $content = file_get_contents($filePath);
    
        $words = explode(";", $content);
        foreach($words as $word){
            strtolower(trim($word));
        }
        return $words;
    }
    
    $words = getWordsFromFile($filePath);

    function getRandomWord($words){
        $rand = rand(0,count($words)-1);
        echo "random number: $rand <br>";
        $word = $words[$rand];
        return $word;
        
    }   
    
    $word = getRandomWord($words);
    echo $word;

    ?>
</body>

</html>