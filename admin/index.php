<?php
session_start();
include('config.php');

?>


<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>

    <?php



if(isset($_REQUEST['username'])) {

    $username = stripslashes($_REQUEST['username']);

    $username = mysqli_real_escape_string($conn, $username);

    $password = stripslashes($_REQUEST['password']);

    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if($rows == 1)
    {
        $_SESSION['username'] = $username;
        header("location: products.php");

    }
    else{
        echo "<div class='form'>
        <h3>Incorrect Username/Password.</h3><br/>
        <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
        </div>";
    }
}
else{
?>

        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/logo.jpg" style="height: 120px; ">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
    ?>

    </body>
</html>
