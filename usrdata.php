<?php
session_start();
if(isset($_SESSION['ud'])&&isset($_SESSION['page'])){

}else{
    // header("Location: /"); 
    
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
    .footer {
        top: 72vh;
        overflow: hidden;
        height: 30vh;
        background-image: url("./img/b_2.png");
    }

    .datepickers {
        position: absolute;
        top: 30vh;
        left: 7.5vw;
        height: 8vh;
        width: 85vw;
        margin: 0 100;
        border-radius: 30px;
        opacity: 0.5;
        background-color: #FFFFFF;
        overflow: hidden;
    }

    .datepicker {
        float: left;
        height: 100%;
        width: 33%;
        /* margin-left: 4%;
        margin-top: 3%; */
        /* border-radius: 15px; */
        opacity: 0.8;
        border: #000000 1px solid;
        background-color: #11aaFF;
        overflow: hidden;
    }

    /* .datepicker_contant {
        font-size: 7vw;

    } */

    .nosocial {
        position: absolute;
        top: 60vh;
        left: 27.5vw;
        height: 7vw;
        width: 45vw;
        margin: 0 100;
        border-radius: 50px;
        background-color: #FFFFFF;
        opacity: 0.5;
        overflow: scroll;

        overflow: hidden;
    }

    #nosocial_content {
        overflow: hidden;
        word-wrap: break-word;
        margin-top: 0.5vh;
        text-align: center;
        font-size: 5vw;
    }

    .btns {
        position: absolute;
        top: 45vh;
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
        alert("aAAA");
        // document.forms[0].submit();
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
            <div class="datepickers">
                <!-- <div class="datepicker" id="datepicker_1">
                    <a class="datepicker_contant">2021 </a>
                </div>
                <div class="datepicker" id="datepicker_2"></div>
                <div class="datepicker" id="datepicker_3"></div> -->

            </div>
            <form id=" fom" action="./usrdata.php" method="POST">

                <div class="nosocial" onclick="document.forms[0].submit()">
                    <h2 class="text" id="nosocial_content">我沒有社群帳號</h2>
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