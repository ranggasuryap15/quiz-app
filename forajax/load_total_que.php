<?php
session_start();
include "../connection.php";

$total_que = 0;
$res1 = mysqli_query($link, "SELECT que.id_question, que.question_no, que.option_1, que.option_2, que.option_3, que.option_4, que.answer, q.id_quiz, q.quiz_name, q.quiz_timer, q.id_creator FROM questions que INNER JOIN quiz q ON que.id_quiz = q.id_quiz WHERE quiz_name='$_SESSION[quiz]'");
$total_que = mysqli_num_rows($res1);

echo $total_que;
?>