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
?>
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pilih kategori ujian untuk menambahkan pertanyaan</h1>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Waktu Ujian</th>
                                    <th scope="col">Tambahkan / Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                $res = mysqli_query($link, "select * from quiz");

                                while ($row = mysqli_fetch_array($res)) 
                                {
                                    $count = $count + 1;
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $count; ?>
                                            </th>
                                            <td><?php echo $row["category"]?></td>
                                            <td><?php echo $row["exam_time_in_minute"] ?></td>
                                            <td><a href="add_edit_questions.php?id=<?php echo $row["id_exam"] ?>">Pilih</a></td>
                                        </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!--/.col-->
        </div><!--/.row-->
    </div> <!--/.animated FadeIn-->
</div>

<?php
include_once "footer.php";
?>