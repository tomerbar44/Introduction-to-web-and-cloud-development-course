<?php
$connection = mysqli_connect(
    "182.50.133.168",
    "studDB19a",
    "stud19DB1!",
    "studDB19a"
);

if (mysqli_connect_errno()) {
    echo "NULL";
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

$query = $_POST['query'];
$model = mysqli_query($connection, $query);
if (!$model) {
    echo "NULL";
} else {
    $resArray = [];
    while ($row = mysqli_fetch_assoc($model)) {
        $resArray[] = $row;
    }

    $res = json_encode($resArray);
    echo $res;
}
mysqli_close($connection);
