<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>SCM</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
</head>

<body id="formLayout">
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
            <li class="currentPage">Add a training</li>
        </ul>
        <main>
            <form action="trainingConfirmLayout.php" method="GET">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="number" readonly class="form-control-plaintext" name="id" value="<?php if (isset($_SESSION["user_id"]))
                                                                                                            echo  $_SESSION["user_id"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Training</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" name="training" id="staticTraining" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" readonly class="form-control-plaintext" name="date" id="staticDate" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <input type="time" readonly class="form-control-plaintext" name="time" id="staticTime" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Minutes</label>
                    <div class="col-sm-10">
                        <input type="number" readonly class="form-control-plaintext" name="minutes" id="staticMinutes" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                        <input type="number" readonly class="form-control-plaintext" name="level" id="staticLevel" value="">
                    </div>
                </div>
                <input type="submit" class="btn btn-dark" value="Sumbit">
                <span></span>
            </form>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="includes/jsDynamicForm.js"></script>
</body>

</html>