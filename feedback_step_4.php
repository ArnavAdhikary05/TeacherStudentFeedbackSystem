<?php
include "configASL.php";
session_start();

$sql=mysqli_query($al,"select * from feeds where roll='".mysqli_real_escape_string($al,$_POST['roll'])."' AND name='".mysqli_real_escape_string($al,$_POST['faculty'])."' AND subject='".mysqli_real_escape_string($al,$_POST['subject'])."'");

if(mysqli_num_rows($sql)>0)
{
	?>
    <script type="text/javascript">
	alert('Feedback already submitted');
	window.location='feedback_step_3.php';
	</script>
    <?php
}

if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}

if(isset($_POST['subject']))
{
	$_SESSION['subject']=$_POST['subject'];
}
//Fetch Questions
$q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = '1'"));
$parameters = array("Poor","Fair","Good","Very Good","Excellent");
?>
<!DOCTYPE html>
<html lang="en">
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="UTF-8">
<title>Student Feedback System</title>

<style>
    body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;

        background: linear-gradient(to right,
        rgba(196,196,196,1) 0%,
        rgba(191,191,191,1) 44%,
        rgba(222,220,218,1) 100%);

        animation: fadeBg 1.2s ease-in-out;
    }

    @keyframes fadeBg {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    #topHeader {
        width: 100%;
        text-align: center;
        background-color: rgba(59,59,59,1);
        padding: 18px 0;
        font-size: 26px;
        color: rgba(215,215,215,1);
        box-shadow: 0px 15px 35px rgba(107,90,107,1);
        animation: slideDown 1s ease;
    }

    @keyframes slideDown {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .tag {
        color: rgba(253,146,40,1);
        font-size: 18px;
        display: block;
        margin-top: 5px;
        font-weight: bold;
        text-decoration: underline;
    }

    #content {
        width: 600px;
        margin: 70px auto;
        padding: 30px 35px;
        border: 4px solid rgba(107,107,107,1);
        border-radius: 12px;
        background: rgba(255,255,255,0.4);
        backdrop-filter: blur(5px);
        box-shadow: 0px 6px 20px rgba(0,0,0,0.25);
        animation: fadeUp 1.2s ease;
    }

    @keyframes fadeUp {
        from { transform: translateY(40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .SubHead {
        font-size: 22px;
        font-weight: bold;
        color: rgba(207,103,0,1);
        margin-bottom: 10px;
        text-shadow: 0px 0px 4px rgba(255,255,255,0.8);
    }

    #table {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .tr {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    label {
        font-size: 17px;
        color: rgba(55,55,55,1);
        font-weight: 600;
        min-width: 110px;
        text-align: right;
    }

    input[type='text'] {
        font-size: 16px;
        padding: 6px;
        background-color: rgba(181,181,181,1);
        border: 1px solid rgba(107,107,107,1);
        border-radius: 5px;
    }

    hr {
        border: none;
        height: 1px;
        background: rgba(107,107,107,0.4);
        margin: 18px 0;
    }

    .tddd {
        margin: 12px 0;
        padding: 10px 0;
        font-size: 16px;
        color: rgba(55,55,55,1);
        line-height: 1.5;
        background: rgba(255,255,255,0.5);
        border-radius: 8px;
        padding: 14px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
        animation: fadeQuestion 0.6s ease;
    }

    @keyframes fadeQuestion {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    textarea {
        width: 90%;
        padding: 10px;
        resize: none;
        font-size: 16px;
        border-radius: 8px;
        background: rgba(181,181,181,1);
        border: 1px solid rgba(107,107,107,1);
        min-height: 80px;
    }

    input[type='submit'],
    input[type='button'] {
        font-size: 17px;
        padding: 8px 15px;
        background: transparent;
        border: 2px solid rgba(107,107,107,1);
        color: rgba(41,41,41,1);
        cursor: pointer;
        border-radius: 6px;
        margin: 18px 8px 0 8px;
        transition: 0.3s ease;
    }

    input[type='submit']:hover,
    input[type='button']:hover {
        background: rgba(41,41,41,1);
        color: white;
        transform: scale(1.06);
        box-shadow: 0px 5px 15px rgba(0,0,0,0.25);
    }

    .text {
        font-size: 16px;
        font-weight: 500;
    }

</style>

</head>

<body>

    <div id="topHeader">
        DBMS PROJECT
        <span class="tag">STUDENT FEEDBACK SYSTEM</span>
    </div>

    <div id="content">

        <span class="SubHead">Step IV</span>

        <form method="post" action="feedback_step_5.php">

            <div id="table">

                <!-- Roll No -->
                <div class="tr">
                    <label>Roll No :</label>
                    <div>
                        <input type="text" disabled size="5" value="<?php echo $_SESSION['roll']; ?>" />
                        <input type="hidden" name="roll" value="<?php echo $_SESSION['roll']; ?>" />
                    </div>
                </div>

                <!-- Faculty -->
                <div class="tr">
                    <label>Faculty :</label>
                    <div>
                        <input type="text" disabled size="25" value="<?php echo $_SESSION['name']; ?>" />
                        <input type="hidden" name="faculty_id" value="<?php echo $_SESSION['faculty_id']; ?>" />
                    </div>
                </div>

                <!-- Subject -->
                <div class="tr">
                    <label>Subject :</label>
                    <div>
                        <input type="text" disabled size="25" value="<?php echo $_SESSION['subject']; ?>" />
                        <input type="hidden" name="subject" value="<?php echo $_SESSION['subject']; ?>" />
                    </div>
                </div>

            </div>

            <hr>

            <!-- Questions Loop -->
            <?php
            for ($i = 1; $i <= 10; $i++) {
            ?>
                <div class="tddd">
                    <span class="text">
                        <?php echo $i; ?>. <?php echo $q['q' . $i]; ?>:
                        <br><br>
                        <?php
                        for ($j = 1; $j <= 5; $j++) {
                        ?>
                            <label style="font-weight:normal;">
                                <input type="radio" required name="q<?php echo $i; ?>" value="<?php echo $j; ?>">
                                <?php echo $parameters[$j - 1]; ?>
                            </label>&nbsp;&nbsp;
                        <?php } ?>
                    </span>
                </div>
                <hr>
            <?php } ?>

            <!-- Comment Box -->
            <div class="tddd">
                <textarea name="comment" required placeholder="Enter your comments here..."></textarea>
            </div>

            <!-- Buttons -->
            <div style="text-align:center;">
                <input type="button" value="BACK" onclick="window.location='feedback_step_3.php'">
                <input type="submit" value="SUBMIT" onclick="return confirm('Are you sure?')">
            </div>

        </form>

    </div>

</body>
</html>
