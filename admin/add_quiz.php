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
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambahkan Kategori Ujian</h1>
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
                                        <strong>Tambahkan Kategori Ujian</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="examname" class=" form-control-label">Kategori Ujian Baru</label>
                                            <input type="text" name="examname" placeholder="Tambahkan Kategori Baru" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="examtime" class=" form-control-label">Waktu Ujian</label>
                                            <input type="text" name="examtime" placeholder="Waktu Ujian" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Tambahkan Kategori" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Kategori Ujian</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Ujian</th>
                                                    <th scope="col">Waktu Ujian</th>
                                                    <th scope="col">Kelola</th>
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
                                                            <td><?php echo $row["quiz_name"]?></td>
                                                            <td><?php echo $row["quiz_timer"] ?></td>

                                                            <td>
                                                                <a href="edit_quiz.php?id=<?php echo $row["id_quiz"] ?>" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                </svg>
                                                                </a>

                                                                <a href="delete.php?id=<?php echo $row["id_quiz"]?>" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
    mysqli_query($link, "insert into quiz values(NULL, '$_POST[examname]', '$_POST[examtime]')") or die(mysqli_error($link));
    
    ?>
    <script text="text/javascript">
        alert("Ujian berhasil ditambahkan");
        window.location.href=window.location.href;
    </script>

    <?php
}
?>



<?php
include_once "footer.php";
?>