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

?>

<!doctype html>
<html lang="en">
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>

<style>
    /* Background */
    body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: linear-gradient(to right,
        rgba(196,196,196,1) 0%,
        rgba(191,191,191,1) 44%,
        rgba(222,220,218,1) 100%);
        animation: fadeBg 1.6s ease-in-out;
    }

    @keyframes fadeBg {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Header */
    #topHeader {
        width: 100%;
        padding: 20px 0;
        text-align: center;
        background: rgba(59,59,59,1);
        color: rgba(215,215,215,1);
        font-size: 28px;
        font-weight: bold;
        box-shadow: 0px 15px 35px rgba(107,90,107,1);
        border-radius: 0 0 10px 10px;
        animation: slideDown 1s ease-out;
    }

    @keyframes slideDown {
        from { transform: translateY(-40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .tag {
        font-size: 18px;
        color: rgba(253,146,40,1);
        display: block;
        margin-top: 6px;
        font-weight: bold;
        text-decoration: underline;
    }

    /* Main Box */
    #content {
        width: 450px;
        margin: 80px auto;
        padding: 30px;
        background: rgba(255,255,255,0.55);
        backdrop-filter: blur(4px);
        border-radius: 12px;
        text-align: center;
        box-shadow: 0px 10px 30px rgba(0,0,0,0.25);
        animation: fadeUp 1.3s ease;
    }

    @keyframes fadeUp {
        from { transform: translateY(40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .SubHead {
        font-size: 22px;
        font-weight: bold;
        color: rgba(207,103,0,1);
        text-shadow: 0px 0px 4px rgba(255,255,255,0.8);
    }

    /* Buttons */
    a.button {
        display: block;
        width: 80%;
        margin: 10px auto;
        padding: 12px;
        background: rgba(59,59,59,1);
        color: white;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.3s ease;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.25);
    }

    a.button:hover {
        background: rgba(207,103,0,1);
        color: white;
        transform: scale(1.05);
        box-shadow: 0px 6px 20px rgba(0,0,0,0.35);
    }

</style>
</head>

<body>

    <div id="topHeader">
        DBMS PROJECT
        <span class="tag">STUDENT FEEDBACK SYSTEM</span>
    </div>

    <div id="content">
        <span class="SubHead">Welcome Admin <?php echo $name; ?></span>
        <br><br>

        <a href="feeds.php" class="button">Feedback</a>
        <a href="manageFaculty.php" class="button">Manage Faculty</a>

        <br><br>

        <a href="changePass.php" class="button">Change Password</a>
        <a href="logout.php" class="button">Logout</a>
    </div>

</body>
</html>
