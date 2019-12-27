<?php
 session_start();
//get data from our from and insert to the table
include 'db.php';
$uId = $_GET["id"];
$uTrainingName = $_GET["training"];
$udate = $_GET["date"];
$utime = $_GET["time"];
$uminutes = $_GET["minutes"];
$ulevel = $_GET["level"];
$uimg = "https://img.icons8.com/color/96/000000/personal-trainer.png";
$query = "INSERT INTO tb_training_210 (traning_name, date, time,minutes,ID,level)
            VALUES ('$uTrainingName','$udate','$utime','$uminutes','$uId','$ulevel')";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
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
            <li><a href="trainingGymForm.php">Add a training</a></li>
            <li class="currentPage">Confirmation</li>
        </ul>

        <main>
            <?php
            echo "<div class='card mb-3' style='max-width: 540px;'>
                <div class='row no-gutters'>
                    <div class='col-md-4'>
                        <img src='" . $uimg . "' class='card-img' alt=''>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-body'>
                        <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Training: " . $uTrainingName . "</li>
                        <li class='list-group-item'>Date: " . $udate . "</li>
                        <li class='list-group-item'>Time: " . $utime . "</li>
                        <li class='list-group-item'>Minutes: " . $uminutes . "</li>
                        <li class='list-group-item'>Level: " . $ulevel . "</li>
                    </ul>
                    </div>
                </div>
            </div>";
            ?>
        </main>

    </div>
</body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>