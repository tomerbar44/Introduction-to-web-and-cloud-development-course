<?php
//get data from our from and insert to the table
include 'db.php';
session_start();
$Msg = '';
$imgUrl='';
$uTrainingNumber=$_GET["number"];
$uTrainingName = $_GET["training"];
$udate = $_GET["date"];
$utime = $_GET["time"];
$uminutes = $_GET["minutes"];
$ulevel = $_GET["level"];
$id = $_SESSION["user_id"];
$query = "UPDATE tb_training_210
SET traning_name='$uTrainingName',date='$udate',time='$utime',minutes='$uminutes',level='$ulevel'
WHERE ID='$id' AND num_training='$uTrainingNumber'";
$result = mysqli_query($connection, $query);
if ($connection->affected_rows) {
    $Msg = 'successfully update';
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
            <li class="currentPage">Update training</li>

        </ul>

        <main>
            <?php
                echo "<span class='confirmMessage'><img src='".$imgUrl."' alt=' '> Training number:" . $uTrainingNumber . " " . $Msg . "</span>";
            ?>
        </main>
    </div>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>