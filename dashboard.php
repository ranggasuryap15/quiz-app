<?php
session_start();
include_once "header.php";
?>

    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <!-- Start editing -->
            <br>
            <div class="row">
                <br>
                <div class="col-lg-2 col-lg-push-10">
                    <div id="current_que" style="float: left;">0</div>
                    <div style="float: left;">/</div>
                    <div id="total_que" style="float: left;">0</div>
                </div>

                <div class="row" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white;" id="load_questions">

                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
                        <div class="col-lg-12 text-center">
                            <input type="button" class="btn btn-warning" value="Sebelumnya" onclick="load_previous();">&nbsp;
                            <input type="button" class="btn btn-success" value="Selanjutnya" onclick="load_next();">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End here ediitng -->
        </div>

    </div>

    <script type="text/javascript">
        // untuk memuat jumlah dari pertanyaan untuk ditampilkan di halaman
        function load_total_que() {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/load_total_que.php",true);
            xmlhttp.send(null);
        }

        var question_no = "1";
        load_questions(question_no);

        // sebuah function untuk memuat pertanyaan-pertanyaan yang ada di database
        function load_questions(question_no) {
            document.getElementById("current_que").innerHTML = question_no;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "over") {
                        window.location = "result.php";
                    } else {
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_que();
                    }
                }
            };
            xmlhttp.open("GET","forajax/load_questions.php?question_no=" + question_no,true);
            xmlhttp.send(null);
        }

        function radioclick(radiovalue, question_no)
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/save_answer_in_session.php?question_no="+ question_no +"&value1="+radiovalue,true);
            xmlhttp.send(null);
        }

        // sebuah function untuk kembali kepada pertanyaan sebelumnya
        function load_previous() {
            if (question_no == "1") {
                load_questions(question_no);
            } else {
                question_no = eval (question_no) - 1;
                load_questions(question_no);
            }
        }

        // tujuannya untuk kembali kepada pertanyaan selanjutnya
        function load_next() {
            question_no = eval (question_no) + 1;
            load_questions(question_no);
        }
    </script>

<?php
    include_once "footer.php";
?>
</body>

</html>