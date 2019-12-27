<?php
include 'db.php';
session_start();
if (!empty($_POST["loginMail"])) {
    $query  = "SELECT * FROM tb_users_210 WHERE email = '"
        . $_POST["loginMail"]
        . "' and password = '"
        . $_POST["password"]
        . "'";

    $result = mysqli_query($connection, $query);
    $row    = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["user_name"] = $row['name'];
        $_SESSION["user_email"] = $row['email'];
        $_SESSION["user_address"] = $row['address'];
        $_SESSION["user_phone"] = $row['phone'];
        $_SESSION["user_level"] = $row['level'];
        $_SESSION["user_kind"] = $row['kind_admin'];
        $_SESSION["user_img"] = $row['img'];
        if ($_SESSION["user_kind"] == 0) {
            header('Location: index_user.php?' . $_SESSION["user_id"]);
        } else {
            header('Location: index_admin.php?' . $_SESSION["user_id"]);
        }
    } else {
        $message = "Invalid Username or Password!";
    }
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

<body id="loginPage">
    <div id="wrapper">
        <header>
            <section class="loginLine"></section>
            <a class="logo1" href="index.php"></a>
            <a class="logo2" href="index.php"></a>
        </header>

        <div class="wrapperLogin">
            <h1>Hello, Enter to SCM </h1>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="loginMail">Email:</label><input type="email" id="loginMail" name="loginMail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label><input type="password" value="" id="password" name="password" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-dark" value="Login">
                <div class="error"><?php if (isset($message)) {
                                        echo $message;
                                    } ?></div>
            </form>
        </div>
    </div>

</body>

</html>
<?php
mysqli_close($connection);
?>