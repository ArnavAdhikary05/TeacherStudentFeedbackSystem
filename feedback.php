<!DOCTYPE html>
<html lang="en">
<!-- Designed & Developed by Arnab Adhikary (arnabadhikary35@gmail.com) | Not for Commercial Use -->
<head>
<meta charset="UTF-8">
<title>Student Feedback System</title>

<style>
    /* ---- Page Background ---- */
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

    /* ---- Header ---- */
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

    /* ---- Main Card ---- */
    #content {
        width: 480px;
        margin: 80px auto;
        padding: 20px 30px;
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

    /* ---- Form Table ---- */
    #table {
        margin-top: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    label {
        font-size: 17px;
        color: rgba(55,55,55,1);
        font-weight: 600;
    }

    /* ---- Select Box ---- */
    select {
        font-size: 15px;
        padding: 6px;
        width: 160px;
        background-color: rgba(181,181,181,1);
        border: 1px solid rgba(107,107,107,1);
        border-radius: 5px;
        transition: 0.3s ease;
    }

    select:hover {
        box-shadow: 0 0 8px rgba(207,103,0,0.9);
        transform: scale(1.05);
    }

    /* ---- Buttons ---- */
    input[type='submit'], 
    input[type='button'] {
        font-size: 17px;
        padding: 8px 15px;
        background: transparent;
        border: 2px solid rgba(107,107,107,1);
        color: rgba(41,41,41,1);
        cursor: pointer;
        border-radius: 6px;
        margin: 20px 10px 0 10px;
        transition: 0.3s ease;
    }

    input[type='submit']:hover,
    input[type='button']:hover {
        background: rgba(41,41,41,1);
        color: white;
        transform: translateY(-3px);
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
        <span class="SubHead">Student Feedback — Step I</span>

        <form method="post" action="feedback_step_2.php">
            <div id="table">
                <label style="margin-right:15px;">Roll No :</label>

                <select name="roll" required>
                    <option value="NA" disabled selected>-- Select Roll No --</option>
                    <?php
                        for($x = 1; $x <= 200; $x++) {
                    ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div style="text-align:center;">
                <input type="button" value="BACK" onclick="window.location='index.php'">
                <input type="submit" value="NEXT">
            </div>
        </form>
    </div>

</body>
</html>
