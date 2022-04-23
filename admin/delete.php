<?php
include_once "../connection.php";
$id = $_GET["id"];
mysqli_query($link, "delete from quiz where id_exam=$id");
?>

<script type="text/javascript">
    window.location="add_quiz.php";
</script>