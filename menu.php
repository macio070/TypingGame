<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="script/menu.js"></script>
</head>
<body>
    <?php
     $filePath = 'settings.json';

     // Read the existing settings
     $settings = json_decode(file_get_contents($filePath), true);
     $volume = $settings['volume'];
     $volume*=100;
    ?>
    <form action="update_settings.php" method="post">
        <div>
        <input type="checkbox" name="autofocus" id="autofocus">
        <label for="autofocus">Auto Focus text filed</label>
        </div>
        
        <div>
        <input type="checkbox" name="visibleWord" id="visibleWord">
        <label for="visibleWord">Show word</label>
        </div>

        <div>
        <input type="checkbox" name="visibleNumber" id="visibleNumber">
        <label for="visibleNumber">Show word index</label>
        </div>

        <div>
        <input type="checkbox" name="playSound" id="playSound">
        <label for="playSound">Enable sound</label>
        </div>

        <div>
            <input type="range" name="volume" id="volume" min="0" max="100" value="<?php echo $volume?>">
            <label for="volume">volume: <span id="volume-percentage"><?php echo $volume?>%</span></label>
        </div>

        <button type="submit">START</button>
    </form>
</body>
</html>