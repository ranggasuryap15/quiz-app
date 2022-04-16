<?php
include_once "../connection.php";
$id = $_GET["id"];
mysqli_query($link, "delete from exam_category where id_exam=$id");
?>

<script type="text/javascript">
    window.location="exam_category.php";
</script>