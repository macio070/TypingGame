$(document).ready(function(){
    $.getJSON("./settings.json", function (settings){
        const autofocus = settings.autofocus;           //bool
        const visibleWord = settings.visibleWord;       //bool
        const visibleNumber = settings.visibleNumber;   //bool
        const playSound = settings.playSound;           //bool
        console.log("success");
        if(autofocus){
            document.getElementById("autofocus").checked = true;
        }
        if(visibleWord){
            console.log("nigger");
            document.getElementById("visibleWord").checked = true;
        }
        if(visibleNumber){
            document.getElementById("visibleNumber").checked = true;
        }
        if(playSound){
            document.getElementById("playSound").checked = true;
        }
    })
    $('input[type=range]').on('input', function () {
        $("#volume-percentage").text($(this).val() + "%");
    });
});