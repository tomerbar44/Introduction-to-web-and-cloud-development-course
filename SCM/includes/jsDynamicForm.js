$(document).ready(function() {
    var arr = [];
    var goodName;
    var arr = window.location.href.split("?");
    console.log(arr);
    var name = arr[1],
        minutes = arr[2],
        time = arr[3],
        level = arr[4],
        date = arr[5];
    var firstName = name.split("%")[0];
    // For trainings that have two words
    if (name.split("%20")[1] != null) {
        var secondName = name.split("%20")[1];
        goodName = firstName + ' ' + secondName;
    } else {
        goodName = firstName;
    }
    // Insers training that user choose(come from JSON for i late! option) to static form 
    $("#staticTraining").val(goodName);
    $("#staticDate").val(date);
    $("#staticTime").val(time);
    $("#staticMinutes").val(minutes);
    $("#staticLevel").val(level);

});