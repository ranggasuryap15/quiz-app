<?php
session_start();
include_once "header.php";
include "../connection.php";

if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Semua Hasil Kuis</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> 
                    <center>
                        <h1>Semua Hasil Kuis</h1>
                    </center>
                    <?php
                    $count = 0;
                    $res = mysqli_query($link, "select * from quiz_results order by id_result desc");
                    $count = mysqli_num_rows($res);

                    if ($count == 0) {
                        ?>
                        <center>
                            <h3>No Results Found</h3>
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
            </div> <!--/.col-->
        </div><!--/.row-->
    </div> <!--/.animated FadeIn-->
</div>

<?php
include_once "footer.php";
?>