<?php
session_start();

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
                                                <li class="nav-item"><a href="" class="nav-link" >Pilih Ujian</a>
                                                </li>
                                                <li class="nav-item"><a href="" class="nav-link">Hasil Terakhir</a>
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
            <!-- Mobile Menu start -->

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">

                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                                        <ul class="breadcome-menu">
                                            <li>
                                                <div id="countdowntimer" style="display: block;"></div>
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

    <script type="text/javascript">
        setInterval(function() {
            timer();
        }, 1000); 

        function timer()
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText=="00:00:01")
                    {
                        window.location = "result.php";
                    }

                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/load_timer.php",true);
            xmlhttp.send(null);
        }
    </script>
    <!-- Header -->

    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <!-- Start editing -->
            <br>
            <div class="row">
                <br>
                <div class="col-lg-2 col-lg-push-10">
                    <div id="current_que" style="float: left;">0</div>
                    <div style="float: left;">/</div>
                    <div id="total_que" style="float: left;">0</div>
                </div>

                <!-- Tempat untuk pertanyaan-nya -->
                <div class="row" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white;" id="load_questions">

                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
                        <div class="col-lg-12 text-center">
                            <input type="button" class="btn btn-warning" value="Sebelumnya" onclick="load_previous();">&nbsp;
                            <input type="button" class="btn btn-success" value="Selanjutnya" onclick="load_next();">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End here ediitng -->
        </div>

    </div>

    <script type="text/javascript">
        // untuk memuat jumlah dari pertanyaan untuk ditampilkan di halaman
        function load_total_que() {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/load_total_que.php",true);
            xmlhttp.send(null);
        }

        var question_no = "1";
        load_questions(question_no);

        // sebuah function untuk memuat pertanyaan-pertanyaan yang ada di database
        function load_questions(question_no) {
            document.getElementById("current_que").innerHTML = question_no;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "over") {
                        window.location = "result.php";
                    } else {
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_que();
                    }
                }
            };
            xmlhttp.open("GET","forajax/load_questions.php?question_no=" + question_no,true);
            xmlhttp.send(null);
        }

        function radioclick(radiovalue, question_no)
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                   
                }
            };
            xmlhttp.open("GET","forajax/save_answer_in_session.php?question_no=" + question_no + "&value1=" + radiovalue,true);
            xmlhttp.send(null);
        }

        // sebuah function untuk kembali kepada pertanyaan sebelumnya
        function load_previous() {
            if (question_no == "1") {
                load_questions(question_no);
            } else {
                question_no = eval (question_no) - 1;
                load_questions(question_no);
            }
        }

        // tujuannya untuk kembali kepada pertanyaan selanjutnya
        function load_next() {
            question_no = eval (question_no) + 1;
            load_questions(question_no);
        }
    </script>

<?php
    include_once "footer.php";
?>
</body>

</html>