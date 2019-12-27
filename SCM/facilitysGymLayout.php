<?php
session_start();
//get data from DB
include 'db.php';
$query1 = "SELECT * FROM tb_facilities_210 WHERE kind=1";
$query2 = "SELECT * FROM tb_facilities_210 WHERE kind=0";
$result1 = mysqli_query($connection, $query1);
$result2 = mysqli_query($connection, $query2);
if (!$result1) {
    die("DB query failed.");
}
if (!$result2) {
    die("DB query failed.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SCM</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
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
            <a class="logo1" href="index_user"></a>
            <a class="logo2" href="index_user"></a>
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
            <li><a href="trainingsLayout.php">Facilities</a></li>
            <li class="currentPage">Gym</li>
        </ul>
        <main>
            <div class="aerobic">
                <?php
                //use return data (if any)
                while ($row = mysqli_fetch_assoc($result1)) { //returns standard array of results. keys are ints
                    echo "<div class='facilitieLink'><img src='" . $row["img"] . "' alt=''>" . $row["name"] . "</div>";
                }
                ?>
            </div>
            <div class="power">
                <?php
                //use return data (if any)
                while ($row = mysqli_fetch_assoc($result2)) { //returns standard array of results. keys are ints
                    echo "<div class='facilitieLink'><img src='" . $row["img"] . "' alt=''>" . $row["name"] . "</div>";
                }
                ?>
            </div>
            <?php
            //release returned data
            mysqli_free_result($result1);
            mysqli_free_result($result2);
            ?>
        </main>
        <aside>
            <img src="images/filter_icon.png" alt="">
            <span style="cursor:pointer">
                <h3 id="filterAll">All</h3>
            </span>
            <span style="cursor:pointer">
                <h3 id="filterPower">Power</h3>
            </span>
            <span style="cursor:pointer">
                <h3 id="filterAerobic">Aerobic</h3>
            </span>
        </aside>
    </div>
    <script src="includes/main.js"></script>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>