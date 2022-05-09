<?php
session_start();
include_once "header.php";
include_once "connection.php";

if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <center>
            <h1>Hasil Kuis Lama</h1>
        </center>
        <?php
        $count = 0;
        $res = mysqli_query($link, "select * from quiz_results where username='$_SESSION[username]' order by id_result desc");
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