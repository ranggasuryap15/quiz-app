<?php
include_once "../connection.php";
$id = $_GET["id"];
$id1 = $_GET["id1"];

$res = mysqli_query($link, "select * from questions where id_question=$id") or die(mysqli_error($link));
$row = mysqli_fetch_array($res);

// untuk mendapatkan nama file yang ada di dalam database tersebut.
$question = $row["question"];
$opt1 = $row["option_1"];
$opt2 = $row["option_2"];
$opt3 = $row["option_3"];
$opt4 = $row["option_4"];
$answer = $row["answer"];

mysqli_query($link, "delete from questions where id_question=$id") or die(mysqli_error($link));
unlink($opt1);
unlink($opt2);
unlink($opt3);
unlink($opt4);
unlink($answer);

?>

<script type="text/javascript">
    window.location = "add_edit_questions.php?id=<?php echo $id1; ?>";
</script>