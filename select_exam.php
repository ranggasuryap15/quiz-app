<?php
session_start();

if (!isset($_SESSION["username"])) {
    ?>
    <!-- Seandainya belum login, maka kembali lagi ke halaman login -->
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
?>

<?php
include_once "connection.php";
include_once "header.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Quiz System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>
    
    <!-- Header -->
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
												<i class="educate-icon educate-nav"></i>
											</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="select_exam.php" class="nav-link">Pilih Ujian</a>
                                                </li>
                                                <li class="nav-item"><a href="old_quiz_results.php" class="nav-link">Hasil Terakhir</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" aria-haspopup="true">
                                                        <img src="img/avatar-mini2.jpg" alt="" />
                                                        <span class="admin-name"><?php echo $_SESSION["username"]; ?></span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"> 
                                                        <li>
                                                            <a href="logout.php" class="dropdown-item"><span class="edu-icon edu-locked author-log-ic"></span>Log out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->

    <div class="row" style="margin: 0px; padding-top:20px; margin-bottom: 50px;">

        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <?php
            $res = mysqli_query($link, "select * from quiz");
            while ($row = mysqli_fetch_array($res))
            {
                ?>
                    <input type="button" class="btn btn-success form-control" value="<?php echo $row['quiz_name']; ?>" style="margin-top: 10px; background-color: blue; color: white;" onclick="set_exam_type_session(this.value);">
                <?php
            }
            ?>
        </div>

    </div>

<?php
    include_once "footer.php";
?>

<script type="text/javascript">
    function set_exam_type_session(quiz)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?quiz="+ quiz,true);
        xmlhttp.send(null);
    }
</script>

</body>

</html>