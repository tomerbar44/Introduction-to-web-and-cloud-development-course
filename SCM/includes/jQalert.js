$("form").submit(function(event) {
    $("span").css("color", "red");
    if ($("#code").val() == '') {
        $("span").text("Please fill code!").show().fadeOut(1000);
        event.preventDefault();
        return;

    } else if ($("#name").val() == '') {
        $("span").text("Please fill name!").show().fadeOut(1000);
        event.preventDefault();
        return;

    } else if ($("#Kind").val() == '') {
        $("span").text("Please fill kind!").show().fadeOut(1000);
        event.preventDefault();
        return;

    } else if ($("#provider").val() == '') {
        $("span").text("Please fill provider!").show().fadeOut(1000);
        event.preventDefault();
        return;

    } else if ($("#date").val() == '') {
        $("span").text("Please fill date!").show().fadeOut(1000);
        event.preventDefault();
        return;

    }

    $("span").show();
});