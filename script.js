$(document).ready(function () {
    $("#formularz").validate();

    const random_word = $("#word").text();
    console.log(random_word);
    let volume;
    console.log("skibidi")
    $.getJSON("settings.json", function (settings) {
        const autofocus = settings.autofocus;
        const soundOn = settings.playSound;
        volume = settings.volume;
        if(autofocus){
            document.getElementById("userInput").focus();
        }
        if (!soundOn) {
            document.getElementById("soundButton").disabled = true;
        }
        $("#soundButton").click(function () {
            let url = `./audio/${random_word}.ogg`;
            console.log(url);
            const audio = new Audio(url);
            audio.volume = volume;
            audio.play();
        });
    });

    //keyboard actions
    window.addEventListener('keydown', checkKeyPressed, false);
    function checkKeyPressed(evt) {
        if (evt.keyCode == "188" && document.activeElement != document.getElementById("userInput")) { // ","
            let url = `./audio/${random_word}.ogg`;
            console.log(url);
            const audio = new Audio(url);
            audio.volume = volume;
            audio.play();
        }
        if(evt.keyCode == "190"){ // "."
            setTimeout(() => {
                document.getElementById("userInput").focus();
            }, 50);
        }
    }

});