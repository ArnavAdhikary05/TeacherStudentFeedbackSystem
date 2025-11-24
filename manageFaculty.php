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
	$fc=$_POST['fc'];
	$sub=$_POST['sub'];
	$subb=$_POST['subb'];
	$faculty_id = uniqid();
	$u=mysqli_query($al,"insert into faculty(faculty_id,name,s1,s2) values('$faculty_id','$fc','$sub','$subb')");
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully added');
		</script>
        <?php }
}
		
?>
<!doctype html>
<html>
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>

<style>
/* PAGE BACKGROUND */
body {
    margin: 0;
    background: linear-gradient(to right, #d3d3d3, #bfbfbf, #e7e5e3);
    font-family: "Segoe UI", sans-serif;
    animation: fadeBg 1.2s ease-in-out;
}
@keyframes fadeBg { from { opacity: 0; } to { opacity: 1; } }

/* HEADER */
#topHeader {
    width: 100%;
    padding: 20px 0;
    text-align: center;
    background: #3b3b3b;
    color: #e6e6e6;
    font-size: 26px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.35);
    border-radius: 0 0 12px 12px;
    animation: slideDown 0.9s ease;
}
@keyframes slideDown {
    from { transform: translateY(-40px); opacity: 0; }
    to   { transform: translateY(0); opacity: 1; }
}

.tag {
    font-size: 18px;
    color: #ff9a32;
    font-weight: bold;
    text-decoration: underline;
}

/* CONTENT BOX */
#content {
    width: 650px;
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(5px);
    padding: 30px 35px;
    border-radius: 14px;
    margin: 60px auto;
    box-shadow: 0 0 25px rgba(0,0,0,0.25);
    animation: fadeUp 1s ease;
}
@keyframes fadeUp {
    from { transform: translateY(40px); opacity: 0; }
    to   { transform: translateY(0); opacity: 1; }
}

.SubHead {
    font-size: 22px;
    color: #cf6700;
    font-weight: bold;
    text-shadow: 0 0 4px rgba(255,255,255,0.8);
}

/* FORMS */
label {
    font-size: 18px;
    color: #333;
    font-weight: 600;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    font-size: 16px;
    border-radius: 7px;
    border: 1px solid #777;
    background: rgba(255,255,255,0.9);
    transition: 0.25s ease;
    outline: none;
}

input[type="text"]:focus {
    border-color: #cf6700;
    box-shadow: 0px 0px 10px rgba(207,103,0,0.55);
}

/* BUTTONS */
input[type="submit"], input[type="button"] {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    background: #3b3b3b;
    color: white;
    transition: 0.3s;
}

input[type="submit"]:hover, input[type="button"]:hover {
    background: #cf6700;
    transform: scale(1.04);
    box-shadow: 0px 4px 15px rgba(0,0,0,0.25);
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(255,255,255,0.85);
    box-shadow: 0 0 18px rgba(0,0,0,0.15);
    border-radius: 10px;
    overflow: hidden;
    animation: fadeTable 1.2s ease;
}

@keyframes fadeTable {
    from { transform: scale(0.96); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
}

table tr:nth-child(even) { background: #f7f7f7; }

table td {
    padding: 12px;
    font-size: 16px;
    border-bottom: 1px solid #ccc;
}

table tr:first-child td {
    background: #3b3b3b;
    color: #fff;
    border: none;
    font-weight: bold;
    text-align: center;
}

/* DELETE LINK */
a.delete-link {
    font-size: 20px;
    text-decoration: none;
    color: red;
    font-weight: bold;
    transition: 0.25s;
}

a.delete-link:hover {
    color: #a30000;
    text-shadow: 0px 0px 8px rgba(255,0,0,0.5);
    transform: scale(1.2);
}
</style>

</head>

<body>

<div id="topHeader">
    DBMS PROJECT<br>
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>

<div id="content" align="center">

    <span class="SubHead">Add Faculty</span>
    <br><br>

    <form method="post" action="">
        <label>Faculty:</label>
        <input type="text" name="fc" required placeholder="Enter Faculty Name">

        <br><br>

        <label>Subject I:</label>
        <input type="text" name="sub" required placeholder="Enter Subject">

        <br><br>

        <label>Subject II:</label>
        <input type="text" name="subb" required placeholder="Enter Subject">

        <input type="submit" value="ADD FACULTY">
    </form>

    <br><br>

    <span class="SubHead">Manage Faculty</span>
    <br><br>

    <table>
        <tr>
            <td>Sr. No.</td>
            <td>Name</td>
            <td>Subject I</td>
            <td>Subject II</td>
            <td>Delete</td>
        </tr>

        <?php
        $sr=1;
        $h=mysqli_query($al,"select * from faculty");
        while($j=mysqli_fetch_array($h)) { ?>
        <tr>
            <td><?php echo $sr; $sr++; ?></td>
            <td><?php echo $j['name']; ?></td>
            <td><?php echo $j['s1']; ?></td>
            <td><?php echo $j['s2']; ?></td>
            <td align="center">
                <a class="delete-link"
                   href="delete.php?del=<?php echo $j['id'];?>"
                   onclick="return confirm('Are you sure?')">[x]</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <input type="button" onclick="window.location='home.php'" value="BACK">

</div>

</body>
</html>
