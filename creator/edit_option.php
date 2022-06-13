<?php
session_start();
include_once "header.php";
include_once "../connection.php";

if (!isset($_SESSION["creator"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}

$id = $_GET["id"];
$id1 = $_GET["id1"]; // ini untuk id yang quiz

$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";

$res = mysqli_query($link, "select * from questions where id_question=$id");
while ($row = mysqli_fetch_array($res))
{
    $question = $row["question"];
    $opt1 = $row["option_1"];
    $opt2 = $row["option_2"];
    $opt3 = $row["option_3"];
    $opt4 = $row["option_4"];
    $answer = $row["answer"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Perbarui Pertanyaan</h1>
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
                        <div class="col-lg-12">
                            <form name="form1" action="" method="post">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Perbarui Pertanyaan (dengan teks)</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class=" form-control-label">Pertanyaan</label>
                                            <input type="text" name="question" placeholder="Tambah Pertanyaan" class="form-control" value="<?php echo $question; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 1</label>
                                            <input type="text" name="opt1" placeholder="Opsi 1" class="form-control" value="<?php echo $opt1; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 2</label>
                                            <input type="text" name="opt2" placeholder="Opsi 2" class="form-control" value="<?php echo $opt2; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 3</label>
                                            <input type="text" name="opt3" placeholder="Opsi 3" class="form-control" value="<?php echo $opt3; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 4</label>
                                            <input type="text" name="opt4" placeholder="Opsi 4" class="form-control" value="<?php echo $opt4; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tentukan Jawaban Benar</label> <br>
                                            <input type="text" name="answer_opt" placeholder="Jawaban Benar" class="form-control" value="<?php echo $answer; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Perbarui Pertanyaan" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!--/.col-->
        </div><!--/.row-->
    </div> <!--/.animated FadeIn-->
</div>

<?php
if (isset($_POST["submit1"]))
{
    mysqli_query($link, "UPDATE questions SET question='$_POST[question]', option_1='$_POST[opt1]', option_2='$_POST[opt2]', option_3='$_POST[opt3]', option_4='$_POST[opt4]', answer='$_POST[answer_opt]' WHERE id_question=$id");

    ?>
    <script type="text/javascript">
        window.location = "add_edit_questions.php?id=<?php echo $id1; ?>";
    </script>
    <?php

}

?>

<?php
include_once "footer.php";
?>