$(document).ready(function() {
    var json_data = []
    var flag = 0;
    $.getJSON("data/trainingDATA.json", function(data) {
        console.log(data)
        json_data = data
        for (var row of data) {
            if (parseInt($('#getDate').html()) == parseInt(row.date) && parseInt($('#getTime').html()) == parseInt(row.time) && parseInt($('#getLevel').html()) == parseInt(row.level)) {
                var trainingLink = $(
                    '<a href="trainingFormJson.php?' + row.traning_name + '?' + row.minutes + '?' + row.time + '?' + row.level + '?' + row.date + '" class="list-group-item list-group-item-action">' + row.traning_name + ' : ' + row.minutes + 'min</a>')
                $('main').append(trainingLink)
                flag = 1;
            }
        }
        if (flag == 0) {
            $("main").append('<span class="confirmMessage"><img src="https://img.icons8.com/color/48/000000/high-importance.png" alt=" "> Not successfully to find training</span>');
        }
    });

});