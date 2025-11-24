<?php
include "configASL.php";
session_start();
if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}
//Fetch Faculty Name
$nm = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='".$_SESSION['faculty_id']."'"));
$_SESSION['name'] = $nm['name'];
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
        
        animation: fadeBg 2s ease-in-out;
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
        from { transform: translateY(-40px); opacity: 0; }
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
        width: 500px;
        margin: 80px auto;
        padding: 25px 35px;
        border: 4px solid rgba(107,107,107,1);
        border-radius: 10px;
        background: rgba(255,255,255,0.45);
        backdrop-filter: blur(4px);
        box-shadow: 0px 6px 20px rgba(0,0,0,0.25);

        animation: fadeUp 1.2s ease;
    }

    @keyframes fadeUp {
        from { transform: translateY(40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .SubHead {
        font-size: 20px;
        font-weight: bold;
        color: rgba(207,103,0,1);
        text-shadow: 0px 0px 4px rgba(255,255,255,0.8);
    }

    #table {
        margin-top: 25px;
        display: flex;
        flex-direction: column;
        gap: 18px;
        align-items: center;
        width: 100%;
    }

    .tr {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        gap: 15px;
    }

    label {
        font-size: 17px;
        color: rgba(55,55,55,1);
        font-weight: 600;
        min-width: 100px;
        text-align: right;
    }

    input[type='text'] {
        font-size: 16px;
        padding: 6px;
        background-color: rgba(181,181,181,1);
        border: 1px solid rgba(107,107,107,1);
        border-radius: 5px;
    }

    select {
        font-size: 15px;
        padding: 6px;
        width: 200px;
        background-color: rgba(181,181,181,1);
        border: 1px solid rgba(107,107,107,1);
        border-radius: 5px;
        transition: 0.3s ease;
    }

    select:hover {
        box-shadow: 0 0 8px rgba(207,103,0,0.9);
        transform: scale(1.05);
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
        margin: 25px 10px 0 10px;
        transition: 0.3s ease;
    }

    input[type='submit']:hover,
    input[type='button']:hover {
        background: rgba(41,41,41,1);
        color: white;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.25);
        transform: scale(1.05);
    }
</style>

</head>

<body>

    <div id="topHeader">
        DBMS PROJECT
        <span class="tag">STUDENT FEEDBACK SYSTEM</span>
    </div>

    <div id="content">

        <span class="SubHead">Step III</span>

        <form method="post" action="feedback_step_4.php">

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

                <!-- Subject Selection -->
                <div class="tr">
                    <label>Subject :</label>
                    <select name="subject" required>
                        <option value="NA" disabled selected>-- Select Subject --</option>
                        <?php
                        $x = mysqli_query($al, "select distinct s1, s2 from faculty WHERE faculty_id='".$_SESSION['faculty_id']."'");
                        while ($y = mysqli_fetch_array($x)) {
                        ?>
                            <option value="<?php echo $y['s1']; ?>"><?php echo $y['s1']; ?></option>
                            <option value="<?php echo $y['s2']; ?>"><?php echo $y['s2']; ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>

            <div style="text-align:center;">
                <input type="button" value="BACK" onclick="window.location='feedback_step_2.php'">
                <input type="submit" value="NEXT">
            </div>

        </form>

    </div>

</body>
</html>
