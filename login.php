<?php
session_start(); 
include_once "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Masuk</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>LOGIN FORM</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="#" name="form1" method="post">
                            <div class="form-group">
                                <label class="control-label" for="`username`">Username</label>
                                <input type="text" placeholder="username" required name="username" id="username" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="********" required name="password" id="password" class="form-control">
                            </div>

                            <button name="login" class="btn btn-success btn-block loginbtn">Masuk</button>
                            <a class="btn btn-default btn-block" href="register.php">Daftar</a>
                            
                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none;">
                                <strong>Data tidak sama!</strong> Username atau Password salah.
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>
    </div>

    <?php
    if (isset($_POST["login"])) {

        // untuk menangkap data yuang dikirim dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        $count = 0;

        $res = mysqli_query($link, "SELECT * FROM account WHERE username='$username' AND password='$password'");

        $count = mysqli_num_rows($res);
  

        if ($count > 0) {

            $data = mysqli_fetch_array($res);

            // cek jika user login sebagai participant
            if ($data['role'] == "participant") {
                
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['role'] = "participant";

                // alihkan ke halaman participant
                header("location:select_quiz.php");
            } else {
                ?>
                <script type="text/javascript">
                    document.getElementById("failure").style.display = "block";
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                document.getElementById("failure").style.display = "block";
            </script>
            <?php
        }
    }
    ?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
</body>

</html>
