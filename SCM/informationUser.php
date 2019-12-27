<?php session_start();
if($_SESSION["user_kind"]==0){
    $uml="index_user.php";
}else{
    $uml="index_admin.php";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SCM</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
</head>

<body id="informationUserLayout">
    <div id="wrapper">
        <header>
            <section class="loginLine"></section>
            <?php echo"
            <a class='logo1' href='".$uml."'></a>
            <a class='logo2' href='".$uml."'></a>";
            ?>
        </header>
        <main>
            <?php 
            echo
                "<div class='card' style='width: 18rem;'>
                <img src=" . $_SESSION["user_img"] . " class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $_SESSION["user_name"] . "</h5>
                </div>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>ID: " . $_SESSION["user_id"] . "</li>
                    <li class='list-group-item'>Email: " . $_SESSION["user_email"] . "</li>
                    <li class='list-group-item'>Address: " . $_SESSION["user_address"] . "</li>
                    <li class='list-group-item'>Phone: " . $_SESSION["user_phone"] . "</li>
                </ul>
                <div class='card-body'>
                    <a href='index.php' class='card-link'>Exit</a>
                    <a href='" . $uml . "' class='card-link'>Home Page</a>
                </div>
            </div>" ?>

    </div>
    </main>
</body>

</html>