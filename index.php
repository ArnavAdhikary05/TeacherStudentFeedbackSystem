<?php
include("configASL.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:home.php");
}
if(!empty($_POST))
{
	$aid=mysqli_real_escape_string($al,$_POST['aid']);
	$pass=mysqli_real_escape_string($al,sha1($_POST['pass']));
	$sql=mysqli_query($al,"select * from admin where aid='$aid' and password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:home.php");
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect Admin ID or Password");
		</script>
      <?php
	}
}
?>
<!doctype html>
<html lang="en">
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="UTF-8">
<title>Student Feedback System</title>

<style>
    /* ------------------ GLOBAL BACKGROUND ------------------ */
    body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: linear-gradient(to right,
        rgba(196,196,196,1) 0%,
        rgba(191,191,191,1) 44%,
        rgba(222,220,218,1) 100%);
        animation: fadeBg 1.5s ease-in-out;
    }

    @keyframes fadeBg {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* ------------------ HEADER ------------------ */
    #topHeader {
        width: 100%;
        padding: 22px 0;
        text-align: center;
        background-color: rgba(59,59,59,1);
        color: rgba(215,215,215,1);
        font-size: 28px;
        font-weight: bold;
        box-shadow: 0px 15px 35px rgba(107,90,107,0.8);
        animation: slideDown 1s ease;
    }

    @keyframes slideDown {
        from { transform: translateY(-40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .tag {
        display: block;
        font-size: 18px;
        color: rgba(253,146,40,1);
        text-decoration: underline;
        margin-top: 5px;
        font-weight: bold;
    }

    /* ------------------ CONTENT BOX ------------------ */
    #content {
        width: 420px;
        background: rgba(255,255,255,0.55);
        backdrop-filter: blur(6px);
        padding: 30px;
        border-radius: 12px;
        margin: 80px auto 20px auto;
        box-shadow: 0px 8px 25px rgba(0,0,0,0.25);
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
        text-shadow: 0px 0px 4px rgba(255,255,255,0.7);
    }

    label {
        font-size: 16px;
        color: #444;
        display: block;
        text-align: left;
        margin-top: 12px;
    }

    /* ------------------ INPUT FIELDS ------------------ */
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        border-radius: 6px;
        border: 1px solid #888;
        background: rgba(255,255,255,0.9);
        outline: none;
        transition: 0.3s ease;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        border-color: rgba(207,103,0,1);
        box-shadow: 0px 0px 7px rgba(207,103,0,0.7);
    }

    /* ------------------ BUTTON ------------------ */
    input[type="submit"] {
        width: 100%;
        padding: 11px;
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        background: rgba(59,59,59,1);
        color: white;
        transition: 0.3s ease;
    }

    input[type="submit"]:hover {
        background: rgba(207,103,0,1);
        transform: scale(1.03);
        box-shadow: 0px 4px 15px rgba(0,0,0,0.3);
    }

    /* ------------------ LINKS ------------------ */
    a.link {
        color: #333;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s ease;
    }

    a.link:hover {
        color: #ff0004;
    }

</style>
</head>

<body>

    <div id="topHeader">
        DBMS PROJECT
        <span class="tag">STUDENT FEEDBACK SYSTEM</span>
    </div>

    <div id="content" align="center">
        <span class="SubHead">Admin Login</span>

        <form method="post" action="">
            <label>Admin ID:</label>
            <input type="text" name="aid" required />

            <label>Password:</label>
            <input type="password" name="pass" required />

            <input type="submit" value="Login" />
        </form>
    </div>

    <center>
        <span class="SubHead" style="font-weight:300;">
            Student Feedback <a href="feedback.php" class="link">Click Here</a>
        </span>
    </center>

</body>
</html>
