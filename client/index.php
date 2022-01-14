<?php
    include "db_connect.php";
?>
<html>
<head>
    <title>Test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
        .unit {
            position: relative;
            width: 60px;
            height: 60px;
            border-radius: 100%;
            background-color: green;
            border: 3px solid black;
            top: 0;
            left: 0;
        }
        .el {
            background-color: #dac99f;
            background-size: contain;
            width: 200px;
            height: 200px;
        }
        .el_click{
            background-color: #7c1d8d;
            width: 200px;
            height: 200px;
        }
        #send{
            color: #568595;
        }
    </style>
</head>
<body id="wrapper">
    <div id="send"></div>
    <input type="text" id="id_user" value='<?=$_SESSION["user_id"]?>' hidden>
    <input type="text" id="color" value='<?=$_SESSION["color"]?>' hidden>
    <input type="text" id="name" value='<?=$_POST['name']?>' hidden>
    <table id="table">
        <tdoby>
            <tr>
                <th class="el" id="1" onclick="getId(id)"></th>
                <th class="el" id="2" onclick="getId(id)"></th>
                <th class="el" id="3" onclick="getId(id)"></th>
            </tr>
            <tr>
                <th class="el" id="4" onclick="getId(id)"></th>
                <th class="el" id="5" onclick="getId(id)"></th>
                <th class="el" id="6" onclick="getId(id)"></th>
            </tr>
            <tr>
                <th class="el" id="7" onclick="getId(id)"></th>
                <th class="el" id="8" onclick="getId(id)"></th>
                <th class="el" id="9" onclick="getId(id)"></th>
            </tr>
        </tdoby>
    </table>
    <script src="app.js"></script>
</body>
</html>