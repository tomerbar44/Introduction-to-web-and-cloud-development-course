<?php
//get data from DB
include 'db.php';
session_start();
$id = $_SESSION["user_id"];
$query1 = "SELECT * FROM tb_training_210 WHERE ID=$id";
$result1 = mysqli_query($connection, $query1);
if (!$result1) {
    die("DB query failed.");
}
$query2 = "SELECT * FROM tb_facilities_210";
$result2 = mysqli_query($connection, $query2);
if (!$result2) {
    die("DB query failed.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SCM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
</head>

<body id="myTrainingsLayout">
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
            <li class="currentPage">My trainings</li>
        </ul>
        <main>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#IamLate">I'm late!</button></th>
                        <th scope="col">Training number</th>
                        <th scope="col">Training</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Minutes</th>
                        <th scope="col">Level</th>
                        <th scope="col"><button type="button" class="closeBtn" data-toggle="modal" data-target="#confirmationDelete"><img src="https://img.icons8.com/ios-glyphs/30/000000/delete-forever.png"></button></th>
                        <th scope="col"><button type="button" class="closeBtn" data-toggle="modal" data-target="#confirmationUpdate"><img src="https://img.icons8.com/ios-glyphs/30/000000/edit.png"></button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //use return data (if any)
                    while ($row = mysqli_fetch_assoc($result1)) { //returns standard array of results. 
                        echo "<tr>
                    <th scope='row'></th>
                    <td>" . $row["num_training"] . "</td>
                    <td>" . $row["traning_name"] . "</td>
                    <td>" . $row["date"] . "</td>
                    <td>" . $row["time"] . "</td>
                    <td>" . $row["minutes"] . "</td>
                    <td>" . $row["level"] . "</td>
                    <td></td>
                    <td></td>
                    </tr>";
                    }
                    ?>
                </tbody>
                <?php
                //release returned data
                mysqli_free_result($result1);
                ?>
            </table>

            <div class="modal fade" id="confirmationDelete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Select training number you want to delete</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="deleteTrainingByID.php" method="GET">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="dnum" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmationUpdate">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update your training</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form action="updateTraining.php" method="GET">

                            <div class="modal-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Training number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="number" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Training</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="training" name="training">
                                            <?php
                                            //use return data (if any)
                                            while ($row = mysqli_fetch_assoc($result2)) { //returns standard array of results. 
                                                //output data from each row
                                                echo "<option>" . $row["name"] . "</option>";
                                            }
                                            ?>
                                            <?php
                                            //release returned data
                                            mysqli_free_result($result2);
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" name="time" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Minutes</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="minutes">
                                            <option>10</option>
                                            <option>20</option>
                                            <option>30</option>
                                            <option>40</option>
                                            <option>50</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Level</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="level">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Sumbit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="IamLate">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Select date, time and level</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <form action="trainingsForLate.php" method="GET">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="dateforlate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" name="timeforlate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Level</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="levelforlate" required>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Sumbit">
                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>