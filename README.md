# CONCEPT

one random word is displayed, then user has to write that word.

# UI
- a generated word
- an input type text for typing
- a submit button 
- a reroll button

# MECHANICS
### generating words to display
- a JSON file with all words
- if it's images then image with the name as a filename
- a txt file with all words seperated by ";" or sth else


# TODO

- ~~add CSS~~
- add a settings page for easier settings.json manipulation
- add game mode settings
- add a picture game mode -> ~~words~~ images

### possible upgrades???
- add a reroll button
- add a session:
    + time elapsed
    + answers given
    + total answers
    + propably best to store in a DB
- change destination folder to /game/
- add a index.php in root folder for settings and game(session) start
- add a form submit in root folder with get parameter to switch between game modes
    + example: https://localhost/TypingGame/game/index.php?game_mode=image
    + example: https://localhost/TypingGame/game/index.php?game_mode=audio