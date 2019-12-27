<?php
//get data from DB
 session_start();
include 'db.php';
$query = "SELECT * FROM tb_kind_of_trainings_210";
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

<body id="facilityLayout">
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
                    <a class="nav-link" href="index_user.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="trainingsLayout.php">Facilities</a>
                </li>
            </ul>
        </nav>
        <ul class="breadcrumb">
            <li><a href="index_user.php">Home</a></li>
            <li class="currentPage">Facilities</li>
        </ul>
        <main>
            <?php
            //use return data (if any)
            while ($row = mysqli_fetch_assoc($result)) { //returns standard array of results. keys are ints
                if ($row["ID"] == 3) {
                    echo "<a class='facilitieLink' href='facilitysGymLayout.php?' " . $row["ID"] . " ><img src=' " . $row["img"]  . "' alt=''>" . $row["name"] . "</a>";
                } else {
                    echo "<a class='facilitieLink' href='#'><img src=' " . $row["img"]  . "' alt=''>" . $row["name"] . "</a>";
                }
            }
            ?>
            <?php
            //release returned data
            mysqli_free_result($result);
            ?>
        </main>
    </div>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>