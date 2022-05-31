<?php
session_start();
include_once "../connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">  
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Login - Quiz App</title>
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
                        Creator Register
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
                            
                            <button type="submit" name="register" class="btn btn-success loginbtn">Daftar</button>

                            <p class="mt-2">Sudah punya akun? <a href="login.php">Masuk</a></p>

                            <div class="alert alert-success" id="success" style="margin-top: 10px; display: none;">
                                <strong>Sukses!</strong> Pendaftaran akun Anda berhasil.
                            </div>

                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none;">
                                <strong>Gagal!</strong> Nama Pengguna sudah digunakan.
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
if (isset($_POST['register'])) {
    $count = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "creator";

    $res = mysqli_query($link, "SELECT * FROM account WHERE username='$username' AND role='$role'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        ?>

        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("failure").style.display="block";
        </script>
        <?php
    } else {
        mysqli_query($link, "INSERT INTO account VALUES(NULL, '$username', '$password', '$role')");

        ?>

        <script type="text/javascript">
            document.getElementById("success").style.display="block";
            document.getElementById("failure").style.display="none";
        </script>
        <?php
    }
}
?>
