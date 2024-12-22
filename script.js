$(document).ready(function () {
    $("#formularz").validate({
        messages: {
            required: " "
        }
    });

    const random_word = $("#word").text();
    console.log(random_word);
    let volume;
    let soundOn;
    $.getJSON("settings.json", function (settings) {
        visibleWord = settings.visibleWord;
        volume = settings.volume;
        soundOn = settings.playSound;
        if (!visibleWord) {
            $("#word").hide();
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


    window.addEventListener('keydown', checkKeyPressed, false);
    function checkKeyPressed(evt) {
        if (evt.keyCode == "191") {
            let url = `./audio/${random_word}.ogg`;
            console.log(url);
            const audio = new Audio(url);
            audio.volume = volume;
            audio.play();
        }
        if(evt.keyCode == "190"){
            setTimeout(() => {
                document.getElementById("userInput").focus();
            }, 50);
        }
    }

});