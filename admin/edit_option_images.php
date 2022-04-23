<?php
include_once "header.php";
include_once "../connection.php";

$id = $_GET["id"];
$id1 = $_GET["id1"]; // ini untuk id yang quiz

$question = "";
$option_1 = "";
$option_2 = "";
$option_3 = "";
$option_4 = "";
$answer_db = "";

$res = mysqli_query($link, "select * from questions where id_question=$id");
while ($row = mysqli_fetch_array($res))
{
    // untuk mendapatkan value dari database dimasukkan ke dalam sebuah variabel
    $question = $row["question"];
    $option_1 = $row["option_1"];
    $option_2 = $row["option_2"];
    $option_3 = $row["option_3"];
    $option_4 = $row["option_4"];
    $answer_db = $row["answer"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Perbarui Pertanyaan (dengan gambar)</h1>
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
                        <!-- Menambahkan Pertanyaan dengan Gambar -->
                        <div class="col-lg-12">
                            <form name="form2" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah Pertanyaan Baru (dengan gambar)</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class=" form-control-label">Pertanyaan</label>
                                            <input type="text" placeholder="Pertanyaan" name="img_question" class="form-control" value="<?php echo $question ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <img src="<?php echo $option_1 ?>" height="50" width="50" alt="Option 1"><br>
                                            <label class=" form-control-label">Tambahkan Opsi 1</label>
                                            <input type="file" name="img_opt1" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <img src="<?php echo $option_2 ?>" height="50" width="50" alt="Option 2"><br>
                                            <label class=" form-control-label">Tambahkan Opsi 2</label>
                                            <input type="file" name="img_opt2" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $option_3 ?>" height="50" width="50" alt="Option 3"><br>
                                            <label class=" form-control-label">Tambahkan Opsi 3</label>
                                            <input type="file" name="img_opt3" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $option_4 ?>" height="50" width="50" alt="Option 4"><br>
                                            <label class=" form-control-label">Tambahkan Opsi 4</label>
                                            <input type="file" name="img_opt4" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <img src="<?php echo $answer_db ?>" height="50" width="50" alt="Answer"><br>
                                            <label class=" form-control-label">Jawaban Benar</label> <br>
                                            <input type="file" name="img_answer_opt" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Perbarui   Pertanyaan" class="btn btn-success">
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
if (isset($_POST["submit2"])) 
{
    $opt1 = $_FILES["img_opt1"]["name"];
    $opt2 = $_FILES["img_opt2"]["name"];
    $opt3 = $_FILES["img_opt3"]["name"];
    $opt4 = $_FILES["img_opt4"]["name"];
    $answer = $_FILES["img_answer_opt"]["name"];

    $tm = md5(time());

    // untuk update pada pertanyaan dan option 1
    if ($opt1 != "")
    {
        unlink($option_1);
        // untuk penamaan file dan direktori pada database (option image 1)
        $file_tmp_1 = $_FILES['img_opt1']['tmp_name'];
        $dst1 = "./option_images/" . $tm . $opt1;
        $file_destination_1 = "option_images/" . $tm . $opt1; // untuk database 
        move_uploaded_file($file_tmp_1, $dst1);

        mysqli_query($link, "update questions set question='$_POST[img_question]', option_1='$file_destination_1' where id_question=$id") or die(mysqli_error($link));
    }

    // untuk update pada pertanyaan dan option 2
    if ($opt2 != "")
    {
        unlink($option_2);
        // untuk penamaan file dan direktori pada database (option image 2)
        $file_tmp_2 = $_FILES['img_opt2']['tmp_name'];
        $dst2 = "./option_images/" . $tm . $opt2;
        $file_destination_2 = "option_images/" . $tm . $opt2; // untuk database
        move_uploaded_file($file_tmp_2, $dst2);

        mysqli_query($link, "update questions set question='$_POST[img_question]', option_2='$file_destination_2' where id_question=$id") or die(mysqli_error($link));
    }

    // untuk update pada pertanyaan dan option 3
    if ($opt3 != "")
    {
        unlink($option_3);
        // untuk penamaan file dan direktori pada database (option image 2)
        $file_tmp_3 = $_FILES['img_opt3']['tmp_name'];
        $dst3 = "./option_images/" . $tm . $opt3;
        $file_destination_3 = "option_images/" . $tm . $opt3; // untuk database
        move_uploaded_file($file_tmp_3, $dst3);

        mysqli_query($link, "update questions set question='$_POST[img_question]', option_3='$file_destination_3' where id_question=$id") or die(mysqli_error($link));
    }

    // untuk update pada pertanyaan dan option 4
    if ($opt4 != "")
    {
        unlink($option_4);
        // untuk penamaan file dan direktori pada database (option image 3)
        $file_tmp_4 = $_FILES['img_opt4']['tmp_name'];
        $dst4 = "./option_images/" . $tm . $opt4;
        $file_destination_4 = "option_images/" . $tm . $opt4;
        move_uploaded_file($file_tmp_4, $dst4);
        
        mysqli_query($link, "update questions set question='$_POST[img_question]', option_4='$file_destination_4' where id_question=$id") or die(mysqli_error($link));
    }

    // untuk update pada pertanyaan dan answer
    if ($answer != "")
    {
        unlink($answer_db);
        // untuk penamaan file dan direktori pada database (option image 4)
        $file_tmp_5 = $_FILES['img_answer_opt']['tmp_name'];
        $dst5 = "./option_images/" . $tm . $answer;
        $file_destination_5 = "option_images/" . $tm . $answer;
        move_uploaded_file($file_tmp_5, $dst5);  
        
        mysqli_query($link, "update questions set question='$_POST[img_question]', answer='$file_destination_5' where id_question=$id") or die(mysqli_error($link));
        
    }

    // untuk update pertanyaan saja tanpa gambar yang lain
    mysqli_query($link, "update questions set question='$_POST[img_question]' where id_question=$id") or die(mysqli_error($link));

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