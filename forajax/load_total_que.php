<?php
session_start();
include "../connection.php";

$total_que = 0;
$res1 = mysqli_query($link, "SELECT * FROM questions que INNER JOIN quiz q ON que.id_quiz = q.id_quiz WHERE quiz_name='$_SESSION[quiz]'");
$total_que = mysqli_num_rows($res1);

echo $total_que;
?>