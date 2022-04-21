<?php
session_start();
include_once "../connection.php";

$question_no = "";
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";

$que_no = $_GET["question_no"];

if (isset($_SESSION["answer"][$que_no])) 
{
    $ans = $_SESSION["answer"][$que_no];
}

$res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' && question_no=$_GET[question_no]");
$count = mysqli_num_rows($res);

if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($res)) 
    {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $opt1 = $row["option_1"];
        $opt2 = $row["option_2"];
        $opt3 = $row["option_3"];
        $opt4 = $row["option_4"];
    }

    ?>
    <br>

    <table>
        <tr>
            <td style="font-weight: bold; font-size: 18px; padding-left: 5px;" colspan="2">
                <?php
                    echo $question_no . ". " . $question;
                ?>
            </td>
        </tr>
    </table>

    <table>
        <!-- option1 -->
        <tr>
            <td>
                <input type="radio" name="radio1" id="radio1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                <?php
                if ($ans == $opt1) 
                {
                    echo "checked";
                } 
                ?>>
            </td>

            <td style="padding-left: 10px;">
                <?php
                if (strpos($opt1, 'images/') != false)
                {
                    ?>
                    <img src="admin/<?php echo $opt1; ?>" height="500" width="500" alt="Option 1">
                    <?php
                } else {
                    echo $opt1;
                }
                ?>
            </td>
        </tr>

        <!-- option2 -->
        <tr>
            <td>
                <input type="radio" name="radio1" id="radio1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                <?php
                if ($ans == $opt2) 
                {
                    echo "checked";
                } 
                ?>>
            </td>

            <td style="padding-left: 10px;">
                <?php
                if (strpos($opt2, 'images/') != false)
                {
                    ?>
                    <img src="admin/<?php echo $opt2; ?>" height="500" width="500" alt="Option 2">
                    <?php
                } else {
                    echo $opt2;
                }
                ?>
            </td>
        </tr>

        <!-- option3 -->
        <tr>
            <td>
                <input type="radio" name="radio1" id="radio1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                <?php
                if ($ans == $opt3)
                {
                    echo "checked";
                } 
                ?>>
            </td>

            <td style="padding-left: 10px;">
                <?php
                if (strpos($opt3, 'images/') != false)
                {
                    ?>
                    <img src="admin/<?php echo $opt3; ?>" height="500" width="500" alt="Option 3">
                    <?php
                } else {
                    echo $opt3;
                }
                ?>
            </td>
        </tr>

        <!-- option4 -->
        <tr> 
            <td>
                <input type="radio" name="radio1" id="radio1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                <?php
                if ($ans == $opt4) 
                {
                    echo "checked";
                } 
                ?>>
            </td>

            <td style="padding-left: 10px;">
                <?php
                if (strpos($opt4, 'images/') != false)
                {
                    ?>
                    <img src="admin/<?php echo $opt4; ?>" height="500" width="500" alt="">
                    <?php
                } else {
                    echo $opt4;
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
}
?>
