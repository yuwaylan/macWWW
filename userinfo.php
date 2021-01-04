<?php
session_start();
if(isset($_SESSION['page'])&& $_SESSION['page']==2){

}else{
    // header("Location: /"); 
    // echo "session : ". $_SESSION['page'];
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

    .social_login {
        background-image: url("./img/fblogin.png");
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: 0 -3.5vw;
        position: absolute;
        top: 30vh;
        left: 15vw;
        height: 6vh;
        width: 70vw;
        margin: 0 100;
        border-radius: 30px;
        background-color: #FFFFFF;
        overflow: hidden;
    }

    #social_login_content {
        word-wrap: break-word;
        margin-top: 0.3vh;
        text-align: center;
        font-size: 2.5vw;
    }

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
        /* background-image: url("./img/btn_r.png"); */
        background-color: #da8a6f;
    }
    </style>

    <script>
    $(function() {
        // $('.fb-login-button').setAttribute("data-width", "150%");

        window.fbAsyncInit = function() {
            FB.init({
                appId: '1290089247998761',
                cookie: true,
                xfbml: true,
                version: 'v8.0'
            });

            // FB.AppEvents.logPageView();

            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));



    });

    function statusChangeCallback(response) {
        if (response.status === 'connected') {
            // console.log(response);
            console.log("AAAAA");
            // console.log(response.authResponse['accessToken']);
            // FB.api('/me', function(response) {
            //     console.log(response);
            //     // console.log('Good to see you, ' + response.name + '.');
            // });


        } else {

        }
    }

    function go_other_data() {
        window.location.assign("/usrdata.php");
    }


    function login() {
        FB.login(function(response) {
            if (response.status === 'connected') {
                // console.log(response);
                // console.log(response.authResponse['accessToken']);
            }
        }, {
            scope: 'name,first_name,last_name,email,picture.height(800)'
        });
    }

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });


    }
    </script>

    <body>

        <div class="mainbody">
            <div class="header">
                <div class="title">
                    <h2 id="title_content">社群媒體登入</h2>
                </div>
            </div>
            <div class="footer"></div>
            <div class="social_login" onclick="login()">
            </div>
            <form id="fom" action="./usrdata.php" method="POST">
                <div class="nosocial" onclick="document.forms[0].submit()">
                    <h2 class="text" id="nosocial_content">我沒有社群帳號</h2>
                </div>
                <div class="btns">
                    <div class="btn" id="agree" onclick="document.forms[0].submit()">
                        <h2 class="text" id="btn_continue">繼續</h2>
                    </div>
                </div>
            </form>

        </div>
    </body>

</html>