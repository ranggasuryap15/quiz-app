<?php
include_once "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar Sekarang</title>
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
			<div class="text-center custom-login">
				<h3>Register Now</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="#" name="form1" method="post">
                            <div class="row">
                                <!-- <div class="form-group col-lg-12">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="fullname" class="form-control" title="Mohon masukkan nama lengkap Anda" required>
                                </div> -->
                                
                                <!-- <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div> -->
                                
                                <div class="form-group col-lg-12">
                                    <label>Nama Pengguna</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Kata Sandi</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-success loginbtn">Daftar</button>
                                <p>Sudah punya akun? <a href="login.php">Klik disini</a></p>
                                
                            </div>
                            
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
    </div>

    <?php
    if (isset($_POST['register'])) {
        $count = 0;
        $username = $_POST['username'];

        $res = mysqli_query($link, "SELECT * FROM account WHERE username='$username' AND role='participant'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);

        // Untuk memberikan pesan error, bahwa username telah digunakan.
        if ($count > 0) {
            ?>

            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("failure").style.display="block";
            </script>
            <?php
        } else {
            // jika username tidak ada yang sama maka pendaftaran berhasil
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = "participant";

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            mysqli_query($link, "INSERT INTO account VALUES(NULL, '$username', '$password_hash', '$role')");

            ?>

            <script type="text/javascript">
                document.getElementById("success").style.display="block";
                document.getElementById("failure").style.display="none";
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
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>