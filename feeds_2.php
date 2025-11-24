<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

if(!empty($_POST))
{
	$faculty_id=$_POST['faculty_id'];
	//Fetch Name
	$name = mysqli_fetch_array(mysqli_query($al,"SELECT * FROM faculty WHERE faculty_id='".$faculty_id."'"));
	$subject=$_POST['subject'];
	$sql=mysqli_query($al,"select * from feeds where faculty_id='$faculty_id' AND subject='$subject'");
	while($z=mysqli_fetch_array($sql))
	{
		$q1 = $q1 + $z['q1'];
		$q2 = $q2 + $z['q2'];
		$q3 = $q3 + $z['q3'];
		$q4 = $q4 + $z['q4'];
		$q5 = $q5 + $z['q5'];
		$q6 = $q6 + $z['q6'];
		$q7 = $q7 + $z['q7'];
		$q8 = $q8 + $z['q8'];
		$q9 = $q9 + $z['q9'];
		$q10 = $q10 + $z['q10'];
		$total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
		$s++;
		
	}
}
?>
<!doctype html>
<html lang="en">
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="utf-8">
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
        from { transform: translateY(-40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .tag {
        color: rgba(253,146,40,1);
        font-size: 18px;
        margin-top: 5px;
        display: block;
        font-weight: bold;
        text-decoration: underline;
    }

    #content {
        width: 650px;
        margin: 70px auto;
        padding: 25px 35px;
        border: 4px solid rgba(107,107,107,1);
        border-radius: 12px;
        background: rgba(255,255,255,0.45);
        backdrop-filter: blur(6px);
        box-shadow: 0px 6px 20px rgba(0,0,0,0.28);

        animation: fadeUp 1.1s ease;
    }

    @keyframes fadeUp {
        from { transform: translateY(45px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .SubHead {
        font-size: 22px;
        color: rgba(207,103,0,1);
        font-weight: bold;
        text-shadow: 0px 0px 4px rgba(255,255,255,0.8);
    }

    table {
        width: 100%;
        margin-top: 15px;
        border-collapse: collapse;
        background: rgba(255,255,255,0.65);
        border-radius: 10px;
        overflow: hidden;
        animation: fadeIn 1.2s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.97); }
        to { opacity: 1; transform: scale(1); }
    }

    table td {
        padding: 10px 8px;
        font-size: 15px;
        border-bottom: 1px solid rgba(150,150,150,0.6);
        color: rgba(55,55,55,1);
    }

    table tr:last-child td {
        border-bottom: none;
    }

    td:first-child {
        font-weight: bold;
        width: 48%;
    }

    .comment-box {
        padding: 12px;
        background: rgba(255,255,255,0.75);
        border-radius: 8px;
        min-height: 80px;
        margin-top: 10px;
        border: 1px solid rgba(120,120,120,0.6);
        font-style: italic;
    }

    /* Buttons */
    input[type='button'] {
        font-size: 16px;
        padding: 8px 18px;
        margin: 20px 8px 0 8px;
        background: transparent;
        border: 2px solid rgba(107,107,107,1);
        color: rgba(41,41,41,1);
        cursor: pointer;
        border-radius: 6px;
        transition: 0.3s ease;
    }

    input[type='button']:hover {
        background: rgba(41,41,41,1);
        color: white;
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0,0,0,0.25);
    }

</style>
</head>

<body>

    <div id="topHeader">
        DBMS PROJECT
        <span class="tag">STUDENT FEEDBACK SYSTEM</span>
    </div>

    <div id="content">

        <span class="SubHead">Student Feedback Summary</span>

        <table border="0" cellpadding="4" cellspacing="4">
            <tr><td>Faculty Name :</td><td><?php echo $name['name']; ?></td></tr>
            <tr><td>Subject :</td><td><?php echo $subject; ?></td></tr>

            <tr><td>1. Course objectives & assignments :</td><td><?php echo $q1; ?></td></tr>
            <tr><td>2. Communication of ideas :</td><td><?php echo $q2; ?></td></tr>
            <tr><td>3. Expression of expectations :</td><td><?php echo $q3; ?></td></tr>
            <tr><td>4. Availability to assist :</td><td><?php echo $q4; ?></td></tr>
            <tr><td>5. Respect & concern for students :</td><td><?php echo $q5; ?></td></tr>
            <tr><td>6. Interest in course :</td><td><?php echo $q6; ?></td></tr>
            <tr><td>7. Facilitation of learning :</td><td><?php echo $q7; ?></td></tr>
            <tr><td>8. Enthusiasm for subject :</td><td><?php echo $q8; ?></td></tr>
            <tr><td>9. Encourages independent thinking :</td><td><?php echo $q9; ?></td></tr>
            <tr><td>10. Overall Rating :</td><td><?php echo $q10; ?></td></tr>

            <tr><td>Total Students :</td><td><?php echo $s; ?></td></tr>
            <tr><td>Total Score :</td><td><?php echo $total; ?></td></tr>

            <tr>
                <td colspan="2" align="center"><b>Comments</b></td>
            </tr>

            <tr>
                <td colspan="2">
                    <div class="comment-box">
                        <?php  
                        $cc = mysqli_query($al, "SELECT * FROM comments WHERE faculty_id = '".$faculty_id."' ORDER BY id DESC");
                        while($pr = mysqli_fetch_array($cc)) {
                            echo "• ".$pr['comment']."<br>";
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </table>

        <input type="button" onClick="window.print();" value="PRINT">
        <input type="button" onClick="window.location='feeds.php'" value="BACK">

    </div>

</body>
</html>
