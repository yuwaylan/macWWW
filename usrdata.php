<?php
session_start();

if(isset($_SESSION['score'])){
     header("Location: /feback.php"); 
}

?>




<!DOCTYPE html>
<html>

    <head>
        <title>大數據人格分析</title>
        <meta charset="utf-8">
        <script src="js/jquery.min.js">
        </script>
        <link rel=stylesheet type="text/css" href="css/mycss.css">
        <!-- <meta http-equiv="refresh" content=""> -->
    </head>
    <style>
    /* Removes the clear button from date inputs */
    input[type="date"]::-webkit-clear-button {
        display: none;
    }

    /* Removes the spin button */
    input[type="date"]::-webkit-inner-spin-button {
        display: none;
    }

    /* Always display the drop down caret */
    input[type="date"]::-webkit-calendar-picker-indicator {
        color: #2c3e50;
    }

    /* A few custom styles for date inputs */
    input[type="date"] {
        appearance: none;
        -webkit-appearance: none;
        color: #95a5a6;
        font-size: 5vw;
        border: 1px solid #ecf0f1;
        background: #ecf0f1;
        padding: 5px;
        display: inline-block !important;
        visibility: visible !important;
    }

    input[type="date"],
    focus {
        color: #95a5a6;
        box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
    }

    center {
        position: absolute;
        top: 35vh;
        left: 28vw;
    }

    /* 
        -----------------------------------------------------------------------        
    */


    .footer {
        top: 72vh;
        overflow: hidden;
        height: 30vh;
        background-image: url("./img/b_2.png");
    }


    .explan {
        position: absolute;
        margin: 0;
        margin-top: -8vw;
        opacity: 0.7;
        /* top: 28vh; */
        /* left: 28vw; */
        font-size: 5vw;
    }

    .gender {
        position: absolute;
        top: 50vh;
        left: 28vw;
    }

    .selections {
        width: 45vw;
        height: 8vw;
        font-size: 5vw;
        opacity: 0.7;
        background-color: #ffffff;
    }

    .select_item {
        font-size: 1vw;
    }




    .btns {
        position: absolute;
        top: 60vh;
        height: 10vh;
        width: 100vw;
        margin: 0 100;
    }

    .btn {
        height: 8vw;
        margin-left: 0;
        left: 37.5vw;
    }

    #btn_continue {
        word-wrap: break-word;
        margin-top: 0.2vh;
        text-align: center;
        font-size: 5vw;
        color: #FFFFFF;
    }


    #agree {
        background-color: #da8a6f;
    }
    </style>

    <script>
    $(function() {});


    function chk() {
        var birth = $("#birth").val();
        if (birth == "") {
            alert("請填寫出生日期");
            window.location.reload();
        } else if (2021 - eval(birth.slice(0, 4)) <= 6) {
            console.log(eval(birth.slice(0, 4) - 2021));
            alert("你太年輕了!");
            window.location.reload();
        }
        console.log(birth.slice(0, 4));




        var gender = $("#gender").val();
        var ud = "<?php if(isset($_SESSION['ud'])){echo $_SESSION['ud'];} ?>";
        var send = "hdnif.php/?ud=" + ud + "&bt=" + birth + "&gd=" + gender + "&isme=" + 1;
        $('#fom').attr("action", send);
        console.log($('#fom').attr("action"));

        document.forms[0].submit();
    }
    </script>

    <body>

        <div class="mainbody">
            <div class="header">
                <div class="title">
                    <h2 id="title_content">基本資料調查</h2>
                </div>
            </div>
            <div class="footer"></div>

            <center>
                <h3 class="explan">出生日期</h3><input id="birth" value="1998-01-26" type="date" required="required">
            </center>
            <form id="fom" action="" method="POST">

                <div class="gender">
                    <h3 class="explan">性別 </h3>
                    <div class="selections">
                        <select class="selections" name="g" id="gender">
                            <option class="select_item" value="male">男生</option>
                            <option class="select_item" value="female">女生</option>
                            <option class="select_item" value="other">其他</option>
                        </select>
                    </div>
                </div>


                <div class="btns">
                    <div class="btn" id="agree" onclick="chk()">
                        <h2 class="text" id="btn_continue">送出</h2>
                    </div>
                </div>
            </form>

        </div>
    </body>

</html>