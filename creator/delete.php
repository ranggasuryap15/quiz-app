<?php
session_start();
include_once "../connection.php";

if (!isset($_SESSION["creator"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}

$id = $_GET["id"];
mysqli_query($link, "delete from quiz where id_quiz=$id");
?>

<script type="text/javascript">
    window.location="add_quiz.php";
</script>