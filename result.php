<?php
session_start();
include"connection.php";
$date=date("Y-m-d H:i:s");
$_SESSION[end_time]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[examp_time] minutes"));
include "header.php";
?>


    <div class="row" style="...">
        <div class="col-lg-6-push-3" style="...">
            <?php
                $correct = 0;
                $wrong = 0;

                if(isset($_SESSION["answer"])){
                    for($i=1; $i<=sizeof($_SESSION["answer"]);$i++){
                        $answer="";
                        $res=mysqli_query($link,"select * from questions where category='$_SESSION[examp_category]' && question_no=$i");
                        while($row=mysqli_fetch_array($res)){
                                $answer=$row["answer"];
                        }
                        if(isset($_SESSION["answer"][$i])){
                            if($answer==$_SESSION["answer"][$i]){
                                $correct=$correct+1;
                            }else{
                                $wrong=$wrong+1;
                            }
                        }else{
                            $wrong=$wrong+1;
                        }
                    }
                }

                $count = 0;
                $res= mysqli_query($link,"select * from questions where category='$_SESSION[examp_category]'")
                $count=mysqli_num_rows($res);
                $wrong=$count-$correct;
                echo "<br>"; echo "<br>";
                echo "<center>";
                echo "Total Questions=".$count;
                echo "<br>";
                echo "Correct Answer=".$correct;
                echo "<br>";
                echo "Wrong Answer=".$wrong;

                echo "</center>";
            ?>
        </div>
    </div>

<?php

if(isset($_SESSION["examp_start"])){
    $date=date("Y-m-d");
    mysqli_query($link,"insert into examp_results(id,username,examp_tipe,total_question,correct_answer,wrong_answer,examp_time)values(NULL,'$_SESSION[username]','$_SESSION[examp_category]','$count','$correct','$wrong','$date')") or die (mysqli_error($link));
}

if($isset($_SESSION["examp_start"])){
    unset($_SESSION["examp_start"]);
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
?>


<?php
include "footer.php";
?>    