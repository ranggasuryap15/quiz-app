<?php
session_start();
include "../connection.php";
$quiz = $_GET["quiz"];
$_SESSION["quiz"] = $quiz; // quiz yang sedang berlangsung

$res = mysqli_query($link,"SELECT * FROM quiz WHERE quiz_name='$quiz'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["quiz_timer"] = $row["quiz_timer"];
    $_SESSION["id_quiz"] = $row["id_quiz"];
}
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[quiz_timer] minutes"));
$_SESSION["quiz_start"]="yes";
?>