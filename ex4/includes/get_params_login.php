<!DOCTYPE html>
<html>

<head>
    <title>Tomer Bar</title>
</head>

<body>
    <section>
        Welcome
        <?php
        $un=$_GET["reg_un"];
        $pw=$_GET["reg_pass"];

        if($un=="tomer" && $pw=="1234")
            echo "<h2> Good morning  ". $un . "</h2>";
        else
        echo "<h2>Who are you?  ". $un . " you can't get in</h2>";
        ?>
    </section>
</body>
</html>