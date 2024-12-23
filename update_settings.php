<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filePath = 'settings.json';

    // Read the existing settings
    $settings = json_decode(file_get_contents($filePath), true);

    if (!$settings) {
        die('Could not read settings file.');
    }
    $volume = $_POST["volume"]/100;
    // Update settings with form data
    $settings['autofocus'] = isset($_POST['autofocus']) ? true : false;
    $settings['visibleWord'] = isset($_POST['visibleWord']) ? true : false;
    $settings['visibleNumber'] = isset($_POST['visibleNumber']) ? true : false;
    $settings['playSound'] = isset($_POST['playSound']) ? true : false;
    $settings['volume'] = isset($_POST['volume']) ? $volume : $settings['volume'];

    // Save the updated settings back to the JSON file
    $result = file_put_contents($filePath, json_encode($settings, JSON_PRETTY_PRINT));

    if ($result === false) {
        die('Error saving settings.');
    }

    // Redirect back to the main page or start the game
    header("Location: /TypingGame/game", true, 303);
    exit();
}
?>