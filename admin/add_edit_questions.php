<?php
include_once "header.php";
include_once "../connection.php";

$id = $_GET["id"];
$id1 = $_GET["id1"]; // ini untuk id yang quiz
$quiz = '';
$res = mysqli_query($link, "select * from quiz where id_exam=$id");

while ($row = mysqli_fetch_array($res)) {
    $quiz = $row["category"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambahkan Pertanyaan pada Kategori <?php echo "<p style='color: blue; font-weight: bold; display: inline;'>" . $quiz . "</p>"; ?></h1>
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

                        <!-- Menambahkan pertanyaan dengan teks saja -->
                        <div class="col-lg-6">
                            <form name="form1" action="" method="post">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah Pertanyaan Baru (dengan teks)</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class=" form-control-label">Pertanyaan</label>
                                            <input type="text" name="question" placeholder="Tambah Pertanyaan" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 1</label>
                                            <input type="text" name="opt1" placeholder="Opsi 1" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 2</label>
                                            <input type="text" name="opt2" placeholder="Opsi 2" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 3</label>
                                            <input type="text" name="opt3" placeholder="Opsi 3" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 4</label>
                                            <input type="text" name="opt4" placeholder="Opsi 4" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tentukan Jawaban Benar</label> <br>
                                            <input type="text" name="answer_opt" placeholder="Jawaban Benar" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit3" value="Tambahkan Pertanyaan" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Menambahkan Pertanyaan dengan Gambar -->
                        <div class="col-lg-6">
                            <form name="form2" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah Pertanyaan Baru (dengan gambar)</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class=" form-control-label">Pertanyaan</label>
                                            <input type="text" placeholder="Pertanyaan" name="img_question" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 1</label>
                                            <input type="file" name="img_opt1" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 2</label>
                                            <input type="file" name="img_opt2" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 3</label>
                                            <input type="file" name="img_opt3" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Tambahkan Opsi 4</label>
                                            <input type="file" name="img_opt4" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Jawaban Benar</label> <br>
                                            <input type="file" name="img_answer_opt" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit4" value="Tambahkan Pertanyaan" class="btn btn-success">
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

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Questions</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            
            <?php

            $res = mysqli_query($link, "select * from questions where category='$quiz' order by question_no asc");

            while ($row = mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["question_no"]; echo "</td>";
                echo "<td>"; echo $row["question"]; echo "</td>";

                // mengubah direktori gambar menjadi image dengan lebar 50x50 pada option 1
                echo "<td>";
                if (strpos($row["option_1"], 'option_images/') !== false)
                {
                    ?>
                        <img src="<?php echo $row["option_1"]; ?>" height="50" width="50">
                    <?php
                } else {
                    echo $row["option_1"];
                }
                echo "</td>";

                // mengubah direktori gambar menjadi image dengan lebar 50x50 pada option 2
                echo "<td>";
                if (strpos($row["option_2"], 'option_images/') !== false)
                {
                    ?>
                        <img src="<?php echo $row["option_2"]; ?>" height="50" width="50">
                    <?php
                } else {
                    echo $row["option_2"];
                }
                echo "</td>";

                // mengubah direktori gambar menjadi image dengan lebar 50x50 pada option 3
                echo "<td>";
                if (strpos($row["option_3"], 'option_images/') !== false)
                {
                    ?>
                        <img src="<?php echo $row["option_3"]; ?>" height="50" width="50">
                    <?php
                } else {
                    echo $row["option_3"];
                }
                echo "</td>";

                // mengubah direktori gambar menjadi image dengan lebar 50x50 pada option 2
                echo "<td>";
                if (strpos($row["option_4"], 'option_images/') !== false)
                {
                    ?>
                        <img src="<?php echo $row["option_4"]; ?>" height="50" width="50">
                    <?php
                } else {
                    echo $row["option_4"];
                }
                echo "</td>";

                echo "<td>";
                if (strpos($row["answer"], 'option_images/') !== false)
                {
                    ?>
                    <!-- Jika ini adalah gambar maka masuk kesini -->
                    <a href="edit_option_images.php?id=<?php echo $row['id_question'] ?> &id1=<?php echo $id; ?>">Ubah</a>
                    <?php
                }

                else {
                    ?>
                    <!-- Jika ini adalah teks biasa maka masuk kesini -->
                    <a href="edit_option.php?id=<?php echo $row['id_question'] ?> &id1=<?php echo $id; ?>">Ubah</a>
                    <?php
                }
                echo "</td>";

                echo "<td>";
                ?>
                <a href="delete_option.php?id=<?php echo $row['id_question'] ?> &id1=<?php echo $id; ?>">Hapus</a>
                <?php
                echo "</td>";
                
                echo "</tr>";
            }
            ?>
            </table>
        </div>
    </div>  
</div>

<?php

if (isset($_POST["submit3"])) 
{

    // nama variabel untuk mendapatkan data dari form
    $question = $_POST["question"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    $answerOpt = $_POST["answer_opt"];
    
    $loop = 0; // untuk looping
    $count = 0; 
    $res = mysqli_query($link, "select * from questions where category='$quiz' order by id_question asc") or die(mysqli_error($link));

    $count = mysqli_num_rows($res);

    if ($count != 0)
    {
        while ($row = mysqli_fetch_array($res)) 
        {
            $loop = $loop + 1;
            echo $loop;
            mysqli_query($link, "update questions set question_no='$loop' where id_question=$row[id_question]");
        }
    }

    $loop = $loop + 1;
    mysqli_query($link, "insert into questions values (NULL,'$loop','$question','$opt1','$opt2','$opt3','$opt4','$answerOpt','$quiz')") or die(mysqli_error($link));

    ?>
    <script>
        alert("Pertanyaan berhasil ditambahkan");
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<!-- untuk menambahkan ke sql yang bagian gambar -->
<?php

if (isset($_POST["submit4"])) 
{    
    $loop = 0; // untuk looping
    $count = 0; 
    $res = mysqli_query($link, "select * from questions where category='$quiz' order by id_question asc") or die(mysqli_error($link));

    $count = mysqli_num_rows($res);

    if ($count != 0)
    {
        while ($row = mysqli_fetch_array($res)) 
        {
            $loop = $loop + 1;
            echo $loop;
            mysqli_query($link, "update questions set question_no='$loop' where id_question=$row[id_question]");
        }
    }

    $loop = $loop + 1;

    $tm = md5(time());
    $dir = '/option_images';

    // untuk penamaan file dan direktori pada database (option image 1)
    $file_tmp_1 = $_FILES['img_opt1']['tmp_name'];
    $file_name_1 = $_FILES['img_opt1']['name']; // file_name
    $dst1 = "./option_images/" . $tm . $file_name_1;
    $file_destination_1 = "option_images/" . $tm . $file_name_1;
    move_uploaded_file($file_tmp_1, $dst1);

    // untuk penamaan file dan direktori pada database (option image 2)
    $file_tmp_2 = $_FILES['img_opt2']['tmp_name'];
    $file_name_2 = $_FILES["img_opt2"]["name"];
    $dst2 = "./option_images/" . $tm . $file_name_2;
    $file_destination_2 = "option_images/" . $tm . $file_name_2;
    move_uploaded_file($file_tmp_2, $dst2);

    // untuk penamaan file dan direktori pada database (option image 3)
    $file_tmp_3 = $_FILES['img_opt3']['tmp_name'];
    $file_name_3 = $_FILES["img_opt3"]["name"];
    $dst3 = "./option_images/" . $tm . $file_name_3;
    $file_destination_3 = "option_images/" . $tm . $file_name_3;
    move_uploaded_file($file_tmp_3, $dst3);

    // untuk penamaan file dan direktori pada database (option image 4)
    $file_tmp_4 = $_FILES['img_opt4']['tmp_name'];
    $file_name_4 = $_FILES["img_opt4"]["name"];
    $dst4 = "./option_images/" . $tm . $file_name_4;
    $file_destination_4 = "option_images/" . $tm . $file_name_4;
    move_uploaded_file($file_tmp_4, $dst4);

    // untuk penamaan file dan direktori pada database (option image answer)
    $file_tmp = $_FILES['img_answer_opt']['tmp_name'];
    $file_name_5 = $_FILES["img_answer_opt"] ["name"];
    $dst5 = "./option_images/" . $tm . $file_name_5;
    $file_destination_5 = "option_images/" . $tm . $file_name_5;
    move_uploaded_file($file_tmp, $dst5);

    mysqli_query($link, "insert into questions values (NULL,'$loop','$_POST[img_question]','$file_destination_1','$file_destination_2','$file_destination_4','$file_destination_4','$file_destination_5','$quiz')") or die(mysqli_error($link));

    ?>
    <script>
        alert("Pertanyaan berhasil ditambahkan");
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<?php
include_once "footer.php";
?> 