<?php
session_start();
include_once "header.php";
include_once "../connection.php";

if (!isset($_SESSION["admin"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}

$id = $_GET["id"];
$res = mysqli_query($link, "select * from quiz where id_quiz=$id");
while ($row = mysqli_fetch_array($res)) {
    $quiz = $row["quiz_name"];
    $exam_time = $row["quiz_time"];
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Mengubah Kategori Ujian</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="form1" action="" method="post">
                        <div class="card-body"> 
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Mengubah Ujian</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="examname" class=" form-control-label">Kategori Ujian Baru</label>
                                            <input type="text" name="examname" placeholder="Tambahkan Kategori Baru" class="form-control" value="<?php echo $quiz; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="examtime" class=" form-control-label">Waktu Ujian</label>
                                            <input type="text" name="examtime" placeholder="Waktu Ujian" class="form-control" value="<?php echo $exam_time; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Perbarui Kategori" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!--/.col-->
        </div><!--/.row-->
    </div> <!--/.animated FadeIn-->
</div> <!-- .content -->

<?php
if (isset($_POST["submit2"])) 
{
    mysqli_query($link, "update quiz set quiz_name='$_POST[examname]', quiz_time='$_POST[examtime]' where id_quiz=$id") or die(mysqli_error($link));
    
    ?>
    <script text="text/javascript">
        alert("Ujian berhasil diperbarui");
        window.location="quiz.php";
    </script>

    <?php
}
?>



<?php
include_once "footer.php";
?>