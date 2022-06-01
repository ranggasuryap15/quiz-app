<?php
session_start();
include_once "connection.php";

if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
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
                                                <li class="nav-item"><a href="select_quiz.php" class="nav-link">Pilih Ujian</a>
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
            <center>
                <h1>Hasil Kuis Lama</h1>
            </center>
            <?php
            $count = 0;
            $sql = "SELECT a.username, q.quiz_name, qr.total_question, qr.correct_answer, qr.wrong_answer, qr.quiz_time, qr.id_result FROM quiz_results qr INNER JOIN quiz q 
            ON qr.id_quiz = q.id_quiz INNER JOIN account a 
            ON qr.id_participant = a.id_account
            WHERE username='$_SESSION[username]' ORDER BY id_result DESC;";

            $res = mysqli_query($link, $sql);
            
            // $res = mysqli_query($link, "select * from quiz_results where username='$_SESSION[username]' order by id_result desc");
            $count = mysqli_num_rows($res);

            if ($count == 0) {
                ?>
                <center>
                    <h3>Hasil Tidak Ditemukan</h3>
                </center>
                <?php
            } else {
                echo "<table class='table table_bordered'>";
                
                echo "<tr style='background-color: #006DF0; color: white;'>";
                    echo "<th>"; echo "Username"; echo "</th>";
                    echo "<th>"; echo "Quiz Name"; echo "</th>";
                    echo "<th>"; echo "Total Question"; echo "</th>";
                    echo "<th>"; echo "Correct Answer"; echo "</th>";
                    echo "<th>"; echo "Wrong Answer"; echo "</th>";
                    echo "<th>"; echo "Quiz Time"; echo "</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                        echo "<td>"; echo $row["username"]; echo "</td>";
                        echo "<td>"; echo $row["quiz_name"]; echo "</td>";
                        echo "<td>"; echo $row["total_question"]; echo "</td>";
                        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                        echo "<td>"; echo $row["quiz_time"]; echo "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            }
            ?>
        </div>
    </div>

<?php
include_once "footer.php";
?>