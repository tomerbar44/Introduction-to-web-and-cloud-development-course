<?php
include 'db.php';
session_start();
$Msg = '';
$imgUrl='';
$unum = $_GET["dnum"];
if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
}
$query = "DELETE FROM tb_training_210 WHERE ID='$id' AND num_training='$unum'";
$result = mysqli_query($connection, $query);
if ($connection->affected_rows) {
    $Msg = 'successfully deleted';
    $imgUrl="https://img.icons8.com/color/48/000000/checked.png";
} else {
    $Msg = 'does not exist';
    $imgUrl="https://img.icons8.com/color/48/000000/high-importance.png";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SCM</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
</head>

<body id="detailsSaveLayout">
    <div id="wrapper">

        <header>
            <section class="loginLine">
                <a href="informationUser.php"><?php
                                                if (isset($_SESSION["user_name"]))
                                                    echo  $_SESSION["user_name"]; ?></a>
                <a href="#">Support</a>
            </section>
            <a class="logo1" href="index_user.php"></a>
            <a class="logo2" href="index_user.php"></a>
        </header>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="index_user.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trainingsLayout.php">Facilities</a>
                </li>
            </ul>
        </nav>
        <ul class="breadcrumb">
            <li><a href="index_user.php">Home</a></li>
            <li><a href="myTrainingsLayout.php">My trainings</a></li>
            <li class="currentPage">Deleting training</li>

        </ul>
        <main>
            <?php
            echo "<span class='confirmMessage'><img src='".$imgUrl."' alt=' '> Training number:" . $unum . " " . $Msg . "</span>";
            ?>
        </main>
    </div>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>