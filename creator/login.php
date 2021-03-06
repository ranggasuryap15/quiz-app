<?php
session_start();
include_once "../connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">  
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Creator Login - Quiz App</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">


        <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

        <link rel="stylesheet" href="assets/css/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



    </head>

    <body class="bg-dark">


        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo" style="color: white;">
                        Creator Login
                    </div>
                    <div class="login-form">
                        <form name="form1" action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Masuk</button>

                            <p class="mt-2">Belum punya akun? <a href="register.php">Daftar Sekarang</a></p>

                            <div class="alert alert-danger" id="errormsg" style="margin-top: 10px; display: none;">
                                <strong>Tidak ditemukan!</strong> Username dan atau Password tidak sesuai.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>


    </body>

</html>

<?php
if (isset($_POST["submit1"])) 
{
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    $role = "creator";

    $res = mysqli_query($link, "SELECT * FROM account WHERE username='$username' AND role='$role'");

    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if ($count == 0) {
        ?>
            <script type="text/javascript">
                document.getElementById("errormsg").style.display="block";
            </script>
        <?php
    } else {
        

        $hashed_password = $row["password"];
        $verify_password = password_verify($password, $hashed_password);

        if ($verify_password == true) {
            $_SESSION["creator"] = $username;

            ?>
            <script type="text/javascript">
                window.location="add_quiz.php";
            </script>
            <?php

            // mengambil id account untuk creator yang membuat pertanyaan
            $res = mysqli_query($link, "SELECT * FROM account WHERE username='$username'");
            $row = mysqli_fetch_array($res);
            $id_creator = $row['id_account'];
            $_SESSION["id_creator"] = $id_creator;
        }
    }
}
?>