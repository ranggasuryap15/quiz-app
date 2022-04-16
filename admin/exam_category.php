<?php
        include_once "header.php";
        include_once "../connection.php";
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
                                                            <th scope="col">Ubah</th>
                                                            <th scope="col">Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 0;
                                                        $res = mysqli_query($link, "select * from exam_category");
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
                                                                    <td><a href="edit_exam_category.php?id=<?php echo $row["id_exam"] ?>">Ubah</a></td>
                                                                    <td>
                                                                        <a href="delete.php?id=<?php echo $row["id_exam"]?>">Hapus</a>
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
            mysqli_query($link, "insert into exam_category values(NULL, '$_POST[examname]', '$_POST[examtime]')") or die(mysqli_error($link));
            
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