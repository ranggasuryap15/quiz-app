<?php
session_start();
include_once "connection.php";
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


    <!-- Untuk menampilkan seluruh pertanyaan yang telah terdaftar pada sebuah kuis tersebut -->
    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
        <div class="col-lg-6-push-3" style="min-height: 500px; background-color: white;">
            <?php
                $correct = 0;
                $wrong = 0;

                if(isset($_SESSION["answer"])){
                    for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++){
                        $answer="";
                        $res = mysqli_query($link,"SELECT que.id_question, que.question_no, que.question, que.option_1, que.option_2, que.option_3, que.option_4, que.answer, q.id_quiz, q.quiz_name, q.quiz_timer, q.id_creator FROM questions que INNER JOIN quiz q ON que.id_quiz = q.id_quiz WHERE quiz_name='$_SESSION[quiz]' && question_no=$i");

                        while($row=mysqli_fetch_array($res)){
                                $answer = $row["answer"];
                        }

                        if (isset($_SESSION["answer"][$i])){
                            if ($answer == $_SESSION["answer"][$i]){
                                $correct = $correct+1;
                            } else {
                                $wrong = $wrong+1;
                            }
                        } else {
                            $wrong=$wrong+1;
                        }
                    }
                }


                // untuk menampilkan hasil jawaban
                $total_question = 0;
                $sql = "SELECT que.id_question, que.question_no, que.question, que.option_1, que.option_2, que.option_3, que.option_4, que.answer, q.id_quiz, q.quiz_name, q.quiz_timer, q.id_creator FROM questions que INNER JOIN quiz q ON que.id_quiz = q.id_quiz WHERE quiz_name='$_SESSION[quiz]'";

                $res = mysqli_query($link,$sql);
                $total_question = mysqli_num_rows($res);
                $wrong = $total_question - $correct;
                echo "<br>"; echo "<br>";
                echo "<center>";
                echo "Total Questions = " . $total_question;
                echo "<br>";
                echo "Correct Answer = " . $correct;
                echo "<br>";
                echo "Wrong Answer = " . $wrong;

                echo "</center>";
            ?>
        </div>
    </div>

<?php

if (isset($_SESSION["quiz_start"])){
    date_default_timezone_set('Asia/Jakarta'); // untuk mendapatkan timezone Jakarta
    $date = date("Y-m-d h:i:s"); // untuk mendapatkan tanggal hari ini menggunakan format (Tahun-Bulan-Tanggal)
    mysqli_query($link, "INSERT INTO quiz_results values(NULL,'$_SESSION[id_participant]', '$_SESSION[id_quiz]', '$total_question', '$correct', '$wrong', '$date')") or die (mysqli_error($link));
}

if($isset($_SESSION["quiz_start"])){
    unset($_SESSION["quiz_start"]);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>


<?php
include "footer.php";
?>    