<?php
session_start();
include "../connection.php";

$total_que = 0;
$res1 = mysqli_query($link, "SELECT * FROM questions WHERE quiz_name='$_SESSION[quiz]'");
$total_que = mysqli_num_rows($res1);

echo $total_que;
?>