<?php
session_start();
//get data from our from and insert to the table
include 'db.php';
$Msg = '';
$imgUrl = '';
$uname = $_GET["name"];
$ucode = $_GET["code"];
if ($_GET["kind"] == "aerobic") {
    $unum = 1;
} else {
    $unum = 0;
}
$upro = $_GET["provider"];
$udate = $_GET["date"];
$ucomm = $_GET["comments"];
$uimg = $_GET["img"];
$query = "UPDATE tb_facilities_210
SET name='$uname',provider='$upro',date='$udate',comment='$ucomm',kind='$unum',img='$uimg'
WHERE ID='$ucode'";
$result = mysqli_query($connection, $query);
if ($connection->affected_rows) {
    $Msg = 'successfully update';
    $imgUrl = "https://img.icons8.com/color/48/000000/checked.png";
} else {
    $Msg = 'does not exist';
    $imgUrl = "https://img.icons8.com/color/48/000000/high-importance.png";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SCM</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt&display=swap" rel="stylesheet">
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
            <a class="logo1" href="index_admin.php"></a>
            <a class="logo2" href="index_admin.php"></a>
        </header>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="index_admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="facilitysLayout.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Subscribers</a>
                </li>
            </ul>
        </nav>
        <ul class="breadcrumb">
            <li><a href="index_admin.php">Home</a></li>
            <li><a href="facilitysLayout.php">Facilities</a></li>
            <li class="currentPage">Details update</li>
        </ul>
        <main>
            <?php
            echo "<span class='confirmMessage'><img src='" . $imgUrl . "' alt=' '> Facility number:" . $ucode . " " . $Msg . "</span>";
            ?>
        </main>
    </div>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>