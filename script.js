$(document).ready(function(){
    $("#formularz").validate();

    function submit(){
        const randomWord = $("#random-word").value();
        const userInput = $("#user-input").value();
        // userInput.toLowerCase().trim();
        $("#test").text(userInput);
        if(randomWord === userInput);
    }

 });