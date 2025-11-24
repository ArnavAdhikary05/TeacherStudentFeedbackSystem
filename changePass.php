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
$old=$y['password'];

if(!empty($_POST))
{
	$p1=sha1($_POST['p1']);
	$p2=sha1($_POST['p2']);
	if($old==$p1)
	{
		$u=mysqli_query($al,"update admin set password='$p2' where aid='$aid'");
	}
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully changed password');
		</script>
        <?php } else { ?> <script type="application/javascript">
		alert('Incorrect old password');
		</script><?php }
}
		
?>
<!doctype html>
<html lang="en">
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>

<style>
    /* Background Gradient (Original Theme) */
    body {
        margin: 0;
        background: linear-gradient(to right, #c4c4c4 0%, #bfbfbf 44%, #dedcda 100%);
        font-family: "Segoe UI", sans-serif;
        animation: fadeInBody 1s ease-in-out;
    }

    @keyframes fadeInBody {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Header Styling */
    #topHeader {
        width: 100%;
        text-align: center;
        background-color: rgba(59,59,59,1);
        color: rgba(215,215,215,1);
        padding: 20px 0;
        font-size: 26px;
        box-shadow: 0px 15px 35px rgba(107,90,107,1);
        animation: slideDown 1s ease;
    }

    @keyframes slideDown {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .tag {
        display: block;
        margin-top: 6px;
        font-size: 18px;
        color: rgba(253,146,40,1);
        font-weight: bold;
        text-decoration: underline;
    }

    /* Card/Container */
    #content {
        background: rgba(255,255,255,0.35);
        width: 480px;
        margin: 70px auto;
        padding: 40px 45px;
        border-radius: 10px;
        border: 4px solid rgba(107,107,107,1);
        box-shadow: 0 8px 32px rgba(0,0,0,0.25);
        backdrop-filter: blur(4px);
        animation: fadeUp 1.2s ease;
        text-align: center;
    }

    @keyframes fadeUp {
        from { transform: translateY(40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* Title */
    h2.SubHead {
        color: rgba(207,103,0,1);
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 25px;
        text-shadow: 0 0 4px rgba(255,255,255,0.8);
    }

    #table {
        margin-top: 15px;
        width: 100%;
    }

    .tr {
        display: flex;
        justify-content: center;
        margin: 15px 0;
    }

    .td {
        padding: 8px;
        display: flex;
        align-items: center;
    }

    label {
        font-weight: bold;
        font-size: 16px;
        color: rgba(55,55,55,1);
        min-width: 140px;
        text-align: right;
    }

    /* Input Fields */
    input[type=password] {
        padding: 10px 12px;
        width: 230px;
        border-radius: 5px;
        border: 1px solid rgba(107,107,107,1);
        font-size: 14px;
        background: rgba(255,255,255,0.5);
        outline: none;
        transition: 0.3s;
        color: #292929;
    }

    input[type=password]:focus {
        border-color: rgba(207,103,0,1);
        box-shadow: 0 0 8px rgba(207,103,0,0.45);
        transform: scale(1.02);
    }

    /* Buttons */
    input[type=submit],
    input[type=button] {
        padding: 12px 26px;
        margin: 10px 8px 0 8px;
        font-size: 15px;
        border: 1px solid rgba(107,107,107,1);
        background: transparent;
        color: rgba(41,41,41,1);
        border-radius: 6px;
        cursor: pointer;
        font-family: "Trebuchet MS";
        transition: 0.3s ease;
    }

    input[type=submit]:hover,
    input[type=button]:hover {
        background: rgba(41,41,41,1);
        color: white;
        transform: scale(1.05);
        box-shadow: 0 0 12px rgba(41,41,41,0.4);
    }
</style>

</head>

<body>

<!-- Header -->
<header id="topHeader">
    DBMS PROJECT
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</header>

<!-- Main Content Card -->
<section id="content">

    <h2 class="SubHead">Change Password</h2>

    <form method="post" action="">

        <div id="table">

            <!-- Old Password -->
            <div class="tr">
                <div class="td">
                    <label>Old Password :</label>
                </div>
                <div class="td">
                    <input type="password" name="p1" required placeholder="Enter Old Password">
                </div>
            </div>

            <!-- New Password -->
            <div class="tr">
                <div class="td">
                    <label>New Password :</label>
                </div>
                <div class="td">
                    <input type="password" name="p2" required placeholder="Enter New Password">
                </div>
            </div>

        </div>

        <!-- Buttons -->
        <div style="margin-top: 30px;">
            <input type="submit" value="CHANGE PASSWORD">
        </div>

        <div style="margin-top: 12px;">
            <input type="button" value="BACK" onclick="window.location='home.php'">
        </div>

    </form>

</section>

</body>
</html>
